<?php if ( have_rows( 'downloads' ) ) : ?>
    <section class="blueprint__downloads">
        <div class="grid  grid--buttons">
            <?php while ( have_rows( 'downloads' ) ) : the_row(); ?>
                <div class="grid__column">
                    <?php

                    $url = get_sub_field( 'file_host' ) === 'external' ? get_sub_field( 'download_file_url' ) : get_sub_field( 'download_file' );

                    $s3_maestro = get_sub_field('s3_maestro');
                 
                    if( $s3_maestro ) {

                        echo do_shortcode($s3_maestro);

                    } else {

                       echo sprintf( '<a href="%s" class="button" target="_blank">%s</a>', $url, get_sub_field( 'label' ) ); 
                    
                    }
                    
                    ?>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
<?php endif; ?>
<style>
    .grid--buttons > .grid__column a {
        display: inline-block;
        padding: 0.25em 1em;
        border-radius: 4px;
        font-family: 'Geogrotesque-Bold', sans-serif;
        text-align: center;
        background: #002749;
        color: #FFF;
    }
    .grid--buttons > .grid__column:nth-child(3n+2) a {
        background-color: #f15d22;
    }
    .grid--buttons > .grid__column:nth-child(3n+3) > a {
        background-color: #7ac143;
    }
</style>