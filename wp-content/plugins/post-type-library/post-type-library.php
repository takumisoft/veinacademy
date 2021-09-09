<?php
/**
 * Plugin Name: PostType: Library
 * Description: Custom Library with custom post_type. Build by German Pichardo from Groupe 361
 * Version: 1.0
 * Author: Groupe 361
 * Author URI: http://www.groupe361.com
 * Text Domain: library-text-domain
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}
// These options comes straight from the BackOffice created from class-library-admin.php
// See Options-> Library Options
$library_define_slug = 'library';
// Labels
$library_label_option = get_field('pt_'.$library_define_slug.'_label', 'option');
$has_library_label_option = !is_null($library_label_option) && !empty($library_label_option);
$library_define_singular_name = $has_library_label_option ? $library_label_option : __( 'Library' );
$library_define_plural_name = $has_library_label_option ? $library_label_option : __( 'Library' );

define( 'LIBRARY_SLUG', $library_define_slug );
define( 'LIBRARY_SINGULAR_NAME', $library_define_singular_name );
define( 'LIBRARY_PLURAL_NAME', $library_define_plural_name );

// Description
$library_description_option = get_field('pt_'.$library_define_slug.'_description', 'option');
$has_library_description_option = !is_null($library_description_option) && !empty($library_description_option);
define( 'LIBRARY_DESCRIPTION', $has_library_description_option ? $library_description_option : '' );

/***************************************************
 *    INCLUDES
 ***************************************************/
require_once plugin_dir_path(__FILE__) . 'options-page/class-library-options-page.php'; // Admin option page

require_once plugin_dir_path(__FILE__) . 'acf-fields/class-library-acf-fields.php'; // ACF

require_once plugin_dir_path( __FILE__ ) . 'post-type/class-library-post-type.php'; // Custom post_type

require_once plugin_dir_path( __FILE__ ) . 'taxonomy/class-library-taxonomy.php'; // Custom individual taxonomies
