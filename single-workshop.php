<?php get_header(); ?>

	<main id="content" class="content" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="video  video--full  video--webinar">
				<section class="video__screen">
					<div class="container">
						<?php cascade_the_video(); ?>
					</div>
				</section>

				<div class="container">
					<header class="video__header">
						<h1 class="video__title">
							<?php the_title(); ?>
						</h1>

						<?php echo get_the_term_list( get_the_ID(), 'mybbp_video_presenter', '<div class="video__presenter">', ', ', '</div>' ); ?>
					</header>

					<section class="video__content">
						<?php the_content(); ?>
					</section>

					<?php get_template_part( 'template-parts/video/downloads' ); ?>

					<?php get_template_part( 'template-parts/video/terms' ); ?>
				</div>
			</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>