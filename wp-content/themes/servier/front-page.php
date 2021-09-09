<?php


$context = Timber::get_context();
$post = Timber::query_post();

$context['post'] = $post;

$posts_interview = [
    'post_type' => 'library',
    'posts_per_page' => 4,
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'tax_query' => [
        [
            'taxonomy' => 'library-type',
            'field'    => 'slug',
            'terms'    => 'interviews-podcasts',
        ],
    ],
];

$posts_news = [
    'post_type' => 'news',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => 4,
];

$context['posts_interviews'] = Timber::get_posts($posts_interview);
$context['posts_news'] = Timber::get_posts($posts_news);

Timber::render('views/pages/home.twig', $context);
