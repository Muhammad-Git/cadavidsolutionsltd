<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'staging_cadad' );

/** Database username */
define( 'DB_USER', 'staging_cadad' );

/** Database password */
define( 'DB_PASSWORD', 'N2eFXAWsZ0as' );

/** Database hostname */
define( 'DB_HOST', '' );

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
define( 'AUTH_KEY',         '&yT9~FTK|.QP74:Ln;p|s5^SmENQv;(RSnPX}-HXY~fN<WTL@Hn<;~8/$%(Z3oap' );
define( 'SECURE_AUTH_KEY',  'D$SrG2^?}>sn.[9l^F6s3:LBs4Ql%/>A~$Vp/~Q{vK2a~D5<U20-tvs^sm`+Iyc,' );
define( 'LOGGED_IN_KEY',    '#%kWUnX7HP<ItJ!O5jmYJ>r &eCT#`s.%j5_eOH(Pg6I[-[Okk(2.~)O`RUXc=QO' );
define( 'NONCE_KEY',        'v)Y|i(9OW9=XM(}_hb(/EdM`snM?C0:ZFRV#;{ycY)+#4;b6 JiCpBAj.6VpZ.vz' );
define( 'AUTH_SALT',        'kHQpvj%^0Q[G$Z!/HVm)=4k_D%I=RJidYwnH}:Cl:RRq~e*oh9oSM 1$*M&a&i0^' );
define( 'SECURE_AUTH_SALT', '!5Mvhai&>7I>!mSRbqbe3WXfhzd wdU2peI9Ct$y]Ih8HQ{f#K`Is2;N)GD1&O9=' );
define( 'LOGGED_IN_SALT',   '8Ly|i)[p=zC3L %UlQZd3r_]GlrqSZ)Y`a{<a&cXdVP!64;@7UIn7;EMy@XMu0@Y' );
define( 'NONCE_SALT',       '`aBl4pihDCC!@E8^&-g,$}O=-{*S9Bm`|kS#ouH0zKHmTsS(Q-TR 2JQo_CIT){`' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
