<?php

namespace Servier\Admin;

class AdminStyleSheet
{
    public function __construct()
    {
        add_action('admin_enqueue_scripts', [$this, 'enqueue_backend_stylesheet']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_frontend_stylesheet']);
    }

    // Enqueue in back-end
    public function enqueue_backend_stylesheet()
    {
        self::getStylesheet();
    }

    // Enqueue in front-end admin-bar
    public function enqueue_frontend_stylesheet()
    {
        if (!is_admin_bar_showing()) return;
        self::getStylesheet();
    }

    private static function getStylesheet()
    {
        return wp_enqueue_style('custom_admin_stylesheet', get_stylesheet_directory_uri() . '/build/admin-custom.css');
    }
}
