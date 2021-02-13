<div class="a-team">

		<?php if( get_field('overview') ) : ?>
			<section>
				<?php echo get_field('overview') ?>
			</section>		
		<?php endif; ?>			
		
		<?php if ( have_rows('section') ) : 

					  $countid = 0;
					  while( have_rows('section') ) : the_row();

					  $countid++;
		?>
						<div class="section-divider" id="team-<?php echo $countid ?>"></div>	
						<div class="main__header header__team">
							<h2 class="main__title"><?php echo get_sub_field('heading') ?></h2>
						</div>

							<?php if ( have_rows('videolist') ) : ?>

								<div class="grid  grid--2-columns">

									<?php while ( have_rows('videolist') ) : the_row(); ?>

										<div class="grid__column">
											<article class="video  video--excerpt">
												<?php if ( get_sub_field('video') ) : ?>
													<section class="video__video">
														<?php $iframe = get_sub_field('video'); 
															// use preg_match to find iframe src
															preg_match('/src="(.+?)"/', $iframe, $matches);
															$src = $matches[1];


															// add extra params to iframe src
															$params = array(
															    'controls'    => 0,
															    'hd'        => 1,
															    'autohide'    => 1
															);

															$new_src = add_query_arg($params, $src);

															$iframe = str_replace($src, $new_src, $iframe);


															// add extra attributes to iframe html
															$attributes = 'frameborder="0"';

															$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);


															// echo $iframe
															echo $iframe; 
														?>
													</section>
												<?php endif; ?>

												<header class="video__header">
													<h3 class="video__title">
														<?php echo get_sub_field('title'); ?>
													</h3>
												</header>
												<?php 

												  if( get_sub_field('text') ) :

												  	echo '<p>' . get_sub_field('text') . '</p>';

												  endif;	

												?>	

											</article>

										</div>

									<?php endwhile; ?>

								</div>

							<?php endif; ?>



		<?php 
					 endwhile;
			 endif; ?>
</div>			 	
<script>
	// Select all links with hashes
$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
</script>