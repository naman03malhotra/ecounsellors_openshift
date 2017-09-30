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
define('DB_NAME', 'blog');

/** MySQL database username */
define('DB_USER', 'adminUmpBL8L');

/** MySQL database password */
define('DB_PASSWORD', 'P8TVALF6MRah');

/** MySQL hostname */
define('DB_HOST', '567d2ac789f5cfa4e30001cd-counselors.rhcloud.com:57421');

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
define('AUTH_KEY',         ')}V8#_F<-`KbcA1(fWtg,QalVLyjjg>_JBF:O%;|q*tzrG:;;1+joyfj9FyQ9yZw');
define('SECURE_AUTH_KEY',  ':2?*rKj-6{SeZtJBM.0rQFe.{Y&IFf]{ xG[-sYQ(+_PLPx&1}Rvp5`+@5BR3qYg');
define('LOGGED_IN_KEY',    '5];2+zn+~HK)VZW(ISD1%bPS1XOxC&hre[8;*bvtU=ST:Z-kIMZb?+w#@C_wW5(>');
define('NONCE_KEY',        ']!;8&lv(v+p~UZP/lbH8`6->Yjf;9eC.y^q$<c#qKTXTc*6lf-n(]~B4ulDW{{ys');
define('AUTH_SALT',        '4?U)|b|}n+|;8KKS^/?=TLX-1Y41#[Z ISq#pJ-/cTl_^^rz%B,YIHJAmu[]`Dh_');
define('SECURE_AUTH_SALT', ':<G<JId:2xIYU(X_ $vD,U0inXN-v1sRs6uT~G8.;(+c_b04 :lw}+!V@VxwbS{Y');
define('LOGGED_IN_SALT',   '#1<JF> ^]!.xC>v!z+x>m|:2w`d`|bn |1BzI_V|(|Um(sL%rIlMXUmXn#DT@KjN');
define('NONCE_SALT',       'x@i_m+p -Moyvg:-Ci9v6=$l-S]N!qd*Bv]O>=G%KYx9=dp/OZ#xF/3nlf1eZB46');

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
