<?php
/**
 * Plugin Name: PostType: Books
 * Description: Custom Book with custom post_type. Build by German Pichardo from Groupe 361
 * Version: 1.0
 * Author: Groupe 361
 * Author URI: http://www.groupe361.com
 * Text Domain: book-text-domain
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

$book_define_slug = 'book';
// Labels
$book_label_option = get_field('pt_'.$book_define_slug.'_label', 'option');
$has_book_label_option = !is_null($book_label_option) && !empty($book_label_option);
$book_define_singular_name = $has_book_label_option ? $book_label_option : __( 'Book' );
$book_define_plural_name = $has_book_label_option ? $book_label_option : __( 'Books' );

define( 'BOOK_SLUG', $book_define_slug );
define( 'BOOK_SINGULAR_NAME', $book_define_singular_name );
define( 'BOOK_PLURAL_NAME', $book_define_plural_name );

// Description
$book_description_option = get_field('pt_'.$book_define_slug.'_description', 'option');
$has_book_description_option = !is_null($book_description_option) && !empty($book_description_option);
define( 'BOOK_DESCRIPTION', $has_book_description_option ? $book_description_option : '' );

/***************************************************
 *    INCLUDES
 ***************************************************/
require_once plugin_dir_path(__FILE__) . 'options-page/class-book-options-page.php'; // Admin option page

require_once plugin_dir_path(__FILE__) . 'acf-fields/class-book-acf-fields.php'; // ACF

require_once plugin_dir_path( __FILE__ ) . 'post-type/class-book-post-type.php'; // Custom post_type