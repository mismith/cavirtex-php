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

// ** MySQL settings - You can get this info from your web host ** //
if(preg_match('/\.dev$/i',$_SERVER['HTTP_HOST'])){
	define('DB_HOST',     '127.0.0.1');
	define('DB_NAME',     'cavirtex');
	define('DB_USER',     'root');
	define('DB_PASSWORD', 'Welcome1');
}else{
	define('DB_HOST',     'internal-db.s173033.gridserver.com');
	define('DB_NAME',     'db173033_cavirtex');
	define('DB_USER',     'db173033_test');
	define('DB_PASSWORD', 'Welcome1');
}
/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'a)@2mUx:D|(sq&OVu13A1HMaI1kB,C@)l{zqd;|#]n6-)5+g52a90/`8VKqS&v54');
define('SECURE_AUTH_KEY',  '1+v+_<~f}m1e_+G*UX#7}I}w.|8 36-qU3+B=4-V-InEQ^M^r%D7b-(+-=HEmho4');
define('LOGGED_IN_KEY',    ')H(z5GyQmm.M`iF6Q Ea|Fw??Wt`Cr[o?:+WQD]!dIVu>H-cf4Q%v?2r%Ni*-<Uv');
define('NONCE_KEY',        'd||E9Vg@,n*|!?x#~qNCwR1mKJq-j&oFj?Y;2,2-b4U>DS13zZ]!]-FE/>TypF#Z');
define('AUTH_SALT',        '#};ou5;$CPL,1cAFB]{^+ntA/(T?9[UVu6sjD_h$Gw>Pn_6OK[ZC+_CRuwH7Fr2B');
define('SECURE_AUTH_SALT', 'uuaa]ek7rX:o-^$_:46Hv|r?-da2=ty+Y{sswDjJri+6*xwSx)2>tvHAYQ+Dnk&O');
define('LOGGED_IN_SALT',   ':sxAPxi7:S1iK5-sThNDv4#JER+8Y=I<XNAZ&:%E^6Q[o}$!l<,[6r$Ba/C?$X}C');
define('NONCE_SALT',       'N@a/YR|3M)<g]n Ss76yt#AoV@l9(ZiHNCUr?%~cGgHA-mYUIKfGKldkHWm+bHe[');

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
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
