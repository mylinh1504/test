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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
define('SAVEQUERIES',true);
// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'dbwordpre' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '123456788' );

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
define( 'AUTH_KEY',         '|I/C4,wj/nl:eZ,9OSw&=xCqYhd)6$P^|=w/tB}SW;,<d-#3_Jm=E=@sLO?os#qf' );
define( 'SECURE_AUTH_KEY',  'QFCaPObU/7 q2pWU>jfYE0.`{BiA_3L9d8U|GJ.{n1SX:6;*[_Z f|2M$,NK@<Om' );
define( 'LOGGED_IN_KEY',    '7PJ9e;FGSP})`]@vDF}8_6p&uh{XUJTmML6PB|hm%g!bR&E}3UOilSY*6zv;(_wM' );
define( 'NONCE_KEY',        'SdxTkaw}J(:7=p $OptfXV^d62#uiwoNQcv0;I(|^><F^xu(*=(|FAK+2wU%T$i.' );
define( 'AUTH_SALT',        'PS$4YePRSk(DG<4z`3Cw{Hc#WE{K?Wx7P.FQ^pl%=:^o#vweFlfLHq_zFzRF3%%5' );
define( 'SECURE_AUTH_SALT', 'X*Vrj,oDHS$rD;@<vf}7~@)EXO0c5GT^{EvoaodjRC1q>yZ*wZs<Iv%W8lzi&w}g' );
define( 'LOGGED_IN_SALT',   't#!#EuYK,vm94v>/qPnBWr2immg NN#|{Kv)wTE^5e}tCHXA5c]=} kBS:FPt{PR' );
define( 'NONCE_SALT',       '{`P#wLShU|mQ=9E0Af!hM9VQPuCZC<Fok^r9iwZig[n&6sYQ;x[yfUx`86mm1z6R' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */

 
 define( 'WP_DEBUG', true );

// Enable Debug logging to the /wp-content/debug.log file
define( 'WP_DEBUG_LOG', true );

// Disable display of errors and warnings
define( 'WP_DEBUG_DISPLAY', false );
@ini_set( 'display_errors', 0 );

// Use dev versions of core JS and CSS files (only needed if you are modifying these core files)
define( 'SCRIPT_DEBUG', true );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
