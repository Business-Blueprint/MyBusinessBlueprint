<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php get_template_part( 'template-parts/content/header' ); ?>

		<div class="container"> 
           <?php 

            $is_silver =  do_shortcode('[mbb_silver_membership]');

            if($is_silver) :  ?>      
                <a href="http://my.businessblueprint.com/upcoming-webinars/" class="button button-custom">Upcoming Webinars</a>
            <?php else: ?>
                <a href="http://my.businessblueprint.com/upcoming-webinars/" class="button button-custom">Upcoming Webinars</a>
            <?php endif; ?>
			<?php
            if ( have_posts() ) : $prev_year = 0; $i = 0;
                while ( have_posts() ) : the_post(); $year = get_the_time( 'Y' );
                    if ( ( $year !== $prev_year ) ) : $prev_year = $year;
                        echo ( $i !== 0 ) ? '</div>' : '';

						echo '<header class="content__header">';

                        echo '<h2 class="content__title">' . $year . '</h2>';

						echo '</header>';

                        echo '<div class="grid  grid--2-columns">';
                    endif;

                    echo '<div class="grid__column">';
                        get_template_part( 'template-parts/views/excerpt', get_post_type() );
                    echo '</div>';
                $i++; endwhile;

                echo '</div>';
            else:
                echo '<p>Sorry, nothing found that matched your criteria.</p>';
            endif;
            ?>

			<?php cascade_paginate_links(); ?>
		</div>
	</main>

<?php get_footer(); ?>