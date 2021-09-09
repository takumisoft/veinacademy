<?php
/**
 * Plugin Name: G361: Theme Settings
 * Description: Custom options page with acf pro fields. Build by German Pichardo from Groupe 361
 * Version: 1.0
 * Author: German Pichardo
 * Author URI: http://www.groupe361.com
 * Text Domain: g361-theme-settings
 */
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

define('THEME_SETTINGS_MENU_SLUG', 'footer-settings');

/***************************************************
 *    INCLUDES
 ***************************************************/

require_once plugin_dir_path(__FILE__) . 'options-page/class-g361-options-page.php';
require_once plugin_dir_path(__FILE__) . 'acf-fields/class-g361-acf-fields.php';
