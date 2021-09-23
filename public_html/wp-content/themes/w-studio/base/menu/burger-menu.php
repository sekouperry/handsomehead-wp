<?php



Class W_Burger_Walker extends Walker_Nav_Menu{

    

    /**

    * Starts the list before the elements are added.

    *

    * @see Walker::start_lvl()

    *

    * @since 3.0.0

    *

    * @param string $w_studio_output Passed by reference. Used to append additional content.

    * @param int    $w_studio_depth  Depth of menu item. Used for padding.

    * @param array  $w_studio_args   An array of arguments. @see wp_nav_menu()

    */

    public function start_lvl( &$w_studio_output, $w_studio_depth = 0, $w_studio_args = array() ) {

        $w_studio_indent = str_repeat("\t", $w_studio_depth);
        $w_studio_output .= "\n$w_studio_indent<ul class=\"burger-sub\">\n";

    }



    /**

     * Ends the list of after the elements are added.

     *

     * @see Walker::end_lvl()

     *

     * @since 3.0.0

     *

     * @param string $w_studio_output Passed by reference. Used to append additional content.

     * @param int    $w_studio_depth  Depth of menu item. Used for padding.

     * @param array  $w_studio_args   An array of arguments. @see wp_nav_menu()

     */

    public function end_lvl( &$w_studio_output, $w_studio_depth = 0, $w_studio_args = array() ) {

        $w_studio_indent = str_repeat("\t", $w_studio_depth);

        $w_studio_output .= "$w_studio_indent</ul>\n";

    }



    /**

     * Start the element output.

     *

     * @see Walker::start_el()

     *

     * @since 3.0.0

     * @since 4.4.0 'nav_menu_item_args' filter was added.

     *

     * @param string $w_studio_output Passed by reference. Used to append additional content.

     * @param object $w_studio_item   Menu item data object.

     * @param int    $w_studio_depth  Depth of menu item. Used for padding.

     * @param array  $w_studio_args   An array of arguments. @see wp_nav_menu()

     * @param int    $w_studio_id     Current item ID.

     */

    public function start_el( &$w_studio_output, $w_studio_item, $w_studio_depth = 0, $w_studio_args = array(), $w_studio_id = 0 ) {

        $w_studio_indent = ( $w_studio_depth ) ? str_repeat( "\t", $w_studio_depth ) : '';

        $w_studio_classes = empty( $w_studio_item->classes ) ? array() : (array) $w_studio_item->classes;

        $w_studio_classes[] = 'menu-item-' . $w_studio_item->ID;

        while( have_posts() ):

            the_post();

            global $post;

            $w_studio_onePage    = esc_attr(get_post_meta( $post->ID, 'w-is-one-page', true ));

            

            if( 'on' == $w_studio_onePage ){

                $w_studio_permalink  = get_the_permalink();

            }

        endwhile;

        

        /**

         * Filter the arguments for a single nav menu item.

         *

         * @since 4.4.0

         *

         * @param array  $w_studio_args  An array of arguments.

         * @param object $w_studio_item  Menu item data object.

         * @param int    $w_studio_depth Depth of menu item. Used for padding.

         */

        $w_studio_args = apply_filters( 'nav_menu_item_args', $w_studio_args, $w_studio_item, $w_studio_depth );



        /**

         * Filter the CSS class(es) applied to a menu item's list item element.

         *

         * @since 3.0.0

         * @since 4.1.0 The `$w_studio_depth` parameter was added.

         *

         * @param array  $w_studio_classes The CSS classes that are applied to the menu item's `<li>` element.

         * @param object $w_studio_item    The current menu item.

         * @param array  $w_studio_args    An array of {@see wp_nav_menu()} arguments.

         * @param int    $w_studio_depth   Depth of menu item. Used for padding.

         */

        $w_studio_class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $w_studio_classes ), $w_studio_item, $w_studio_args, $w_studio_depth ) );
        

        // Adding custom class if its parent is mega menu

        if( $w_studio_depth == 1 ) {

            $w_studio_parent         = $w_studio_item->menu_item_parent;

            $w_studio_isParentMegaMenu   = esc_attr(get_post_meta( $w_studio_parent, 'w-mega-menu', true ));

            if( $w_studio_isParentMegaMenu ){

                $w_studio_class_names    .= ' mega-menu-items';

            }else{

                $w_studio_class_names	.= ' wl-relative';

            }

        }else{

                $w_studio_isMegaMenu	= esc_attr(get_post_meta( $w_studio_item->ID, 'w-mega-menu', true ));

                if( $w_studio_isMegaMenu ){



                }else{

                    $w_studio_class_names	.= ' wl-relative';

                }

            }

        

        $w_studio_class_names = $w_studio_class_names ? ' class="' . esc_attr( $w_studio_class_names ) . '"' : '';



        /**

         * Filter the ID applied to a menu item's list item element.

         *

         * @since 3.0.1

         * @since 4.1.0 The `$w_studio_depth` parameter was added.

         *

         * @param string $menu_id The ID that is applied to the menu item's `<li>` element.

         * @param object $w_studio_item    The current menu item.

         * @param array  $w_studio_args    An array of {@see wp_nav_menu()} arguments.

         * @param int    $w_studio_depth   Depth of menu item. Used for padding.

         */

        $w_studio_id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $w_studio_item->ID, $w_studio_item, $w_studio_args, $w_studio_depth );

        $w_studio_id = $w_studio_id ? ' id="' . esc_attr( $w_studio_id ) . '"' : '';

        

        $w_studio_output .= $w_studio_indent . '<li' . $w_studio_id . $w_studio_class_names .'>';



        $atts = array();

        $atts['title']  = ! empty( $w_studio_item->attr_title ) ? $w_studio_item->attr_title : '';

        $atts['target'] = ! empty( $w_studio_item->target )     ? $w_studio_item->target     : '';

        $atts['rel']    = ! empty( $w_studio_item->xfn )        ? $w_studio_item->xfn        : '';

        $atts['href']   = ! empty( $w_studio_item->url )        ? $w_studio_item->url        : '';



        /**

         * Filter the HTML attributes applied to a menu item's anchor element.

         *

         * @since 3.6.0

         * @since 4.1.0 The `$w_studio_depth` parameter was added.

         *

         * @param array $atts {

         *     The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.

         *

         *     @type string $w_studio_title  Title attribute.

         *     @type string $target Target attribute.

         *     @type string $rel    The rel attribute.

         *     @type string $href   The href attribute.

         * }

         * @param object $w_studio_item  The current menu item.

         * @param array  $w_studio_args  An array of {@see wp_nav_menu()} arguments.

         * @param int    $w_studio_depth Depth of menu item. Used for padding.

         */

        $atts = apply_filters( 'nav_menu_link_attributes', $atts, $w_studio_item, $w_studio_args, $w_studio_depth );

        

        // If One Page

        if( isset( $w_studio_onePage ) ){

            if( 'on' == $w_studio_onePage ){

            	if( isset( $w_studio_item->classes ) )

                	$atts['href']   = $w_studio_permalink . '#' . $w_studio_item->classes[0];

            }

        }

        $attributes = '';

        foreach ( $atts as $attr => $value ) {

            if ( ! empty( $value ) ) {

                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );

                if( $w_studio_depth == 1 ){

                    if( 'href' === $attr ){

                        $w_studio_parent             = $w_studio_item->menu_item_parent;

                        $w_studio_isParentMegaMenu   = esc_attr(get_post_meta( $w_studio_parent, 'w-mega-menu', true ));

                        if( !$w_studio_isParentMegaMenu ){

                            $attributes .= ' ' . $attr . '="' . $value . '"';

                        }

                    }

                }else{

                    $attributes .= ' ' . $attr . '="' . $value . '"';

                }

            }

        }



        /** This filter is documented in wp-includes/post-template.php */

        $w_studio_title = apply_filters( 'the_title', $w_studio_item->title, $w_studio_item->ID );



        /**

         * Filter a menu item's title.

         *

         * @since 4.4.0

         *

         * @param string $w_studio_title The menu item's title.

         * @param object $w_studio_item  The current menu item.

         * @param array  $w_studio_args  An array of {@see wp_nav_menu()} arguments.

         * @param int    $w_studio_depth Depth of menu item. Used for padding.

         */

        $w_studio_title = apply_filters( 'nav_menu_item_title', $w_studio_title, $w_studio_item, $w_studio_args, $w_studio_depth );

        $w_studio_item_output = '';

        

        // If this is depth 1 and under mega menu do this

        if( $w_studio_depth == 1 ) {

            $w_studio_parent             = $w_studio_item->menu_item_parent;

            $w_studio_isParentMegaMenu   = esc_attr(get_post_meta( $w_studio_parent, 'w-mega-menu', true ));



            if( $w_studio_isParentMegaMenu ) {

                $w_studio_item_output = $w_studio_args->before;

                $w_studio_item_output .= '<span class="mega-menu-heading"'. $attributes .'>';

                $w_studio_item_output .= $w_studio_args->link_before . $w_studio_title . $w_studio_args->link_after;

                $w_studio_item_output .= '</span><i class="icon-down arrow_carrot-down"></i>';

                $w_studio_item_output .= $w_studio_args->after;

            }else{

            	if( isset( $w_studio_args->before ) )

                	$w_studio_item_output = $w_studio_args->before;

                $w_studio_item_output .= '<a'. $attributes .'>';

                if( isset( $w_studio_args->link_before ) && isset( $w_studio_args->link_after ) )

	                $w_studio_item_output .= $w_studio_args->link_before . $w_studio_title . $w_studio_args->link_after;

                $w_studio_item_output .= '</a><i class="icon-down arrow_carrot-down"></i>';

                if( isset( $w_studio_args->after ) )

                	$w_studio_item_output .= $w_studio_args->after;

            }

        }else{

            if( isset( $w_studio_args->before ) )

            	$w_studio_item_output = $w_studio_args->before;

            $w_studio_item_output .= '<a'. $attributes .'>';

            if( isset( $w_studio_args->link_before ) && isset( $w_studio_args->link_after ) )

            	$w_studio_item_output .= $w_studio_args->link_before . $w_studio_title . $w_studio_args->link_after;

            $w_studio_item_output .= '</a>';
            $w_studio_item_output .= '<i class="icon-down arrow_carrot-down"></i>';

            if( isset( $w_studio_args->after ) )

            	$w_studio_item_output .= $w_studio_args->after;

        }



        // Check for first level menu & mega menu

        if( $w_studio_item->menu_item_parent == 0 ){

            $w_studio_megaMenu   = esc_attr(get_post_meta( $w_studio_item->ID, 'w-mega-menu', true ));

            

            // If it's a mega menu load html accordingly

            if( $w_studio_megaMenu ) {

                //$w_studio_item_output .= '<div class="mega-menu">';

            }

        }



        /**

         * Filter a menu item's starting output.

         *

         * The menu item's starting output only includes `$w_studio_args->before`, the opening `<a>`,

         * the menu item's title, the closing `</a>`, and `$w_studio_args->after`. Currently, there is

         * no filter for modifying the opening and closing `<li>` for a menu item.

         *

         * @since 3.0.0

         *

         * @param string $w_studio_item_output The menu item's starting HTML output.

         * @param object $w_studio_item        Menu item data object.

         * @param int    $w_studio_depth       Depth of menu item. Used for padding.

         * @param array  $w_studio_args        An array of {@see wp_nav_menu()} arguments.

         */

        $w_studio_output .= apply_filters( 'walker_nav_menu_start_el', $w_studio_item_output, $w_studio_item, $w_studio_depth, $w_studio_args );

    }



    /**

     * Ends the element output, if needed.

     *

     * @see Walker::end_el()

     *

     * @since 3.0.0

     *

     * @param string $w_studio_output Passed by reference. Used to append additional content.

     * @param object $w_studio_item   Page data object. Not used.

     * @param int    $w_studio_depth  Depth of page. Not Used.

     * @param array  $w_studio_args   An array of arguments. @see wp_nav_menu()

     */

    public function end_el( &$w_studio_output, $w_studio_item, $w_studio_depth = 0, $w_studio_args = array() ) {

    	// Check for first level menu & mega menu

        if( $w_studio_item->menu_item_parent == 0 ){

            $w_studio_megaMenu   = esc_attr(get_post_meta( $w_studio_item->ID, 'w-mega-menu', true ));

            

            // If it's a mega menu load html accordingly

            if( $w_studio_megaMenu ) {

                //$w_studio_output .= '</div>';

            }

        }

	$w_studio_output .= "</li>\n";

    }

}