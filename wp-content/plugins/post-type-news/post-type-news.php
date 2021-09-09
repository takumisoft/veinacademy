<?php
/**
 * Plugin Name: PostType: News
 * Description: Custom News with custom post_type. Build by German Pichardo from Groupe 361
 * Version: 1.0
 * Author: Groupe 361
 * Author URI: http://www.groupe361.com
 * Text Domain: news-text-domain
 */
// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
    die;
}

$news_define_slug = 'news';
// Labels
$news_label_option = get_field('pt_'.$news_define_slug.'_label', 'option');
$has_news_label_option = !is_null($news_label_option) && !empty($news_label_option);
$news_define_singular_name = $has_news_label_option ? $news_label_option : __( 'News' );
$news_define_plural_name = $has_news_label_option ? $news_label_option : __( 'News' );

define( 'NEWS_SLUG', $news_define_slug );
define( 'NEWS_SINGULAR_NAME', $news_define_singular_name );
define( 'NEWS_PLURAL_NAME', $news_define_plural_name );

// Description
$news_description_option = get_field('pt_'.$news_define_slug.'_description', 'option');
$has_news_description_option = !is_null($news_description_option) && !empty($news_description_option);
define( 'NEWS_DESCRIPTION', $has_news_description_option ? $news_description_option : '' );

/***************************************************
 *    INCLUDES
 ***************************************************/

require_once plugin_dir_path(__FILE__) . 'options-page/class-news-options-page.php'; // Admin option page
require_once plugin_dir_path(__FILE__) . 'acf-fields/class-news-acf-fields.php'; // ACF
require_once plugin_dir_path( __FILE__ ) . 'post-type/class-news-post-type.php'; // Custom post_type
require_once plugin_dir_path( __FILE__ ) . 'taxonomy/class-news-taxonomy.php'; // Custom individual taxonomies
