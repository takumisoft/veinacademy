<?php

if (!class_exists(' WebsitePostType')) {
    class  WebsitePostType
    {
        private static $website_plural = WEBSITE_PLURAL_NAME; // Singular label
        private static $website_description = WEBSITE_DESCRIPTION; // Singular label

        public function __construct()
        {
            add_action('init', [$this, 'register_website_post_type']);
        }

        // Create a new Post_type called 'pates'.
        public static function register_website_post_type()
        {
            register_post_type(WEBSITE_SLUG, [
                    'labels'              => [
                        'name'      => __('' . self::$website_plural . '', 'website-text-domain'),
                        'menu_name' => __('' . self::$website_plural . '', 'website-text-domain'), // Delete if it bugs
                    ],
                    'description'         => self::$website_description,
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
                    'menu_icon'           => 'dashicons-welcome-view-site',
                    'menu_position'       => 12, // Position in the menu; the higher the number, the lower the position
                    // This is where we add taxonomies to our CPT
//                    'taxonomies'          => array( 'category','post_tag' ),
                ]
            );
            //flush_rewrite_rules();
        }
    }
}

$website_post_type = new WebsitePostType();
