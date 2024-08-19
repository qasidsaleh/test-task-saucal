<?php
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

require_once realpath(__DIR__.'/vendor/autoload.php');

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

define('ENVIRONMENT_LOC', 'local');
define('ENVIRONMENT_STAGE', 'staging');
define('ENVIRONMENT_PROD', 'prod');
define('ENVIRONMENT', getenv('ENVIRONMENT'));

/** no errors on production **/
if (ENVIRONMENT === ENVIRONMENT_PROD) {
	error_reporting(0);
	@ini_set('display_errors', 0);
}

/** setting vars depending on env **/
if (ENVIRONMENT === ENVIRONMENT_PROD) {
    define( 'WP_HOME', getenv('PROD_VHOST') );
    define( 'WP_SITEURL', getenv('PROD_VHOST') );
} elseif (ENVIRONMENT === ENVIRONMENT_STAGE) {
    define( 'WP_HOME', getenv('STAGE_VHOST') );
    define( 'WP_SITEURL', getenv('STAGE_VHOST') );
} else {
    define( 'WP_HOME', getenv('LOC_VHOST') );
    define( 'WP_SITEURL', getenv('LOC_VHOST') );
}

define('DB_USER', getenv('DB_USER'));
define('DB_PASSWORD', getenv('DB_PASSWORD'));
define('DB_HOST', getenv('DB_HOST') . ( getenv('DB_PORT') ? ':' . getenv('DB_PORT') : '' ));
define('DB_NAME', getenv('DB_NAME'));
define('SAVEQUERIES', (bool) getenv('DB_SAVE_QUERIES'));
$table_prefix  = getenv('DB_PREFIX');
define('WP_DEBUG', (bool) getenv('WP_DEBUG'));

define( 'DISABLE_WP_CRON', true );

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
define( 'AUTH_KEY',          '*^dBC?,LNMRdO+-JGY*]6^0?k&~bBRK-CEPak?C`O2Qx<Ey72MOPD}1<W2?Kv^H:' );
define( 'SECURE_AUTH_KEY',   'a<WV:j9Y#J{qFbUgjH0%ZFGSLpaxz0j&#3dfe9>v+qSv:;#X(!$Ry^$--~egMo~y' );
define( 'LOGGED_IN_KEY',     'W88?|*Nl]jc4nDuh4~UwZ*sO+5{^[Q43XlqOchO,~RNx EE=+0|e_JBi~LgcNeJG' );
define( 'NONCE_KEY',         'b[p^,Ze6O2@lS1&7@*.fb.~oieaTYdT.fKS/60|-URK2-qW4qT/6Vz:cROO]fO}0' );
define( 'AUTH_SALT',         'e<Cv!<9O=s$4.9eA9|tn:XVD`PpHdiUgpu72K03I#jRco6-Z]RXym/y*c/ehkxd[' );
define( 'SECURE_AUTH_SALT',  'tycPC;_B1CfJ*w9&o~C]2+ z1@V]HW$TOADZoy1lTR(izcU9=;p*KjjEW+txeH3)' );
define( 'LOGGED_IN_SALT',    ')B0:5)GSOC/{{o@aCxIVe)P$*($RylYmIX25h7/45o^*:fgJV4ARVZ-p5]pL]ct=' );
define( 'NONCE_SALT',        '$S 8_^?bjf+!Az6d{g-8)W^EdpB_GwdXhQr1p608%2g^S/o}sHn5zu0^$}lD=R?T' );
define( 'WP_CACHE_KEY_SALT', 'i*Rpii8hq-0szFP]+MN4vp^U(RQAe7;R-y}cR<S8~o[`f%PP^Sf;9=6<^u)wZ@pY' );

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', true );
}
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG_LOG', true );
define( 'DISALLOW_FILE_EDIT', true );
//define( 'DISABLE_WP_CRON', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
