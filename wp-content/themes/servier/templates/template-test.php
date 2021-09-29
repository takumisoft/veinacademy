<?php /* Template Name: Test */ ?>

<?php 
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$posts =  [
    'posts_per_page' => 20,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => [
        [
            'taxonomy' => 'library-type',
            'field'    => 'id',
            'terms'    => 52,
        ],
    ],
];
$context['frontpage'] = true;
$context['thumbnail'] = get_the_post_thumbnail_url();
$context['base_url'] = get_template_directory_uri();
$context['posts'] = Timber::get_posts($posts);

Timber::render('views/pages/new_home.twig', $context);