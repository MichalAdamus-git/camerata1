<?php
/**
 * Customize for textarea, extend the WP customizer
 *
 * @package 	Customizer_Library
 * @author		Devin Price, The Theme Foundry
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

class Customizer_Library_Dropdown_Product_Categories extends WP_Customize_Control {

	public $type = 'dropdown-product-categories';
	
	public $name;
	
	public function render_content() {
		$args = array(
			'order'      => 'ASC',
			'hide_empty' => false,
			'posts_per_page' =>'-1'
		);
		
		$product_categories = get_terms( 'product_cat', $args );
		
		$dropdown = '<select data-customize-setting-link="' .$this->id. '" multiple="multiple" style="height:95px;">';
		$dropdown .= "<option value = ''>None</option>";
		
		foreach( $product_categories as $category ){
			$dropdown .= "<option value = '" . esc_attr( $category->slug ) . "'>" . esc_html( $category->name ) . "</option>";
		}
		
		$dropdown .= "</select>";		

		printf(
			'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
			$this->label,
			$dropdown
		);
	
		if ( isset( $this->description ) ) {
			echo '<span class="description customize-control-description">' . $this->description . '</span>';
		}
		
	}

}