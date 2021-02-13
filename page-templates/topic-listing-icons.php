<?php
/**
 * Template Name: Topic Listing Icons
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

				<?php 

					the_content();
				?>
			
				<?php 

					$is_silver =  do_shortcode('[mbb_silver_membership]');

					if( have_rows('category') ):  ?>

					<?php while( have_rows('category') ) : the_row();   ?>
						
						<?php if( get_sub_field('heading_for_silver_membership') && $is_silver ) : ?>
							<header class="content__header">
								<h2 class="content__title"><?php echo get_sub_field('heading_for_silver_membership') ?></h2>
							</header>
						<?php elseif( get_sub_field('heading') && !$is_silver  ) : ?>
							<header class="content__header">
								<h2 class="content__title"><?php echo get_sub_field('heading') ?></h2>
							</header>
						<?php endif; ?>

						<?php if( have_rows('list') ):  ?>
						 
							<div class="grid  grid--boxes">

								<?php while( have_rows('list') ) : the_row();  ?>	

										<?php if( get_sub_field('external_link') ) : ?>

											<?php if( ( get_sub_field('silver_only') || !get_sub_field('exclude_for_silver')   ) && $is_silver  ) {  ?>
												
												<div class="grid__column grid__icon">
													<div class="box" id="<?php echo get_sub_field('id') ?>">
														<a href="<?php echo get_sub_field('link'); ?>" class="box__link">
															<div class="box__label">
															    <div class="inner">
															    	<div>
															    		<div class="box__icon">
																			<?php echo get_sub_field('icon'); ?>
																		</div>
																		<?php 
																			echo '<div class="box__title"><span>' . get_sub_field('title') . '</div></span>'; 	
																		?>
																		
																	</div>
																</div>
															</div>
														</a>
													</div>
												</div>
											<?php } else if ( ( !get_sub_field('silver_only') || get_sub_field('exclude_for_silver')  ) && !$is_silver  ) { ?>	
				                                <div class="grid__column grid__icon">
													<div class="box" id="<?php echo get_sub_field('id') ?>">
														<a href="<?php echo get_sub_field('link'); ?>" class="box__link">
															<div class="box__label">
															    <div class="inner">
															    	<div>
															    		<div class="box__icon">
																			<?php echo get_sub_field('icon'); ?>
																		</div>
																		<?php 
																			echo '<div class="box__title"><div>' . get_sub_field('title') . '</div></div>'; 	
																		?>
																		
																	</div>
																</div>
															</div>
														</a>
													</div>
												</div>
											<?php } ?>

										<?php else: ?>	
									
											<?php $post_object = get_sub_field('item');

												if( $post_object ) : 

													$post = $post_object;
													setup_postdata( $post );  ?>

													<div class="grid__column">
														<div class="box"  id="<?php echo get_sub_field('id') ?>">
															<a href="<?php the_permalink(); ?>" class="box__link">
																<div class="box__label">
																	<div class="inner">
																    	<div>
																			<?php 
																				echo '<span>' . get_the_title()  . '</span>'; 
																				wp_reset_postdata();			
																			?>
																			<div class="box__icon">
																				<?php echo get_sub_field('icon'); ?>
																			</div>
																		</div>
																	</div>
																</div>
															</a>
														</div>
													</div>
						
											<?php endif; ?>
										<?php endif; ?>

									<?php endwhile; ?>	

								</div>	

							<?php endif; ?>	


					
					<?php endwhile; ?>

				</div>
				<?php endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</article>
</main>

<?php get_footer(); ?>