<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'ruuuXyvOdlNHIr8Ye7Sy0A7lJoZalf03XLIvXgFo/YbQv8X8z6iFbPSEmfbO1DM65m4eVvwCQMhGQD+3XTcrqg==');
define('SECURE_AUTH_KEY',  '5IUPSSCaLMZ/0WOlACkC/4hyIcgg+Pleso5AonfQs6w0czjXXXLHOc+id4V7UG4uisiqnzBusZquWKng6VaJ3g==');
define('LOGGED_IN_KEY',    'wXJrddcvvn7WsGINTc3LYcx5MamMH/0rmfHN93XJ0blUATK9CmbpUYKVwWvCFmoBT6UzvX5+Ains01YHf9DhYA==');
define('NONCE_KEY',        'DsN0xl58eUyudHMuCsU6yn/tsjDAecdPUD6TFegA6bBT9EPwm3y9aFuE+QENLNL26ZdCfHbsOpDiQ2F1JGnGDA==');
define('AUTH_SALT',        '5rDJlraSjYe1srnzAOz4rRwkx0hf2DIStijHi3zR47wQDgAq9DCWC11NIBCz75HQ1WB2PE+SeVpHEChclP/LbQ==');
define('SECURE_AUTH_SALT', '53MK173Jz2O80yhCsiTzcg2vq83pGVSoS4xM1iRBHZZiiJizB7WXtR6wYSKdRSC40J2oOq6sq+ksluEf8NwO0g==');
define('LOGGED_IN_SALT',   'VY/ijrnR8Gb0Qu3dJClbnE5nPTvamfh1wtw8TWCbZFb4NXpeb0jhTMJoGIKamdpv8mum9g/aO+Qlok4HqbIfVg==');
define('NONCE_SALT',       'BizDCdyonhz63IbqN4+2NvdeMsdbaHOKJtebM9mi/cR/ZZyNwFSguJUdYycUtPVmnIyuuc6euEbGLjBNVEy/4A==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
