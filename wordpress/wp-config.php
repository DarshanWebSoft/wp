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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ')9]L}0b^mhsfuT0|NRY#@zP _|KMZ2YTrO_?zE=7?um)8P^e#9I+gEMEy610d, H' );
define( 'SECURE_AUTH_KEY',  'z03p[X18Z>G:92wm~Uz:>hLsgB<BF]rG(8 vj=Av%S6,Z8tmH#X*V)G,yh)x12[r' );
define( 'LOGGED_IN_KEY',    ']vYsCJ?B>gj?[-Ywr^/s}GJ;Xil61UR6$n+>o2PdLZfmlfQ$D}jK6HT=c@s16K(!' );
define( 'NONCE_KEY',        '}1W< a:sd1[D;,Nc0Gc+ul[m?t4*GU~X?~EUF|;u[{lL*3gVL:m%[T22`,>,4$J~' );
define( 'AUTH_SALT',        'r_my[58&hHy!7w!#& ^tczVCx~LbU$)r1)lAW6LP/k2L$EVtAj6{N6jI0?yp3TFx' );
define( 'SECURE_AUTH_SALT', '$-DBa,?KYGfcvZ!?KYmysRLK-@iaRc/vH;6z%qh7wp-?o`/1u+}m,ro;&L&69m>x' );
define( 'LOGGED_IN_SALT',   'UYLwa_r{LGCP]b2]Qf~`h<xw-]/HUs79> w vvF9mg.C!6B-aiPHu2zKEibOS/5N' );
define( 'NONCE_SALT',       '2!5a3O0-M)OVe;#vmVSo*%;khp`*/02a`*81RM?&zu@wt9dq<wS8F,`F8IUw<|Qt' );

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

define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
