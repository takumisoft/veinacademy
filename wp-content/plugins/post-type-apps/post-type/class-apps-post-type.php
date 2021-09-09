<?php

if (!class_exists(' AppsPostType')) {
    class AppsPostType
    {
        private static $apps_plural = APPS_PLURAL_NAME; // Singular label
        private static $apps_description = APPS_DESCRIPTION; // Singular label

        public function __construct()
        {
            add_action('init', [$this, 'register_apps_post_type']);
        }

        // Create a new Post_type called 'pates'.
        public static function register_apps_post_type()
        {
            register_post_type(APPS_SLUG, [
                    'labels'              => [
                        'name'      => __('' . self::$apps_plural . '', 'app-text-domain'),
                        'menu_name' => __('' . self::$apps_plural . '', 'app-text-domain'), // Delete if it bugs
                    ],
                    'description'         => self::$apps_description,
                    'public'              => true,
                    'hierarchical'        => false,
                    'show_ui'             => true,
                    'show_in_nav_menus'   => true,
                    'supports'            => [
                        'title',
                        'thumbnail',
                        'excerpt',
                        'editor',
                    ],
                    'exclude_from_search' => false, // True is avoid showing in search.php results
                    'has_archive'         => true,
                    'publicly_queryable'  => true,
                    'rewrite'             => true,
                    'menu_icon'           => 'dashicons-smartphone',
                    'menu_position'       => 13, // Position in the menu; the higher the number, the lower the position
                    // This is where we add taxonomies to our CPT
//                    'taxonomies'          => array( 'category','post_tag' ),
                ]
            );
            //flush_rewrite_rules();
        }
    }
}

$apps_post_type = new AppsPostType();
