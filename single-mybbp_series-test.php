<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">
				<header class="banner" <?php themezero_the_banner_image(); ?>>
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

                    <?php

						$paged = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;

						$videos = new WP_Query( array(
							'posts_per_page'  => 10,
							'post_type'       => 'mybbp_video',
							'paged' 		  => $paged,
							'nopaging' 		  => false,
							'connected_type'  => 'mybbp_video_to_series',
							'connected_items' => get_queried_object(),
							'orderby'         => 'menu_order',
							'order'           => 'ASC',

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
					<nav class="pagination" role="navigation">	
						<?php


						$big = 999999999; // need an unlikely integer

							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => '?paged=%#%',
								'current' => max( 1, get_query_var('paged') ),
								'prev_text'          => __('← Previous'),
								'next_text'          => __('Next →'),
								'total' => $videos->max_num_pages
							) );
						?>
					</nav>	
				</div>
			</article>

			<div class="container">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>


	</main>

<?php get_footer(); ?>