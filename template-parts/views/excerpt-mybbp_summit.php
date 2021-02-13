<div class="box">
    <a href="<?php the_permalink(); ?>" class="box__link">
        <div class="box__label">
            <?php the_title(); ?><br>
            <?php the_time( 'F Y' ); ?>
        </div>
    </a>
</div>