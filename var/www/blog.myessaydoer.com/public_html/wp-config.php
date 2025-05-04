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
define( 'DB_NAME', 'myessaydoerblog' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '9212Manu' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '|$P6Qo:3A9DC|nI4e[rn7?U4ylVE%|k)8|lB]v&;~D=LHaW6benVeeb)`9 d@n7B');
define('SECURE_AUTH_KEY',  '_|>u=d${77zB>JHe`U/_%<Mu+T|QWH?5I.e]M{)X?uqsHoDFRoVd;Wc*[!F>-S|-');
define('LOGGED_IN_KEY',    'dH+>|o9=~x?dlaaZ8MVjiz/2)!`j#(t`l|n4j8i>O)`SqTfaMAKbQe:r4S@X1bi3');
define('NONCE_KEY',        'g;V3FS$j[Uuf4cHi#xu (US-z[;)d>;h34_|o}i>+c{JPo4jUA=F_V~v}%2+,t|L');
define('AUTH_SALT',        '}Ky/}mP XzUU6XJprXZsg+bhrUMNsMB-qoJg|lUtOp>u8|KZMpc%,9V-E+{2j(wE');
define('SECURE_AUTH_SALT', ')[86Ij[ih8T4!3dJWA,d)+O9kZy]tEYh^QNt=pH)#qS]XA>dRX-!lW0(B`(]G-o;');
define('LOGGED_IN_SALT',   ' gmTb#aidV{cgQT6Dx5hhHT]S*IWIgM$]U(JiIOX+r7:R2.*[oM1_+UAAO*(%^:d');
define('NONCE_SALT',       '(8i594Q2v:F_c+nOxY6%G$=n?wow*x}C*tsK:aZRfa[<qMh-o6eDTbIK._.R0oaE');
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
