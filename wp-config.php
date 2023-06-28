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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbcasino_osm' );

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
define( 'AUTH_KEY',         '6s0LqE3yMtY,AOVuy28[`%`Sgp`D/MI8T.9gKg7{2c}te88A;tQtRC2S:*!xv?a1' );
define( 'SECURE_AUTH_KEY',  'ROH%*uI&)q{z2u)bw,#e3Nj(soedE=T687mbx<)TA@=M&(9sJUA0&5[)z-]GY L-' );
define( 'LOGGED_IN_KEY',    'G2=9Tuxq+k_}><?=i56}^r, vZcc]r9iy3-~8?63Gei|] 7h`|dIP*(EK(`w9>&z' );
define( 'NONCE_KEY',        'I7QsqciJ 84;P!r7,#iFJES1N5D(eN@g>Lp= [*[}%5A6?Lv6fAxKu-G1Nl)92HL' );
define( 'AUTH_SALT',        '2f7;K-MJpY/s!]h8l`{]A~DHX+!Erv-shcF|6.+)ck?tsA1h9:pRz}%8u0ZBJNHz' );
define( 'SECURE_AUTH_SALT', 'WMrV;oAJ)AgcIj/nEPo0o)4zF+pZ;R^/^dKK]Xc49wfl?6PSrIN6)]:if}(05}Dw' );
define( 'LOGGED_IN_SALT',   's2!|/;7|X^CR+@bl5KM)KbZNy;e#u@P0TEJ8*0e1<%BCY&)B}C?nzzlC`J<Z,Hy ' );
define( 'NONCE_SALT',       'Pu&^fhJm=<;Q/]&_7xh}:DX78$VfSH_MU:7a;.r)=W^>3?>q{G!NJ)@Nzk&7`O~^' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wposm_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
