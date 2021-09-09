<?php

namespace Servier\Theme;

class ThemeFeatures
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'add_theme_support']);
        add_action('customize_register', [$this, 'remove_section'], 15);
        add_action('admin_init', [$this, 'remove_action']);
        add_action('admin_menu', [$this, 'add_theme_page']);
        add_action('admin_init', [$this, 'no_dates_uploads']);
    }

    public static function add_theme_support()
    {
        $args = [
            'search-form',
            'gallery',
            'caption'
        ];
        add_theme_support('html5', $args);
        // Customizer custom logo area (Site identity)
        add_theme_support('custom-logo', [
            'flex-width' => true,
        ]);
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
    }

    // Remove section custom colors
    public static function remove_section($wp_customize)
    {
        // Colors section
        $wp_customize->remove_section('colors');
        // Additional CSS section
        $wp_customize->remove_section('custom_css');
    }

    // Remove Admin Color Scheme options
    public static function remove_action()
    {
        remove_action('admin_color_scheme_picker', 'admin_color_scheme_picker');
    }

    // Add Site Identity to Theme.php menu
    public static function add_theme_page()
    {
        add_theme_page(__('Site Identity'), __('Site Identity'), 'manage_options', 'customize.php?autofocus[section]=title_tagline');
    }

    // Activate option to avoid creating upload/year/month/ directory.
    public static function no_dates_uploads()
    {
        $uploads_use_yearmonth_folders = get_option('uploads_use_yearmonth_folders', 1);
        if ($uploads_use_yearmonth_folders) {
            update_option('uploads_use_yearmonth_folders', 0);
        }
    }
}
