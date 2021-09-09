<?php

if (!class_exists(' LibraryTaxonomy')) {
    class  LibraryTaxonomy
    {

        public function __construct()
        {
            // Taxonomies
            add_action('init', [$this, 'register_taxonomies']); // Nos Categories
        }

        // Register
        function register_taxonomies()
        {
            $this->register_taxonomy_library_type();
            $this->register_taxonomy_speaker();
        }

        public static function register_taxonomy_library_type()
        {
            // Labels singular and plural
            $label_singular_library_type = 'Library Category';
            $label_plural_library_type = 'Library Categories';

            $labels = [ // These labels change the text in the WordPress dashboard to match your taxonomy name
                'name'          => '' . $label_plural_library_type . '', // Can be plural name
                'singular_name' => __('' . $label_singular_library_type . ''), // Singular name
                'menu_name'     => __('' . $label_plural_library_type . ''),
            ];

            $args = [
                'labels'            => $labels, // Reference to the labels array above
                'hierarchical'      => true, // Whether a new instance of this taxonomy can have a parent
                'public'            => true,
                'show_admin_column' => true,
                'query_var'         => true, // Whether you can use query variables in the URL to access the new post types
                'show_in_nav_menus' => true,
                'show_ui'           => true,
                'show_tagcloud'     => false,
            ];
            // Tell WordPress about our new taxonomy and assign it to a post type
            register_taxonomy('library-type', [LIBRARY_SLUG], $args);
        }

        public static function register_taxonomy_speaker()
        {
            // Labels singular and plural
            $label_singular_speaker = 'Speaker';
            $label_plural_speaker = 'Speakers';

            $labels = [ // These labels change the text in the WordPress dashboard to match your taxonomy name
                'name'          => '' . $label_plural_speaker . '', // Can be plural name
                'singular_name' => __('' . $label_singular_speaker . ''), // Singular name
                'menu_name'     => __('' . $label_plural_speaker . ''),
                'add_new_item'     => __('Add new ' . $label_singular_speaker . ''),
            ];

            $args = [
                'labels'            => $labels, // Reference to the labels array above
                'hierarchical'      => true, // Whether a new instance of this taxonomy can have a parent
                'public'            => true,
                'show_admin_column' => true,
                'query_var'         => true, // Whether you can use query variables in the URL to access the new post types
                'show_in_nav_menus' => false,
                'show_ui'           => true,
                'show_tagcloud'     => false,
            ];
            // Tell WordPress about our new taxonomy and assign it to a post type
            register_taxonomy('speaker', [LIBRARY_SLUG], $args);
        }
    }
}

$library_taxonomy = new LibraryTaxonomy();
