<?php
/**
 * Plugin Name: PostType: Website
 * Description: Custom Website with custom post_type. Build by German Pichardo from Groupe 361
 * Version: 1.0
 * Author: Groupe 361
 * Author URI: http://www.groupe361.com
 * Text Domain: website-text-domain
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

$website_define_slug = 'website';

// Labels
$website_label_option = get_field('pt_'.$website_define_slug.'_label', 'option');
$has_website_label_option = !is_null($website_label_option) && !empty($website_label_option);
$website_define_singular_name = $has_website_label_option ? $website_label_option : __( 'Website' );
$website_define_plural_name = $has_website_label_option ? $website_label_option : __( 'Websites' );

define( 'WEBSITE_SLUG', $website_define_slug );
define( 'WEBSITE_SINGULAR_NAME', $website_define_singular_name );
define( 'WEBSITE_PLURAL_NAME', $website_define_plural_name );

// Description
$website_description_option = get_field('pt_'.$website_define_slug.'_description', 'option');
$has_website_description_option = !is_null($website_description_option) && !empty($website_description_option);
define( 'WEBSITE_DESCRIPTION', $has_website_description_option ? $website_description_option : '' );

/***************************************************
 *    INCLUDES
 ***************************************************/
require_once plugin_dir_path(__FILE__) . 'options-page/class-website-options-page.php'; // Admin option page

require_once plugin_dir_path(__FILE__) . 'acf-fields/class-website-acf-fields.php'; // ACF

require_once plugin_dir_path( __FILE__ ) . 'post-type/class-website-post-type.php'; // Custom post_type