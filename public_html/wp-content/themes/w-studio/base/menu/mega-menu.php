<?php



/**

 *  /!\ This is a copy of Walker_Nav_Menu_Edit class in core

 *

 * Create HTML list of nav menu input items.

 *

 * @package WordPress

 * @since 3.0.0

 * @uses Walker_Nav_Menu

 */

class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu {



    /**

     * @see Walker::$w_studio_tree_type

     * @var string

     */

    var $w_studio_tree_type = array( 'post_type' , 'taxonomy' , 'custom' );



    /**

     * @see Walker::$w_studio_db_fields

     * @todo Decouple this.

     * @var array

     */

    var $w_studio_db_fields = array( 'parent' => 'menu_item_parent' , 'id' => 'db_id' );



    /**

     * @see Walker_Nav_Menu::start_lvl()

     * @since 3.0.0

     *

     * @param string $w_studio_output Passed by reference.

     */

    function start_lvl( &$w_studio_output , $w_studio_depth = 0 , $w_studio_args = array() ) {

    }



    /**

     * @see Walker_Nav_Menu::end_lvl()

     * @since 3.0.0

     *

     * @param string $w_studio_output Passed by reference.

     */

    function end_lvl( &$w_studio_output , $w_studio_depth = 0 , $w_studio_args = array() ) {

    }



    /**

     * @see Walker::start_el()

     * @since 3.0.0

     *

     * @param string $w_studio_output Passed by reference. Used to append additional content.

     * @param object $w_studio_item Menu item data object.

     * @param int $w_studio_depth Depth of menu item. Used for padding.

     * @param object $w_studio_args

     */

