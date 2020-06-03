<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', 'B123456');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'J1ZQva-lN4u/%H.{G=We|~T,M%-Su:|cQfTK%ld$f.X}U}_RSB)-,{31.H,lwzr&');
define('SECURE_AUTH_KEY',  'qQ|/6Gu$gdEcAR#VlZl5|3/zA/OVhYC`1q-Zt%(}G;XTrJey0nXs:&2avL]eh#xP');
define('LOGGED_IN_KEY',    'asHB=7b]!u6BrT;BxD,zKP%e2n[!2^Bdp^E>qeO&3JO;CZU9A2y`nHD`.t[4X7Lq');
define('NONCE_KEY',        '_E0LV{=CCTZ5NyAXoUw; .U>~](!<W3E/xD/ )WXH(dUk_~qY]66s@}X]c1/@md{');
define('AUTH_SALT',        '/c2W@8cqEA+fU(@aziTRC5%y_,VNszzo]oo)C;.quqxfeCiznN7Kk,.zCQ=GX7$Y');
define('SECURE_AUTH_SALT', 'pD}Bg97BxR?D=xAyzX8Ze7Atgj5J%*o2|?6S}(C.ogJ5&VCZkfdY#qWO9i`R1YsZ');
define('LOGGED_IN_SALT',   '4hd{`Gx9B5E!/(h!`$*Rux=ouu-dA7c6&z2j#yTY+ XF^W>5M4B6U@0Tg}jv](t`');
define('NONCE_SALT',       'e8<]bigPj?JqiW*c=>Y^u*5b;g$Cd#@jMU?dbyFYQ+,tkk$f2xB$[!o!=;<9a`,1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
