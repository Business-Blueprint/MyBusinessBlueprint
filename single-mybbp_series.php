<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">
				<header class="banner" <?php cascade_the_banner_image(); ?>>
					<div class="container">
						<h1 class="banner__title" itemprop="headline">
							<?php cascade_the_banner_title(); ?>
						</h1>

						<div class="banner__subtitle"></div>
					</div>
				</header>

				<div class="container">
					<div class="entry__content  clearfix" itemprop="text">
						<?php the_content();  wp_reset_query();  ?>

						<?php
						
						$paged = ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1;

						$post_pages = 1;


						$videos = new WP_Query( array(
							'post_type'       => 'mybbp_video',
							'connected_type'  => 'mybbp_video_to_series',
							'connected_items' => get_queried_object(),
							'orderby'         => 'menu_order',
							'order'           => 'ASC',
							'posts_per_page' => -1,
							//'paged' => -1 
						) );
						
						

						if ( $videos->have_posts() ) : ?>
							<div class="grid  grid--2-columns">
								<?php while ( $videos->have_posts() ) : $videos->the_post(); ?>
									<div class="grid__column">
										<?php get_template_part( 'template-parts/views/excerpt', get_post_type() ); ?>
									</div>
								<?php endwhile; wp_reset_query(); ?>
							</div>
						<?php endif; wp_reset_postdata(); ?>
					</div>
				</div>
			</article>

			<?php 
			  $big = 999999999; // need an unlikely integer

			  $args = array(
				  'base'               => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				  'format'             => '?page=%#%',
				  'total'              => $videos->max_num_pages,
				  'current'            =>  max( 1, get_query_var('page') ),
				  'show_all'           => false,
				  'end_size'           => 1,
				  'mid_size'           => 2,
				  'prev_next'          => true,
				  'prev_text'          => __('« '),
				  'next_text'          => __(' »'),
				  'type'               => 'list',
				  'add_args'           => false,
				  'add_fragment'       => '',
				  'before_page_number' => '',
				  'after_page_number'  => ''
			  );

		  	  //echo paginate_links( $args );

			?>
			<script>
				(function($){
					$('document').ready(function(){
						var links =  $('.page-numbers a');
						var cur_page = '<?php echo $paged ?>'
						console.log(cur_page);
						if(links.length > 0) {
							links.each(function(index){
								var link = $(this).attr('href').replace('/page','');

								<?php if($paged > 1) : ?>
									var link = $(this).attr('href').replace('/page','').replace(cur_page,'');
								<?php endif; ?>

								$(this).attr('href', link);

								
							})
						}
					});
				})(jQuery)
			</script>

			<div class="container">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>
	</main>

<?php get_footer(); ?>