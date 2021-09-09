<?php

if (!class_exists(' NewsTaxonomy')) {
    class  NewsTaxonomy
    {

        public function __construct()
        {
            // Taxonomies
            add_action('init', [$this, 'register_taxonomies']); // Nos Categories
        }

        // Register
        function register_taxonomies()
        {
            $this->register_taxonomy_city();
            $this->register_taxonomy_country();
            $this->register_taxonomy_organizer();
        }

        public static function register_taxonomy_country()
        {
            // Labels singular and plural
            $label_singular_country = 'Country';
            $label_plural_country = 'Countries';

            $labels = [ // These labels change the text in the WordPress dashboard to match your taxonomy name
                'name'          => '' . $label_plural_country . '', // Can be plural name
                'singular_name' => __('' . $label_singular_country . ''), // Singular name
                'menu_name'     => __('' . $label_plural_country . ''),
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
            register_taxonomy('country', [NEWS_SLUG], $args);
        }

        public static function register_taxonomy_city()
        {
            // Labels singular and plural
            $label_singular_city = 'City';
            $label_plural_city = 'Cities';

            $labels = [ // These labels change the text in the WordPress dashboard to match your taxonomy name
                'name'          => '' . $label_plural_city . '', // Can be plural name
                'singular_name' => __('' . $label_singular_city . ''), // Singular name
                'menu_name'     => __('' . $label_plural_city . ''),
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
            register_taxonomy('city', [NEWS_SLUG], $args);
        }
        public static function register_taxonomy_organizer()
        {
            // Labels singular and plural
            $label_singular_organizer = 'Organizer';
            $label_plural_organizer = 'Organizers';

            $labels = [ // These labels change the text in the WordPress dashboard to match your taxonomy name
                'name'          => '' . $label_plural_organizer . '', // Can be plural name
                'singular_name' => __('' . $label_singular_organizer . ''), // Singular name
                'menu_name'     => __('' . $label_plural_organizer . ''),
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
            register_taxonomy('organizer', [NEWS_SLUG], $args);
        }
    }
}

$news_taxonomy = new NewsTaxonomy();
