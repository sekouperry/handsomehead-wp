<?php

/**

 * Template for displaying search forms in W Studio

 *

 * @package WordPress

 * @subpackage W_Studio

 * @since W Studio 1.0

 */

?>



<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<label>		

		<input type="search" class="search-field wl-standard-marginbottom" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'w-studio' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'w-studio' ); ?>" />

	</label>	

</form>