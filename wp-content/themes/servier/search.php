<?php
/**
 * Search results page
 */

$context = Timber::get_context();
$context['title'] = 'The first content platform specialized in chronic venous disease and hemorrhoidal disease';
$context['search_query'] = get_search_query();
$context['posts'] = new Timber\PostQuery();
$context['pagination'] = Timber::get_pagination([
    'end_size' => 1,
    'mid_size' => 2,
]);

// echo '<pre>';print_r($context['posts']); echo '</pre>';
$post_types = array();
foreach($context['posts'] as $post){
    if(!in_array($post->post_type, $post_types)){
        array_push($post_types, $post->post_type);
    }
}
$context['base_url'] = get_template_directory_uri();
$context['options'] = $post_types;

Timber::render('views/pages/new_search.twig', $context);
