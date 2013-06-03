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
/** The name of the database for WordPress */
define('DB_NAME', '663857_target');

/** MySQL database username */
define('DB_USER', '663857_target');

/** MySQL database password */
define('DB_PASSWORD', 'Target899');

/** MySQL hostname */
define('DB_HOST', 'mysql51-033.wc2.dfw1.stabletransit.com');

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
define('AUTH_KEY',         '{IJ1WRwyBINKt@Fr[&IgD`0Y7u =rpsXdlfE.Wa#eX7b61n!]kb(dskL&UrEa+$ ');
define('SECURE_AUTH_KEY',  '&AO.-sgdT4!2Ks~t/SZ*eQiGyx:KXZTk)VNrB-%hENGe?)3`h45ge`31r@wF;-ag');
define('LOGGED_IN_KEY',    '#llI6,J`J]=,gym-fs-Ma&Y}Z2W:71coE><ZATe-JAzF)a,7KBX-m;+ iCr$<4T$');
define('NONCE_KEY',        '@jha}H##b+15B?|NBu0 TlOv8`nTUu++HS vw?H}sGtl3=(ymV~ew1qcb|=oL7Gu');
define('AUTH_SALT',        '${c-Di6h-;muBx~oM<Ix6]QW`!X9WrmNq4P+8y?`jM|0|<A~S53l|]^7 %;%7?{*');
define('SECURE_AUTH_SALT', '3k7qSJ^ar4z=k=H?@3-$-Hfp+JjeJ79C+7YR~[&dHw1^U g}[XX9JSV7[#ih%d=w');
define('LOGGED_IN_SALT',   'Np|oMS~!(##5Pcev=z}{@wW`n{.Jp-c85^`YPt,A=1;1/&mK0Cbz!M#4]x-o-bL9');
define('NONCE_SALT',       'Qf)[4<+m*Y}cgY(%k gukxG* d2/Vi>,:2,czUGz|ua!S-k6@qne~ak5=l>4ssz>');

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
