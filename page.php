<?php get_header(); ?>

			<div id="content cf" class="page_content">

				<div id="inner-content" class="wrap cf">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

									<h1 class="page-title"><?php the_title(); ?></h1>
								</header>

								<section class="entry-content cf" itemprop="articleBody">
									<?php
										the_content();
									?>
								</section>

							</article>

							<?php endwhile; ?>
							<?php endif; ?>


				</div>

			</div>

<?php get_footer(); ?>
