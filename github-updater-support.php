<?php
/**
 * Plugin Name:       GitHub Updater Support
 * Plugin URI:        https://github.com/afragen/github-updater-support
 * Description:       A support/troubleshooting plugin for use with GitHub Updater.
 * Version:           1.5.0
 * Author:            Andy Fragen
 * License:           MIT
 * Network:           true
 * Text Domain:       github-updater-support
 * GitHub Plugin URI: https://github.com/afragen/github-updater-support
 * Requires WP:       4.6
 * Requires PHP:      5.6
 */

require_once __DIR__ . '/vendor/autoload.php';

WP_Dependency_Installer::instance()->run( __DIR__ );

add_filter( 'github_updater_disable_wpcron', '__return_true' );

// Sanity check for WPDI v3.0.0.
if ( ! method_exists( 'WP_Dependency_Installer', 'json_file_decode' ) ) {
	add_action(
		'admin_notices',
		function() {
			$class   = 'notice notice-error is-dismissible';
			$label   = __( 'GitHub Updater Support', 'test-dependency-installer' );
			$file    = ( new ReflectionClass( 'WP_Dependency_Installer' ) )->getFilename();
			$message = __( 'Another theme or plugin is using a previous version of the WP Dependency Installer library, please update this file and try again:', 'group-plugin-installer' );
			printf( '<div class="%1$s"><p><strong>[%2$s]</strong> %3$s</p><pre>%4$s</pre></div>', esc_attr( $class ), esc_html( $label ), esc_html( $message ), esc_html( $file ) );
		},
		1
	);
	return false; // Exit early.
}
