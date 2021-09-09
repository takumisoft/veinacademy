<?php

namespace Servier\Admin;

class AdminSidebar
{
    public function __construct()
    {
        if (!is_admin()) return;
        add_action('admin_menu', [$this, 'remove_menu_entries']);
    }

    // Remove menu and submenu items
    public static function remove_menu_entries()
    {
        remove_menu_page('index.php');
        remove_menu_page('link-manager.php');

        // Theme editor
        remove_submenu_page('themes.php', 'theme-editor.php'); // Menu Edition de theme

        // Only show first level user
        remove_submenu_page('plugins.php', 'plugin-install.php'); // Menu Installer plugin
        remove_submenu_page('plugins.php', 'plugin-editor.php'); // Menu Edition de plugin

        // Only show first level user
        remove_submenu_page('users.php', 'users.php'); // Menu All users
        remove_submenu_page('users.php', 'user-new.php'); // Menu New user
        remove_submenu_page('users.php', 'profile.php'); // Menu Your profile
        // Remove default POST
        remove_menu_page('edit.php');
        remove_menu_page('edit-comments.php');

        // User capabilities
        // We hide ACF all admins exec
        if (!is_super_admin()) {
            remove_menu_page('edit.php?post_type=acf');
        }
    }
}
