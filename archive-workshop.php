<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php 
          $image = get_field( 'banner_image', 75199 );

          if ( !empty($image) ) {
            $img_url = 'style="background-image:url(' . wp_get_attachment_url( $image ) . ');"';
          }
          else {
            $random_number = rand(1, 5); 
            $img_url = 'style="background: url('. get_stylesheet_directory_uri() .'/assets/images/banner'. $random_number . '.jpg) center center / cover no-repeat;"';
          }
        ?>
        <header class="banner" <?php echo $img_url; ?>>
                <div class="container">
                    <h1 class="banner__title" itemprop="headline">
                        <?php echo get_field( 'banner_title_1', 75199 ); ?>
                    </h1>

                    <div class="banner__subtitle"></div>
                </div>
        </header>
		<div class="container"> 

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