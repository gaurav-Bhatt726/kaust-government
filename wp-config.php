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
define( 'DB_NAME', 'u822516101_kaust' );

/** Database username */
define( 'DB_USER', 'u822516101_kaust_db' );

/** Database password */
define( 'DB_PASSWORD', 'ml9hWC7?' );

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
define( 'AUTH_KEY',         'KXoo@1Gj2qVL{T>Q1k/q@B2/N*9`3{/`FRMfvn={}Q$2A45rc|-_J(aYkWQ#&2_O' );
define( 'SECURE_AUTH_KEY',  '1YU7;uZiL?0NX!V<F66P>MNsH&>K)KoJgn@[c~1cOOnFquG+-S&jZ??j}oWERl!=' );
define( 'LOGGED_IN_KEY',    'r<C;Uz:pCIm&L4LsW!O{4I.{tq >-/{T+EGLqSl:)qG@|Jz`Q@h=_o~n<I5i?Wh:' );
define( 'NONCE_KEY',        'o(1|L:!BuCa]6h).Vp%_FZr<U+^hS6Ruk8{8#4Y1BYTv?[}<<+Ys+5juZ5mrjy }' );
define( 'AUTH_SALT',        '6,L|H}2Rb!dsbtQV/JhoIF-JNE/0jf$D;WM[bF~?fYjqX&4Uj%zK>C,M{Dk+:$BS' );
define( 'SECURE_AUTH_SALT', 'I9=.3;7yzO[lG0^)c.ENot[jl>p^GO # Ne%H`<)7^D}rjI@<.0X^{7.lnF>?l%9' );
define( 'LOGGED_IN_SALT',   'T>rRqHB]`LO.SGOjFDrp^~/)u65]xLe&{r.c}5?GUNG)z:&otJWnt}o~&A?Dgu N' );
define( 'NONCE_SALT',       'koh{xu[_65TIf90oWPV(FHPnSHkqDL_ikcLtAW{4G Hl]bBx6SB_b*as3KDBN{L8' );

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
