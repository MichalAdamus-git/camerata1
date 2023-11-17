<?php
/**
 * Customize for categories dropdown, extend the WP customizer
 *
 * @package 	Customizer_Library
 * @author		Devin Price, The Theme Foundry
 */

if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return NULL;
}

class Customizer_Library_Dropdown_Web_Safe_Fonts extends WP_Customize_Control {

	public $type = 'dropdown-web-safe-fonts';
	
	public $name;
	
	public function render_content() {
		$dropdown = '<select data-customize-setting-link="' .$this->id. '">';
		$dropdown .= '<option value="arial">Arial</option>';
		$dropdown .= '<option value="arial black">Arial Black</option>';
		$dropdown .= '<option value="bookman">Bookman</option>';
		$dropdown .= '<option value="comic sans ms">Comic Sans MS</option>';
		$dropdown .= '<option value="courier">Courier</option>';
		$dropdown .= '<option value="courier new">Courier New</option>';
		$dropdown .= '<option value="garamond">Garamond</option>';
		$dropdown .= '<option value="georgia">Georgia</option>';
		$dropdown .= '<option value="helvetica">Helvetica</option>';
		$dropdown .= '<option value="impact">Impact</option>';
		$dropdown .= '<option value="palatino">Palatino</option>';
		$dropdown .= '<option value="times">Times</option>';
		$dropdown .= '<option value="times new roman">Times New Roman</option>';
		$dropdown .= '<option value="trebuchet ms">Trebuchet MS</option>';
		$dropdown .= '<option value="verdana">Verdana</option>';
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