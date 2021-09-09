<?php
/**
 * Search results page
 */
$templates = ['views/pages/search.twig', 'views/pages/archive.twig'];

$context = Timber::get_context();
$context['title'] = 'Results for your search:';
$context['search_query'] = get_search_query();
$context['posts'] = new Timber\PostQuery();
$context['pagination'] = Timber::get_pagination([
    'end_size' => 1,
    'mid_size' => 2,
]);

Timber::render($templates, $context);
