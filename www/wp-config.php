<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

define( 'WP_AUTO_UPDATE_CORE', false );

// Include local configuration
if (file_exists(dirname(__FILE__) . '/local-config.php')) {
	include(dirname(__FILE__) . '/local-config.php');
}

// Global DB config
if (!defined('DB_NAME')) {
	define('DB_NAME', 'wordpress');
}
if (!defined('DB_USER')) {
	define('DB_USER', 'wordpress');
}
if (!defined('DB_PASSWORD')) {
	define('DB_PASSWORD', 'localpw');
}
if (!defined('DB_HOST')) {
	define('DB_HOST', 'localhost');
}

/** Database Charset to use in creating database tables. */
if (!defined('DB_CHARSET')) {
	define('DB_CHARSET', 'utf8');
}

/** The Database Collate type. Don't change this if in doubt. */
if (!defined('DB_COLLATE')) {
	define('DB_COLLATE', '');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'zsRvL#VI4|o1)~vHXHVuH$XNh(jqLd>3aI3lpf1_{xu]U7t;M1C=]$W;CYyO)AO,');
define('SECURE_AUTH_KEY',  '|oT9sW-vpbP$+]ER^YJc,c&^ah|nL0G_JXGSGf;Est~uy{x~DIQ7q@;fJ+(31gD5');
define('LOGGED_IN_KEY',    '->MFncvYOoz{,UqV4UKdv&F=[hk;bzU-d0Wx!A7)n-yX6qi&UO?ISl/||s?NEA)=');
define('NONCE_KEY',        'fq:i}hO7I76|Ebp)l_QHS`y pN9]|i!sa!L)%^OJJQ?)M78G(AEHuWT%!aE_WL1U');
define('AUTH_SALT',        'l}DF)7c;2g<s-fxV|5lZreWx-u7dz+*Ne-)ai5jz5)MRkLG R?vv)0Aqbm+T(y[r');
define('SECURE_AUTH_SALT', 'IA4,FZYtP{Kk1)PQ]^wpYfVV9;tv7*#aJYs^?+xoK/]B*|~YUQ#z-{iedaryq^FL');
define('LOGGED_IN_SALT',   'U!1Xcz E4|-O[ D/i_EO|>Y&{y2A~hPx4viYD+TRL(=vQcqe^E-|>25;54im+;Rv');
define('NONCE_SALT',       '^f#@|dS%*THx n3$YY00-F]7C`ZBbIH`0116E-Ay-Sqg9xo2CWaZr1*C[YP,-m]d');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');


/**
 * Set custom paths
 *
 * These are required because wordpress is installed in a subdirectory.
 */
$server_name = $_SERVER['HTTP_HOST']; // $_SERVER['SERVER_NAME'];
if (!defined('WP_SITEURL')) {
	define('WP_SITEURL', 'http://' . $server_name . '/wordpress');
}
if (!defined('WP_HOME')) {
	define('WP_HOME',    'http://' . $server_name . '');
}
if (!defined('WP_CONTENT_DIR')) {
	define('WP_CONTENT_DIR', dirname(__FILE__) . '/content');
}
if (!defined('WP_CONTENT_URL')) {
	define('WP_CONTENT_URL', 'http://' . $server_name . '/content');
}


/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
if (!defined('WP_DEBUG')) {
	define('WP_DEBUG', false);
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
