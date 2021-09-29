<?php
/**
 * Search results page
 */
$context = Timber::get_context();
$context['title'] = 'The first content platform specialized in chronic venous disease and hemorrhoidal disease';
$context['search_query'] = get_search_query();

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

$posts = [
    'post_type' => 'book',
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
    's' => get_search_query()
];

$context['posts'] = new Timber\PostQuery($posts);
$tags = [];
foreach($context['posts'] as $p){
    foreach($p->terms as $term){
        if($term->taxonomy == 'category' || ($term->taxonomy == 'library-type' && $term->parent != 0)){
            if(!in_array($term, $tags)){
                array_push($tags, $term);
            }
        }elseif(!in_array($p->post_type, $tags)){
            array_push($tags, $p->post_type);
        }
    }
}
$context['tags'] = $tags;
$context['pagination'] = Timber::get_pagination();

$post_types = array();
foreach($context['posts'] as $post){
    if(!in_array($post->post_type, $post_types)){
        array_push($post_types, $post->post_type);
    }
}


/////////////////////////////////////////////////////////


$no_posts =  [
    'post_type' => ['news', 'website', 'apps', 'book'],
    'posts_per_page' => 20,
    'orderby' => 'date',
    'order' => 'DESC'
];
$context['frontpage'] = true;
$context['thumbnail'] = get_template_directory_uri() . '/new-assets/img/bg-search.png';
$context['no_posts'] = Timber::get_posts($no_posts);
$context['base_url'] = get_template_directory_uri();

Timber::render('views/pages/new_search.twig', $context);
