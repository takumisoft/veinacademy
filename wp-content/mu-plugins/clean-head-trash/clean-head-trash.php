<?php
/**
 * Plugin Name: Clean Head Trash
 * Description: Remove unnecessary resources from Wordpress front-end head area.
 * Version: 1.0.1
 * Author: German Pichardo
 * Author URI: http://www.german-pichardo.com
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

if( !class_exists( ' CleanHeadTrash' )){
    class  CleanHeadTrash {

        public function __construct() {
            add_action('init', array($this, 'cleanup_head'));
            add_action('widgets_init', array($this, 'cleanup_recent_comments_style'));
        }

        public function cleanup_head() {
            $this->cleanup_miscellaneous();
            $this->cleanup_wp_generator();
            $this->cleanup_emoji();
            $this->cleanup_rel_link();
            $this->cleanup_oEmbed();
            $this->cleanup_feed_links();
            $this->cleanup_offline_editors();
            $this->cleanup_wp_custom_css_cb();
        }
        // WordPress cleanup miscellaneous functions
        public static function cleanup_miscellaneous() {
            remove_action('wp_head', 'rest_output_link_wp_head', 10); // Remove head wp-json
            remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // Shortlink meta tag
            remove_action('publish_future_post', 'check_and_publish_future_post', 10, 1);
            // Need to pay attention :
            remove_action('wp_head', 'noindex', 1);
            remove_action('wp_head', 'rel_canonical');
        }

        // WordPress cleanup:  Displays the WordPress version information
        public static function cleanup_wp_generator() {
            remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook
            add_filter('the_generator', '__return_false');            // #6
        }

        // WordPress cleanup emoji
        // feature option : define( 'WP_EMOICONS', false );
        public static function cleanup_emoji() {
            remove_action('wp_head', 'print_emoji_detection_script', 7);
            remove_action('admin_print_scripts', 'print_emoji_detection_script');
            remove_action('wp_print_styles', 'print_emoji_styles');
            remove_action('admin_print_styles', 'print_emoji_styles');
        }

        // Post meta information
        public static function cleanup_rel_link() {
            remove_action('wp_head', 'index_rel_link'); // Removes the index link
            remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Removes the prev link
            remove_action('wp_head', 'start_post_rel_link', 10, 0); // Removes the start link
            remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
            remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Removes the relational links for the posts adjacent to the current post.
        }

        // WordPress cleanup oEmbed
        public static function cleanup_oEmbed() {
            remove_action('rest_api_init', 'wp_oembed_register_route'); // Remove the REST API endpoint.
            // Turn off oEmbed auto discovery.
            remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10); // Don't filter oEmbed results.
            remove_action('wp_head', 'wp_oembed_add_discovery_links'); // Remove oEmbed discovery links.
            remove_action('wp_head', 'wp_oembed_add_host_js'); // Remove oEmbed-specific JavaScript from the front-end and back-end.
        }

        // WordPress cleanup feed_links
        public static function cleanup_feed_links() {
            remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
            remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
        }

        // Removing the Offline Editor Open Interface
        public static function cleanup_offline_editors() {
            remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
            remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
        }

        // Removing wp_custom_css_cb
        public static function cleanup_wp_custom_css_cb() {
            // Disable Custom CSS
            remove_action( 'wp_head', 'wp_custom_css_cb', 11 );
            remove_action( 'wp_head', 'wp_custom_css_cb', 101 );
        }

        // Remove recent comments style
        public function cleanup_recent_comments_style() {
            global $wp_widget_factory;
            remove_action('wp_head', array(isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments']), 'recent_comments_style'));
        }

    }
} // !class_exists

$clean_head_trash = new CleanHeadTrash();
