<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$posts = [
    'post_type' => 'interviews',
    'posts_per_page' => 20,
    'orderby' => 'date',
    'order' => 'DESC'
];

$context['posts'] = Timber::get_posts($posts);
// $post_types = array();
// foreach($context['posts'] as $post){
//     if(!in_array($post->post_type, $post_types)){
//         array_push($post_types, $post->post_type);
//     }
// }
// $context['options'] = $post_types;
$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url();
$context['base_url'] = get_template_directory_uri();


Timber::render('views/pages/new_page.twig', $context);
