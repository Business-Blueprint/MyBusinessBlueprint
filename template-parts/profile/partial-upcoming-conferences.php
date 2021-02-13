<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
<div class="module upt-conference">
	<div class="container">
		                	  
    	<?php 
	    	  $customer_type =  do_shortcode('[mbb_get_customer_type]'); 

	    	  if( $customer_type == 'Fasttrack Gold') {
	    	  	$show_dates = 'conference_dates';
	    	  	$total_days = 2;

	    	  }
	    	  else if ( $customer_type == 'Fasttrack Platinum') {
	    	  	$show_dates = 'conference_dates';
	    	  	$total_days = 4;

	    	  }
	    	  else if ( $customer_type == 'Elite Gold' ) {
	    	  	$show_dates = 'elite_conference_dates';
	    	  	$total_days = 2;
	    	  }
	    	  else if ( $customer_type == 'Elite Platinum'  ) {
	    	  	$show_dates = 'elite_conference_dates';
	    	  	$total_days = 4;
	    	  } 
	    	  else if ( $customer_type == 'Silver' ) {
            $show_dates = 'silver_dates';
            $total_days = 2;
          }
          else {

	    	  	$show_date =  false;
	    	  } ?>

  
			
    	    <?php if($show_dates) {  ?>
    	   			<h2 class="heading">Conference Dates</h2>
    	    <?php } ?>


    	  	<?php 

    	  	 $page_conf_date = get_page_by_path('latest-news');
    	  	 $page_id = $page_conf_date->ID;

    	  	 $frontpage_id = get_option('page_on_front');

    	  	if( have_rows($show_dates, $frontpage_id)  ) :

    	  		echo '<div class="row">';

    	  		  	while( have_rows($show_dates, $frontpage_id) ) : the_row(); $month = get_sub_field('month'); 

    	  		  		$is_annual = ( get_sub_field('annual_conference') ) ? get_sub_field('annual_conference')  : false;
    	  		  		$tbd = get_sub_field('tbd');  ?>

                    	<div class="col-sm-3">
                   
		                    <?php ( $show_dates != 'elite_conference_dates') ? '<h3 class="topic">'. get_sub_field('topic') . '</h3>' : ''; ?>
	

            	  			 <?php if( have_rows('day') ) :

            	  			 		echo '<div class="calendar">';

            	  			 		$countDate = 0;

            	  			 		while( have_rows('day') ) : the_row(); $countDate++; ?>
            	  			 
	                	  			 	<div class="date <?php echo ( ( $total_days  == 2 && $countDate == 1 ) &&  $is_annual == false || ( $total_days  == 2 && $countDate == 4 && $is_annual == false) ) ? 'hide' : '';?>">

	                	  			 	    <span class="month <?php echo ($tbd  && $is_annual == false) ?  'no-date' : '';?>"><?php  echo date("M", strtotime( get_sub_field('item') ) ); ?></span>
	                	  			 	    <span class="day">
	                	  			 	        <?php if( ! $tbd || $is_annual == true ) : ?>
			                	  			 		<?php echo date('jS' , strtotime( get_sub_field('item') ) ); ?>
			                	  			 	<?php else : ?>
			                	  			 		<?php echo __('TBD', 'cascade') ?>
			                	  			 	<?php endif; ?>	
	                	  			 	    </span>

        	  			 			    </div>
        	  			 
        	  			 		<?php  endwhile;

        	  			 	   		echo '<div class="year">' . get_sub_field('year') . '</div>';
        	  			 	        echo '</div>';

        	  			 	        if( ! get_sub_field('tbd') ) :

        	  			 	        	if( have_rows('add_to_calendar') ) {

        	  			 	        	  echo '<div class="calendar-button">';
        	  			 	        	  	
        	  			 	        	  	while( have_rows('add_to_calendar') ) : the_row();   ?>
            	  			 	        		
												<div title="Add to Calendar" class="addeventatc">
												    Add to Calendar
												    <span class="start">
												    	<?php   if($total_days == 2  && $is_annual == false) {
												    			    $gold_start_date = date('m/d/Y h:i a', ( strtotime('+1 day', strtotime( get_sub_field('start_date') ) ) )  );
												    			    echo $gold_start_date;	
												    		    }
												    		    else {
												    			   echo get_sub_field('start_date'); 
												    		    }  ?>
												    </span>
												    <span class="end">
												       <?php   if($total_days == 2  && $is_annual == false) {
														   			$gold_end_date = date('m/d/Y h:i a', ( strtotime('-1 day', strtotime( get_sub_field('end_date') ) ) )  );
												    			 	echo $gold_end_date;	
													    		}
													    		else {
													    			echo get_sub_field('end_date'); 
													    		}  ?>	
													</span>
												    <span class="timezone"><?php echo get_sub_field('timezone') ?></span>
												    <span class="title"><?php the_sub_field('summary_of_the_event') ?></span>
												    <span class="description"><?php echo get_sub_field('description_of_the_event') ?></span>
												    <span class="location"><?php echo get_sub_field('location_of_the_event') ?></span>
												</div>

							<?php		  	endwhile;

										  echo '</div>';
							            }
        	  			 	    	endif;
        	  			   		endif;    ?>


        	  			<?php if( get_sub_field('link') && ! get_sub_field('tbd') ) : ?> 
	        	  			<div class="group-btn">
	        	  				<a href="<?php echo get_sub_field('link'); ?>" class="view-more">More Info</a>
	        	  			</div> 
        	  			<?php endif; ?>

    	  		    </div>

    	   <?php 
    	   		 endwhile;

    	   		echo '</div>'; 
    		endif;
    	   ?>


    </div>	  
</div><!-- ./conference -->