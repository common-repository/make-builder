<?php
/**
 * @package Make Builder
 */

/**
 * Autoloader for Make Builder classes.
 *
 * Based on an example implementation of PSR-4, but compatible with PHP 5.2.
 *
 * @link http://www.php-fig.org/psr/psr-4/examples/
 *
 * @since 1.0.0.
 *
 * @param string $class
 */
function make_builder_autoload( $class ) {
	// Prefix for all Make Builder classes
	$prefix = 'MAKE_';

	// Prefix character length
	$length = strlen( $prefix );

	// Does the current class have the required prefix?
	if ( 0 !== strncmp( $prefix, $class, $length ) ) {
		// No, move to the next registered autoloader.
		return;
	}

	// Base directory for all Make Builder classes
	$base_dir = make_get_plugin_directory() . 'inc/';

	// Class without the top-level prefix
	$relative_class = strtolower( substr( $class, $length ) );

	// Full path of the class file
	$file = $base_dir . str_replace( '_', '/', $relative_class ) . '.php';

	// Load the file if it exists and is readable
	if ( is_readable( $file ) ) {
		require_once $file;
	}
}

spl_autoload_register( 'make_builder_autoload' );