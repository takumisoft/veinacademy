<?php
/**
 * Plugin Name: PostType: Editorial board
 * Description: Custom Editorial board with custom post_type. Build by German Pichardo from Groupe 361
 * Version: 1.0
 * Author: Groupe 361
 * Author URI: http://www.groupe361.com
 * Text Domain: editors-text-domain
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

$editors_define_slug = 'editors';
$editors_define_singular_name = __( 'Member' );
$editors_define_plural_name = __( 'Members' );

define( 'EDITORS_SLUG', $editors_define_slug );
define( 'EDITORS_SINGULAR_NAME', $editors_define_singular_name );
define( 'EDITORS_PLURAL_NAME', $editors_define_plural_name );

/***************************************************
 *    INCLUDES
 ***************************************************/

require_once plugin_dir_path(__FILE__) . 'acf-fields/class-editors-acf-fields.php'; // ACF

require_once plugin_dir_path( __FILE__ ) . 'post-type/class-editors-post-type.php'; // Custom post_type
require_once plugin_dir_path( __FILE__ ) . 'taxonomy/class-editors-taxonomy.php'; // Custom individual taxonomies
