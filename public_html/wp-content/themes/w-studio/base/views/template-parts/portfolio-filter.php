<?php 
	$w_studio_portfolioFilterId = '';
	if( is_page_template ( 'template-portfolio-col-1.php' ) ) {
		$w_studio_portfolioFilterId = "js-filters-col-one";
	}
	if( is_page_template ( 'template-portfolio-col-2.php' ) ) {
		$w_studio_portfolioFilterId = "js-filters-col-two";
	}
	if( is_page_template ( 'template-portfolio-col-3.php' ) ) {
		$w_studio_portfolioFilterId = "js-filters-col-three";
	}
	if( is_page_template ( 'template-portfolio-masonary-1.php' ) || is_page_template ( 'template-portfolio-masonary-2.php' ) ) {
		$w_studio_portfolioFilterId = "js-filters-mosaic";
	}
	if( is_page_template ( 'template-portfolio-masonary-3.php' ) || is_page_template ( 'template-portfolio-masonary-4.php' ) ) {
		$w_studio_portfolioFilterId = "js-filters-mosaic2";
	}
	if( is_page_template ( 'template-portfolio-style-1.php' ) || is_page_template ( 'template-portfolio-style-2.php' ) || is_page_template ( 'template-portfolio-style-3.php' ) ) {
		$w_studio_portfolioFilterId = "js-filters-col-one";
	}
	if( is_page_template ( 'template-portfolio-style-4.php' ) ) {
		$w_studio_portfolioFilterId = "js-filters-col-two";
	}
?>

<!-- filter nav start -->
<div class="row wl-filter-margin">
	<div class="wl-menu-filter">
		<ul id="<?php echo esc_attr($w_studio_portfolioFilterId); ?>" class="cbp-l-filters-button">
	        <li data-filter="*" class="cbp-filter-item-active cbp-filter-item">
	            All <div class="cbp-filter-counter"></div>
	        </li>
			<?php
				$profolio_post = array(
					'type'=> 'portfolio',
					'taxonomy'=> 'portfolio-category'
				);
				 $w_studio_categories = get_categories($profolio_post);
			?>
            
             <?php foreach($w_studio_categories as $w_studio_category):?>
                <li data-filter=".<?php echo esc_attr( $w_studio_category->slug ); ?>" class="cbp-filter-item">
                    <?php echo esc_attr($w_studio_category->name) .' '; ?> <div class="cbp-filter-counter"></div>
                </li>
            <?php endforeach;?>                                                        
	    </ul>
	</div>
</div>
<!-- filter nav end -->