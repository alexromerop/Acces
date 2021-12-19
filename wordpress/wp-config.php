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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'amongwp' );

/** MySQL database username */
define( 'DB_USER', 'enti' );

/** MySQL database password */
define( 'DB_PASSWORD', 'enti' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'MPV|}^3e(Ijkw.Hk-Hyhn=#cT-5xoK$>,uenZ9xAgK}5W3{K!1n*P]bh+7nMZjw/' );
define( 'SECURE_AUTH_KEY',  'T[r:bev2KR-ad0N[U_S8B)<qg%2dDcij{l^NqjzBe%2hIw#x:]f],jo+?x;iBpJ~' );
define( 'LOGGED_IN_KEY',    '>t,0Tbhpt/,])mVy/Zs>iSl)A<yIWP*1Gb1}{Z~QeUpqobGh;GEY99ugYo|lpi+P' );
define( 'NONCE_KEY',        'XXdZhc47QU/_FhMNO.x1iBp-`6H;&r%`&S`{$UMi(a}I&z[M2.5rm_5j)xh$z{mr' );
define( 'AUTH_SALT',        'E2~OqcE9WbR=bOt)a!90bk/v-@}`YDo*izV 7E=/])e)~,U43*CpPtdTgG`|-@>F' );
define( 'SECURE_AUTH_SALT', 'jOaR3s1n_P9I?bz;Gkf5%Ge&Y***On4zWRobwg!s.eJEGxp 9hAny+j-[J$1 dov' );
define( 'LOGGED_IN_SALT',   '!@?A4xGLAi;jj$#M}^4y#lp68ir[>t6(20n{|p~DaD0n~0o;E7d?B{Y.-l2~|;-8' );
define( 'NONCE_SALT',       'iD)>~jtP}!mS^P v0D4${SQF3Gl<`Dpql`x`(.VZRr^^Z!/&rMt*kn 67wS}tqbD' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
