<?php
/*
 * Template Name: Contact Page
 * 
 * This page is for the SOCA Contact Page. 
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
							<div class="contact_page">
								<div class="col1">
									<?php  
										$form = get_field('cf_shortcode');

										if($form)
										{
									?>
											<div class="formwrap">
												<?php echo do_shortcode($form); ?>
											</div>
									<?php  
										}
									?>
								</div>
								<div class="col2">
									<?php
										$address = get_field('address');  
										$map = get_field('map');
										$phone = get_field('phone');

										if($map && $address)
										{
									?>
											<div class="details">
													<span class="address">
														<?php echo $address; ?>			
													</span>
												<?php 
													if($phone)
													{
												?>
														<a href="tel:<?php echo $phone; ?>" class="phone">
															<?php echo $phone; ?>			
														</a>
												<?php 
													}
												?>
											</div>
											<div class="mapwrap">
												<div class="acf-map">
													<div class="marker" data-lat="<?php echo $map['lat']; ?>" data-lng="<?php echo $map['lng']; ?>"></div>
												</div>
											</div>
									<?php  
										}
									?>
								</div>
								<div class="col3">
									<?php  

										$transport = get_field('transportcol');

										if($transport)
										{
									?>
											<div class="transport">
												<?php echo $transport; ?>
											</div>
									<?php  
										}
									?>
								</div>

							</div>
						</section>
					</article>
				</div>
			</div>
<?php get_footer(); ?>
