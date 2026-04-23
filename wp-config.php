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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'thec4639_liputanwp' );

/** MySQL database username */
define( 'DB_USER', 'thec4639' );

/** MySQL database password */
define( 'DB_PASSWORD', 'cpanel310313' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         'RY7{}a?A7u_HBy/.{}~? S(|A-ny8yft~N63T2D4<7RN[V}i>7b)C*q7Q=2l>2r<' );
define( 'SECURE_AUTH_KEY',  'z,2l5<;PQ~bN`U1R//[XJPU+hQ4f?s&)IA(3.s;$CNw3e.7LY(qaZd/EOeIB%6Gx' );
define( 'LOGGED_IN_KEY',    'k00u&]1XEn=ag&6{P``=}[_<?Hf,$0NIt|vorI/(+)*mU@G[2dy$yh@pGF|M>5R?' );
define( 'NONCE_KEY',        '7_0gI+1|[`f <Zqy0C(w-{3Ef@:bo!&;G$[ZxJfPZ,)?Vi(Q@=M1<v089:E)oZW}' );
define( 'AUTH_SALT',        '|lOCE$:dlIVr#:AMI97Y)G>x)E((5GF@N.`6 ]fe}x%)k$U[(s4yn3<6]MO7=.ux' );
define( 'SECURE_AUTH_SALT', 'f`mEV*ST:2 w:3n9XGM,(-DE%D_RXS*yyi>w%C#B9#`PUYr(jmfcmV_.2&arW.w4' );
define( 'LOGGED_IN_SALT',   'a%}d+&$zTz3Iv}&,@1I.,S4B7[z`)AqP=z%+jUFa|6o.dG[^suB0KLy~{G3_;0^>' );
define( 'NONCE_SALT',       'k4f%vU ^4)+;8CYX.L6U#Hz{Hj{nt2.xU6c=k0}o;,aGADMnw[khttg_DJng>8?l' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
