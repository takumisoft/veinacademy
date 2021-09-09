<?php
/**
 * The template for displaying Archive pages.
 */


$templates = ['views/pages/archive.twig'];

$context = Timber::get_context();
$context['title'] = get_the_archive_title();

$queried_object = get_queried_object();
$archive_description = get_the_archive_description();

$archive_banner_image = false;
$archive_presentation = false;

if (is_post_type_archive()) {

    $context['title'] = post_type_archive_title('', false);
    // Image post types
    $archive_banner_image_option = get_field('pt_'.get_post_type().'_archive_banner_image', 'option');
    $has_archive_banner_image_option = !is_null($archive_banner_image_option) && !empty($archive_banner_image_option);
    $archive_banner_image = $has_archive_banner_image_option ? $archive_banner_image_option['url'] : get_stylesheet_directory_uri() . '/assets/img/banner/banner-' . get_post_type() . '.jpg';
    if (is_post_type_archive('news')) {
        $context['categories'] = Timber::get_terms('category', [
                'post_type'  => 'news',
                'hide_empty' => true,
                'orderby'    => 'name',
                'exclude'    => 1,
                'order'      => 'ASC']
        );
    }

    //	array_unshift( $templates, 'views/pages/' . get_post_type() . '/archive-' . get_post_type() . '.twig' );


} elseif (is_tax()) {
    $context['title'] = single_cat_title('', false);
    $archive_presentation = get_field('archive_presentation', $queried_object);
    $archive_banner_image = get_field('archive_banner_image', $queried_object) ? get_field('archive_banner_image', $queried_object)['url'] : get_stylesheet_directory_uri() . '/assets/img/banner/banner-' . get_post_type() . '.jpg';
	$context['libpublications'] = Timber::get_terms('library-type', [
		'orderby' => 'name',
		'order'   => 'ASC',
		'hide_empty' => true,
		'parent'  => 52]
	);
	$context['libinterviews'] = Timber::get_terms('library-type', [
		'orderby' => 'name',
		'order'   => 'ASC',
		'hide_empty' => true,
		'parent'  => 11]
	);
}


$context['library_types'] = Timber::get_terms('library-type', [
        'hide_empty' => true,
        'orderby'    => 'name',
        'order'      => 'DESC']
);


if (isset($_GET['libcat']) && !empty( $_GET['libcat'] )) {
	$order = isset($_GET['order'])?'ASC':'DESC';
	$posts_libcat = [
		'post_type' => 'library',
		'orderby' => 'date',
		'order' => $order,
		'tax_query' => [
			[
				'taxonomy' => 'library-type',
				'field'    => 'term_id',
				'terms'    => $_GET['libcat'],
			],
		],
	];
	$posts = Timber::get_posts($posts_libcat);

} else {
	$posts = Timber::get_posts();
	$context['pagination'] = Timber::get_pagination([
		'end_size' => 1,
		'mid_size' => 2,
	]);
}


// Sort a post news orderby Re-order plugin
if (is_post_type_archive('news')) {
    usort($posts, "cmp");
}
$context['posts'] = $posts;
$context['archive_description'] = strip_tags($archive_description);
$context['archive_presentation'] = $archive_presentation;
$context['archive_banner_image'] = $archive_banner_image;

Timber::render($templates, $context);

function cmp($a, $b)
{
    return $a->menu_order - $b->menu_order;
}
