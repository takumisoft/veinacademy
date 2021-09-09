<?php

namespace Servier\Admin;

class LastModifiedDate
{
    public function __construct()
    {
        if (is_admin()) {
            add_action('create_term', [$this, 'last_modified_on_website']);
            add_action('edited_terms', [$this, 'last_modified_on_website']);
            add_action('delete_term', [$this, 'last_modified_on_website']);
            add_action('wp_trash_post', [$this, 'last_modified_on_website']);
            add_action('delete_post', [$this, 'last_modified_on_website']);
            add_action('clean_post_cache', [$this, 'last_modified_on_website']);
        }

        add_filter('timber_context', [$this, 'add_to_context']);
    }

    public static function last_modified_on_website()
    {
        update_option('last_modified_on_website', time());
    }

    function add_to_context($context)
    {
        $context['last_modified_on_website'] = date('F Y', get_option('last_modified_on_website'));

        return $context;
    }
}
