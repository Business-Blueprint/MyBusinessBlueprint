<?php get_header(); ?>

	<div class="container">
		<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
			<?php while ( have_posts() ) : the_post(); ?>
				<article class="blueprint  blueprint--full">
					<div class="grid">
						<div class="grid__column  grid__column--m-6  grid__column--l-4">
							<?php if ( ! post_password_required() ) : ?>
								<?php the_post_thumbnail( 'large', array( 'class' => 'blueprint__thumbnail' ) ); ?>
							<?php endif; ?>
						</div>

						<div class="grid__column  grid__column--m-6  grid__column--l-8">
							<header class="blueprint__header">
								<h1 class="blueprint__title" itemprop="headline">
									<?php the_title(); ?>
								</h1>
							</header>

							<?php if ( ! post_password_required() ) : ?>
								<div class="blueprint__content  clearfix" itemprop="text">
									<?php the_content(); ?>
								</div>

								<section class="blueprint__terms">
									<?php cascade_the_blueprint_topic_list(); ?>
								</section>

								<?php get_template_part( 'template-parts/blueprint/downloads' ); ?>
							<?php else : ?>
								<?php echo get_the_password_form(); ?>
							<?php endif; ?>
						</div>
					</div>
				</article>

				<?php comments_template(); ?>
			<?php endwhile; ?>
		</main>
	</div>

<?php get_footer(); ?>