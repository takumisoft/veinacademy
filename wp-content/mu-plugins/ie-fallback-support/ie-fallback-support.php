<?php
/**
 * Plugin Name: IE fallback support
 * Description: Support for modern features for legacy Internet Explorer versions (html5shiv, respond, selectivizr).
 * Version: 1.0.1
 * Author: German Pichardo
 * Author URI: http://www.german-pichardo.com
 */
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}
if (!class_exists(' IeFallBackSupport')) {
    class  IeFallBackSupport
    {
        // This script is the defacto way to enable use of HTML5 sectioning elements in legacy Internet Explorer.
        static $html5shiv_Version = '3.7.3';
        // A fast & lightweight polyfill for min/max-width CSS3 Media Queries (for IE 6-8, and more)
        static $respond_Version = '1.4.2';
        // selectivizr is a JavaScript utility that emulates CSS3 pseudo-classes and attribute selectors in Internet Explorer 6-8.
        static $selectivizr_Version = '1.0.3';

        public function __construct()
        {
            add_action('wp_head', array($this, 'ie_fallback_support'), 8);
        }

        public static function ie_fallback_support()
        {
            if (is_admin()) return;
            echo '<!--[if lt IE 9]>' . "\n";
            echo '<script src="' . esc_url('https://cdn.jsdelivr.net/html5shiv/' . self::$html5shiv_Version . '/html5shiv.min.js') . '"></script>' . "\n";
            echo '<script src="' . esc_url('https://cdn.jsdelivr.net/respond/' . self::$respond_Version . '/respond.min.js') . '"></script>' . "\n";
            echo '<script src="' . esc_url('https://cdn.rawgit.com/gisu/selectivizr/' . self::$selectivizr_Version . '/selectivizr.js') . '"></script>' . "\n";
            echo '<![endif]-->' . "\n";
        }
    }
}
if (!is_admin()) new IeFallBackSupport();
