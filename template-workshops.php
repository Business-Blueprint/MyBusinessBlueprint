<?php 
/*
* Template name: Workshop
*/
get_header();  ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
        <header class="banner" <?php themezero_the_banner_image(); ?>>
                <div class="container">
                    <h1 class="banner__title" itemprop="headline">
                        <?php cascade_the_banner_title(); ?>
                    </h1>

                    <div class="banner__subtitle"></div>
                </div>
        </header>

		<div class="container"> 
            <div class="inner-content"><?php  echo GET_THE_CONTENT(); ?></div>
			<?php
wp_reset_postdata();
            if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
            elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
            else { $paged = 1; }

            echo $paged;
            $per_page = 1;

            $args = array(
                 'post_type' => 'workshop',
                 'post_status' => 'publish',
                 'orderby' => 'date',
                 'order'   => 'DESC',
                 'posts_per_page' => $per_page,
                 'paged' => $paged
            );

            $query = New WP_Query($args);

            if ( $query->have_posts() ) : $prev_year = 0; $i = 0;
                while ( $query->have_posts() ) : $query->the_post(); $year = get_the_time( 'Y' );
                    if ( ( $year !== $prev_year ) ) : $prev_year = $year;
                        echo ( $i !== 0 ) ? '</div>' : '';

						echo '<header class="content__header">';

                        echo '<h2 class="content__title">' . $year . '</h2>';

						echo '</header>';

                        echo '<div class="grid  grid--2-columns">';
                    endif;

                    echo '<div class="grid__column">';
                        get_template_part( 'template-parts/views/excerpt', 'workshop' );
                    echo '</div>';
                $i++; endwhile;

                echo '</div>';
            else:
                echo '<p>Sorry, nothing found that matched your criteria.</p>';
            endif;

            wp_reset_postdata();
            ?>

			<nav class="pagination" role="navigation">   
                <?php
                $big = 999999999; // need an unlikely integer

                    echo paginate_links( array(
                        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        'format' => '?paged=%#%',
                        'current' => max( 1, get_query_var('paged') ),
                        'prev_text'          => __('← Previous'),
                        'next_text'          => __('Next →'),
                        'total' => $query->max_num_pages
                    ) );
                ?>
            </nav>  
		</div>
	</main>

<?php get_footer(); ?>