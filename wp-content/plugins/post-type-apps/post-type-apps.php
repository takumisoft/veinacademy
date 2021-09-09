<?php
/**
 * Plugin Name: PostType: Apps
 * Description: Custom App with custom post_type. Build by German Pichardo from Groupe 361
 * Version: 1.0
 * Author: Groupe 361
 * Author URI: http://www.groupe361.com
 * Text Domain: apps-text-domain
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

$apps_define_slug = 'apps';
// Labels
$apps_label_option = get_field('pt_'.$apps_define_slug.'_label', 'option');
$has_apps_label_option = !is_null($apps_label_option) && !empty($apps_label_option);
$apps_define_singular_name = $has_apps_label_option ? $apps_label_option : __( 'App' );
$apps_define_plural_name = $has_apps_label_option ? $apps_label_option : __( 'Apps' );

define( 'APPS_SLUG', $apps_define_slug );
define( 'APPS_SINGULAR_NAME', $apps_define_singular_name );
define( 'APPS_PLURAL_NAME', $apps_define_plural_name );

// Description
$apps_description_option = get_field('pt_'.$apps_define_slug.'_description', 'option');
$has_apps_description_option = !is_null($apps_description_option) && !empty($apps_description_option);
define( 'APPS_DESCRIPTION', $has_apps_description_option ? $apps_description_option : '' );

/***************************************************
 *    INCLUDES
 ***************************************************/
require_once plugin_dir_path(__FILE__) . 'options-page/class-apps-options-page.php'; // Admin option page

require_once plugin_dir_path(__FILE__) . 'acf-fields/class-apps-acf-fields.php'; // ACF

require_once plugin_dir_path( __FILE__ ) . 'post-type/class-apps-post-type.php'; // Custom post_type