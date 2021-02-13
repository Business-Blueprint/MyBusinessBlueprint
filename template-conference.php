<?php 
/*
* Template name: Conference
*/
get_header(); ?>
<style>
	.event-information,
	.event-conference {
	    margin-bottom: 30px;
	}
	.wrap-event .addeventatc {
	    margin: 5px auto;
	    background: #00264c;
	    color: #fff !important;
	    border-radius: 5px;
	    background: #00bce4;
	    height: 45px;
	}
	.event-date {
		margin-bottom: 5px;
	}
	p.member {
      margin: 10px 0 0 0;
	}
	.event-info {
		display: inline-block;
	}
</style>
	<main id="content" class="content" tabindex="-1">
		<div class="container">
			<?php

			while ( have_posts() ) : the_post(); 

				the_content();

				if( have_rows('event_details') ):

				  
				    while ( have_rows('event_details') ) : the_row();

						echo '<h1>'. get_sub_field('month') .'</h1>';


						  if( have_rows('Event') ):

				  
				    			while ( have_rows('Event') ) : the_row(); ?>


											<?php
															

												if( get_sub_field('type') == 'summit'  || get_sub_field('type') == 'webinar'  ) {

													if( have_rows('details_2') ) {

														while ( have_rows('details_2') ) { the_row();  ?>	
														       		<div class="event-information">
													                    <p class="event-date"><strong><?php echo get_sub_field('date') ?></strong> - 
											                    			<?php if( get_sub_field('link')) { ?>
											                    				<a href="<?php echo get_sub_field('link') ?>"><?php echo get_sub_field('event') ?></a>
											                    			<?php }
											                    			 	  else { ?>
																					<?php echo get_sub_field('event') ?>
											                    			<?php } ?>
													                    </p>

													                    		<?php if( have_rows('calendar_event') ) { 

													                    			while ( have_rows('calendar_event') ) { the_row();  ?>

																				<div class="wrap-event">
																					<div class="event-info">
																						<div id="event-2" title="Add to Calendar" class="addeventatc event2">Add to Calendar
																							<span class="start"><?php echo get_sub_field('start_date') ?></span>
																							<span class="end"><?php echo get_sub_field('end_date') ?></span>
																							<span class="timezone"><?php echo get_sub_field('timezone') ?></span>
																							<span class="title"><?php echo get_sub_field('title') ?></span>
																							<span class="description"><?php echo get_sub_field('description') ?></span>
																							<span class="location"><?php echo get_sub_field('location') ?></span>
																							<span class="organizer">Business Blueprint</span>
																							<span class="organizer_email">support@businessblueprint.com</span>
																							<span class="all_day_event">false</span>
																							<span class="date_format">MM/DD/YYYY</span>
																							<span class="client">aONhfvcCGzTneJMiQmkq29248</span>
																				  		</div>
																					</div>
																				</div>

																				<?php } 

																				}

																				?>

																	</div>

														       <?php 


														} //details 2

													} //if details 2
											   
											 }
											 else {

											  $type 	 = get_sub_field('type');
											  $is_annual = get_sub_field('annual_conference');

											   echo '<div class="event-conference">';

											    	if( have_rows('details') ) {

														while ( have_rows('details') ) : the_row(); 
												?>
												       		
											                    <p class="event-date"><strong><?php echo get_sub_field('date') ?></strong> - 
											            			<?php if( get_sub_field('link')) { ?>
											            				<a href="<?php echo get_sub_field('link') ?>"><?php echo get_sub_field('event') ?></a>
											            			<?php }
											            			 	  else { ?>

																			<?php echo ( get_sub_field('custom_event') ) ? get_sub_field('custom_event')  : get_sub_field('event') ?>
											            			<?php } ?>
											                    </p>
															

												<?php
														endwhile;
													}

													 if( have_rows('calendar_event') ) {

													 	echo '<div class="wrap-event">';

														while ( have_rows('calendar_event') ) : the_row();

												?>
														
														
															<div class="event-info">
															    <?php if($type == 'conference' && !$is_annual ) { ?>
															    <p class="member"><?php echo get_sub_field('membership')  ?></p>
															    <?php } ?>
																<div title="Add to Calendar" class="addeventatc event2">Add to Calendar
																	<span class="start"><?php echo get_sub_field('start_date') ?></span>
																	<span class="end"><?php echo get_sub_field('end_date') ?></span>
																	<span class="timezone"><?php echo get_sub_field('timezone') ?></span>
																	<span class="title"><?php echo get_sub_field('title') ?></span>
																	<span class="description"><?php echo get_sub_field('description') ?></span>
																	<span class="location"><?php echo get_sub_field('location') ?></span>
																	<span class="organizer">Business Blueprint</span>
																	<span class="organizer_email">support@businessblueprint.com</span>
																	<span class="all_day_event">false</span>
																	<span class="date_format">MM/DD/YYYY</span>
																	<span class="client">aONhfvcCGzTneJMiQmkq29248</span>
														  		</div>
															</div>
														

												<?php
														endwhile;

														echo '</div>';
													}

												echo '</div>';	
											 
											 } ?>
										
								<?php		
					 						
								endwhile;

						  endif;
				    endwhile;

				endif;

			endwhile;	

			?>

		</div>
	</main>
<!-- AddEvent --><script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
<?php get_footer(); ?>