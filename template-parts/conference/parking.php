<div class="cd-section cd-parking-section" id="parking">
	<div class="container">
		<?php if( get_sub_field('heading') ) : ?>
			<h3 class="cd-title"><?php echo get_sub_field('heading') ?></h3>
		<?php endif;  ?>
		<?php if( get_sub_field('description') ) : ?>	
			<div class="cd-description"><?php echo get_sub_field('description') ?></div>
		<?php endif;  ?>

		<div class="inner-content">


		<?php if( have_rows('buttons') ) : ?>
				<ul class="list-inline">
        	<?php while( have_rows('buttons')) : the_row(); 
        ?>	
				<li><a href="<?php echo get_sub_field('link') ?>" target="_blank"><span><?php echo get_sub_field('title') ?></span></a></li>
        <?php	
        		endwhile; ?>
				</ul>
        <?php endif; ?>	

		</div>
	</div>
</div>