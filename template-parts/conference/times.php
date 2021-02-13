<div class="cd-section cd-time-section" id="time">
	<div class="container">
		<?php if( get_sub_field('heading') ) : ?>
			<h3 class="cd-title"><?php echo get_sub_field('heading') ?></h3>
		<?php endif;  ?>
		<?php if( get_sub_field('description') ) : ?>	
			<div class="cd-description"><?php echo get_sub_field('description') ?></div>
		<?php endif;  ?>
		
		<div class="inner-content">
			<div class="table-responsive" style="overflow-x:auto;">
                <?php echo get_sub_field('schedule') ?>
			</div>
		</div>

	</div>
</div>