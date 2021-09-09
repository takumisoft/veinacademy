<?php

namespace Servier\Front;

class BodyClass
{
    public function __construct()
    {
        add_filter('body_class', [$this, 'rewrite_class']);
    }

    public function rewrite_class(array $classes)
    {
        $post = \Timber::get_post();

        // reset classes
        $classes = [];

        if (is_front_page() || is_home()) {
            $classes[] = 'page-home'; // Homepage class
        } elseif (is_404()) {
            $classes[] = 'page-404'; // 404 class
        } elseif (is_search()) {
            $classes[] = 'page-search'; // Search class
        } elseif (is_single()) {
            $classes[] = 'single'; // Post single
            // single-{post-type}
            if (isset($post->post_type)) {
                $classes[] = "single-{$post->post_type}"; // Post type single
            }
        } elseif (is_archive()) {
            $classes[] = 'archive'; // Post archive
            // Page: archive-{post-type}
            if (isset($post->post_type) && is_archive()) {
                $classes[] = "archive-{$post->post_type}"; // Post type archive
            }
        } else {
            $classes[] = 'page'; // Default class

            // Page name
            if (isset($post->post_name)) {
                $classes[] = "page-{$post->post_name}"; // Post name
            }

            // Page ID
            if (is_page()) {
                $classes[] = "page-id-{$post->ID}"; // Post ID
            }
        }

        return $classes;
    }
}
