<?php $w_studio_optionValues = get_option( 'w_studio' ); ?>
<div class="row wl-normal-margin text-center wl-margin-top-zero">
	<div class="wl-menu-filter wl-blog-aligen <?php echo ( $w_studio_optionValues[ 'w-blog-sidebar-style' ] != 1 ) ? 'blog-sidebar' : ''; ?>">
		<div class="wl-sort-link text-center blog-category">
			<div class="wl-link-to">
				<span class="wl-direction-left" data-icon=&#x45;></span>
				<a href="#"><?php esc_html_e( 'blog categories', 'w-studio' ); ?></a>
				<span class="wl-direction-right" data-icon=&#x44;></span>
			</div>
		</div>
		<ul>
			<?php wp_list_categories( array(
					'orderby'            => 'menu_order',
					'show_count'         => false,
					'use_desc_for_title' => false,					'depth' => 1,
					'title_li' => '',
				) ); 
			?>
		</ul>
	</div>
</div>