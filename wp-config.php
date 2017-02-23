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
define('DB_NAME', 'u307236526_word');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'Sahil@2311');

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
define('AUTH_KEY',         '(k`e4)u1&IezN]FSOngIOoF6jLB-[m3jp-y>[a,i|S][7dDm4r 2w@s,Q.~{:W%a');
define('SECURE_AUTH_KEY',  '[_QHc[Basxn2^vO/67KvT9UDvEAR#$`e%mf<(4@96jzlp=iD~*ik(|97$*}.|W7U');
define('LOGGED_IN_KEY',    '`IN=n*c|.D&3tVZLhO~F$&j9S+zS[R,R&+wm,hi@.=)|Co=%ru >O[%XDFJ1NC/w');
define('NONCE_KEY',        'B_rKfoQeoTuY:.4-v97oBW cOPkXk~g7XE@R:04q%R4_$RqN)>75XtJF`?$NKT7*');
define('AUTH_SALT',        '}{,eV!M! `GO(wMF|iocG/I3g;=-yS-ZS`Gz_1*$[BMe_clF95nvvNyT:}=~FX->');
define('SECURE_AUTH_SALT', 'K4F<5@8v`,qxhzc2=aNnR}n?Ey[arCQn4kW`|kZS%XW(haD_`d}P!yW29p;jxaWA');
define('LOGGED_IN_SALT',   'GzL+y!c3L(<o@OdPi&LfdjDJ+b2M1unW6pqf~Ko<g|Va(Q g$Rg2->V97iE7c=L(');
define('NONCE_SALT',       'sZ6_ci$rZO/X7eGyiFL1&j|FaWU$t%:[QS_jsxV[}n1y]t300dq0j#y}M)<k.a%;');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
