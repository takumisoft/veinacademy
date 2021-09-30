<?php
require_once 'autoload.php';
add_action('after_setup_theme', 'class_loader');

if (!class_exists('Timber')) {
    add_action('admin_notices', function () {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url(admin_url('plugins.php#timber')) . '">' . esc_url(admin_url('plugins.php')) . '</a></p></div>';
    });

    add_filter('template_include', function ($template) {
        return get_stylesheet_directory() . '/static/no-timber.html';
    });

    return;
}

function class_loader() {
    // Create a new instance of the autoloader
    $loader = new Psr4AutoloaderClass();

    // Register this instance
    $loader->register();

    // Add our namespace and the folder it maps to
    $loader->addNamespace('Servier', get_template_directory() . '/lib');

    new \Servier\ServierSite();
}

function theme_load_scripts() {
    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_style( 'style-default', get_stylesheet_uri() );
    wp_enqueue_script( 'select2-script', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js' );
    wp_enqueue_script( 'new-script', get_template_directory_uri() . '/new-assets/js/new_script.js' );
    wp_enqueue_style( 'select2-css', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css' );
    wp_enqueue_style( 'new-style', get_template_directory_uri() . '/new-assets/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );

function reading_time($id){
    print_r(get_post($id));
}


function get_word_count($content){
    return str_word_count($content) / 250 . ' min read';
}

function wpdocs_theme_name_scripts() {
    wp_enqueue_style( 'csccs', get_template_directory_uri() . '/assets/css/custom.css' );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


function get_post_categories( $post_id ) {

    //echo '<h2>Post ID -- ' . $post_id . '</h2>';
    $post_type = get_post_type( $post_id );
    $taxonomies = get_object_taxonomies( $post_type );
    $terms = array();
    $k = 0;

    // if taxonomy is library, we select the top 

    if ($taxonomies){
        foreach ($taxonomies as $taxonomy) {
            $term_list = wp_get_post_terms( $post_id, $taxonomy, array( 'fields' => 'all' ) );
            if ($term_list) {
                foreach ($term_list as $term) {

                    if ($term->taxonomy == 'speaker') {
                        continue;
                    }

                    $terms[$term->name]['count'] = 1;
                    $terms[$term->name]['taxonomy'] = $taxonomy;
                    $terms[$term->name]['id'] = $term->term_id;
                }
            }
        }
    } else {

        if ($post_type) {
            //$terms[$post_type]['count'] = 1;
            //$terms[$post_type]['taxonomy'] = 'post_type';
            //$terms[$post_type]['id'] = 'type__' . $post_type;
        }

    }

    return $terms;

};

/****
** Defer styles and scripts
***/

// CSS
function add_rel_preload($html, $handle, $href, $media) {
    
    if (is_admin())
        return $html;

     $html = <<<EOT
<link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
EOT;
    return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );

// JS
add_filter( 'clean_url', function( $url )
{
    if ( FALSE === strpos( $url, '.js' ) )
    { // not our file
        return $url;
    }
    // Must be a ', not "!
    return "$url' defer='defer";
}, 11, 1 );
