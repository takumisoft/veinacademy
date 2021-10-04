<?php
/**
 * Search results page
 */
$context = Timber::get_context();
$context['title'] = 'The first content platform specialized in chronic venous disease and hemorrhoidal disease';
$context['search_query'] = get_search_query();

if (isset($_GET['order']) && $_GET['order'] == 'Oldest') {
	$args_order = "ASC";
} else {
	$args_order = "DESC";
}

$k = 0;
if (isset($_GET['type']) && $_GET['type']) {
	foreach ($_GET['type'] as $tax_key => $tax_val) {
		
		foreach ($tax_val as $key => $value) {
			$k++;
			$term = get_term_by('id', $key, $tax_key);
			$term_name = $term->name;
			$type_query[$key] = $term_name;
		}

	}
}

$k = 0;
if(isset($_GET['type'])){
	foreach ( $_GET['type'] as $type_key => $type_value ) {
		if ($type_key == 'post_type') {
			# code...
		} else {
			foreach ($type_value as $key => $value) {	
				$cat_query[$k]['taxonomy'] = $type_key;
				$cat_query[$k]['terms'] = $key;
				$cat_query[$k]['field'] = 'id';
				$k++;
			}
		}
	}
}

// Full context
// We use this to get all posts that match the query without pagination, for the filter
$posts_full = [
    'posts_per_page' => -1,
    'orderby' => 'publish_date',
    'order' => $args_order,
    's' => get_search_query(),
];

$context_full['posts'] = new Timber\PostQuery($posts_full);
//

// Actual context
// The actual results, with pagination

$cat_query['relation'] = 'OR';

$posts = [
    'posts_per_page' => 10,
    'orderby' => 'publish_date',
    'order' => $args_order,
    'paged' => $paged,
    's' => get_search_query(),
    'tax_query' => $cat_query,
];

$context['posts'] = new Timber\PostQuery($posts);
$tags = [];
$full_terms = array();
//

foreach($context_full['posts'] as $p){

	$terms = get_post_categories( $p->ID );

	//echo '<p>ID : ' . $p->ID . '</p>';

	foreach ($terms as $term_key => $term_value) {


		$term_count = $term_value['count'];
		$term_id = $term_value['id'];
		$term_taxonomy = $term_value['taxonomy'];

		//echo '<p>term_key : ' . $term_key . '</p>';
		//echo '<p>--- term_count : ' . $term_count . '</p>';
		//echo '<p>--- term_id : ' . $term_id . '</p>';

		if (empty($full_terms)) {
			$full_terms[$term_key]['count'] = 1;
			$full_terms[$term_key]['id'] = $term_id;
			$full_terms[$term_key]['taxonomy'] = $term_taxonomy;
		} else {
			//echo '<p>ELSE</p>';
			if (array_key_exists($term_key, $full_terms)) {
				//echo '<p>Key exists</p>';
				$full_terms[$term_key]['count'] = $full_terms[$term_key]['count'] + 1;
				$full_terms[$term_key]['id'] = $term_id;
				$full_terms[$term_key]['taxonomy'] = $term_taxonomy;
			} else {
				//echo '<p>Key does not exist</p>';
				$full_terms[$term_key]['count'] = 1;
				$full_terms[$term_key]['id'] = $term_id;
				$full_terms[$term_key]['taxonomy'] = $term_taxonomy;
			}

		}
	}
}


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
$context['pagination'] = Timber::get_pagination([
    'end_size' => 1,
    'mid_size' => 2,
]);

$post_types = array();
foreach($context['posts'] as $post){
    if(!in_array($post->post_type, $post_types)){
        array_push($post_types, $post->post_type);
    }
}


/////////////////////////////////////////////////////////


$no_posts =  [
    'post_type' => ['news', 'website', 'apps', 'book'],
    'posts_per_page' => 10,
    'orderby' => 'publish_date',
    'order' => 'DESC'
];


$context['frontpage'] = true;
$context['thumbnail'] = get_template_directory_uri() . '/new-assets/img/bg-search.png';
$context['no_posts'] = Timber::get_posts($no_posts);
$context['base_url'] = get_template_directory_uri();
$context['full_terms'] = $full_terms;
if(isset($type_query)){
	$context['type_query'] = $type_query;
}

$context['get'] = $_GET;
$context['sort'] = isset($_GET['order']) ? $_GET['order'] : '';

Timber::render('views/pages/new_search.twig', $context);
