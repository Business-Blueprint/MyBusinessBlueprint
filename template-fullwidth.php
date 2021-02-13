<?php 

/**
* Template name: Fullwidth
*
**/


get_header(); ?>
<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
	<header class="banner cd-banner" <?php themezero_the_banner_image(); ?>>
		<div class="container">
			<h1 class="banner__title">
				<?php the_title(); ?>
			</h1>
			<div class="banner__subtitle"></div>
		</div>
	</header>
	<?php  
	wp_reset_postdata();
	the_content() ?>
	

</main>
<!-- AddEvent script -->
<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
<script>
	(function($){
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
	})(jQuery)
</script>
<?php

get_footer();
