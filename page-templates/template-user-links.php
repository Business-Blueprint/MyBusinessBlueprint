<?php 
/**
*
* Template Name: Users Link Template
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
	<section class="content-section">
		<div class="container">  

			<?php 
				global $post;
    			$post_slug = $post->post_name;

				if( is_page('conference-dates') ) {
				
						get_template_part('template-parts/profile/partial', 'conference');
						
				} else if( is_page('i-need-help-with') ) {

				  		get_template_part('template-parts/profile/partial', 'help-with');

				} else if( is_page('a-team') ) {

				  		get_template_part('template-parts/profile/partial', 'ateam');

				} else if( is_page('useful-contacts') ) {

				  		get_template_part('template-parts/profile/partial', 'useful-contacts');

				}  else if( is_page('upcoming-webinars') ) {

				  		get_template_part('template-parts/profile/partial', $post_slug);

				}  else if( is_page('upcoming-conferences') ) {

				  		get_template_part('template-parts/profile/partial', 'upcoming-conferences');

				} else if( is_page('consultant') || is_page('consultant-page-2') || is_page('your-consultant') ) {
			
				  		get_template_part('template-parts/profile/partial', 'consultant');

				} else { 

				     if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else: ?>
						<p>Sorry, nothing found that matched your criteria.</p>
					<?php endif; ?>

			<?php }  ?>

		</div>
	</section>
</main>

<?php get_footer(); ?>