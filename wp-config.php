<?php
define( 'WP_CACHE', false ); // Added by WP Rocket



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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'u555918207_iUjDW' );

/** Database username */
define( 'DB_USER', 'u555918207_Wj7Bj' );

/** Database password */
define( 'DB_PASSWORD', 'v2lr1MnTtN' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'N9}NCxEk7-}YGCZ2l{3:) FS}O<H6twEc<JB_S#6e5T`Xe]3IS*?t`A,Z}An.3Iu' );
define( 'SECURE_AUTH_KEY',   '[bMM[%9@;-&ru><|sY*KG <hqF O!?GoH#Ltm%zAUZ!Wb%9OQb@58I%^GNMo3]%p' );
define( 'LOGGED_IN_KEY',     ']wbwfkU9:W,w/sXzc^#LmdG<,]4,:PkB?Rv(GX4i>N/5`?38>>|On@&;r%7?`[vq' );
define( 'NONCE_KEY',         '.Liul;?4H;&%zUM}fe GD617]=$%*bI4~cz#q;L)y.w b|fAqN ^A%OxM+`@/13x' );
define( 'AUTH_SALT',         'O~9U_pd QJ44:l7?v=!EAt*!_heB`l7^PBd?ce1.;rZg|gq/GiNCM` 0LQ)1;f%0' );
define( 'SECURE_AUTH_SALT',  '}(6SXMC9d3?8*},wT9H6kx^ow([s3P-Q$HBP5#LW2PzGjqQ(>}a{lQoaH9uAf<]{' );
define( 'LOGGED_IN_SALT',    'oFA/j&:zT6+b-<)Zf 7`euJzy<V2j5}%S6wJq|;TOq KM?A*afHa{QuYXr%/]pz)' );
define( 'NONCE_SALT',        'w,+_zlGu  c/w20maeiw oYbCdUOjj{?$Dy]98d`4,P?*rL|$?oNT]_h[qUJGYG_' );
define( 'WP_CACHE_KEY_SALT', 'BNO2UR6$Np=wg[c#%`/jrMpg<O?Qg7wi?`3V_2~4sO]-qW}>/)/wo+Mdz75gYeoq' );


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
define( 'WP_DEBUG', false );


/* Add any custom values between this line and the "stop editing" line. */



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
