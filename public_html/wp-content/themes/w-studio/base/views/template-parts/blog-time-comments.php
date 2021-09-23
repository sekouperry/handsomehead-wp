<?php $w_studio_optionValues = get_option( 'w_studio' ); ?>
<div class="wl-blog-detail-menu">
    <ul>
        <?php if( $w_studio_optionValues[ 'w-blog-archive-date' ] != '0' ) { ?>
            <li>
                <a href="<?php the_permalink(); ?>"><?php echo the_time('F j, Y'); ?></a>
            </li>
        <?php }
        if( $w_studio_optionValues[ 'w-blog-archive-author' ] != '0' ) { ?>
            <li>
                <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a>
            </li>
        <?php } if( $w_studio_optionValues[ 'w-blog-archive-comments' ] != '0' ) { ?>
            <li>
                <a href="<?php comments_link(); ?> "><?php comments_number( 'No Comment', 'One Comment', '% Comments' ); ?></a>
            </li>
        <?php } ?>
    </ul>
</div>