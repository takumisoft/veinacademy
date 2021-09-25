<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$posts = [
    'post_type' => 'library',
    'posts_per_page' => 20,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'library-type',
            'field'    => 'slug',
            'terms'    => 'interviews-podcasts',
        ],
    ],
];

$context['posts'] = Timber::get_posts($posts);

$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url();
$context['base_url'] = get_template_directory_uri();


Timber::render('views/pages/new_page.twig', $context);
