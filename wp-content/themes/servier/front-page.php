<?php 
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$posts = [
    'post_type' => ['library'],
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => 10,
];
$new_posts = [
    'post_type' => ['news', 'website', 'apps', 'library'],
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 4
];

$context['frontpage'] = true;
$context['thumbnail'] = get_the_post_thumbnail_url();
$context['base_url'] = get_template_directory_uri();
$context['new_posts'] = Timber::get_posts($new_posts);
$context['posts'] = Timber::get_posts($posts);

Timber::render('views/pages/new_home.twig', $context);