    function start_el( &$w_studio_output , $w_studio_item , $w_studio_depth = 0 , $w_studio_args = array() , $current_object_id = 0 ) {

        global $_wp_nav_menu_max_depth;

        $_wp_nav_menu_max_depth = $w_studio_depth > $_wp_nav_menu_max_depth ? $w_studio_depth : $_wp_nav_menu_max_depth;



        ob_start();

        $w_studio_item_id = esc_attr( $w_studio_item->ID );

        $w_studio_removed_args = array( 'action' , 'customlink-tab' , 'edit-menu-item' , 'menu-item' , 'page-tab' , '_wpnonce' , );



        $w_studio_original_title = '';

        if( 'taxonomy' == $w_studio_item->type ) {

            $w_studio_original_title = get_term_field( 'name' , $w_studio_item->object_id , $w_studio_item->object , 'raw' );

            if( is_wp_error( $w_studio_original_title ) ) $w_studio_original_title = false;

        } elseif( 'post_type' == $w_studio_item->type ) {

            $w_studio_original_object = get_post( $w_studio_item->object_id );

            $w_studio_original_title = get_the_title( $w_studio_original_object->ID );

        } elseif( 'post_type_archive' == $w_studio_item->type ) {

            $w_studio_original_object = get_post_type_object( $w_studio_item->object );

            $w_studio_original_title = $w_studio_original_object->labels->archives;

        }



        $w_studio_classes = array( 'menu-item menu-item-depth-' . $w_studio_depth , 'menu-item-' . esc_attr( $w_studio_item->object ) , 'menu-item-edit-' . ( ( isset( $_GET[ 'edit-menu-item' ] ) && $w_studio_item_id == $_GET[ 'edit-menu-item' ] ) ? 'active' : 'inactive' ) , );



        $w_studio_title = $w_studio_item->title;



        if( !empty( $w_studio_item->_invalid ) ) {

            $w_studio_classes[ ] = 'menu-item-invalid';

            /* translators: %s: title of menu item which is invalid */

            $w_studio_title = sprintf( esc_html__( '%s (Invalid)' , 'w-studio' ) , $w_studio_item->title );

        } elseif( isset( $w_studio_item->post_status ) && 'draft' == $w_studio_item->post_status ) {

            $w_studio_classes[ ] = 'pending';

            /* translators: %s: title of menu item in draft status */

            $w_studio_title = sprintf( esc_html__( '%s (Pending)' , 'w-studio' ) , $w_studio_item->title );

        }



        $w_studio_title = ( !isset( $w_studio_item->label ) || '' == $w_studio_item->label ) ? $w_studio_title : $w_studio_item->label;



        $w_studio_submenu_text = '';

        if( 0 == $w_studio_depth ) $w_studio_submenu_text = 'class="wl-menu-block"';



        ?>

    <li id="menu-item-<?php echo esc_attr( $w_studio_item_id ); ?>" class="<?php echo implode( ' ' , $w_studio_classes ); ?>">

        <div class="menu-item-bar">

            <div class="menu-item-handle">

                <span class="item-title"><span class="menu-item-title"><?php echo esc_html( $w_studio_title ); ?></span> <span

                        class="is-submenu" <?php echo esc_attr( $w_studio_submenu_text ); ?>><?php esc_html_e( 'sub item' , 'w-studio' ); ?></span></span>

                    <span class="item-controls">

                        <span class="item-type"><?php echo esc_html( $w_studio_item->type_label ); ?></span>

                        <span class="item-order hide-if-js">

                            <a href="<?php

                            echo wp_nonce_url( add_query_arg( array( 'action' => 'move-up-menu-item' , 'menu-item' => $w_studio_item_id , ) , remove_query_arg( $w_studio_removed_args , admin_url( 'nav-menus.php' ) ) ) , 'move-menu_item' );

                            ?>" class="item-move-up"><abbr title="<?php esc_attr_e( 'Move up' , 'w-studio' ); ?>">

                                    &#8593;</abbr></a>

                            |

                            <a href="<?php

                            echo wp_nonce_url( add_query_arg( array( 'action' => 'move-down-menu-item' , 'menu-item' => $w_studio_item_id , ) , remove_query_arg( $w_studio_removed_args , admin_url( 'nav-menus.php' ) ) ) , 'move-menu_item' );

                            ?>" class="item-move-down"><abbr title="<?php esc_attr_e( 'Move down' , 'w-studio' ); ?>">

                                    &#8595;</abbr></a>

                        </span>

                        <a class="item-edit" id="edit-<?php echo esc_attr( $w_studio_item_id ); ?>"

                           title="<?php esc_attr_e( 'Edit Menu Item' , 'w-studio' ); ?>" href="<?php

                        echo ( isset( $_GET[ 'edit-menu-item' ] ) && $w_studio_item_id == $_GET[ 'edit-menu-item' ] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item' , $w_studio_item_id , remove_query_arg( $w_studio_removed_args , admin_url( 'nav-menus.php#menu-item-settings-' . $w_studio_item_id ) ) );

                        ?>"><?php esc_html_e( 'Edit Menu Item' , 'w-studio' ); ?></a>

                    </span>

            </div>

        </div>



        <div class="menu-item-settings" id="menu-item-settings-<?php echo esc_attr( $w_studio_item_id ); ?>">

            <?php if( 'custom' == $w_studio_item->type ) : ?>

                <p class="field-url description description-wide">

                    <label for="edit-menu-item-url-<?php echo esc_attr( $w_studio_item_id ); ?>">

                        <?php esc_html_e( 'URL' , 'w-studio' ); ?><br/>

                        <input type="text" id="edit-menu-item-url-<?php echo esc_attr( $w_studio_item_id ); ?>"

                               class="widefat code edit-menu-item-url"

                               name="menu-item-url[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                               value="<?php echo esc_attr( $w_studio_item->url ); ?>"/>

                    </label>

                </p>

            <?php endif; ?>

            <p class="description description-wide">

                <label for="edit-menu-item-title-<?php echo esc_attr( $w_studio_item_id ); ?>">

                    <?php esc_html_e( 'Navigation Label' , 'w-studio' ); ?><br/>

                    <input type="text" id="edit-menu-item-title-<?php echo esc_attr( $w_studio_item_id ); ?>"

                           class="widefat edit-menu-item-title"

                           name="menu-item-title[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                           value="<?php echo esc_attr( $w_studio_item->title ); ?>"/>

                </label>

            </p>



            <p class="field-title-attribute description description-wide">

                <label for="edit-menu-item-attr-title-<?php echo esc_attr( $w_studio_item_id ); ?>">

                    <?php esc_html_e( 'Title Attribute' , 'w-studio' ); ?><br/>

                    <input type="text" id="edit-menu-item-attr-title-<?php echo esc_attr( $w_studio_item_id ); ?>"

                           class="widefat edit-menu-item-attr-title"

                           name="menu-item-attr-title[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                           value="<?php echo esc_attr( $w_studio_item->post_excerpt ); ?>"/>

                </label>

            </p>



            <p class="field-link-target description">

                <label for="edit-menu-item-target-<?php echo esc_attr( $w_studio_item_id ); ?>">

                    <input type="checkbox" id="edit-menu-item-target-<?php echo esc_attr( $w_studio_item_id ); ?>"

                           value="_blank"

                           name="menu-item-target[<?php echo esc_attr( $w_studio_item_id ); ?>]"<?php checked( $w_studio_item->target , '_blank' ); ?> />

                    <?php esc_html_e( 'Open link in a new tab' , 'w-studio' ); ?>

                </label>

            </p>



            <p class="field-css-classes description description-thin">

                <label for="edit-menu-item-classes-<?php echo esc_attr( $w_studio_item_id ); ?>">

                    <?php esc_html_e( 'CSS Classes (optional)' , 'w-studio' ); ?><br/>

                    <input type="text" id="edit-menu-item-classes-<?php echo esc_attr( $w_studio_item_id ); ?>"

                           class="widefat code edit-menu-item-classes"

                           name="menu-item-classes[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                           value="<?php echo esc_attr( implode( ' ' , $w_studio_item->classes ) ); ?>"/>

                </label>

            </p>



            <p class="field-xfn description description-thin">

                <label for="edit-menu-item-xfn-<?php echo esc_attr( $w_studio_item_id ); ?>">

                    <?php esc_html_e( 'Link Relationship (XFN)' , 'w-studio' ); ?><br/>

                    <input type="text" id="edit-menu-item-xfn-<?php echo esc_attr( $w_studio_item_id ); ?>"

                           class="widefat code edit-menu-item-xfn"

                           name="menu-item-xfn[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                           value="<?php echo esc_attr( $w_studio_item->xfn ); ?>"/>

                </label>

            </p>



            <p class="field-description description description-wide">

                <label for="edit-menu-item-description-<?php echo esc_attr( $w_studio_item_id ); ?>">

                    <?php esc_html_e( 'Description' , 'w-studio' ); ?><br/>

                    <textarea id="edit-menu-item-description-<?php echo esc_attr( $w_studio_item_id ); ?>"

                              class="widefat edit-menu-item-description" rows="3" cols="20"

                              name="menu-item-description[<?php echo esc_attr( $w_studio_item_id ); ?>]"><?php echo esc_html( $w_studio_item->description ); // textarea_escaped ?></textarea>

                    <span

                        class="description"><?php esc_html_e( 'The description will be displayed in the menu if the current theme supports it.' , 'w-studio' ); ?></span>

                </label>

            </p>



            <p class="field-move hide-if-no-js description description-wide">

                <label>

                    <span><?php esc_html_e( 'Move' , 'w-studio' ); ?></span>

                    <a href="#" class="menus-move menus-move-up" data-dir="up"><?php esc_html_e( 'Up one' , 'w-studio' ); ?></a>

                    <a href="#" class="menus-move menus-move-down"

                       data-dir="down"><?php esc_html_e( 'Down one' , 'w-studio' ); ?></a>

                    <a href="#" class="menus-move menus-move-left" data-dir="left"></a>

                    <a href="#" class="menus-move menus-move-right" data-dir="right"></a>

                    <a href="#" class="menus-move menus-move-top"

                       data-dir="top"><?php esc_html_e( 'To the top' , 'w-studio' ); ?></a>

                </label>

            </p>



            <div class="menu-item-actions description-wide submitbox">

                <?php if( 'custom' != $w_studio_item->type && $w_studio_original_title !== false ) : ?>

                    <p class="link-to-original">

                        <?php printf( esc_html__( 'Original: %s' , 'w-studio' ) , '<a href="' . esc_attr( $w_studio_item->url ) . '">' . esc_html( $w_studio_original_title ) . '</a>' ); ?>

                    </p>

                <?php endif; ?>

                <a class="item-delete submitdelete deletion" id="delete-<?php echo esc_attr( $w_studio_item_id ); ?>"

                   href="<?php

                   echo wp_nonce_url( add_query_arg( array( 'action' => 'delete-menu-item' , 'menu-item' => $w_studio_item_id , ) , admin_url( 'nav-menus.php' ) ) , 'delete-menu_item_' . $w_studio_item_id ); ?>"><?php esc_html_e( 'Remove' , 'w-studio' ); ?></a>

                <span class="meta-sep hide-if-no-js"> | </span> <a class="item-cancel submitcancel hide-if-no-js"

                                                                   id="cancel-<?php echo esc_attr( $w_studio_item_id ); ?>"

                                                                   href="<?php echo esc_url( add_query_arg( array( 'edit-menu-item' => $w_studio_item_id , 'cancel' => time() ) , admin_url( 'nav-menus.php' ) ) );

                                                                   ?>#menu-item-settings-<?php echo esc_attr( $w_studio_item_id ); ?>"><?php esc_html_e( 'Cancel' , 'w-studio' ); ?></a>

            </div>



            <?php

            // Helps plugins hook their own w_studio_fields.

            do_action( 'wp_nav_menu_item_custom_fields' , $w_studio_item_id , $w_studio_item , $w_studio_depth , $w_studio_args );

            ?>



            <input class="menu-item-data-db-id" type="hidden"

                   name="menu-item-db-id[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                   value="<?php echo esc_attr( $w_studio_item_id ); ?>"/>

            <input class="menu-item-data-object-id" type="hidden"

                   name="menu-item-object-id[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                   value="<?php echo esc_attr( $w_studio_item->object_id ); ?>"/>

            <input class="menu-item-data-object" type="hidden"

                   name="menu-item-object[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                   value="<?php echo esc_attr( $w_studio_item->object ); ?>"/>

            <input class="menu-item-data-parent-id" type="hidden"

                   name="menu-item-parent-id[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                   value="<?php echo esc_attr( $w_studio_item->menu_item_parent ); ?>"/>

            <input class="menu-item-data-position" type="hidden"

                   name="menu-item-position[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                   value="<?php echo esc_attr( $w_studio_item->menu_order ); ?>"/>

            <input class="menu-item-data-type" type="hidden"

                   name="menu-item-type[<?php echo esc_attr( $w_studio_item_id ); ?>]"

                   value="<?php echo esc_attr( $w_studio_item->type ); ?>"/>

        </div>

        <!-- .menu-item-settings-->

        <ul class="menu-item-transport"></ul>

        <?php

        $w_studio_output .= ob_get_clean();

    }

}



/**

 * Proof of concept for how to add new w_studio_fields to nav_menu_item posts in the WordPress menu editor.

 * @author Weston Ruter (@westonruter), X-Team

 */

add_action( 'init' , array( 'W_Nav_Menu_Item_Custom_Fields' , 'setup' ) );



class W_Nav_Menu_Item_Custom_Fields {



