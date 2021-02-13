<?php
/**
 * Template Name: Legal Docs
 */

get_header(); ?>
<main id="content" class="content legal-doc-content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
	<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">
		<?php while ( have_posts() ) : the_post(); ?>
				<header class="banner" <?php themezero_the_banner_image(); ?>>
					<div class="container">
						<h1 class="banner__title" itemprop="headline">
							<?php cascade_the_banner_title();  ?>
						</h1>

						<div class="banner__subtitle"></div>
					</div>
				</header>
		<?php endwhile; ?>
		<div class="container">
			<div class="entry__content  clearfix" itemprop="text">

                <header class="content__header">
                    <h2 class="content__title"><?php echo get_field('label') ?></h2>
                </header>
				
                <?php
                    $start_here_videos = get_field('start_here');
                    if( $start_here_videos ) :  ?>
                        <div class="grid top-list-doc grid--boxes">
                                <?php foreach( $start_here_videos as $post ):  setup_postdata($post); ?>
                                    <div class="grid__column">
                                        <div class="box">
                                            <?php if( get_field('elite_only') ) : ?>
                                                <div class="vs-badge">ELITE</div> 
                                            <?php endif; ?>
                                            <a href="<?php the_permalink(); ?>" class="box__link">
                                                <div class="box__label">
                                                    <div class="inner">
                                                        <div>
                                                            <?php 
                                                                echo '<span>' . get_the_title()  . '</span>'; 
                                                                wp_reset_postdata();			
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                <?php endif;  wp_reset_postdata(); ?>
			</div><!-- .entry -->
		</div><!-- .container -->

        <div class="content-section">
            <?php 
                the_content();
                wp_reset_postdata();
            ?>
        </div>

        <?php  if( have_rows('category') ):  ?>
            <div class="container">
                <?php while( have_rows('category') ) : the_row();   ?>
                    <div class="category-item">
                        <header class="content__header category-header">
                            <h2 class="content__title"><?php echo get_sub_field('category_name') ?></h2> 
                        </header>
                        <div class="grid  grid--boxes">
                        <?php 
                        $post_object = get_sub_field('items');
                        if( $post_object ) : 

                            foreach( $post_object as $post ):

                                    setup_postdata( $post );   ?>
                                    <div class="grid__column">
                                        <div class="box">
                                            <?php if( get_field('elite_only') ) : ?>
                                                <div class="vs-badge">ELITE</div> 
                                            <?php endif; ?>
                                            <a href="<?php the_permalink(); ?>" class="box__link">
                                                <div class="box__label">
                                                    <div class="inner">
                                                        <div>
                                                            <?php 
                                                                echo '<span>' . get_the_title()  . '</span>'; 
                                                                			
                                                            ?>
                                                            <?php 
                                                            if( $subtitle = get_field('subtitle' ) ) : ?>
                                                                     <span class="subtitle"><?php echo $subtitle; ?></span>
                                                            <?php endif; wp_reset_postdata(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                            <?php endforeach; ?>
                        <?php 
                        endif; ?>
                        </div>
                    </div>    
                <?php endwhile; ?>
            </div> <!-- .container -->  
        <?php endif; ?>    
                   
	</article>
</main>
<style>
.grid__column .box__link:before {
    background: #1f405d !important;
    opacity: 1 !important;
}
span.subtitle {
    font-size: 14px;
    display: block;
    color: #d8d7d7;
}
/* .category-item .content__header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    border: 1px solid #ddd;
    padding: 20px;
}
.category-item .content__header:hover {
    cursor: pointer;
}
.category-item .grid {
    display: none;
}
.category-item .grid.show {
    display: block;
} */
</style>
<script>
// (function(){
//   $('.category-header').on('click', function(){
//        $(this).closest('.category-item').find('.grid').slideToggle();
//        var icon = $(this).find('span');

//        if(icon.hasClass('fa-chevron-down') ) {
//         icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
//        } else {
//         icon.removeClass('fa-chevron-up');
//         icon.addClass('fa-chevron-down');
//        }
//   });
// })(jQuery)
</script>
<?php get_footer(); ?>