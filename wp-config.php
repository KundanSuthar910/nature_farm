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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'nature_farm' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'uh3F$ZROKE9 [_h]oL!b%6[b,^onC~bi/?}m^y{8Ch9~1-l8l/xaEj68Y&f5}W3l' );
define( 'SECURE_AUTH_KEY',  '(rJK!r-1i)t@_]T&K-!/_gWIR^73*re*6YD`~/(<P5e#pL[H>{PN7~mcHr5i?Sw(' );
define( 'LOGGED_IN_KEY',    '->Z|B`mNd@EtS&c-2fGW)qmfgh:]d,>D|9OA8QQ-#f%OK@D*aRi_P9kj::fWmcMU' );
define( 'NONCE_KEY',        'O fHK]Se*1uUb2EqSo;<%v&LdfLkvjog>G3AK]&9<Vs4pD&>oDs|Y-BD~?I-D(yc' );
define( 'AUTH_SALT',        '[vWuQ7N-Dt2p0|v>kqR{>{^&[r(2lx+T}^.O:~ARen1Cbn  ?*^=gA1#!B4|ZQ~:' );
define( 'SECURE_AUTH_SALT', 'G9~Dn`13BdRL9?s?z )F|[1drF{o#- wBmb/-TbgGHw1m(/DS!f2g80.BeeY1gQL' );
define( 'LOGGED_IN_SALT',   'n%~t2ZA`=,^<]&(x#L3Sv,`(x$|OJjV&NZ1urq7]q;@tiw%4}]Qmx72tH8~^X) C' );
define( 'NONCE_SALT',       'WV}K=QMcZ&zy1bzZ*@+h2Go`z$*d*fgNU$mH7y(,Wq_];Y}NC9`,N}tgrm7:>XC<' );

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
