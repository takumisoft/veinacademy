<?php
$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

$context['thumbnail'] = get_the_post_thumbnail_url();
$context['single'] = true;
Timber::render(array(
    'views/pages/' . $post->post_type . '/new_single-' . $post->post_type . '.twig', // views/pages/{{post_type}}/single-{{post_type}}.twig
    'views/pages/new_single.twig'
), $context);

