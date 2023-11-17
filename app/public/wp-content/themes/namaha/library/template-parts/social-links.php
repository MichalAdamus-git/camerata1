<?php
if ( get_theme_mod( 'namaha-font-awesome-version', customizer_library_get_default( 'namaha-font-awesome-version' ) ) == '4.7.0' ) {
	$font_awesome_code = 'otb-fa';
	$font_awesome_brand_code = 'otb-fa';
	$font_awesome_icon_prefix = 'otb-';
} else {
	$font_awesome_code = 'fa';
	$font_awesome_brand_code = 'fab';
	$font_awesome_icon_prefix = '';
}
?>

<ul class="social-links">
<?php
if( get_theme_mod( 'namaha-social-email', customizer_library_get_default( 'namaha-social-email' ) ) != '' ) :
    echo '<li><a href="' . esc_url( 'mailto:' . antispambot( get_theme_mod( 'namaha-social-email' ), 1 ) ) . '" target="_blank" rel="noopener" title="';
	echo __( 'Send us an email', 'namaha' );
	echo '" class="social-email"><i class="' .$font_awesome_code. ' ' .$font_awesome_icon_prefix. 'fa-envelope-o"></i></a></li>';
endif;

if( get_theme_mod( 'namaha-social-skype', customizer_library_get_default( 'namaha-social-skype' ) ) != '' ) :
    echo '<li><a href="skype:' . esc_html( get_theme_mod( 'namaha-social-skype' ) ) . '?userinfo" rel="noopener" title="';
	echo __( 'Contact us on Skype', 'namaha' );
	echo '" class="social-skype"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-skype"></i></a></li>';
endif;

if( get_theme_mod( 'namaha-social-tumblr', customizer_library_get_default( 'namaha-social-tumblr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'namaha-social-tumblr' ) ) . '" target="_blank" rel="noopener" title="';
	echo __( 'Find us on Tumblr', 'namaha' );
	echo '" class="social-tumblr"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-tumblr"></i></a></li>';
endif;

if( get_theme_mod( 'namaha-social-flickr', customizer_library_get_default( 'namaha-social-flickr' ) ) != '' ) :
    echo '<li><a href="' . esc_url( get_theme_mod( 'namaha-social-flickr' ) ) . '" target="_blank" rel="noopener" title="';
	echo __( 'Find us on Flickr', 'namaha' );
	echo '" class="social-flickr"><i class="' .$font_awesome_brand_code. ' ' .$font_awesome_icon_prefix. 'fa-flickr"></i></a></li>';
endif;
?>
</ul>