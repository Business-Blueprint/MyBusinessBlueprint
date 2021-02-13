<div class="cd-section cd-flights-section" id="flights">
	<div class="container">
		<?php if( get_sub_field('heading') ) : ?>
			<h3 class="cd-title"><?php echo get_sub_field('heading') ?></h3>
		<?php endif;  ?>
		<?php if( get_sub_field('description') ) : ?>	
			<div class="cd-description"><?php echo get_sub_field('description') ?></div>
		<?php endif;  ?>


		<?php if( have_rows('buttons') ) : ?>
				<ul>
        	<?php while( have_rows('buttons')) : the_row(); 
        ?>	
				<li><a href="<?php echo get_sub_field('link') ?>" target="_blank"><?php echo get_sub_field('title') ?></a></li>
        <?php	
        		endwhile; ?>
				</ul>
        <?php endif; ?>		
	</div>
</div>