    static function setup() {

        if( !is_admin() ) return;



        $new_fields = apply_filters( 'w_nav_menu_item_additional_fields' , array() );



        if( empty( $new_fields ) ) return;



        add_filter( 'wp_edit_nav_menu_walker' , function () {

            return 'W_Walker_Nav_Menu_Edit';

        } );



        add_action( 'save_post' , array( __CLASS__ , '_save_post' ) , 10 , 2 );

    }



    /**

     * Inject the

     * @hook {action} save_post

     */

    static function get_field( $w_studio_item , $w_studio_depth , $w_studio_args ) {

        $new_fields = '';

        $value = esc_attr( get_post_meta( $w_studio_item->ID , 'w-mega-menu' , true ) );



        if( $value == 1 ) {

            $checked = 'checked="checked"';

        } else {

            $checked = '';

        }

        $new_fields = '<p class="field-w-mega-menu"><label for="edit-menu-item-w-mega-menu-' . $w_studio_item->ID . '">

                            ' . esc_html__( 'Mega Menu' , 'w-studio' ) . '

                            <input

                                type="checkbox"

                                id="edit-menu-item-mega-menu-' . $w_studio_item->ID . '"

                                class="widefat code edit-menu-item-mega-menu w-mega-menu-input"

                                name="menu-item-mega-menu[' . $w_studio_item->ID . ']"

                                value="1" ' . $checked . '>

                        </label></p>';



        return $new_fields;

    }



