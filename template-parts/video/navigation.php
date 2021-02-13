<?php
$next = cascade_get_next_video_url();
$prev = cascade_get_previous_video_url();

if ( $next || $prev ) : ?>
    <section class="video__navigation">
        <div class="grid">
            <div class="grid__column  grid__column--6">
                <?php if ( $prev ) : ?>
                    <a href="<?php echo $prev; ?>" class="nav-link  nav-link--prev">Previous Episode</a>
                <?php endif; ?>
            </div>

            <div class="grid__column  grid__column--6  u-text-right">
                <?php if ( $next ) : ?>
                    <a href="<?php echo $next; ?>" class="nav-link  nav-link--next">Next Episode</a>
                <?php endif; ?>
            </div>
    </section>
<?php endif; ?>