<?php /* Template Name: About Us */ ?>

<?php 
$context = Timber::get_context();
$post = new TimberPost();


$context['current_page'] = basename(get_permalink());
$context['post'] = $post;
$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url();
$context['base_url'] = get_template_directory_uri();
$context['posts'] = Timber::get_posts($posts);

Timber::render('views/pages/page-about-us.twig', $context);