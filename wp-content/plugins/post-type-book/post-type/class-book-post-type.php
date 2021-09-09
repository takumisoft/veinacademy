<?php

if( !class_exists( ' BookPostType' )){
    class  BookPostType {
        private static $book_plural = BOOK_PLURAL_NAME; // Singular label
        private static $book_description = BOOK_DESCRIPTION; // Singular label

        public function __construct() {
            add_action('init', array($this, 'register_book_post_type'));
        }

        // Create a new Post_type called 'pates'.
        public static function register_book_post_type() {
            register_post_type(BOOK_SLUG, array(
                    'labels' => array(
                        'name' => __( ''.self::$book_plural.'', 'book-text-domain' ),
                        'menu_name' => __( ''.self::$book_plural.'', 'book-text-domain' ), // Delete if it bugs
                    ),
                    'description'         => self::$book_description,
                    'public' => true,
                    'hierarchical' => false,
                    'show_ui' => true,
                    'show_in_nav_menus' => true,
                    'supports' => array(
                        'title',
                        'thumbnail',
                        'excerpt',
                        'editor',
                    ),
                    'exclude_from_search' => false, // True is avoid showing in search.php results
                    'has_archive' => true,
                    'publicly_queryable'  => true,
                    'rewrite' => true,
                    'menu_icon' => 'dashicons-book-alt',
                    'menu_position' => 14, // Position in the menu; the higher the number, the lower the position
                    // This is where we add taxonomies to our CPT
//                    'taxonomies'          => array( 'category','post_tag' ),
                )
            );
            //flush_rewrite_rules();
        }
    }
}

$book_post_type = new BookPostType();
