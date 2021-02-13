<?php 

/**
*
* Template Name: Video Introduction
*
*/
get_header(); ?>

	<main id="content" class="content" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article class="video  video--full">
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
					</header>

					<section class="video__content">
						<?php the_content(); ?>
					</section>

				</div>
			</article>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>