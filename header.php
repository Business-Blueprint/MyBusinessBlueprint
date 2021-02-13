<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="initial-scale=1, shrink-to-fit=no">

	<?php wp_head(); ?>
	<!-- Google Tag Manager -->

	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WBL253B');</script>

	<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<!-- Google Tag Manager (noscript) -->

	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBL253B" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

	<!-- End Google Tag Manager (noscript) -->
	<a class="screen-reader-text  skip-link" href="#content">Skip to main content</a>

	<div class="site">
		<div class="site__top">
			<header class="header" itemscope itemtype="http://schema.org/WPHeader">
				<div class="container">

					<div class="grid">
						<div class="grid__column  grid__column--7  grid__column--m-4  grid__column--l-3">
							<a href="<?php echo home_url(); ?>" title="Return to homepage">
								<img src="https://my.businessblueprint.com/wp-content/themes/prod-mbb-live/assets/images/top-logo.svg" class="logo">
							</a>
						</div>

						<div class="grid__column  grid__column--5  grid__column--m-8  grid__column--l-9  u-text-right">


							<?php if ( is_user_logged_in() ) : ?>
								<a href="<?php echo home_url() ?>/your-profile" class="button__membership"><span class="fa fa-user"></span><span class="button__membership--text"> View Profile</span></a>	
								<a href="<?php echo wp_logout_url( get_home_url() ); ?>" class="button  button--alt  button--login button__login  button--wide">Log out</a>
							<?php else : ?>
								<a href="<?php echo get_theme_mod( 'login_url' ) ?: wp_login_url( get_home_url() ); ?>" class="button  button--alt  button--login  button--wide">Log in</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</header>

			<?php get_template_part( 'template-parts/algolia/searchform' ); ?>

			<nav id="navigation" class="navigation">
				<div class="container">
					<button class="menu-toggle  js-cascade-toggle" aria-controls="navbar" data-label-close="Close">Menu</button>

					<div id="navbar" class="navbar  js-cascade-navbar" itemscope itemtype="http://schema.org/SiteNavigationElement">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'topmenu',
							'fallback_cb'    => false,
							'container'      => false,
							'items_wrap'     => '<ul class="navbar__list">%3$s</ul>',
							'walker'         => new Cascade_Navbar_Walker,
						) );
						?>
					</div>

					<?php if ( is_user_logged_in() ) : ?>
						<button class="search-toggle  js-search-open" aria-controls="search-form" style="display: none;"><span class="screen-reader-text">Search</span></button>
					<?php endif; ?>
				</div>
			</nav>
		</div>
		<?php if( get_field('notification_label', 60061) ) : ?>
		<section class="notify-section">
			<div class="container">
				<?php echo get_field('notification_label', 60061) ?>
			</div>
		</section>
		<?php endif; ?>

		<div class="site__middle">