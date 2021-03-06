<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Woocommerce_Bundle_Choice_Design_Pattern
 */

$_tests_dir = getenv( 'WP_TESTS_DIR' );
$_wp_dir = getenv('WP_CORE_DIR');

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! $_wp_dir ) {
	$_wp_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	$_wp_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress';
	require_once $_wp_dir.'/wp-content/plugins/woocommerce/woocommerce.php';
	require dirname( dirname( __FILE__ ) ) . '/woocommerce-bundle-choice.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
