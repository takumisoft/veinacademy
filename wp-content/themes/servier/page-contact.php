<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;
$context['thumbnail'] = get_the_post_thumbnail_url($context['post']->id);
$context['base_url'] = get_template_directory_uri();
Timber::render('views/pages/new_contact.twig', $context);

