<?php

namespace Servier\Front;

class Head
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('wp_head', [$this, 'web_app_capabilities']);
    }

    /**************************************************
     * Enqueue scripts and styles on head
     * Note: get_stylesheet_directory() Goes to child theme
     * get_template_directory_uri() Goes to Parent Theme
     ***************************************************/

    public function enqueue_scripts()
    {
        if (is_admin()) return;
        // theme.css:
        wp_enqueue_style('default', get_stylesheet_directory_uri() . '/build/theme.css', false, $this->cache_busting_version(get_stylesheet_directory() . '/build/theme.css'));
        // theme.js:
        wp_enqueue_script('theme-build', get_template_directory_uri() . '/build/theme.js', ['jquery'], $this->cache_busting_version(get_template_directory() . '/build/theme.js'), true);
    }

    // Web app capability - Navigation bar color on mobiles devices

    /**
     * @param string $file_path must contain the absolute path and NOT the url
     * @return string of version number key.
     */
    public function cache_busting_version($file_path)
    {
        $cache_busting_version = file_exists($file_path) ? '.' . filemtime($file_path) : '';
        if (WP_DEBUG === true) // If debug is active in development
            return '1.1.' . time();
        return '1.0' . $cache_busting_version;
    }

    /**************************************************
     * Generate version number for cache busting purposes
     ***************************************************/

    public function web_app_capabilities()
    { ?>
        <?php echo '<!-- web_app_capabilities -->' . "\n"; ?>
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="msapplication-TileColor" content="#0072ba">
        <?php echo '<!-- web_app_capabilities -->' . "\n"; ?>
    <?php }

}