    /**

     * Save the newly submitted w_studio_fields

     * @hook {action} save_post

     */

    static function _save_post( $post_id , $post ) {



        if( $post->post_type !== 'nav_menu_item' ) {

            return $post_id; // prevent weird things from happening

        }



        $form_field_name = 'menu-item-mega-menu';

        // @todo FALSE should always be used as the default $value, otherwise we wouldn't be able to clear checkboxes

        if( isset( $_POST[ $form_field_name ][ $post_id ] ) ) {

            $key = 'w-mega-menu';

            $value = stripslashes( $_POST[ $form_field_name ][ $post_id ] );

            update_post_meta( $post_id , $key , $value );

        } else {

            $key = 'w-mega-menu';

            update_post_meta( $post_id , $key , 0 );

        }

    }

}



// @todo This class needs to be in it's own file so we can include id J.I.T.

// requiring the nav-menu.php file on every page load is not so wise



// require_once ABSPATH . 'wp-admin/includes/nav-menu.php';



class W_Walker_Nav_Menu_Edit extends Walker_Nav_Menu_Edit_Custom {

    function start_el( &$w_studio_output , $w_studio_item , $w_studio_depth = 0 , $w_studio_args = Array() , $current_object_id = 0 ) {

        $w_studio_item_output = '';

        parent::start_el( $w_studio_item_output , $w_studio_item , $w_studio_depth , $w_studio_args , $current_object_id = 0 );

        // Inject $new_fields before: <div class="menu-item-actions description-wide submitbox">



        if( $new_fields = W_Nav_Menu_Item_Custom_Fields::get_field( $w_studio_item , $w_studio_depth , $w_studio_args ) ) {

            $w_studio_item_output = preg_replace( '/(?=<div[^>]+class="[^"]*submitbox)/' , $new_fields , $w_studio_item_output );

        }

        $w_studio_output .= $w_studio_item_output;

    }

}



// Add extra w_studio_fields to menu item hook

add_filter( 'w_nav_menu_item_additional_fields' , 'w_menu_item_additional_fields' );



function w_menu_item_additional_fields( $w_studio_fields ) {



    $w_studio_fields[ 'mega-menu' ] = array( 'name' => 'w-mega-menu' , 'label' => esc_html__( 'Mega Menu' , 'w-studio' ) , 'container_class' => 'mega-menu-checkbox' , 'input_type' => 'checkbox' );



    return $w_studio_fields;

}