<?php 

get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php get_template_part( 'template-parts/content/header' ); ?>

		<div class="container">
            <div class="grid  grid--boxes">
			<?php
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 

                    echo '<div class="grid__column">';
                        get_template_part( 'template-parts/views/excerpt', get_post_type() );
                    echo '</div>';

                endwhile;

            else:
                echo '<p>Sorry, nothing found that matched your criteria.</p>';
            endif;
            ?>
            </div>
    
			<?php cascade_paginate_links(); ?>
		</div>
	</main>

<?php get_footer(); ?>