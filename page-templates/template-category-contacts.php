<?php 
/**
*
* Template Name: Category Contacts
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

			<div class="breadcrumb">
				<ul>
					<li><a href="<?php echo site_url() ?>/useful-contacts">Useful Contacts</a><span class="arrow">&#187;</span></li>
					<li><span><?php echo get_the_title() ?></span></li>
				</ul>
			</div>

			<?php 

				    if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else: ?>
						<p>Sorry, nothing found that matched your criteria.</p>
					<?php endif; ?>

	

		</div>
	</section>


</main>

<?php get_footer(); ?>