<?php 
	$random_number = rand(1, 5); 
?>
<?php if ( is_home() && get_option( 'page_for_posts' ) ) : ?>
	<?php $post = get_post( get_option( 'page_for_posts' ) ); setup_postdata( $post ); ?>
	<header class="banner" <?php echo 'style="background: url('. get_stylesheet_directory_uri() .'/assets/images/banner'. $random_number . '.jpg) center center / cover no-repeat;"'; ?>>
		<div class="container">
			<h1 class="banner__title">
				<?php the_title(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>
  
	<div class="container">
		<div class="content__description">
			<?php echo apply_filters( 'the_excerpt', $post->post_excerpt ); ?>
		</div>
	</div>

	<?php wp_reset_postdata(); ?>
<?php elseif ( is_post_type_archive() ) : ?>

	<header class="banner" <?php echo 'style="background: url('. get_stylesheet_directory_uri() .'/assets/images/banner'. $random_number . '.jpg) center center / cover no-repeat;"'; ?>>
		<div class="container">
			<h1 class="banner__title">
				Business Blueprint<br>
				<strong><?php post_type_archive_title(); ?></strong>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>
<?php elseif ( is_tax() ) :	?>

	<header class="banner" <?php cascade_the_banner_image(); ?>>
		<div class="container">
			<h1 class="banner__title">
				<?php cascade_the_banner_title(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>

	<div class="container">
		<div class="content__description">
			<?php the_archive_description(); ?>
		</div>
	</div>
<?php elseif ( is_archive() ) : ?>

	<header class="banner" <?php echo 'style="background: url('. get_stylesheet_directory_uri() .'/assets/images/banner'. $random_number . '.jpg) center center / cover no-repeat;"'; ?>>
		<div class="container">
			<h1 class="banner__title">
				<?php the_archive_title(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>

	<div class="container">
		<div class="content__description">
			<?php the_archive_description(); ?>
		</div>
	</div>
<?php endif; ?>