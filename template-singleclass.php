<?php
/*
 * Template Name: Single Class Page
 * 
 * This page is for the SOCA Single Class Page. 
 *
*/
?>

<?php get_header(); ?>
<?php the_post(); ?>
<div id="content cf" class="page_content">

	<div id="inner-content" class="wrap cf">

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

			<header class="article-header">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<?php  
					$subtitle = get_field('subtitle');

					if($subtitle)
					{
				?>
						<h2 class="subtitle"><?php echo $subtitle; ?></h2>
				<?php  
					}
				?>
			</header>

			<section class="entry-content cf" itemprop="articleBody">
				<div class="content">
					<?php 
						the_content();
					?>
				</div>
				<?php 
					if( have_rows('class') ) : 
				?>
						<div class="classes">
							<?php 
								while( have_rows('class') ) : the_row();
									$image = get_sub_field('image');
									$title = get_sub_field('title');
									$subt = get_sub_field('subtitle');
									$short = get_sub_field('short_content');
									$more_info = get_sub_field('more_info_content');

							?>
								<div class="the_class clearfix">
									<div class="image">
										<?php echo acf_image($image, 'large'); ?>
									</div>
									<div class="contentwrap clearfix">
										<h4 class="class_name">
												<?php echo $title; ?>
											<span class="subtitle">
												<?php echo " - " . $subt; ?>
											</span>
										</h4>
										<?php 
											if( have_rows('daysandtimes') ) : 
										?>
												<ul class="daysandtimes">
													<?php while( have_rows('daysandtimes') ) : the_row(); ?>
															<li><?php the_sub_field('daytime'); ?></li>
													<?php endwhile; ?>
												</ul>
										<?php 
											endif; 

											if($short)
											{
										?>	
												<div class="short_content">
													<?php echo $short; ?>
												</div>
										<?php
											}

											if($more_info)
											{
										?>
												<button class="more_info">More Info...</button>
												<div class="morecontent">
													<?php echo $more_info ?>
												</div>
										<?php  
											}
										?>
									</div>
								</div>
							<?php 
								endwhile; 
							?>
						</div>
				<?php 
					endif; 
				?>
			</section>
		</article>
	</div>
</div>
<?php get_footer(); ?>
