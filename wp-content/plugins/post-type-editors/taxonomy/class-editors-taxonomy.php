<?php

if (!class_exists(' EditorsTaxonomy')) {
    class  EditorsTaxonomy
    {

        public function __construct()
        {
            // Taxonomies
            add_action('init', [$this, 'register_taxonomies']); // Nos Categories
        }

        // Register
        function register_taxonomies()
        {
            $this->register_taxonomy_role();
        }

        public static function register_taxonomy_role()
        {
            // Labels singular and plural
            $label_singular_role = 'Role';
            $label_plural_role = 'Roles';

            $labels = [ // These labels change the text in the WordPress dashboard to match your taxonomy name
                'name'          => '' . $label_plural_role . '', // Can be plural name
                'singular_name' => __('' . $label_singular_role . ''), // Singular name
                'menu_name'     => __('' . $label_plural_role . ''),
                'add_new_item'     => __('Add new ' . $label_singular_role . ''),
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
            register_taxonomy('role', [EDITORS_SLUG], $args);
        }
    }
}

$editors_taxonomy = new EditorsTaxonomy();
