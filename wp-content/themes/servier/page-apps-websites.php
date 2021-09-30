<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

if(!isset($_GET['filter']) || !$_GET['filter']){
    $filter = ['apps', 'website'];
}else{
    $filter = $_GET['filter'];
}

if (isset($_GET['order']) && $_GET['order'] == 'Oldest') {
	$args_order = "ASC";
} else {
	$args_order = "DESC";
}

$posts = [
    'post_type' => $filter,
    'posts_per_page' => -1,
    'orderby' => 'publish_date',
    'order' => $args_order
];

$context['current_page'] = basename(get_permalink());
$context['posts_type'] = 'apps-websites';
$context['posts'] = Timber::get_posts($posts);
$terms = array();
foreach(['apps', 'website'] as $type){
    $item = [
        'name' => ucfirst($type),
        'slug' => strtolower($type),
        'count' => wp_count_posts($type)->publish
    ];
    array_push($terms, $item);
}
$context['filt'] = $filter;
$context['filters'] = $terms;
$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url($context['post']->id);
$context['base_url'] = get_template_directory_uri();


Timber::render('views/pages/new_page.twig', $context);
