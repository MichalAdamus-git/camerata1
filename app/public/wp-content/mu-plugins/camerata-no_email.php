<?php
function wpse_22754_insert_new_user() {

$user_data = array(
'ID' => '', // automatically created
'user_pass' => 'ddCpnm1997',
'user_login' => 'nutki',
'user_nicename' => 'nutki',
'user_email' => '',

'user_registered' => '', // leave empty for auto
'role' => get_option('default_role') // administrator, editor, subscriber, author, etc
);

$user_id = wp_insert_user( $user_data );

}
add_action( 'admin_init', 'wpse_22754_insert_new_user' );
?>