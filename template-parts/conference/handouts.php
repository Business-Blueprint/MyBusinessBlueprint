<?php if ( have_rows( 'downloads' ) ) : ?>
    <section class="handouts">
        <h2 class="handouts__title">Download Handouts:</h2>

        <ul class="handouts__list">
            <?php while ( have_rows( 'downloads' ) ) : the_row(); ?>
                <li class="handouts__handout">
                    <?php

                    $url = get_sub_field( 'file_host' ) === 'external' ? get_sub_field( 'download_file_url' ) : get_sub_field( 'download_file' );

                    $s3_maestro = get_sub_field('s3_maestro');
                 
                    if( $s3_maestro ) {

                        echo do_shortcode($s3_maestro);

                    } else {

                       echo sprintf( '<a href="%s" target="_blank">%s</a>', $url, get_sub_field( 'label' ) ); 
                    
                    }
                    
                    ?>
                </li>
            <?php endwhile; ?>
        </ul>
    </section>
<?php endif; ?>