<?php
function theme_comments( $comment, $args, $depth ) {
$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div class="row wl-single-comment">
        <div class="col-md-2"><?php echo get_avatar( $comment, 128, null, null, array('class' => array('img-responsive', 'img-circle') ) ); ?></div>
		<div class="col-md-10 wl-padding-rightzero wl-marginbottom53">
				<h5><a href="#"><?php comment_author(); ?></a></h5>
				<?php edit_comment_link( '', '', '' ) ?>
				<span><?php	echo get_comment_date(); ?></span>			
			<?php comment_text() ?>

			<?php if ( $comment->comment_approved == '0' ) : ?>
				<span class="unapproved"><?php esc_html_e( 'Your comment is awaiting moderation.', 'w-studio' );?></span>
			<?php endif; ?>
			<div class="comment-reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			</div>
		</div>
    </div>
    <?php
    }

    function list_pings( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    ?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
    <div id="comment-<?php comment_ID(); ?>" class="comment-wrap comments-pings">

        <div class="comment-content">

            <div class="comment-meta">
                <span class="wl-ping-text-left"><?php esc_html_e('Pings: ', 'w-studio'); ?></span>

                <?php printf( '<span class="comment_author">%s</span>', get_comment_author_link() ); ?>

            </div>
            <div class="clearboth"></div>
        </div>
        <?php } ?>
        <div class="wl-blog-comments wl-full-width wl-section-smallmargintop">
            <?php if ( post_password_required() ) : ?>
            <p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'w-studio' );?></p>
        </div><!-- #comments -->
    <?php
    return;
    endif;

    if ( have_comments() ) :
        function t5_count_pings( $post_id = NULL ) {
            $pings    = 0;
            $comments = FALSE;

            if ( NULL !== $post_id ){
                $comments = get_comments(
                    array (
                        'post_id' => $post_id, # Note: post_ID will not work!
                        'status'  => 'approve'
                    )
                );
            } elseif ( ! empty ( $GLOBALS['wp_query']->comments ) ){
                $comments = $GLOBALS['wp_query']->comments;
            }

            if ( ! $comments )
                return 0;

            foreach ( $comments as $c )
                if ( in_array ( $c->comment_type, array ( 'pingback', 'trackback' ) ) )
                    $pings += 1;

            return $pings;
        }  
        $w_studio_pings_count = t5_count_pings();      
        ?>
        <?php if ( $w_studio_pings_count != 0 ) : ?>
        <div class="wl-section-heading">
            <span class="wl-color4"><?php esc_html_e( 'Pingbacks / Trackbacks', 'w-studio' ); ?></span>
        </div>

            <ul class="mk-commentlist wl-padding-leftzero">
                <?php wp_list_comments( 'callback=list_pings&type=pings' ); ?>
            </ul>
        <?php endif; ?>

        <div id="comments" class="wl-section-heading">
            <span class="wl-color4"><?php esc_html_e('Comments', 'w-studio'); ?></span>
        </div>
        <ul class="wl-commentlist wl-padding-leftzero">
            <?php
                wp_list_comments( array(
                    'style'       => 'ul',
                    'short_ping'  => false,
                    'avatar_size' => 42,
                    'callback' => 'theme_comments',
                    'type' => 'comment'
                ) );
            ?>

        </ul>
		<?php 
			the_comments_pagination( array(
				'prev_text' => '<span data-icon="&#x38;"></span><span class="screen-reader-text">' . __( 'Previous', 'w-studio' ) . '</span>',
				'next_text' => '<span class="screen-reader-text">' . __( 'Next', 'w-studio' ) . '</span><span data-icon="&#x39;">',
			) );
		?>

            

    <?php else :
        if ( ! comments_open() ) :
        endif;
    endif;
    ?>

        <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
            <nav class="comments-navigation">
                <div class="comments-previous"><?php previous_comments_link(); ?></div>
                <div class="comments-next"><?php next_comments_link(); ?></div>
            </nav>
        <?php endif;
        $fields =  array(
            'author'=> '<div class="wl-comment-input wl-input-height"><input type="text"
            name="author" id="author" tabindex="54" placeholder="'.esc_html__('Name*', 'w-studio').'"  /></div>',
            'email' => '<div class="wl-comment-input wl-input-height"><input type="text" name="email" id="email" placeholder="'.esc_html__('Email*','w-studio').'" /></div>',
            'url'   => ''
        );
        //Comment Form Args
        $comments_args = array(
            'fields' => $fields,
            'title_reply'=>'<span class="respond-heading">'.esc_html__('Leave a Comment', 'w-studio').'</span>',
            'comment_field' => '<div class="comment-textarea"><textarea placeholder="'.esc_html__('Message*', 'w-studio').'" class="wl-comment-input" name="comment" rows="8"
            id="comment" tabindex="58"></textarea></div>',
            'comment_notes_before' => '',
            'comment_notes_after' => '',
            'label_submit' => esc_html__('Submit','w-studio')
        );
        comment_form($comments_args);
        ?></div>
