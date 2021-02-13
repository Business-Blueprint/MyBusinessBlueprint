<?php

get_header(); ?>

	<div class="site__middle  site__middle--modules">
		<main id="content" class="content  content--modules" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		
			<section class="timely-tech-section">
			    <div class="container">
					<div class="top-info">
						<div class="row">
							<div class="col-sm-6 col-xs-8">
								<h1><?php echo get_the_title(); ?></h1>
							</div>
							<div class="col-sm-6 col-xs-4">
								<button id="sidebarButton" class="float-right"><span class="fa fa-bars"></span></button>
							</div>
						</div>
					</div>
			    	<div class="grid video-wrap-content">
					 	 <div class="col">
					 	    
					 	 	<?php 	$args = array(
		                        		'post_type' => 'mybbp_timelytech',
		                        		'order' => 'DESC',
		                        		'orderby' => 'date',	
		                        		'posts_per_page' => 1
		                        	);

	                        	$query = New WP_Query($args);  $count = 0;


	                         	while( $query->have_posts() ) : $query->the_post(); $count++;

									$video_link 	= get_field('video', $query->ID, false );
									$first_position = strpos( $video_link, "medias/");
							        $video_id 		= substr($video_link, ( $first_position + 7 ), 10);

							        if( $count == 1) :      
	                        ?>

					 	     <div class="video-holder">

					 	     	<div id="wistiaEmbed">
					 	     	    <?php echo get_sub_field('video', $query->ID ); ?>
										<div class="wistia_embed wistia_async_<?php echo $video_id; ?> autoPlay=true" style="width:100%;height:100%;">&nbsp;</div>
										<script src="//fast.wistia.com/assets/external/E-v1.js"></script>

					 	     	</div>
					 	     </div>
								
					 	    <h3>In this session you'll learn...</h3>
							
							<?php if( have_rows('list', $query->ID ) ) : ?>
						 	    <ul class="timeline-list">
						 	    	<?php while( have_rows('list') ) : the_row(); ?>
					                   	  <li>
					                   	  	 <div class="timeline-single">
					                   	  	    <div class="play-btn">
					                   	  	       <?php $time = ( get_sub_field('minutes')  * 60 ) + get_sub_field('seconds'); ?>
					                   	  	 		<button  class="btn-play" data-time="<?php echo $time; ?>"><span class="fa fa-play"></span></button>
					                   	  	 	</div>
					                   	  	 	<?php if( get_sub_field('title') ) : ?>
					                   	  	 		<span class="title"><?php echo get_sub_field('title'); ?></span>
					                   	  	 	<?php endif; ?>
					                   	  	 	<?php if( get_sub_field('minutes') && get_sub_field('seconds') ) : ?>
					                   	  	 		<span class="at-time"><?php echo get_sub_field('minutes'); ?>:<?php echo get_sub_field('seconds'); ?></span>
					                   	  	 	<?php endif; ?>

					                   	  	 	<?php if( get_sub_field('description') ) : ?>
					                   	  	 		<span class="detail">View Details</span>
					                   	  	 	<?php endif; ?>		
												<?php if( get_sub_field('link') ) : ?>
				                   	  	 			<span class="website">Website: <a href="<?php echo get_sub_field('link'); ?>	" target="_blank">Open Link</a></span>
												<?php endif; ?>
												<?php if( get_sub_field('description') ) : ?>
					                   	  	 		<div class="hide detail-content"><?php echo get_sub_field('description') ?></div> 
					                   	  	 	<?php endif; ?>		
					                   	  	 		
					                   	  	 </div>
					                   	  </li>
			                   	   <?php endwhile; ?>
		                   		</ul> 
							<?php endif; ?>

	                   		<?php endif; 
	                   			endwhile;

	                   			wp_reset_postdata();
	                   		    ?>
	                     </div>
	                     <div class="col">
							<?php  
								$args = array(
		                        		'post_type' => 'mybbp_timelytech',
		                        		'post_status' => 'publish',
		                        		'order' => 'DESC',
		                        		'orderby' => 'date',	
		                        		'posts_per_page' => -1
		                        	);

	                        	$query = New WP_Query($args);  $count = 0;
	                        	if( $query->have_posts() ) : ?>
									<div class="video-item">
									 
			                                <?php while( $query->have_posts() ) : $query->the_post(); $count++;

												$video_link 	= get_field('video', $query->ID, false );
												$first_position = strpos( $video_link, "medias/");
										        $video_id 		= substr($video_link, ( $first_position + 7 ), 10);
			                                ?>
			                                	   <div class="item-section <?php echo ( $count == 1) ? 'active': ''; ?>" id="<?php echo GET_THE_ID(); ?>">
			                                	       <div class="left-item">
			                                	       		<div class="video-thumbnail" id="<?php echo $video_id ?>">
			                                	       			<div class="fa-spinner-wrap"><span class="fa fa-spin  fa-spinner"></span></div>
			                                	       		</div>
				                                	   		
			                                	       </div>
			                                	       <div class="right-item">
				                                	       	<?php if( have_rows('list') ) : ?>
					                                	   	   <div class="list-item">	
					                                	   	      <ul>	
																   <?php while( have_rows('list') ) :  the_row(); ?>
																		<li><span><?php echo get_sub_field('title') ?></span></li>
																   <?php endwhile; ?>
																   </ul>
		                                                       </div>
														   <?php endif; $date = strtotime( get_the_date("Y-m-d") ); ?>	
														   <span class="date"><?php echo date( "F Y", $date ) ?></span>
			                                	       </div>
												   </div>
											<?php endwhile; ?>
										
									</div>
                            <?php    	
	                        	endif;	

	                        	wp_reset_postdata();
	                        ?>
	                     </div>
					</div>
			    </div> 
			</section>

		</main>
	</div>
	<script>
			var prevTime = 0;

			$(document).on('click', '.btn-play', function(){

				var videoWrap = $('#wistiaEmbed');	
					

				var video_player = videoWrap.find('.wistia_embed');
				var video_id = video_player.attr('id');
		
				var video_filter_id = video_id.replace('wistia_', '');
				var wistiaInnerID = $("#wistia_" + video_filter_id).find('video').attr('id');


				if(wistiaInnerID == undefined) {
					var wistiaInnerID = $("#wistiaEmbed").find('video').attr('id');
					
				} 
			
				var wistiaEmbed = document.getElementById(wistiaInnerID);
				
				var time = $(this).attr('data-time');

			
				if( prevTime == 0 ) {
						
					wistiaEmbed.play(); 
					wistiaEmbed.currentTime = time;

					wistiaTrigger(time, video_filter_id);
					prevTime = time;
					
				} else if( time !=  prevTime ) {

					wistiaEmbed.currentTime = time;

					setTimeout(function(){ wistiaEmbed.play(); }, 1000)

				 	wistiaTrigger(time, video_filter_id);
					prevTime = time;
				

				} else {

		
					wistiaEmbed.currentTime = time;

					setTimeout(function(){ wistiaEmbed.play(); }, 1000)
					

					
					wistiaTrigger(time, video_filter_id);
					prevTime = time;				

				}
			})



			function wistiaTrigger(time, video_id) {
		
				window._wq = window._wq || [];

				console.log('Wistia Trigger ' +video_id);

				// target our video by the first 3 characters of the hashed ID
				_wq.push({ id: video_id, onReady: function(video) {

				
				  // on play, seek the video to 10 seconds, then unbind so it
				  // only happens once.
				  video.bind('play', function(t) {
				  
				     video.time(time);
				     return video.unbind;

				  });

				  video.bind('pause', function(t) {
				
				     video.time(time);
				     return video.unbind;

				  });

				}});

		}

		$(window).load(function(){

				var list = $('.video-item').find('.item-section');	
			

				for( var a = 1; a <= list.length; a++ ) {
				
					var id = $('.video-item .item-section:nth-child('+ a +') .video-thumbnail').attr('id');

					console.log(id);
					$.ajax({
						type: 'POST',
				 		url: search_members.ajax_url,
				 		data: {
				 			action: 'get_wistia_image',
				 			security: search_members.security,
				 			id: id,
				 		},
				 		success: function(data) {
						  
				 			var img = '<img src="' + data['data']['img_link'] + '" width="100%" alt="' + data['data']['title'] +'" /><span class="play"><i class="fa fa-play"></i></span>';
				 		
				 			$('.video-item').find('#' + data['data']['id']).html(img);
				 		},
				 		error: function() {

				 		}
					});

				}

			});


			$(document).on('click', '.video-thumbnail', function(){

					var id 		    = $(this).attr('id');
					var videoWrap 	= $('#wistiaEmbed');
					var video_list  = $('.timeline-list');
					var postID 		= $(this).closest('.item-section').attr('id');

					videoWrap.html('');
					videoWrap.removeAttr('class');
					videoWrap.html('<div id="wistia_'+ id+'" class="wistia_embed" style="width:100%;height:100%;">&nbsp;</div>');
					var video_listing = $('.timely-tech-section .video-item .item-section');
					
					//remove active video list
					video_listing.removeClass('active');

					$(this).closest('.item-section').addClass('active');


					//Clear Video list
					video_list.html('<div class="loader-wrapper"><div class="inner-wrap">Please wait....</div></div>');

					// Embed Wistia to video player
					var wistiaEmbed = Wistia.embed(id);
				
					// Autoplay it right after embedded
					wistiaEmbed.play();
					
					// Get data from the server
					$.ajax({
						type: 'POST',
				 		url: search_members.ajax_url,
				 		data: {
				 			action: 'get_post_list',
				 			security: search_members.security,
				 			id: postID,
				 		},
				 		success: function(data) {
				 			
						 	if(data['data'].length > 0) {
						 		var item = "";
						 		for(var x = 0; x < data['data'].length; x++) {

						 			var startPoint = ( parseInt( data['data'][x]['minutes'] ) * 60 ) + parseInt( data['data'][x]['seconds'] );

						 			item += '<li><div class="timeline-single"><div class="play-btn"><button class="btn-play" data-time="'+ startPoint +'"><span class="fa fa-play"></span></button></div><span class="title">'+ data['data'][x]['title'] +'</span><span class="at-time">'+ data['data'][x]['minutes'] +':'+ data['data'][x]['seconds'] + '</span>';
						 			if( data['data'][x]['description'] ) {
						 				item += '<span class="detail">View Details</span>';
						 			}
						 			if( data['data'][x]['link'] ) {
						 				item += '<span class="website">Website: <a href="'+ data['data'][x]['link'] +'" target="_blank">Open Link</a></span>';
						 			}
						 			if( data['data'][x]['description'] ) {
						 				item += '<div class="hide detail-content">' + data['data'][x]['description'] + '</div>';
						 			}
						 				item += '</div></li>';

						 		}
						 	}
				 			
				 		
				 			$('.timeline-list').html(item);
				 		},
				 		error: function(err) {
				 			console.log(err);
				 		}
					});

			});

			$('#sidebarButton').on('click', function(){

				$('.video-wrap-content').toggleClass('expand');

				if( $(this).find('span').hasClass('fa-chevron-right') ) {

					$(this).find('span').removeClass('fa-chevron-right').addClass('fa-chevron-left');

				} else {

					$(this).find('span').removeClass('fa-chevron-left').addClass('fa-chevron-right');
				}

			});


			$(document).on('click', '.timeline-single .detail', function(){

				if( $(this).text() == 'View Details' ) {

					$(this).text('Hide Details');

				} else {

					$(this).text('View Details');
				}

				$(this).closest('.timeline-single').find('.detail-content').toggleClass('hide');
			});

	</script>

<?php get_footer(); ?>
