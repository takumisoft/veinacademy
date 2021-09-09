<?php

if (!class_exists(' AppsOptionsPage')) {
    class AppsOptionsPage
    {
        const menu_slug = APPS_SLUG;

        public function __construct()
        {
            add_action('acf/init', [$this, 'add_options_page']);
            add_filter('plugin_action_links', [$this, 'add_settings_link'], 10, 2);
        }

        public static function add_options_page()
        {
            if (function_exists('acf_add_options_sub_page')) {

                acf_add_options_sub_page([
                    'page_title'      => 'Options',
                    'menu_title' => ucfirst(self::menu_slug) . ' Options',
                    'parent_slug'     => 'edit.php?post_type=' . self::menu_slug,
                    'capability' => 'edit_posts',
                ]);
            }
        }

        public function add_settings_link($links, $file)
        {
            $this_plugin = plugin_basename('post-type-' . self::menu_slug . '/post-type-' . self::menu_slug . '.php');
            if (is_plugin_active($this_plugin) && $file == $this_plugin) {
                $links[] = '<a href="' . admin_url('edit.php?post_type=' . self::menu_slug . '&page=acf-options-' . self::menu_slug . '-options') . '">' . __('Settings', self::menu_slug) . '</a>';
            }

            return $links;

        } // end add_settings_link
    }
}

$apps_options_page = new AppsOptionsPage();
