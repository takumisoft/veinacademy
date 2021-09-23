<?php

$context = Timber::get_context();
$post = new TimberPost();
$context['post'] = $post;

$posts = [
    'post_type' => ['apps', 'website'],
    'posts_per_page' => 20,
    'orderby' => 'date',
    'order' => 'DESC'
];

$context['posts'] = Timber::get_posts($posts);
$terms = array();
foreach($context['posts'] as $post){
    
    if($post->terms){
        foreach($post->terms as $term){
        
            if($term->taxonomy != 'speaker'){
                if(!in_array($term->name, $terms)){
                    array_push($terms, $term->name);
                }
            }
        }
    }else{
        if(!in_array($post->post_type, $terms)){
            array_push($terms, $post->post_type);
        }
    }
    
}
// echo '<pre>'; print_r($post); echo '</pre>';
$context['filters'] = $terms;
$context['frontpage'] = false;
$context['thumbnail'] = get_the_post_thumbnail_url($context['post']->id);
$context['base_url'] = get_template_directory_uri();


Timber::render('views/pages/new_page.twig', $context);
