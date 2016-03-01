<?php get_header(); ?>
	<div id="content cf" class="page_content">
		<div id="inner-content" class="wrap cf">
			<article class="front-page m-all t-all d-all cf">
					<section class="fp_slideshow">
						<?php

							$images = get_field('fp_slideshow');

							if($images)
							{
								foreach( $images as $image ): 
						?>
								<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" class="slide_img" />
						 <?php 
						 		endforeach;
						 	} 
						 ?>
						
					</section>
						
					<section class="fp-col1 m-all t-1of2 d-1of2">
						<?php the_field('fp_col1'); ?>	
					</section>
					<section class="fp-col2 m-all t-1of2 d-1of2 last-col">
						<?php the_field('fp_col2'); ?>	
					</section>  
			</article>
		</div>
	</div>

<?php get_footer(); ?>
