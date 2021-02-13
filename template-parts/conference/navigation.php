<div class="cd-section cd-nav-section">
	<div class="container">
		<h3 class="cd-title">Jump to Information...</h3>
		<div class="cd-box-grid">

			<?php if( have_rows('tab_menu') ) :

                    while( have_rows('tab_menu')) : the_row();  ?>

						<div class="column">
							<a href="<?php echo get_sub_field('link') ?>" class="btn">
								<?php echo get_sub_field('title') ?>
							</a>
						</div>

			<?php   endwhile;
			
			     endif; ?>			
		</div>
	</div>	
</div>