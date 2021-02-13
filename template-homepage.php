<?php 

/**
* Template Name: Homepage
*
**/

get_header(); ?>
<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
	<header class="banner" <?php themezero_the_banner_image(); ?>>
		<div class="container">
			<h1 class="banner__title">
				<?php the_title(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>
  
  	<!-- Start of homepage banner -->
	<div class="homepage homepage-video-banner">
    	<div class="container">
            <div class="grid">
            	<div class="column">
            		<?php if ( get_field('video_heading') ) : ?>
            		 	<h2 class="heading"><?php echo get_field('video_heading') ?></h2>
            		<?php endif; ?> 
            		<?php if ( get_field('video') ) : ?>	
                		 <div class="inner-video">
                		     <?php echo get_field('video') ?>
                		 </div>
            		 <?php endif; ?>
            	</div>
            	<div class="column">
					<?php if ( get_field('video_heading_2') ) : ?>
            		 	<h2 class="heading"><?php echo get_field('video_heading_2') ?></h2>
            		<?php endif; ?> 
            		<?php if ( get_field('video_2') ) : ?>	
                		 <div class="inner-video">
                		     <?php echo get_field('video_2') ?>
                		 </div>
            		 <?php endif; ?>
            	</div>
            </div>
        </div>    
    </div>   
    <!-- End of homepage banner -->

    <!-- Start of homepage latest videos -->
    <div class="homepage homepage__success-stories" id="ft-videos">
        <div class="container">
        	<?php if( get_field('video_heading_3') ) : ?>
        	   <h2 class="heading text-center"><?php echo get_field('video_heading_3'); ?></h2>
        	<?php endif; ?>

			<?php 
			global $post;

			if( have_rows('featured_videos') ) { ?>

					<div class="grid" id="inspiration-videos">
						<?php 				
							while( have_rows('featured_videos') ) : the_row(); 

							$post_object = get_sub_field('video');

							if( $post_object ) :

								// override $post
								$post = $post_object;
								setup_postdata( $post );

									$video_link 	= get_field('video_oembed', GET_THE_ID(), false );
									$f_position 	= strpos( $video_link, "medias/");
									$video_id 		= substr($video_link, ( $f_position + 7 ), 10);

			
									$total_plays = ""; ?>

											<div class="column">
												<div class="single-post">								
													<div class="video-thumbnail" id="<?php echo $video_id ?>">
														<span class="fa fa-spin fa-spinner"></span>
													</div>
													<div class="video-details">
													<p class="name"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></p>
													</div>
												</div>
											</div>

									<?php

									wp_reset_postdata();
								endif;	?>
							

						<?php	
					
					endwhile;   ?>
				</div>

			<?php		
				} 

			wp_reset_postdata();

			?>
			<div class="btn-wrapper">
				<a href="<?php echo get_field ('view_all_link') ?>" class="button button--secondary">VIEW MORE</a>
			</div>
			
        </div>	 
    </div>
    <!-- End of homepage latest videos -->

	<?php 
		$filter_videos = get_field('filter_videos');
			
	?>
	<?php if( $content = get_field('content') ) : ?>
			<div class="content-wrapper">
				<div class="container">
					<?php echo $content; ?>	
				</div>
			</div>
	<?php endif; ?>	
	
    <!-- Start of homepage latest videos -->
    <div class="homepage homepage__latest-videos">
        <div class="container">
        	<?php if( get_field('featured_video_heading') ) : ?>
        	   <h2 class="heading text-center"><?php echo get_field('featured_video_heading'); ?></h2>
        	<?php endif; ?>

			<?php 
	
		$args = array(

				  'post_type' => 'mybbp_video',
				  'post_stataus' => 'publish',
				  'posts_per_page' => 8,
				  'post__not_in' => $filter_videos,
				  'order' => 'DESC',
				  'orderby' => 'date'
			);

		$query = New WP_Query($args);

		if( $query->have_posts() ) { ?>

			<div class="grid" id="recently-uploaded">
			<?php
			
			while( $query->have_posts() ) : $query->the_post(); 

				$video_link 	= get_field('video_oembed', $query->ID, false );
				$first_position = strpos( $video_link, "medias/");
		        $video_id 		= substr($video_link, ( $first_position + 7 ), 10);
			 ?>

						<div class="column">
							<div class="single-post">								
							    <div class="video-thumbnail" id="<?php echo $video_id ?>">
									<span class="fa fa-spin fa-spinner"></span>
							    </div>
								<div class="video-details">
								  <p class="name"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></p>

								    <?php 
											$presenter = get_the_term_list( get_the_ID(), 'mybbp_video_presenter', '<div class="presenter">', ', ', '</div>' );

											if( $presenter )  {
												echo $presenter;
											} else {
												echo '<div class="presenter">Business Blueprint</div>';
											}
									?>
								</div>
							</div>
						</div>

		<?php	
			endwhile; ?>

		</div>	
		<?php 		
		} 


		wp_reset_postdata(); ?>


    <!-- Start of homepage inspiration videos -->
    <div class="homepage homepage__inspiration-videos" id="inspiration-videos-wrap">
		<div class="container">
		<?php if( get_field('inspiration_video_heading') ) : ?>
        	   <h2 class="heading text-center"><?php echo get_field('inspiration_video_heading'); ?></h2>
        <?php endif; ?>
		<?php 
			global $post;

			if( have_rows('inspiration_videos') ) { ?>

					<div class="grid" id="inspiration-videos">
						<?php 				
							while( have_rows('inspiration_videos') ) : the_row(); 

							$post_object = get_sub_field('video');

							if( $post_object ) :

								// override $post
								$post = $post_object;
								setup_postdata( $post );

									$video_link 	= get_field('video_oembed', GET_THE_ID(), false );
									$f_position 	= strpos( $video_link, "medias/");
									$video_id 		= substr($video_link, ( $f_position + 7 ), 10);

			
									$total_plays = ""; ?>

											<div class="column">
												<div class="single-post">								
													<div class="video-thumbnail" id="<?php echo $video_id ?>">
														<span class="fa fa-spin fa-spinner"></span>
													</div>
													<div class="video-details">
													<p class="name"><a href="<?php echo get_permalink() ?>"><?php echo get_the_title() ?></a></p>

														<?php 
																$presenter = get_the_term_list( get_the_ID(), 'mybbp_video_presenter', '<div class="presenter">', ', ', '</div>' );

																if( $presenter )  {
																	echo $presenter;
																} else {
																	echo '<div class="presenter">Business Blueprint</div>';
																}
														?>
													</div>
												</div>
											</div>

									<?php

									wp_reset_postdata();
								endif;	?>
							

						<?php	
					
					endwhile;   ?>
				</div>

			<?php		
				} 

			wp_reset_postdata();

			?>
		</div>
	</div>


		<script>
			(function($){
			

					var uploadID = $('#recently-uploaded');
					var list = uploadID.find('.column');	

					for( var a = 1; a <= list.length; a++ ) {
						
						var id = $('#recently-uploaded .column:nth-child('+ a +') .video-thumbnail').attr('id');
					
						$.ajax({
							type: 'POST',
							url: search_members.ajax_url,
							data: {
								action: 'get_wistia_image',
								security: search_members.security,
								id: id,
							},
							success: function(data) {
							
								var img = '<img src="' + data['data']['img_link'] + '" width="100%" alt="' + data['data']['title'] +'" />';
							
								uploadID.find('#' + data['data']['id']).html(img);
							},
							error: function() {

							}
						});

					}

					var inspirationalID = $('#inspiration-videos-wrap');
					var list = inspirationalID.find('.column');	

					for( var a = 1; a <= list.length; a++ ) {
						
						var id = $('#inspiration-videos-wrap .column:nth-child('+ a +') .video-thumbnail').attr('id');
					
						$.ajax({
							type: 'POST',
							url: search_members.ajax_url,
							data: {
								action: 'get_wistia_image',
								security: search_members.security,
								id: id,
							},
							success: function(data) {
							
								var img = '<img src="' + data['data']['img_link'] + '" width="100%" alt="' + data['data']['title'] +'" />';
							
								inspirationalID.find('#' + data['data']['id']).html(img);
							},
							error: function() {

							}
						});

					}

					var ftID = $('#ft-videos');
					var list = ftID.find('.column');	

					for( var a = 1; a <= list.length; a++ ) {
						
						var id = $('#ft-videos .column:nth-child('+ a +') .video-thumbnail').attr('id');
					
						$.ajax({
							type: 'POST',
							url: search_members.ajax_url,
							data: {
								action: 'get_wistia_image',
								security: search_members.security,
								id: id,

							},
							success: function(data) {
							
								var img = '<img src="' + data['data']['img_link'] + '" width="100%" alt="' + data['data']['title'] +'" />';
							
								ftID.find('#' + data['data']['id']).html(img);
							},
							error: function() {

							}
						});

					}


			})(jQuery)
		</script>
		<style>
			#recently-uploaded .video-thumbnail,
			#inspiration-videos .video-thumbnail {
				position: relative;
				min-height: 150px;
				text-align: center;
				color: #888686;
			}
			#recently-uploaded  .video-thumbnail .fa,
			#inspiration-videos .video-thumbnail .fa {
				position: absolute;
				top: 45%;
				left: 48%;
				display: inline-block;
				margin: 0 auto;
				transform: translate(-50%,-50%);
				text-align: center;
			}
			h4.latest-uploads-heading a {
				text-transform: initial;
				float: right;
				margin-left: 10px;
			}
			h4.latest-uploads-heading {
				display: block;
				width: 100%;
				text-align: left !important;
			}
			.content-wrapper {
				padding: 30px 0;
				background: #f7f6f6;
			}
			.homepage.homepage-video-banner .grid {
				display: flex;
				flex-wrap: wrap;
				margin-left: -10px;
				margin-right: -10px;
			}
			.homepage.homepage-video-banner .grid > div {
				width: 50%;
				padding-left: 10px;
				padding-right: 10px;
			}
			.homepage__success-stories .video-details {
				height: auto !important;
				margin: 0 !important;
				min-height: auto !important;
			}
			.homepage__success-stories .video-details p {
				margin-bottom: 20px;
			}
			.btn-wrapper {
				text-align: center;
			}
			.btn-wrapper a {
				background: #87c358;
				font-size: 25px;
    			padding: 9px 20px 3px 20px;
			}
			@media ( max-width: 767px ) {
				.homepage.homepage-video-banner .grid > div {
					width: 100%;
					margin-bottom: 30px;
				}
			}
		</style>

			
        </div>	 
    </div>
    <!-- End of homepage latest videos -->


    </div> 
</main>

<?php get_footer(); ?>