			<footer class="footer" role="contentinfo" itemscope itemtype="http://schema.org/WPFooter">

				<div id="inner-footer" class="wrap cf">

					<div class="social">
						<?php 

							$fb = get_field('facebook', 'options');
							$fb_link = get_field('facebook_link', 'options');
							$insta = get_field('instagram', 'options');
							$insta_link = get_field('instagram_link', 'options');
							$twitter = get_field('twitter', 'options');
							$twitter_link = get_field('twitter_link', 'options');

							if($fb && $fb_link)
							{ 
						?>

							<a href="<?php echo $fb_link; ?>" class="social fb">
								<svg class="fb_svg" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
									<path d="M26.667 0h-21.334c-2.945 0-5.333 2.388-5.333 5.334v21.332c0 2.946 2.387 5.334 5.333 5.334h10.667v-14h-4v-4h4v-3c0-2.761 2.239-5 5-5h5v4h-5c-0.552 0-1 0.448-1 1v3h5.5l-1 4h-4.5v14h6.667c2.945 0 5.333-2.388 5.333-5.334v-21.332c0-2.946-2.387-5.334-5.333-5.334z"></path>
								</svg>
							</a>
				
						<?php  
							}
						?>
						<?php
							if($insta && $insta_link)
							{ 
						?>
							<a href="<?php echo $insta_link; ?>" class="social insta">
								<svg class="insta_svg" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
									<path d="M26.688 0h-21.375c-2.922 0-5.313 2.391-5.313 5.313v21.375c0 2.922 2.391 5.313 5.313 5.313h21.375c2.922 0 5.313-2.391 5.313-5.313v-21.375c0-2.922-2.391-5.313-5.313-5.313zM10.244 14h11.513c0.218 0.627 0.337 1.3 0.337 2 0 3.36-2.734 6.094-6.094 6.094s-6.094-2.734-6.094-6.094c0-0.7 0.119-1.373 0.338-2zM28 14.002v11.998c0 1.1-0.9 2-2 2h-20c-1.1 0-2-0.9-2-2v-12h3.128c-0.145 0.644-0.222 1.313-0.222 2 0 5.014 4.079 9.094 9.094 9.094s9.094-4.079 9.094-9.094c0-0.687-0.077-1.356-0.222-2l3.128 0.002zM28 7c0 0.55-0.45 1-1 1h-2c-0.55 0-1-0.45-1-1v-2c0-0.55 0.45-1 1-1h2c0.55 0 1 0.45 1 1v2z"></path>
								</svg>
							</a>
				
						<?php  
							}
						?>

						<?php
							if($twitter && $twitter_link)
							{ 
						?>
							<a href="<?php echo $twitter_link; ?>" class="social twitter">
								<svg class="twitter_svg" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
									<path d="M26.667 0h-21.333c-2.934 0-5.334 2.4-5.334 5.334v21.332c0 2.936 2.4 5.334 5.334 5.334h21.333c2.934 0 5.333-2.398 5.333-5.334v-21.332c0-2.934-2.399-5.334-5.333-5.334zM23.952 11.921c0.008 0.176 0.012 0.353 0.012 0.531 0 5.422-4.127 11.675-11.675 11.675-2.317 0-4.474-0.679-6.29-1.844 0.321 0.038 0.648 0.058 0.979 0.058 1.922 0 3.692-0.656 5.096-1.757-1.796-0.033-3.311-1.219-3.833-2.849 0.251 0.048 0.508 0.074 0.772 0.074 0.374 0 0.737-0.050 1.081-0.144-1.877-0.377-3.291-2.035-3.291-4.023 0-0.017 0-0.034 0-0.052 0.553 0.307 1.186 0.492 1.858 0.513-1.101-0.736-1.825-1.992-1.825-3.415 0-0.752 0.202-1.457 0.556-2.063 2.024 2.482 5.047 4.116 8.457 4.287-0.070-0.3-0.106-0.614-0.106-0.935 0-2.266 1.837-4.103 4.103-4.103 1.18 0 2.247 0.498 2.995 1.296 0.935-0.184 1.813-0.525 2.606-0.996-0.306 0.958-0.957 1.762-1.804 2.27 0.83-0.099 1.621-0.32 2.357-0.646-0.55 0.823-1.245 1.545-2.047 2.124z"></path>
								</svg>
							</a>
				
						<?php  
							}
						?>
					</div>
					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
