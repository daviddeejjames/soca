<?php
/*
 * Template Name: Class Directory Page
 * 
 * This page is for the SOCA Class Directory Page. 
 *
*/
?>

<?php get_header(); ?>
<div id="content cf" class="page_content">
	<div id="inner-content" class="wrap cf">
		<article class="directory-page m-all t-all d-all cf">
					<header class="article-header">
						<h1 class="page-title"><?php the_title(); ?></h1>
					</header>
				
					<section class="entry-content cf" itemprop="articleBody">
						<div class="content">
							<?php 
							$posts = get_field('classes');

							if( $posts ): 
							?>
							    <ul class="class-list">
							    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
							        <?php setup_postdata($post); ?>
							        <li>
							            <a href="<?php the_permalink(); ?>" class="class-link">
							            	<span class="thumb"><?php the_post_thumbnail(); ?></span>
											<span class="title"><?php the_title(); ?></span>
											<span class="description"><?php the_field('description'); ?></span>
							            </a>
							        </li>
							    <?php endforeach; ?>
							    </ul>
							    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							<?php endif; ?>
						</div>
					</section>
		</article>
	</div>
</div>
<?php get_footer(); ?>
