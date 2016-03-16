<?php
// LOAD CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );

// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
require_once( 'library/admin.php' );

function setup() {
  //Allow editor style.
  add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

  // let's get language support going, if you need it
  load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

  // USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
  //require_once( 'library/custom-post-type.php' );

  // launching operation cleanup
  add_action( 'init', 'bones_head_cleanup' );
  // A better title
  add_filter( 'wp_title', 'rw_title', 10, 3 );
  // remove WP version from RSS
  add_filter( 'the_generator', 'bones_rss_version' );
  // remove pesky injected css for recent comments widget
  add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
  // clean up comment styles in the head
  add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
  // clean up gallery output in wp
  add_filter( 'gallery_style', 'bones_gallery_style' );

  // enqueue base scripts and styles
  add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
  // ie conditional wrapper

  // launching this stuff after theme setup
  bones_theme_support();

  // adding sidebars to Wordpress (these are created in functions.php)
  add_action( 'widgets_init', 'bones_register_sidebars' );

  // cleaning up random code around images
  add_filter( 'the_content', 'bones_filter_ptags_on_images' );
  // cleaning up excerpt
  add_filter( 'excerpt_more', 'bones_excerpt_more' );

} 
add_action( 'after_setup_theme', 'setup' );

add_theme_support( 'post-thumbnails' ); 


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'fp-slide', 1000, 500, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'fp-slide' => __('1000px by 500px'),
        'bones-thumb-300' => __('300px by 100px'),
    ) );
}

/************* THEME CUSTOMIZE *********************/

/* 
  A good tutorial for creating your own Sections, Controls and Settings:
  http://code.tutsplus.com/series/a-guide-to-the-wordpress-theme-customizer--wp-33722
  
  Good articles on modifying the default options:
  http://natko.com/changing-default-wordpress-theme-customization-api-sections/
  http://code.tutsplus.com/tutorials/digging-into-the-theme-customizer-components--wp-27162
  
  To do:
  - Create a js for the postmessage transport method
  - Create some sanitize functions to sanitize inputs
  - Create some boilerplate Sections, Controls and Settings
*/

function bones_theme_customizer($wp_customize) {
  // Uncomment the below lines to remove the default customize sections 
  // $wp_customize->remove_section('title_tagline');
  // $wp_customize->remove_section('colors');
  //$wp_customize->remove_section('background_image');
  //$wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_section('nav');
  //$wp_customize->remove_control('blogdescription');
  //$wp_customize->get_section('colors')->title = __( 'Theme Colors' );
  //$wp_customize->get_section('background_image')->title = __( 'Images' );
}

add_action( 'customize_register', 'bones_theme_customizer' );

/************* ACTIVE SIDEBARS ********************/
function bones_register_sidebars() {
	/*register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} 

// allow special file type uploads in Wordpress media
add_filter("upload_mimes","chr_custom_upload_mimes");
if(!function_exists("chr_custom_upload_mimes")){
  function chr_custom_upload_mimes($existing_mimes=array()){
    $existing_mimes["svg"]="image/svg+xml"; // you may also want to make sure SVG media library thumbnails are fixed in chr-admin.js
    return $existing_mimes;
  }
}

// make thumbnail output use the background-image trick to give us better control over the image
add_filter("post_thumbnail_html","chr_post_thumbnail_html",10,5);
if(!function_exists("chr_post_thumbnail_html")){
function chr_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr){
  if(!is_admin()){
    $title=esc_attr(get_the_title($post_id));
    $classes=esc_attr("attachment-".$size." wp-post-image");
    $img=wp_get_attachment_image_src($post_thumbnail_id,$size);
    $img[0]=esc_url($img[0]);
    array_walk($img,"esc_attr");
    $html='';
    //$html.='<a href="'.get_permalink($post_id).'" title="'.$title.'">';
    $html.='<img width="'.$img[1].'" height="'.$img[2].'" src="'.$img[0].'" style="background-image: url(\''.$img[0].'\');" class="'.$classes.'" alt="'.$title.'" title="'.$title.'" />';
    //$html.='</a>';
  }
  return $html;
}
}

//Create an ACF image to a certain size and enable background trickery if necessary 
function acf_image($image, $size){
  $html = '';
  $url = $image['url'];

  if($url && trim($url) != '')
  {
    if($size && array_key_exists($size, $image['sizes']))
    {
      $width = $image['sizes'][$size . '-width'];
      $height = $image['sizes'][$size . '-height'];
      $url = $image['sizes'][$size];
    }
    else
    {
      $width = $image['width'];
      $height = $image['height'];
    }

    $title = $image['title'];

    if($width && $height && $url && trim($url) != '')
    {
      $html = '<img width="'.$width .'" height="'.$height .'" src="'.$url.'" style="background-image: url(\''.$url.'\');" alt="'.$title.'" title="'.$title.'" />';
    }
  }

  return $html;
}

function the_excerpt_max_charlength($charlength) {
    $type = get_post_type(); //Get Post Type

      $excerpt = get_the_excerpt();

        $charlength++;

        if ( mb_strlen( $excerpt ) > $charlength ) {
                $subex = mb_substr( $excerpt, 0, $charlength - 5 );
                $exwords = explode( ' ', $subex );
                $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
                if ( $excut < 0 ) {
                        echo mb_substr( $subex, 0, $excut );
                } else {
                        echo $subex;
                }
                echo '[...]';
        } else {
                echo $excerpt;
        }
}


/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
  <div id="comment-<?php comment_ID(); ?>" <?php comment_class('cf'); ?>>
    <article  class="cf">
      <header class="comment-author vcard">
        <?php
        /*
          this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
          echo get_avatar($comment,$size='32',$default='<path_to_url>' );
        */
        ?>
        <?php // custom gravatar call ?>
        <?php
          // create variable
          $bgauthemail = get_comment_author_email();
        ?>
        <img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=40" class="load-gravatar avatar avatar-48 photo" height="40" width="40" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
        <?php // end custom gravatar call ?>
        <?php printf(__( '<cite class="fn">%1$s</cite> %2$s', 'bonestheme' ), get_comment_author_link(), edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>

      </header>
      <?php if ($comment->comment_approved == '0') : ?>
        <div class="alert alert-info">
          <p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
        </div>
      <?php endif; ?>
      <section class="comment_content cf">
        <?php comment_text() ?>
      </section>
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>
  <?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

function google_fonts() {
  wp_enqueue_style('googleFonts', 'https://fonts.googleapis.com/css?family=Cutive+Mono');
}

add_action('wp_enqueue_scripts', 'google_fonts');


if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Global Content',
    'menu_title'  => 'Global Content',
    'menu_slug'   => 'options',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));
}
?>
