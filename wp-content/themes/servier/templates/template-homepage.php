<?php /* Template Name: New Homepage */ ?>

<?php 
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$posts =  [
    'post_type' => ['news', 'website', 'apps', 'book'],
    'posts_per_page' => 20,
    'orderby' => 'date',
    'order' => 'DESC'
];
$context['frontpage'] = true;
$context['thumbnail-image'] = get_the_post_thumbnail($context['post']['thumbnail-image']);
$context['thumbnail'] = get_the_post_thumbnail_url();
$context['base_url'] = get_template_directory_uri();
$context['posts'] = Timber::get_posts($posts);

Timber::render('views/pages/new_home.twig', $context);