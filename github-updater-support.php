<?php
/**
 * Plugin Name:       GitHub Updater Support
 * Plugin URI:        https://github.com/afragen/github-updater-support
 * Description:       A support/troubleshooting plugin for use with GitHub Updater.
 * Version:           0.0.1
 * Author:            Andy Fragen
 * License:           MIT
 * Network:           true
 * GitHub Plugin URI: https://github.com/afragen/github-updater-support
 * Requires WP:       4.4
 * Requires PHP:      5.6
 */

add_filter( 'github_updater_disable_wpcron', '__return_true' );

include_once __DIR__ . '/vendor/autoload.php';

WP_Dependency_Installer::instance()->run( __DIR__ );
