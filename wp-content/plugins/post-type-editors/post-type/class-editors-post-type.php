<?php

if (!class_exists(' EditorsPostType')) {
    class  EditorsPostType
    {
        private static $editors_singular = EDITORS_SINGULAR_NAME; // Singular label
        private static $editors_plural = EDITORS_PLURAL_NAME; // Singular label

        public function __construct()
        {
            add_action('init', [$this, 'register_editors_post_type']);
        }

        // Create a new Post_type called 'pates'.
        public static function register_editors_post_type()
        {
            register_post_type(EDITORS_SLUG, [
                    'labels'              => [
                        'name'          => __('' . self::$editors_plural . '', 'editors-text-domain'),
                        'singular_name' => __('' . self::$editors_singular . '', 'editors-text-domain'),
                        'add_new'       => __('add new ' . self::$editors_singular . '', 'editors-text-domain'),
                        'menu_name'     => __('Editorial board', 'editors-text-domain'),
                    ],
                    'description'         => '',
                    'public'              => true,
                    'hierarchical'        => false,
                    'show_ui'             => true,
                    'show_in_nav_menus'   => true,
                    'supports'            => [
                        'title',
                        'editor',
                        'thumbnail',
                    ],
                    'exclude_from_search' => true, // True is avoid showing in search.php results
                    'has_archive'         => false,
                    'publicly_queryable'  => false,
                    'rewrite'             => true,
                    'menu_icon'           => 'dashicons-groups',
                    'menu_position'       => 20, // Position in the menu; the higher the number, the lower the position
                ]
            );
            //flush_rewrite_rules();
        }
    }
}

$editors_post_type = new EditorsPostType();
