
<?php 


get_header(); ?>
<main id="content" class="content legal-doc-single" itemscope itemtype="WebPageElement" itemprop="mainContentOfPage" tabindex="-1">
    
    <?php if( post_password_required() ) : ?>
        <div class="container pw-container">
             <br>
             <br>
            <?php echo get_the_password_form(); ?>
        </div>
    <?php else: ?>
        <div class="container">
            <div class="breadcrumb">
                <div class="col">
                    <a href="<?php get_bloginfo('url') ?>/legal-docs" class="button button-small button-primary">All Legal Docs</a>
                </div>
                <div class="col text-right">

                    <?php 
                        if( ! get_field('is_video_page') ) : 
                            $categories = get_the_terms( $post->ID, 'legal_category' );

                            if($categories) {
                                $count = 0;
                                $total = count($categories);
                                foreach( $categories as $category ) {
                                    $count++;
                                    
                                    if($total > $count) {
                                        echo  $category->name . ' > ';
                                    } 
                                    else {
                                        echo  $category->name . '';
                                    }
                                    
                                }
                            }
                        endif;  
                    ?>
                </div>
            </div>
            
            <h1><?php the_title(); ?> <?php the_field('subtitle') ?></h1>
            <?php if( get_field('is_video_page') ) : ?>
                    
                <p><?php the_field('description'); ?></p>
                
                <?php the_field('video'); ?>

            <?php else: ?>    

                <div class="lg-list">
                    <?php if(get_field('minutes')) : ?>
                        <div><i _ngcontent-bbf-c282="" class="fa fa-clock-o ng-tns-c282-0"></i> <?php the_field('minutes'); ?> <i class="divider">/</i> </div>
                    <?php endif; ?>
                    <?php if(get_field('value')) : ?>
                        <div><i _ngcontent-bbf-c282="" class="fa fa-usd ng-tns-c282-0"></i> <?php the_field('value'); ?> <i class="divider">/</i> </div>
                    <?php endif; ?>
                    <?php if(get_field('location')) : ?>
                        <div><i _ngcontent-bbf-c282="" class="fa fa-globe ng-tns-c282-0"></i> <?php the_field('location'); ?></div>
                    <?php endif; ?>
                </div>
                <p><?php the_field('description'); ?></p>
                <?php the_field('embed_code'); ?>

                <?php if($note = get_field('note')) : ?>
                    <div class="l-cta">
                        <?php the_field('note'); ?>
                    </div>
                <?php endif; ?>

            <?php endif; ?>

            <style>
                .legal-doc-single { margin-top: 30px; }
                .lg-list{margin-bottom:1em}
                .lg-list div{display:inline; margin-right:3px;}
                .lg-list .fa {color: #c1c0c0; margin-right: 3px;}
                .lg-list .divider {color: #c1c0c0; padding: 0 7px;}
                .l-cta{margin-top:1em; border:2px solid #f15d22; border-style: dotted; padding:1em; background:#FBD6C8;}
                .breadcrumb {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                }
                .breadcrumb .col.text-right {
                    font-weight: 600;
                    color: #002749;
                    padding: 2px 5px;
                }
            </style>

        </div>
    <?php endif; ?>    
</main>
<script>
(function($){
     $('.btn-doc').on('click', function(){
         var more = $('.legal-doc-description .more-info');
             more.toggleClass('show');
           if(more.hasClass('show') ) {
               $(this).html('Show Less');
           } else {
               $(this).html('Read More');
           }    
     })
})(jQuery)
</script>
<?php get_footer(); ?>