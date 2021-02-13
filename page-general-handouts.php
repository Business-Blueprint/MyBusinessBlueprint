<?php 
/**
* Template name: General Hangouts
*
*/

get_header(); ?>
<div class="content" id="general-hangouts">
	<header class="banner" <?php themezero_the_banner_image(); ?>>
			<div class="container">
				<h1 class="banner__title" itemprop="headline">
					<?php cascade_the_banner_title(); ?>
				</h1>

				<div class="banner__subtitle"></div>
			</div>
	</header>
	<div class="container">
			<div class="breadcrumb">
				<ul>
					<li><a href="<?php echo site_url() ?>/your-profile">Membership Page</a><span class="arrow">&#187;</span></li>
					<li><span><?php echo get_the_title() ?></span></li>
				</ul>
			</div>	
	 		<h1><?php the_title() ?></h1>

	 		<?php if( have_rows('handout') )  :  ?>
                    
                    <section class="handouts">
					
                    <?php while ( have_rows( 'handout' ) ) : the_row(); ?>
                    			<?php if(get_sub_field('heading')) { ?>
									<h2 class="handouts__title"><?php echo get_sub_field('heading') ?>:</h2>
								<?php } ?>

									<?php if ( have_rows( 'downloads' ) ) : ?>

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
									  
									<?php endif; ?>


                    <?php endwhile; ?>	

                    </section>
	 		<?php endif; ?>	


	</div>
</div>


<?php 

get_footer()

?>

