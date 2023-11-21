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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'f3' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         ')IvSctFzz%9.^{&ccDglxL0sZZ3&loiqb/df2+u0sobeibw/|p0OdBZ7P^|`=bk+' );
define( 'SECURE_AUTH_KEY',  '/uYg@4?F?kA{6Z?C_?!w1On mf:;hD.?&Pd}P.1B#sg._IZn,:J!)LhaS|bZ4)Sc' );
define( 'LOGGED_IN_KEY',    '#EWEHvL|%uqmKo<$0Ly10rOmRqY0fMOp8]SG$f&e+e|^l&p}XRVyxzeZ]T0/Y+,o' );
define( 'NONCE_KEY',        'ag*w$ZKU,LeZpk*+D6.K?Y==$-3R:b(P^^va3Xs3[.r:rV41(x @_-LjlC.DUg5O' );
define( 'AUTH_SALT',        'c>5d>>6o:8Uh9o][o-G-5$s=>R;~op!ov%1~&3:o8OY5pS:4ITm8a({]C5Qr;f**' );
define( 'SECURE_AUTH_SALT', 'Dvd*:h n_.Ow#v8dJ^sgPl7+`T~k@|2e0F5PFVzN+9z*CeE(.){kl9e$f^MO4-&W' );
define( 'LOGGED_IN_SALT',   't{!/[.;/Wh>[~Nem-EyUPcOwI9N95in;n_AH6kKs]QgK?z+5PNYg`mKe1KDqjpdP' );
define( 'NONCE_SALT',       'X>:vKl(uNkXJIduRwt[xCg=%2+UxBEsrV09:<PhnsdQzLY~+j(Y/iJZ|Dd*6hQ:2' );

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
