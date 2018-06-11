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
define('DB_NAME', 'techlucidity');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'j;AMg*|[T*eu@$F2YZBt+Lw%PC/xEB].c4j<vi<X,%!{^3/()hRNmbDCpg|)xX`j');
define('SECURE_AUTH_KEY',  '<|Qk +XQ8qMX>wV~vJ+mKUxbkAWs+(@Mx[5J(3y8Qs[LD[%b{Us$-g8 a-L)xMT3');
define('LOGGED_IN_KEY',    '6muSB-x~;bE$4Ks.B}:y64t_|U_$4-TfipZFNo6;gG+#YSN.7}ih^FiE(#j%]Em+');
define('NONCE_KEY',        'qQ7]LKz}o*$W*m[x>?0zN=5~ p>[~&EG{V;PdA:ewkZ3k<(;B8Skgpj|CN1BfVX-');
define('AUTH_SALT',        '*mk:V9~*4?Ip;8[pGosh2n[xC6=e;9<+L8HLm;[/d`]mVe1YCRS~]l6J3n-.U@_T');
define('SECURE_AUTH_SALT', '@qObUU@?4yXrCGSWlHNeknXLWO5A]hMD$8E||=]S_#}XEglg.iz6tF$ W=&J.1~t');
define('LOGGED_IN_SALT',   '%O$53xd<;a_4H{g54#~s|0!?D551Z.k&jST9A[p36oMm]a170.[@_A57}f[z!0P5');
define('NONCE_SALT',       '2 .!;u77L^;Cr4fmE)2DDI;sc?]v6g<W#IXbItg`Nl=~7HmC:DH?jOZ]Yu)jMDFu');

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
