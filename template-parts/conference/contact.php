<!-- strat of cd-contact-person -->
<div class="cd-section cd-contact-person-section" id="contact">
	<div class="container">
		<?php if( get_sub_field('heading') ) : ?>
			<h3 class="cd-title"><?php echo get_sub_field('heading') ?></h3>
		<?php endif;  ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="upt-consultant">
					<div class="info">
						<div class="info-left">
							<?php echo wp_get_attachment_image( get_sub_field('image'), 'full' ) ?>
							<div class="name">General Manager</div>
						</div>
						<div class="bio info-right">
							<?php echo get_sub_field('description') ?>
							<?php if( have_rows('buttons') ) : ?>
								<ul>
				        	<?php while( have_rows('buttons')) : the_row(); 
					        ?>	
									<li><a href="<?php echo get_sub_field('link') ?>" class="btn" target="_blank"><?php echo get_sub_field('title') ?></a></li>
					        <?php	
					        		endwhile; ?>
									</ul>
					        <?php endif; ?>	
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>