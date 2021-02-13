<?php 
/**
*
* Template Name: Conference Information
*
*/
get_header(); 

?> 

<main id="content" class="content">
	<header class="banner" <?php themezero_the_banner_image(); ?>>
		<div class="container">
			<h1 class="banner__title">
				<?php the_title(); wp_reset_postdata(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php while ( have_rows( 'conference_modules' ) ) : the_row(); ?>
			<?php get_template_part( 'template-parts/conference/' . get_row_layout() ); ?>
		<?php endwhile; ?>
	<?php endwhile; ?>


</main>

<?php get_footer(); ?>