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
					</div>
				</div>
			</article>

			<div class="container">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>