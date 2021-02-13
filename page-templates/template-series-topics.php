<?php
/**
 * Template Name: Series Topics Template
 */

get_header(); ?>

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
						$terms = get_field( 'topics' );

						if ( ! empty( $terms ) ) :
							foreach ( $terms as $term ) :
								$series = new WP_Query(array(
									'post_type'      => 'mybbp_series',
									'posts_per_page' => -1,
									'tax_query'      => array(
										array(
											'taxonomy' => 'mybbp_series_topic',
											'terms'    => $term->term_id,
										),
									),
								) );

								if ( ! $series->have_posts() ) {
									continue;
								}

								if ( count( $terms ) > 1 ) {
									echo '<header class="content__header">';

									echo '<h2 id="' . $term->slug . '" class="content__title">' . $term->name . '</h2>';

									echo term_description( $term->term_id );

									echo '</header>';
								}
								?>

								<div class="grid  grid--boxes">
									<?php while ( $series->have_posts() ) : $series->the_post(); ?>
										<div class="grid__column">
											<div class="box box-oh">
                                            	<div class="vs-badge">
                                                	<?php the_field('series_badge'); ?>
                                                </div>
												<a href="<?php the_permalink(); ?>" class="box__link">
													<div class="box__label">
														<?php the_title(); ?>
													</div>
												</a>
											</div>
										</div>
									<?php endwhile; ?>
								</div>
								<?php
							endforeach;
						endif;
						?>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>
<style>
.box-oh{
	overflow:hidden;
}
.vs-badge{
	color:#002749;
	text-align:center;
	font-weight:bold;
	background:#FFF;
	position:absolute;
	z-index:9;
	transform: rotate(45deg);
	text-transform:uppercase;
	right:-50px;
	width:150px;
	top:15px;
	font-size:0.8em;
	}
.vs-badge:nth-child(2n)){
	color:#f15d22 !important;
}
</style>