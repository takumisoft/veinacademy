<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$link = $_SERVER["REQUEST_URI"];
$uris = explode('/', $link);
for($i = 0; $i < count($uris); $i++){
    if($uris[$i] == 'page'){
        $paged = $uris[$i + 1];
    }
}
if(!isset($paged) || !$paged){
    $paged = 1;
}
if(!isset($_GET['filter']) || !$_GET['filter']){
    $filter = 'publications';
}else{
    $filter = $_GET['filter'];
}
$posts = [
    'post_type' => 'library',
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
    'tax_query' => [
        [
            'taxonomy' => 'library-type',
            'field'    => 'slug',
            'terms'    => $filter,
        ],
    ],
];
$context['pagination'] = Timber::get_pagination([
	'end_size' => 1,
	'mid_size' => 2,
]);

$context['posts'] = new Timber\PostQuery($posts);
$filters = get_terms('library-type', array('parent' => '52'));
$context['filters'] = $filters;
$context['filt'] = $filter;
$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url($context['post']->id);
$context['base_url'] = get_template_directory_uri();

$no_page_url = get_pagenum_link();
$clean_url = explode('?', $no_page_url)[0];
$context['clean_url'] = $clean_url;

Timber::render('views/pages/new_page.twig', $context);
