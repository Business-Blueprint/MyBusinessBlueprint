<?php
/**
 * Template Name: Topic List Template
 */

get_header(); ?>

<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
	<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">
		<?php while ( have_posts() ) : the_post(); ?>
			
				<header class="banner" <?php themezero_the_banner_image(); ?>>
					<div class="container">
						<h1 class="banner__title" itemprop="headline">
							<?php cascade_the_banner_title();  ?>
						</h1>

						<div class="banner__subtitle"></div>
					</div>
				</header>
		<?php endwhile; ?>
		<div class="container">
			<div class="entry__content  clearfix" itemprop="text">
			
				<?php if( have_rows('topics') ):  ?>

						<div class="grid  grid--boxes">

							<?php while( have_rows('topics') ) : the_row();   ?>

								<?php if( get_sub_field('external_link') ) : ?>

										<div class="grid__column">
											<div class="box">
												<a href="<?php echo get_sub_field('link'); ?>" class="box__link">
													<div class="box__label">
														<?php 
															echo get_sub_field('title'); 	
														?>
													</div>
												</a>
											</div>
										</div>
									
								<?php else: ?>

									<?php 
										$post_object = get_sub_field('item');

										if( $post_object ) : 

											$post = $post_object;
											setup_postdata( $post );  ?>

											<div class="grid__column">
												<div class="box">
													<a href="<?php the_permalink(); ?>" class="box__link">
														<div class="box__label">
															<?php 
																	the_title(); 
																	wp_reset_postdata();		
															?>
														</div>
													</a>
												</div>
											</div>
				
									<?php endif; ?>

								<?php endif; ?>
							
							<?php endwhile; ?>

						</div>
				<?php endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</article>
	
</main>

<?php get_footer(); ?>