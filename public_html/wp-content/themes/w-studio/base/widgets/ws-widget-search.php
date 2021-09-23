<?php

/**

 * Widget API: WP_Widget_Search class

 *

 * @package WordPress

 * @subpackage Widgets

 * @since 4.4.0

 */



/**

 * Core class used to implement a Search widget.

 *

 * @since 2.8.0

 *

 * @see WP_Widget

 */

class w_studio_Widget_Search extends WP_Widget_Search {





	/**

	 * Outputs the content for the current Search widget instance.

	 *

	 * @since 2.8.0

	 * @access public

	 *

	 * @param array $w_studio_args     Display arguments including 'before_title', 'after_title',

	 *                        'before_widget', and 'after_widget'.

	 * @param array $w_studio_instance Settings for the current Search widget instance.

	 */

	public function widget( $w_studio_args, $w_studio_instance ) {

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */

		$w_studio_title = apply_filters( 'widget_title', empty( $w_studio_instance['title'] ) ? '' : $w_studio_instance['title'], $w_studio_instance, $this->id_base );



		echo $w_studio_args['before_widget'];

		if ( $w_studio_title ) {

			echo $w_studio_args['before_title'] . $w_studio_title . $w_studio_args['after_title'];

		}



		// Use current theme search form if it exists

		get_search_form();



		echo $w_studio_args['after_widget'];

	}



	/**

	 * Outputs the settings form for the Search widget.

	 *

	 * @since 2.8.0

	 * @access public

	 *

	 * @param array $w_studio_instance Current settings.

	 */

	public function form( $w_studio_instance ) {

		$w_studio_instance = wp_parse_args( (array) $w_studio_instance, array( 'title' => '') );

		$w_studio_title = $w_studio_instance['title'];

		?>

		<p><input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($w_studio_title); ?>" /></label></p>

		<?php

	}



	/**

	 * Handles updating settings for the current Search widget instance.

	 *

	 * @since 2.8.0

	 * @access public

	 *

	 * @param array $w_studio_new_instance New settings for this instance as input by the user via

	 *                            WP_Widget::form().

	 * @param array $w_studio_old_instance Old settings for this instance.

	 * @return array Updated settings.

	 */

	public function update( $w_studio_new_instance, $w_studio_old_instance ) {

		$w_studio_instance = $w_studio_old_instance;

		$w_studio_new_instance = wp_parse_args((array) $w_studio_new_instance, array( 'title' => ''));

		$w_studio_instance['title'] = sanitize_text_field( $w_studio_new_instance['title'] );

		return $w_studio_instance;

	}



}

function w_studio_Widget_Search_register() {

  unregister_widget('WP_Widget_Search');

  register_widget('w_studio_Widget_Search');

}

add_action('widgets_init', 'w_studio_Widget_Search_register');

