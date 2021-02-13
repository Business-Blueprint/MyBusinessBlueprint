<?php 

get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<header class="banner" <?php themezero_the_banner_image(); ?>>
			<div class="container">
				<h1 class="banner__title" itemprop="headline">
					<?php cascade_the_banner_title(); ?>
				</h1>

				<div class="banner__subtitle"></div>
			</div>
		</header>

		<div class="container">
				<?php

					// Get User in WP
					$user  = wp_get_current_user();

					// Get user email
					$email = $user->user_email;	

					?>

					<div id="emailClip" class="hide"><?php echo $email; ?></div>

					<?php

				     if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else: ?>
						<p>Sorry, nothing found that matched your criteria.</p>
					<?php endif; ?>


		</div>
	</main>

<script>
	
	(function($){

			$(window).load(function(){
		
					// Variables and DOM Caching.
					var email = document.getElementById('emailClip').innerHTML,
						input = document.getElementsByClassName('.moonray-form-input')[0];

						$('input[type="email"]').val(email);
				
			});	

	})(jQuery);

</script>
<?php 

get_footer();