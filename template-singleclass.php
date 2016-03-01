<?php
/*
 * Template Name: Single Class Page
 * 
 * This page is for the SOCA Single Class Page. 
 *
*/
?>

<?php get_header(); ?>
			<div id="content cf" class="page_content">

				<div id="inner-content" class="wrap cf">

					<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

						<header class="article-header">
							<h1 class="page-title"><?php the_title(); ?></h1>
						</header>

						<section class="entry-content cf" itemprop="articleBody">
							<div class="content">
								<?php 
									the_content();
								?>
							</div>
							
						</section>
					</article>
				</div>
			</div>
<?php get_footer(); ?>
