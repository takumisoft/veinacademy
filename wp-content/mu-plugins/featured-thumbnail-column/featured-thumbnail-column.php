<?php
/**
 * Plugin Name: Featured Thumbnail Columns
 * Description: Add a new column with feature thumbnail image for wordpress custom post_types
 * Version: 1.0.1
 * Author: German Pichardo
 * Author URI: http://www.german-pichardo.com
 */
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('FeaturedThumbnailColumn')) {
    class FeaturedThumbnailColumn
    {
        /**
         * Plugin initialization
         */
        public function __construct()
        {
            add_filter('manage_posts_columns', array($this, 'add_image'), 5);
            add_action('manage_pages_custom_column', array($this, 'add_column_data'), 10, 2);
            add_action('manage_posts_custom_column', array($this, 'add_column_data'), 10, 2);
            add_action('admin_head', array($this, 'add_inline_style'));
        }

        // Add featured thumbnail to admin post columns
        public function add_image($columns)
        {
            return array_merge( $columns,
                array('featured_thumbnail' => __('Image')) );
        }

        public function add_column_data($column, $post_id)
        {
            switch ($column) {
                case 'featured_thumbnail':
                    echo '<span class="media-icon">';
                    echo has_post_thumbnail() ? the_post_thumbnail('thumbnail') : '—';
                    echo '</span>';
                    break;
            }
        }

        // Add custom css
        public function add_inline_style()
        {
            echo '<style>
                    th#featured_thumbnail {
                      width: 90px;
                    } 
                    td.featured_thumbnail img {
                        max-width: 75px;
                        height: auto;
                    }
                </style>';
        }

    }
} // !class_exists
if (is_admin())
    if (isset($_GET['post_type']) && $_GET['post_type']) {
        if($_GET['post_type']) new FeaturedThumbnailColumn();
    }
