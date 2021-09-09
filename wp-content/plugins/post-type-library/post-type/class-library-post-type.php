<?php

if( !class_exists( ' LibraryPostType' )){
    class  LibraryPostType {
        private static $library_plural = LIBRARY_PLURAL_NAME; // Singular label
        private static $library_description = LIBRARY_DESCRIPTION; // Singular label

        public function __construct() {
            add_action('init', array($this, 'register_library_post_type'));
        }

        // Create a new Post_type called 'pates'.
        public static function register_library_post_type() {
            register_post_type(LIBRARY_SLUG, array(
                    'labels' => array(
                        'name' => __( ''.self::$library_plural.'', 'library-text-domain' ),
                        'menu_name' => __( ''.self::$library_plural.'', 'library-text-domain' ), // Delete if it bugs
                    ),
                    'description'         => self::$library_description,
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
                    'menu_icon' => 'dashicons-format-video',
                    'menu_position' => 15, // Position in the menu; the higher the number, the lower the position
                    // This is where we add taxonomies to our CPT
//                    'taxonomies'          => array( 'category','post_tag' ),
                )
            );
            //flush_rewrite_rules();
        }
    }
}

$library_post_type = new LibraryPostType();
