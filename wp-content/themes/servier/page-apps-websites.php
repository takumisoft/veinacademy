<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$posts = [
    'post_type' => ['apps', 'website'],
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC'
];

$context['posts'] = Timber::get_posts($posts);
$terms = array();
foreach($posts['post_type'] as $type){
    $item = [
        'name' => ucfirst($type),
        'slug' => strtolower($type),
        'count' => wp_count_posts($type)->publish
    ];
    array_push($terms, $item);
}
$context['filters'] = $terms;
$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url($context['post']->id);
$context['base_url'] = get_template_directory_uri();


Timber::render('views/pages/new_page.twig', $context);
