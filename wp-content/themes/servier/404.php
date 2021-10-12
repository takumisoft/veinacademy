<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

$context = Timber::get_context();
$context['base_url'] = get_template_directory_uri();
Timber::render( 'views/pages/404.twig', $context );
