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

if (isset($_GET['order']) && $_GET['order'] == 'Oldest') {
	$args_order = "ASC";
} else {
	$args_order = "DESC";
}

$posts = [
    'post_type' => 'library',
    'posts_per_page' => 10,
    'orderby' => 'publish_date',
    'order' => $args_order,
    'paged' => $paged,
    'tax_query' => [
        [
            'taxonomy' => 'library-type',
            'field'    => 'slug',
            'terms'    => 'videos-presentations',
        ],
    ],
];
$context['pagination'] = Timber::get_pagination([
	'end_size' => 1,
	'mid_size' => 2,
]);



$context['current_page'] = basename(get_permalink());
$context['posts_type'] = 'videos-presentations';
$context['posts'] = new Timber\PostQuery($posts);
$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url($context['post']->id);
$context['base_url'] = get_template_directory_uri();

$no_page_url = get_pagenum_link();
$clean_url = explode('?', $no_page_url)[0];
$context['clean_url'] = $clean_url;

Timber::render('views/pages/page-videos-presentations.twig', $context);
