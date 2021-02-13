<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">
				<header class="banner" <?php cascade_the_banner_image(); ?>>
					<div class="container">
						<h1 class="banner__title" itemprop="headline">
							<?php cascade_the_banner_title(); ?>
						</h1>

						<div class="banner__subtitle"></div>
					</div>
				</header>

				<div class="container">
					<div class="entry__content  clearfix" itemprop="text">
						<?php the_content(); ?>

						<?php get_template_part( 'template-parts/conference/handouts' ); ?>

						<?php get_template_part( 'template-parts/conference/visual' ); ?>

						<?php
						$videos = new WP_Query( array(
							'post_type'       => 'mybbp_video',
							'connected_type'  => 'mybbp_video_to_conference',
							'connected_items' => get_queried_object(),
						) );

						if ( $videos->have_posts() ) : ?>
							<div class="grid  grid--2-columns">
								<?php while ( $videos->have_posts() ) : $videos->the_post(); ?>
									<div class="grid__column">
										<?php get_template_part( 'template-parts/views/excerpt', get_post_type() ); ?>
									</div>
								<?php endwhile; wp_reset_query(); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</article>

			<div class="container">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>