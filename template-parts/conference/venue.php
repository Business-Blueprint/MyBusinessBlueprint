<div class="cd-section cd-venue-section" id="venue">
	<div class="container">
		<?php if( get_sub_field('title') ) : ?>
			<h3 class="cd-title"><?php echo get_sub_field('title') ?></h3>
		<?php endif;  ?>
		<?php if( get_sub_field('description') ) : ?>	
			<div class="cd-description"><?php echo get_sub_field('description') ?></div>
		<?php endif;  ?>

		<div class="inner-content">
			<?php echo get_sub_field('location_details') ?>
		</div>
	</div>
</div>
<!-- end of cd-date -->