<?php
/**
 * Plugin Name:       Case LMS
 * Plugin URI:        https://wpbrisko.com/wp-plugins
 * Description:       The Case LMS plugin is a Legal Management System, a simple way to organize and manage legal documents.
 * Version:           0.1.3
 * Requires at least: 3.4
 * Requires PHP:      7.4
 * Author:            wpbrisko.com
 * Author URI:        https://wpbrisko.com
 * Text Domain:       case-lms
 * Domain Path:       /languages
 * License:           GPLv2
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt.
 */

// start plugin.
if ( ! \defined( 'ABSPATH' ) ) {
    exit;
}

// Load composer.
require_once plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';

// The plugin.
$clms_documents = CaseLMS\Plugin::init();

// register document types.
$clms_documents->register_types();
