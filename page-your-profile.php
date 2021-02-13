<?php 

get_header(); 

?> 


<main id="content" class="content">

	<section class="module module__membership">
		<div class="container">
		<?php 

			$is_silver =  do_shortcode('[mbb_silver_membership]');

			if(!$is_silver) :
		?>
				<div class="notes" id="bb-note"><span class="fa fa-exclamation-circle"></span><span class="text"> IMPORTANT: All Members (Fast Track & Elite) can view your name and state below, you can choose what other information to share or hide by clicking the edit button.</span></div> 
		<?php endif; ?>	
			<?php echo do_shortcode('[MBB_contactInfo]') ?>	
		</div>			
	</section>

</main>

<?php get_footer(); ?>