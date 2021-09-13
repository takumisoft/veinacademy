<?php /* Template Name: New Homepage */ ?>

<?php 
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$posts =  [
    'post_type' => ['news', 'library', 'books', 'websites', 'apps'],
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC'
];
$context['posts'] = Timber::get_posts($posts);

Timber::render('views/pages/new_home.twig', $context);