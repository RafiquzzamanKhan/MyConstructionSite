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
define( 'DB_NAME', 'construction_site' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         's._)ZE>%IU0j+=3n2!+I*+Ic8sL[X&xZA^l?O/Javk,<dEVdxvZ U:f8&_:vZhc%' );
define( 'SECURE_AUTH_KEY',  '(BYlngl|04ER3`dhJ,}Ube$G%,+o^YT|,n{%}B+M~DLeD535R|a`{60~ OV#H@>~' );
define( 'LOGGED_IN_KEY',    '|v|/ctu.j|6`~:#`q{eo`)5Y?:%M/h+poWMth0+bYV5JBff#TM7)6)y.z986cDv1' );
define( 'NONCE_KEY',        'v0N|P7l!b1MgQ%HVNsL4zH:)IY)xN]&t_pm,2EV=5IVVR{Csb%nZ;6,^OZ-fjNt{' );
define( 'AUTH_SALT',        '5S2KBi(0/?fcI^$@pDl|wgBvaz<|.{0|9uvR7vI,sO=#HT%Bc$ht3uH~y:ZD)ZFa' );
define( 'SECURE_AUTH_SALT', 'DI5>r!o2quX:sjP5_i9}CwXX>;>b4(,>DSTUmqS.womIG?^`gF7{8N#%>`RS.-V}' );
define( 'LOGGED_IN_SALT',   'q;eHr:+#lWACc!WNKnzRl; dxMs;Y~m|T|zyZ>jILmb%Ewivu->tbF&ekgD<`F3.' );
define( 'NONCE_SALT',       'C+1(U$&*h)3$C$_ETC$b)0EdV@1XnHb8bs0d!oFROJzrL!Q@z`w$0i>E{SaquvUZ' );

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
