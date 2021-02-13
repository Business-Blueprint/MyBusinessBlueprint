<div class="cd-section cd-accommodation-section" id="accommodation">
	<div class="container">
		<?php if( get_sub_field('heading') ) : ?>
			<h3 class="cd-title"><?php echo get_sub_field('heading') ?></h3>
		<?php endif;  ?>
		<?php if( get_sub_field('description') ) : ?>	
			<div class="cd-description"><?php echo get_sub_field('description') ?></div>
		<?php endif;  ?>

		<div class="row">
			<div class="col-sm-12">
				<div class="embed-content">
					<?php echo get_sub_field('map') ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="cd-section cd-accommodation-section cd-hotel-section">
	<div class="container">
		<div class="row">

		<?php if( have_rows('hotels') ) : 
        	     while( have_rows('hotels')) : the_row();  ?>	

		  			<div class="col-sm-6">
						<div class="single-accommodation">
							<div class="image">
								<?php echo wp_get_attachment_image( get_sub_field('image'), 'full' ) ?>
							</div>
							<div class="info">
								<?php echo get_sub_field('info') ?>
							</div>
						</div>
					</div>     

        <?php    endwhile; ?>
        <?php endif; ?>	

		</div>
	</div>
</div>