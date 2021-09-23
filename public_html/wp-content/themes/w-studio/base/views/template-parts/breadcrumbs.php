<div class="container">

    <div class="wl-breadcrumb">

        <ul>

        <?php 

        global $post;

        $w_studio_parent = array_reverse( get_ancestors( $post->ID, 'page' ) );

        foreach ( $w_studio_parent as $w_studio_value ) { ?>

            <li><a href="<?php echo get_the_permalink( $w_studio_value ); ?>"><?php echo get_the_title( $w_studio_value ); ?></a></li>

        <?php    

        }

        ?>

            <li><a><?php echo get_the_title( $post->ID ); ?></a></li>

        </ul>

    </div>

</div>