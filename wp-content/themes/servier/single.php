<?php
$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;

// $context['thumbnail'] = wp_get_attachment_image_src($context['post']->custom['thumbnail-image'])[0];
$context['single'] = true;
$context['base_url'] = get_template_directory_uri();
Timber::render(array(
    'views/pages/' . $post->post_type . '/new_single-' . $post->post_type . '.twig', // views/pages/{{post_type}}/single-{{post_type}}.twig
    'views/pages/new_single.twig'
), $context);

