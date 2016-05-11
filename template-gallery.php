<?php
/*
 * Template Name: Gallery Page
 * 
 * This page is for the SOCA Image Gallery. 
 *
*/
?>

<?php get_header(); ?>
			<div id="content cf" class="page_content">

				<div id="inner-content" class="wrap cf">

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

						<header class="article-header">
							<h1 class="page-title"><?php the_title(); ?></h1>
						</header>

						<section class="entry-content cf" itemprop="articleBody">
							<div class="content">
								<?php 
									the_content();
								?>
							</div>
							<?php
								$images = get_field('gallery');

							 		if($images):
					 		?>
										<div class="gallery">
										    <ul class="image-list nobullets">
										    	 <?php foreach( $images as $image ):
										    	 	$image_url = $image['sizes'];
										    	 	$obj = '<img src="'. $image_url['medium'] .'" style="background-image: url(\''.$image_url['medium'].'\');" class="imagebg gallery-item" alt="'.$image['title'].'" title="'.$image['title'].'" width="'.$image_url['medium-width'].'" height="'.$image_url['medium-height'].'"/>'; 
										    	 ?>
										            <li class="image-post">
										                <a href="<?php echo $image['sizes']['large']; ?>" rel="lightbox[gallery-0]" class="image-thumb" title="<?php echo $image['caption']; ?>">
										                	<?php echo $obj; ?>
										                </a>
										            </li>
										        <?php endforeach; ?>
										    </ul>
										</div>
							<?php
									endif; 
							?> 
						</section>
					</article>
				</div>
			</div>
<?php get_footer(); ?>
