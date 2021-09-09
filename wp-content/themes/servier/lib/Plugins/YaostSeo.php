<?php

namespace Servier\Plugins;

class YaostSeo
{
    public function __construct()
    {
        // Filter to WPSEO title
        add_filter('wpseo_breadcrumb_single_link_info', [$this, 'breadcrumb_clean_pipe'], 10);
        add_filter('wpseo_title', [$this, 'title_clean_pipe']);
        add_filter('wpseo_metabox_prio', [$this, 'metabox_position']); // MetaBox position

        add_action('admin_init', [$this, 'manage_post_types_columns']); // manage columns in list views
    }

    // We need to remove the symbol '|' from title
    public function breadcrumb_clean_pipe($link_info)
    {
        $link_info['text'] = str_replace('|', '', $link_info['text']);
        return $link_info;
    }

    public function manage_post_types_columns()
    {
        $post_types = get_post_types();
        foreach ($post_types as $post_type) {
            add_filter('manage_edit-' . $post_type . '_columns', [$this, 'remove_columns'], 10, 2);
        }
    }

    function remove_columns($columns)
    {
        // remove the Yoast SEO columns
        unset($columns['wpseo-score']);
        unset($columns['wpseo-score-readability']);
        unset($columns['wpseo-title']);
        unset($columns['wpseo-metadesc']);
        unset($columns['wpseo-focuskw']);
        unset($columns['wpseo-links']);
        unset($columns['wpseo-linked']);
        return $columns;
    }

    /**
     * Customize the title to remove "|".
     *
     * @param string $title The original wpseo_title.
     * @return string The wpseo_title to use.
     */
    public function title_clean_pipe($title)
    {
        $title = str_replace('|', '', $title);
        return $title;
    }

    // Yaost MetaBox to the bottom
    public function metabox_position()
    {
        return 'low';
    }
}


