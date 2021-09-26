<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$posts = [
    'post_type' => 'library',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'library-type',
            'field'    => 'slug',
            'terms'    => 'publications',
        ],
    ],
];

$context['posts'] = Timber::get_posts($posts);
$filters = get_terms('library-type', array('parent' => '52'));
$context['filters'] = $filters;
$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url($context['post']->id);
$context['base_url'] = get_template_directory_uri();


Timber::render('views/pages/new_page.twig', $context);
