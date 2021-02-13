<div class="cd-section cd-social-section" id="activity">
	<div class="container">
		<?php if( get_sub_field('heading') ) : ?>
			<h3 class="cd-title"><?php echo get_sub_field('heading') ?></h3>
		<?php endif;  ?>
		<?php if( get_sub_field('description') ) : ?>	
			<div class="cd-description"><?php echo get_sub_field('description') ?></div>
		<?php endif;  ?>
		
		<div class="inner-content">
			<div class="cd-box-grid">
				<?php if( have_rows('list') ) : ?>
				
		        	<?php while( have_rows('list')) : the_row(); 
		        ?>	
			      		<div class="activity-item">
							<div class="inner">
								<h3><?php echo get_sub_field('title') ?></h3>
								<h4><?php echo get_sub_field('subtitle') ?></h4>
								<?php echo get_sub_field('description') ?>
							</div>
						</div>
		        <?php	
		        		endwhile; ?>
					
		        <?php endif; ?>	

				
			</div>
		</div>
	</div>
</div>