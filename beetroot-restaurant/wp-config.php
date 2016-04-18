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
define('DB_NAME', 'christian_wp');

/** MySQL database username */
define('DB_USER', 'christian_wp');

/** MySQL database password */
define('DB_PASSWORD', 'FEtLvMHHP2r8Ffyd');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '`LL*B<^L,Nu$<i}08qFHy@n$<I6xsbz,Vjy4(NQO21UZK43u&6DqeB>;9]8(6OR^');
define('SECURE_AUTH_KEY',  '2dawp#m5OHI+&h|L>)2gNvFN(b-qnBOH]nO06BX`J$VR}:||(?&yx.!wq79pED*f');
define('LOGGED_IN_KEY',    '(hkyd^h,.1]2</-IQXGq 6CMs{#%jYA!G)`xW sJHWJ &A?_1 aK-@3}6qNB.;>E');
define('NONCE_KEY',        'h5XP{Q8l7L:-1d+T}|<=`[Bj1$6@b-lUwU.)L|*8ZXs-do[88+sSZPr]|2JNLk3P');
define('AUTH_SALT',        'j)XF:JqN%q4SH5W6XBqns}v3RH{Wz N:A{gCdrbbA+v-aNNaY1~b,3N] 7t~9M.m');
define('SECURE_AUTH_SALT', 'X4i];`7|CbK;jNzi#=ZE-#7IeU|_`h-w%x}UD+&A.$}?-X606zP+cs_$Omxy<svo');
define('LOGGED_IN_SALT',   'OS<AFIX1ok y9p{t@cakH$2A8IF-Zi+Y#5:P*u/p3olSg5Ns-ym21HX~S_OyHy$r');
define('NONCE_SALT',       'B-_:><| y  j[oS>+Q/+[}VE$:CAJZ_D`e$A-o1>oE,L9|&7_!?`F<W[L$x^~8eB');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'projector_';

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
