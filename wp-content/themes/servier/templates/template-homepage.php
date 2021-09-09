<?php /* Template Name: New Homepage */ ?>

<?php 
$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

Timber::render('views/pages/new_home.twig', $context);