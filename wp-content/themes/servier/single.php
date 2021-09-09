<?php
$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;


Timber::render(array(
    'views/pages/' . $post->post_type . '/single-' . $post->post_type . '.twig', // views/pages/{{post_type}}/single-{{post_type}}.twig
    'views/pages/single.twig'
), $context);

