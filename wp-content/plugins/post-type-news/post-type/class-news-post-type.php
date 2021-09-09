<?php

if (!class_exists(' NewsPostType')) {
    class  NewsPostType
    {
        private static $news_plural = NEWS_PLURAL_NAME; // Singular label
        private static $news_description = NEWS_DESCRIPTION; // Singular label

        public function __construct()
        {
            add_action('init', [$this, 'register_news_post_type']);
        }

        // Create a new Post_type called 'pates'.
        public static function register_news_post_type()
        {
            register_post_type(NEWS_SLUG, [
                    'labels'              => [
                        'name'      => __('' . self::$news_plural . '', 'news-text-domain'),
                        'menu_name' => __('' . self::$news_plural . '', 'news-text-domain'), // Delete if it bugs
                    ],
                    'description'         => self::$news_description,
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
                    'menu_icon'           => 'dashicons-media-spreadsheet',
                    'menu_position'       => 11, // Position in the menu; the higher the number, the lower the position
                    // This is where we add taxonomies to our CPT
                    'taxonomies'          => ['category'],
                ]
            );
            //flush_rewrite_rules();
        }
    }
}

$news_post_type = new NewsPostType();
