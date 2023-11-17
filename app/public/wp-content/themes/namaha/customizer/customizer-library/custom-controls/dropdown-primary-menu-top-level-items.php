<?php
/**
 * Customize for pages and posts dropdown, extend the WP customizer
 *
 * @package 	Customizer_Library
 * @author		Devin Price, The Theme Foundry
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

class Customizer_Library_Dropdown_Primary_Menu_Top_Level_Items extends WP_Customize_Control {

	public $type = 'dropdown-primary-menu-top-level-items';
	
	public $name;
	
	public function render_content() {
		$menu_locations = get_nav_menu_locations();
		$menu_id = $menu_locations[ 'primary' ] ;
		//wp_get_nav_menu_object($menu_id);		
		
		$dropdown = '<select data-customize-setting-link="' .$this->id. '">';
		$dropdown .= '<option value="">None</option>';
		
		// Get all of the primary menus items
		$items = wp_get_nav_menu_items( $menu_id );
				
		foreach ( $items as $item ) {
			if( $item->menu_item_parent == 0 ) {
				$dropdown .= '<option value="' .$item->ID. '">' .$item->title. '</option>';
			}
		}
		
		$dropdown .= '</select>';		
		
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