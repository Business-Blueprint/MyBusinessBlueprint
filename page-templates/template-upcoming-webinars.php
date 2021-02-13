<?php 
/**
*
* Template Name: Upcoming Webinars
*
*/
get_header(); 

?> 

<main id="content" class="content">
	<header class="banner" <?php themezero_the_banner_image(); ?>>
		<div class="container">
			<h1 class="banner__title">
				<?php the_title(); wp_reset_postdata(); ?>
			</h1>

			<div class="banner__subtitle"></div>
		</div>
	</header>
	<section class="content-section">
		<div class="container">  
			<script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>
			<section class="webinars-section">
				<?php   
						the_content(); 
					    wp_reset_postdata(); 

				?>

						<?php if( have_rows('list') ) : ?>

								<ul class="webinar webinar__dates">

								<?php while( have_rows('list') ) : the_row(); 


									$type = get_sub_field('webinar_type');

									$webinar_date = strtotime(get_sub_field('date'));
									$current_date = strtotime("now");


								?>	

									<li>
										<div class="webinar__item">
											<div class="col-left">
												<?php if( get_sub_field('webinar_type') ) : ?>
													<h3><?php  echo get_sub_field('title') ?></h3>
												<?php endif; ?>
												<span class="name"><span class="fa fa-user"></span> <?php echo get_sub_field('name') ?></span>
												<div class="description"><?php  echo get_sub_field('description') ?></div>
												<a href="<?php echo get_sub_field('link') ?>" target="_blank"><span class="fa fa-external-link"></span> <?php echo get_sub_field('link') ?></a>
											</div>
											<div class="col-right">
												<?php 
													$date = get_sub_field('date');

													$day = date('l', strtotime($date));
													$day_numeric = date('d', strtotime($date));
													$month = date('M', strtotime($date));
													$year = date('Y', strtotime($date));

													$webinar_start = date('m/d/Y', strtotime($date)) . ' 8:00 pm';
													$webinar_end = date('m/d/Y', strtotime($date)) . ' 9:00 pm';

													$description = get_sub_field('description');

												?>

												<span class="year"><?php echo $year; ?></span>
												<div class="calendar-ui">
													<span class="month"><?php echo $month; ?></span>
													<span class="day"><?php echo $day_numeric; ?></span>
												</div>
												
												<h3><?php echo $day; ?></h3>
												<span class="time">(8pm Sydney Time)</span>
												<div  class="addeventatc calendar" aria-haspopup="true" aria-expanded="false" tabindex="0" style="visibility: visible;">
													Add to Calendar
												    <span class="start atc_node"><?php echo $webinar_start; ?></span>
												    <span class="end atc_node"><?php echo $webinar_end; ?></span>
												    <span class="timezone atc_node">Australia/Sydney</span>
												    <span class="title atc_node">Business Blueprint Webinar</span>
												    <span class="description atc_node"><?php  echo esc_html( get_sub_field('description') ) ?></span>
												    <span class="location atc_node"><?php echo esc_url( get_sub_field('link') ) ?></span>
													<span class="addeventatc_icon atc_node"></span>
												</div>
												
											</div>	
										</div>
									</li>

								<?php 
				

								endwhile; ?>	

								</ul>
					<?php endif; ?>	

			</section>

		</div>
	</section>
</main>

<?php get_footer(); ?>