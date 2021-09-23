<?php
/**
 * Widget API: WP_Widget_Recent_Posts class
 *
 * @package WordPress
 * @subpackage Widgets
 * @since 4.4.0
 */

/**
 * Core class used to implement a Recent Posts widget.
 *
 * @since 2.8.0
 *
 * @see WP_Widget
 */
class loadWidget extends WP_Widget_Recent_Posts {



	/**
	 * Outputs the content for the current Recent Posts widget instance.
	 *
	 * @since 2.8.0
	 * @access public
	 *
	 * @param array $w_studio_args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $w_studio_instance Settings for the current Recent Posts widget instance.
	 */
	public function widget( $w_studio_args, $w_studio_instance ) {
		if ( ! isset( $w_studio_args['widget_id'] ) ) {
			$w_studio_args['widget_id'] = $this->id;
		}

		$w_studio_title = ( ! empty( $w_studio_instance['title'] ) ) ? $w_studio_instance['title'] : esc_html__( 'Recent Posts', 'w-studio' );

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$w_studio_title = apply_filters( 'widget_title', $w_studio_title, $w_studio_instance, $this->id_base );

		$number = ( ! empty( $w_studio_instance['number'] ) ) ? absint( $w_studio_instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $w_studio_instance['show_date'] ) ? $w_studio_instance['show_date'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $w_studio_args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		?>
		<?php echo $w_studio_args['before_widget']; ?>
		<?php if ( $w_studio_title ) {
			echo $w_studio_args['before_title'] . $w_studio_title . $w_studio_args['after_title'];
		} ?>
	
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<div class="wl-full-width wl-nomalmargin-bottom pull-left">
			<?php if( has_post_thumbnail() ) { ?>
				<div class="col-md-4 wl-paddingzero">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail( 'w_studio_image_100x100' );?>
					</a>
				</div>
			<?php } ?>
				<div class="<?php if( has_post_thumbnail() ) { echo 'col-md-8 wl-col-leftpadding'; } else { echo 'col-md-12 wl-margin-left'; } ?>">
					<h5 class="wl-recent-post"><a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a></h5>
					<p><a href="<?php the_permalink(); ?>"><?php the_time('F j, Y'); ?></a></p>
				</div>
			</div>
		<?php endwhile; ?>
	
		<?php echo $w_studio_args['after_widget']; ?>
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;
	}

	

	
}
function loadWidget_register() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('loadWidget');
}
add_action('widgets_init', 'loadWidget_register');
