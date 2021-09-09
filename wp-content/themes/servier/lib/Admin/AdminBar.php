<?php

namespace Servier\Admin;

class AdminBar
{
    /**
     * @var string
     */
    protected $position;
    /**
     * @param string $front_end_position Frond end admin bar position. Defaults to 'bottom'
     */
    public function __construct($front_end_position = null)
    {
        add_action('wp_before_admin_bar_render', [$this, 'remove_entries']);
        add_action('admin_bar_menu', [$this, 'add_entries'], 500);

        if (!is_null($front_end_position) || !empty($front_end_position)) {
            $this->position = $front_end_position;
            add_action('wp_head', [$this, 'admin_bar_position'], 100);
        }

    }

    // Remove menu items
    public static function remove_entries()
    {
        global $wp_admin_bar;
        //Remove WordPress Menu Items
        $wp_admin_bar->remove_menu('about'); // 'About WordPress'
        $wp_admin_bar->remove_menu('site-name'); // 'Site name' We need the 'Edit site' entry

        $wp_admin_bar->remove_menu('wporg'); // 'WordPress.org'
        $wp_admin_bar->remove_menu('documentation'); // 'Documentation'
        $wp_admin_bar->remove_menu('support-forums'); // 'Support Forums'
        $wp_admin_bar->remove_menu('feedback'); // 'Feedback'

        //Remove Site Name Items
        $wp_admin_bar->remove_menu('dashboard'); // 'Dashboard'
        $wp_admin_bar->remove_menu('themes'); // 'Themes'
//        $wp_admin_bar->remove_menu('widgets'); // 'Widgets'
        $wp_admin_bar->remove_menu('menus'); // 'Menus'

        // Remove Comments Bubble
        $wp_admin_bar->remove_menu('comments');

        //Remove Update Link if theme/plugin/core updates are available
        $wp_admin_bar->remove_menu('updates');

    }

    // Custom logo on the left side
    public static function add_entries($wp_admin_bar)
    {
        global $wp_admin_bar;

        // Menu Logo
        $wp_admin_bar->add_menu([
            'id'    => 'wp-logo',
            'title' => get_site_icon_url(32) ? '<img style="width:32px;height:32px" width="32" height="32" src="' . get_site_icon_url(32) . '" />' : '<i class="ab-icon"></i>',
            'href'  => __(admin_url('/')),
            'meta'  => [
                'title' => __(get_bloginfo('name')),
            ],
        ]);
        // Add new sub menu.
        $wp_admin_bar->add_menu([
            'parent' => 'wp-logo',
            'id'     => 'sub-menu-id-1',
            'title'  => __('Visit site ') . get_bloginfo('name'),
            'href'   => __(home_url('/')),
        ]);
    }

    // Move front admin bar to bottom
    public function admin_bar_position()
    {
        if (!is_admin_bar_showing()) return;
        if($this->position == 'bottom') {
            echo '<style>
                html { margin-top: 0 !important; margin-bottom: 32px !important; }
                * html body { margin-top: 0 !important; }
                @media screen and ( max-width: 782px ) {
                    html { margin-top: 0 !important; }
                }
                body.admin-bar {
                    margin-top: 0;
                    padding-bottom: 32px;
                }
                #wpadminbar {
                    top: auto !important;
                    bottom: 0;
                }
                #wpadminbar .quicklinks>ul>li {
                    position:relative;
                }
                #wpadminbar .ab-top-menu>.menupop>.ab-sub-wrapper {
                    bottom:32px;
                }
            </style>';
        }

    }
}
