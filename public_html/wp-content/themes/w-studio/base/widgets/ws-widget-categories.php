<?php

/**

 * Widget API: WP_Widget_Categories class

 *

 * @package WordPress

 * @subpackage Widgets

 * @since 4.4.0

 */



/**

 * Core class used to implement a Categories widget.

 *

 * @since 2.8.0

 *

 * @see WP_Widget

 */

class w_studio_Widget_Categories extends WP_Widget_Categories {





    /**

     * Outputs the content for the current Categories widget instance.

     *

     * @since 2.8.0

     * @access public

     *

     * @param array $w_studio_args Display arguments including 'before_title', 'after_title',

     *                        'before_widget', and 'after_widget'.

     * @param array $w_studio_instance Settings for the current Categories widget instance.

     */

    public function widget( $w_studio_args , $w_studio_instance ) {

        static $w_studio_first_dropdown = true;



        /** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */

        $w_studio_title = apply_filters( 'widget_title' , empty( $w_studio_instance[ 'title' ] ) ? esc_html__( 'Categories' , 'w-studio' ) : $w_studio_instance[ 'title' ] , $w_studio_instance , $this->id_base );



        $c = !empty( $w_studio_instance[ 'count' ] ) ? '1' : '0';

        $h = !empty( $w_studio_instance[ 'hierarchical' ] ) ? '1' : '0';

        $d = !empty( $w_studio_instance[ 'dropdown' ] ) ? '1' : '0';



        echo $w_studio_args[ 'before_widget' ];

        if( $w_studio_title ) {

            echo $w_studio_args[ 'before_title' ] . $w_studio_title . $w_studio_args[ 'after_title' ];

        }



        $w_studio_cat_args = array( 'orderby' => 'name' , 'show_count' => $c , 'hierarchical' => $h );



        if( $d ) {

            $w_studio_dropdown_id = ( $w_studio_first_dropdown ) ? 'cat' : "{$this->id_base}-dropdown-{$this->number}";

            $w_studio_first_dropdown = false;



            echo '<label class="screen-reader-text" for="' . esc_attr( $w_studio_dropdown_id ) . '">' . $w_studio_title . '</label>';



            $w_studio_cat_args[ 'show_option_none' ] = esc_html__( 'Select Category' , 'w-studio' );

            $w_studio_cat_args[ 'id' ] = $w_studio_dropdown_id;



            /**

             * Filter the arguments for the Categories widget drop-down.

             *

             * @since 2.8.0

             *

             * @see wp_dropdown_categories()

             *

             * @param array $w_studio_cat_args An array of Categories widget drop-down arguments.

             */

            wp_dropdown_categories( apply_filters( 'widget_categories_dropdown_args' , $w_studio_cat_args ) );

            ?>



            <script type='text/javascript'>

                /* <![CDATA[ */

                (function () {

                    var dropdown = document.getElementById("<?php echo esc_js( $w_studio_dropdown_id ); ?>");



                    function onCatChange() {

                        if (dropdown.options[ dropdown.selectedIndex ].value > 0) {

                            location.href = "<?php echo home_url(); ?>/?cat=" + dropdown.options[ dropdown.selectedIndex ].value;

                        }

                    }



                    dropdown.onchange = onCatChange;

                })();

                /* ]]> */

            </script>



        <?php

        } else {

            ?>

            <div class="wl-category">

                <?php

                $cats = get_categories();

                $w_studio_output = "<ul>\n";

                foreach( $cats as $cat ) {

                    $name = $cat->name;

                    $w_studio_output .= "<li><span data-icon=&#x45;></span><a href=" . get_category_link( $cat->term_id ) . ">$name</a></li>\n";

                }

                $w_studio_output .= "</ul>\n";

                echo $w_studio_output;

                ?>

            </div>

        <?php

        }



        echo $w_studio_args[ 'after_widget' ];

    }



    /**

     * Handles updating settings for the current Categories widget instance.

     *

     * @since 2.8.0

     * @access public

     *

     * @param array $w_studio_new_instance New settings for this instance as input by the user via

     *                            WP_Widget::form().

     * @param array $w_studio_old_instance Old settings for this instance.

     * @return array Updated settings to save.

     */

    public function update( $w_studio_new_instance , $w_studio_old_instance ) {

        $w_studio_instance = $w_studio_old_instance;

        $w_studio_instance[ 'title' ] = sanitize_text_field( $w_studio_new_instance[ 'title' ] );

        $w_studio_instance[ 'count' ] = !empty( $w_studio_new_instance[ 'count' ] ) ? 1 : 0;

        $w_studio_instance[ 'hierarchical' ] = !empty( $w_studio_new_instance[ 'hierarchical' ] ) ? 1 : 0;

        $w_studio_instance[ 'dropdown' ] = !empty( $w_studio_new_instance[ 'dropdown' ] ) ? 1 : 0;



        return $w_studio_instance;

    }



    /**

     * Outputs the settings form for the Categories widget.

     *

     * @since 2.8.0

     * @access public

     *

     * @param array $w_studio_instance Current settings.

     */

    public function form( $w_studio_instance ) {

        //Defaults

        $w_studio_instance = wp_parse_args( (array)$w_studio_instance , array( 'title' => '' ) );

        $w_studio_title = sanitize_text_field( $w_studio_instance[ 'title' ] );

        $w_studio_count = isset( $w_studio_instance[ 'count' ] ) ? (bool)$w_studio_instance[ 'count' ] : false;

        $hierarchical = isset( $w_studio_instance[ 'hierarchical' ] ) ? (bool)$w_studio_instance[ 'hierarchical' ] : false;

        $dropdown = isset( $w_studio_instance[ 'dropdown' ] ) ? (bool)$w_studio_instance[ 'dropdown' ] : false;

        ?>

        <p><label

                for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:' , 'w-studio' ); ?></label>

            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"

                   name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text"

                   value="<?php echo esc_attr( $w_studio_title ); ?>"/>

        </p>

        <p><input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'dropdown' ) ); ?>"

                  name="<?php echo esc_attr( $this->get_field_name( 'dropdown' ) ); ?>"<?php checked( $dropdown ); ?> />

            <label for="<?php echo esc_attr( $this->get_field_id( 'dropdown' ) ); ?>"><?php esc_html_e( 'Display as dropdown' , 'w-studio' ); ?></label><br/>

            <input type="checkbox" class="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>"

                   name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>"<?php checked( $w_studio_count ); ?> />

            <label for="<?php echo $this->get_field_id( 'count' ); ?>"><?php esc_html_e( 'Show post counts' , 'w-studio' ); ?></label><br/>

            <input type="checkbox" class="checkbox"

                   id="<?php echo esc_attr( $this->get_field_id( 'hierarchical' ) ); ?>"

                   name="<?php echo esc_attr( $this->get_field_name( 'hierarchical' ) ); ?>"<?php checked( $hierarchical ); ?> />

            <label for="<?php echo esc_attr( $this->get_field_id( 'hierarchical' ) ); ?>"><?php esc_html_e( 'Show hierarchy' , 'w-studio' ); ?></label>

        </p>

    <?php

    }



}



function w_studio_Widget_Categories_register() {

    unregister_widget( 'WP_Widget_Categories' );

    register_widget( 'w_studio_Widget_Categories' );

}



add_action( 'widgets_init' , 'w_studio_Widget_Categories_register' );

