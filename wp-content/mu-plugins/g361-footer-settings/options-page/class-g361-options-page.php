<?php

if (!class_exists(' G361OptionsPage')) {
    class G361OptionsPage
    {
        const menu_slug = THEME_SETTINGS_MENU_SLUG;

        public function __construct()
        {
            add_action('acf/init', [$this, 'add_options_page']);
        }

        public static function add_options_page()
        {
            if (function_exists('acf_add_options_page')) {

                acf_add_options_page([
                    'page_title' => 'Footer Settings',
                    'menu_title' => 'Footer',
                    'menu_slug'  => self::menu_slug,
                    'capability' => 'edit_posts',
                    'icon_url'   => 'dashicons-schedule',
                    'redirect'   => false,
                ]);
            }
        }
    }
}

$g361_options_page = new G361OptionsPage();
