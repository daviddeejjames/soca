<?php
/*
 * Template Name: About Page
 * 
 * This page is for the SOCA About Page. 
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
				<div class="about_content">
					<?php
						$top_h = get_field('top_section_heading');  
						$top_content = get_field('top_content');

						if($top_h && $top_content)
						{
					?>
							<div class="top">
								<h2 class="heading">
									<?php echo $top_h; ?>
								</h2>
								<div class="contentwrap">
									<?php echo $top_content; ?>
								</div>
							</div>							
					<?php  
						}
					?>

					<?php  
						if( have_rows('teachers') ) : ?>
							<div class="teachers">
								<h2 class="heading">Teachers</h2>
								<?php 
									while( have_rows('teachers') ) : the_row(); 
										$name = get_sub_field('name');
										$image = get_sub_field('image');
										$description = get_sub_field('description');

										if($name && $image && $description)
										{
								?>
											<div class="teacher clearfix">
												<div class="image">
													<?php echo acf_image($image, 'large') ?>
												</div>
												<div class="text">
													<h3 class="name">
														<?php echo $name; ?>
													</h3>
													<p class="description">
														<?php echo $description; ?>
													</p>
												</div>
											</div>
								<?php
										} 
									endwhile; 
								?>
							</div>
					<?php 
						endif; //End Teachers
					
						$bottom_h = get_field('bottom_section_heading');  
						$bottom_content = get_field('bottom_content');

						if($bottom_h && $bottom_content)
						{
					?>
							<div class="bottom">
								<h2 class="heading">
									<?php echo $bottom_h; ?>
								</h2>
								<div class="contentwrap">
									<?php echo $bottom_content; ?>
								</div>
							</div>							
					<?php  
						}
					?>
				</div>
			</section>
		</article>
	</div>
</div>
<?php get_footer(); ?>
