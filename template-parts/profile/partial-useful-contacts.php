<section class="useful-contacts-section">
		<form id="searchContactCategories" action="<?php echo esc_url( admin_url('admin-ajax') )  ?>" class="inline-group" autocomplete="off">
			<input type="hidden" value="search_contact" name="action" />
			<input type="text" class="search" name="search" placeholder="Search contact by name" />
			<input type="submit" value="Search" class="button button--primary" />
			<a href="<?php echo get_permalink() ?>" class="button button--alt">Clear</a>
		</form>
		<div id="resultFound"></div>
		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class( 'entry--full' ); ?> itemscope itemtype="http://schema.org/CreativeWork">

		
					<div class="entry__content  clearfix" itemprop="text" id="contactList">
						<?php the_content(); ?>

						<?php
						$children = new WP_Query(array(
							'posts_per_page' => -1,
							'post_type'      => 'useful_contact_types',
							'orderby'        => 'title',
							'order'          => 'ASC'
						));

						if ( $children->have_posts() ) : ?>
							<div class="grid  grid--boxes">
								<?php while ( $children->have_posts() ) : $children->the_post(); ?>
									<div class="grid__column">
										<div class="box">
											<a href="<?php the_permalink(); ?>" class="box__link">
												<div class="box__label">
													<?php the_title(); ?>
												</div>
											</a>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				
			</article>

		<?php endwhile; ?>

</section>		

<style>
	#searchContactCategories .search {
		width: calc(100% - 200px)
	}
	#searchContactCategories input[type="submit"] {
		width: 95px;
	}
	#searchContactCategories .button--alt {
		display: inline-block;
	    height: 45px;
	    width: 95px;
	    line-height: 36px;
	    background: #0076c0;
	}
	#resultFound {
	    margin-bottom: 20px;
	}


	@media screen and ( max-width: 480px ) {

		#searchContactCategories .search {
			width: calc(100% - 100px)
		}

		#searchContactCategories .button--alt {
			display: block;
			margin-top: 10px;
			float: right;
		}
	}

</style>