<?php

namespace Servier\Front;

class Search
{
    public function __construct()
    {
        add_filter('pre_get_posts', [$this, 'set_query']);
    }

    public function set_query($query)
    {
        if ($query->is_search) {
            $query->set('post_type', [
                'news',
                'apps',
                'website',
                'library',
                'book',
            ]);
        }
        return $query;
    }
}
