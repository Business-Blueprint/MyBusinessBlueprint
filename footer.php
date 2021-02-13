				<?php get_template_part( 'template-parts/algolia/search-results' ); ?>
			</div>

			<div class="site__bottom">
				<footer class="footer" itemscope itemtype="http://schema.org/WPFooter" role="contentinfo">
					<div class="container">
						<div class="grid">
							<div class="grid__column  grid__column--m-8  grid__column--l-9">
								<div class="grid  grid--large-gutters">
									<div class="grid__column  grid__column--l-6">
										<img src="https://my.businessblueprint.com/wp-content/themes/prod-mbb-live/assets/images/bottom-logo.svg" class="footer__logo">
									</div>

									<div class="grid__column  grid__column--l-6">
										<?php if ( function_exists( 'magicdust_social_menu' ) ) : magicdust_social_menu(); endif; ?>
									</div>
								</div>

								<?php dynamic_sidebar( 'footer' ); ?>

								<?php if ( get_theme_mod( 'footer_tagline' ) ) : ?>
									<p class="footer__tagline"><?php echo get_theme_mod( 'footer_tagline' ); ?></p>
								<?php endif; ?>

								<div class="footer__fine-print">
									<p>Copyright © <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. All Rights Reserved.

									<?php wp_nav_menu( array(
										'theme_location' => 'fine',
										'menu_class'     => 'menu  menu--fine-print',
										'depth'          => 1,
										'container'      => false,
										'fallback_cb'    => false,
									) ); ?>
								</div>
							</div>

							<div class="grid__column  grid__column--m-4  grid__column--l-3">
								<?php wp_nav_menu( array(
									'theme_location' => 'footer',
									'menu_class'     => 'menu  menu--footer',
									'container'      => false,
									'fallback_cb'    => false,
								) ); ?>
							</div>
						</div>
					</div>
				</footer>
			</div>
		</div> <!-- /.site -->

		<?php wp_footer(); ?>
	</body>
</html>