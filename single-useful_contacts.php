<?php get_header(); ?>

	<main id="content" class="content" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">
				<header class="banner" <?php themezero_the_banner_image(); ?>>
					<div class="container">
						<h1 class="banner__title" itemprop="headline">
							<?php cascade_the_banner_title(); ?>
						</h1>

						<div class="banner__subtitle"></div>
					</div>
				</header>

				<div class="container">
					<div class="entry__content  single-contact clearfix" itemprop="text">
						<?php 

							the_content(); 
							$id = GET_THE_ID(); 
							$description 	=	esc_html(  get_post_meta($id, 'description', true) );
							$email			=	esc_html(  get_post_meta($id, 'email', true) );
							$phone          =	esc_html(  get_post_meta($id, 'phone', true) );
							$website 		=	esc_html(  get_post_meta($id, 'website', true) );
							$company        =   esc_html(  get_post_meta($id, 'company_name', true) );

						?>

  					    <?php echo ( $description )  ? '<p>' . $description . '</p>': ''; ?>

                        <div class="inner-bottom">
                          <?php if( !empty( $company ) ) : ?>
	   					  	<div><span>Company </span> <?php echo  $company; ?></div>
	   					  <?php endif; ?>	
	   					  <?php if( !empty( $email ) ) : ?>
	   					  	<div><span>Email </span> <?php echo  $email; ?></div>
	   					  <?php endif; ?>	
	   					  <?php if( !empty( $phone ) ) : ?>	
	   					  	<div><span>Phone </span> <?php echo  $phone; ?></div>
	   					  <?php endif; ?>
	   					  <?php if( !empty( $website ) ) : ?>	
	   					  <div><span>Website </span> <?php echo  $website; ?></div>
	   					  <?php endif; ?>

   					    </div>
					</div>

				</div>
			</article>

			<div class="container">
				<?php comments_template(); ?>
			</div>
		<?php endwhile; ?>


	</main>

<?php get_footer(); ?>