<div class="cd-section cd-video-section">
	<div class="container">
	    <script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
		<div class="row">
			<div class="<?php echo ( get_sub_field('no_video') ) ? 'col-sm-12': 'col-sm-4'; ?> text-center">

				<?php if( get_sub_field('heading') ) : ?>
					<h2 class="heading"><?php echo get_sub_field('heading') ?></h2>
				<?php endif;  ?>
				<?php if( get_sub_field('subheading') ) : ?>
					<h3 class="subheading"><?php echo get_sub_field('subheading') ?></h3>
				<?php endif;  ?>		
	
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="cd-calendar">
                            <?php 
                            	$no_of_dates = count( get_sub_field('dates') );

                            	if( have_rows('dates') ) :
                            		$count 		 = 0;
                            	    
                            		while( have_rows('dates')) : the_row(); 
                            			$count++;
                            				if($count == 1) {
                            					$first_day = get_sub_field('item');
                            				}
                            				if($count ==  $no_of_dates ) {
                            					$last_day = get_sub_field('item');
                            				} ?>	
										
											<div class="date">
												<span class="month"><?php echo date( 'F', strtotime( get_sub_field('item') ) ); ?><br></span><span class="day"><?php echo date( 'l', strtotime(  get_sub_field('item') ) ); ?></span>
												<span class="day-numeric"><?php echo date( 'j', strtotime(  get_sub_field('item') ) ); ?></span>
												
											</div>
											
								

                            <?php	
                            		endwhile;
                            	endif;	
                            ?>
							<div class="schedule">
							  <div><strong>Day 1</strong> - 9:00am to 6:00pm </div>
							  <div><strong>Day 2</strong> -  9:00am to 6:00pm </div>
							  <div><strong>Day 3</strong> - 9:00am to 6:00pm </div>
							  <div><strong>Day 4</strong> -  9:30am to 4:00pm </div>
							</div>	
						</div>
						<div class="cd-button">
							<div title="" class="btn-addevent addeventatc" id="addeventatc1" aria-haspopup="true" aria-expanded="false" tabindex="0" style="visibility: visible;">
							    Add to Calendar
							    <span class="start atc_node"><?php echo $first_day ?> 9:00 am</span>
							    <span class="end atc_node"><?php echo $last_day ?> 6:00 pm</span>
							    <span class="timezone atc_node">Pacific/Sydney</span>
							    <span class="title atc_node"><?php echo get_sub_field('heading'); ?></span>
							    <span class="description atc_node"></span>
							    <span class="location atc_node"></span>
								<span class="addeventatc_icon atc_node"></span>
							</div>
						</div>
					</div>
				</div>

			</div>	
			<?php if( ! get_sub_field('no_video') ) : ?>
				<div class="col-sm-8">
				    <!-- Video -->
					<div class="video">
	                    <?php echo get_sub_field('video')  ?>
					</div>
					<!-- Video -->
				</div>
			<?php endif; ?>
		</div>
	</div>	
</div>