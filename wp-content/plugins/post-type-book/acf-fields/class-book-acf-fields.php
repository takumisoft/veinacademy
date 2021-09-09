<?php
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('BookAcfFields')) {
    class BookAcfFields
    {
        /**
         * Plugin initialization
         */
        public function __construct()
        {
            add_action('acf/init', [$this, 'register_fields']);
        }


        public function register_fields()
        {
            $this->options_page();
        }

        public function options_page()
        {
            if( function_exists('acf_add_local_field_group') ):

                acf_add_local_field_group(array(
                    'key' => 'group_5bcdcb08de35b',
                    'title' => 'Books options',
                    'fields' => array(
                        array(
                            'key' => 'field_5bcdcb08eee97',
                            'label' => 'Label',
                            'name' => 'pt_book_label',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => 'Books',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_5bcdcb08eef82',
                            'label' => 'Description',
                            'name' => 'pt_book_description',
                            'type' => 'textarea',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'maxlength' => '',
                            'rows' => 4,
                            'new_lines' => 'br',
                        ),
                        array(
                            'key' => 'field_5bcdcb08ef05f',
                            'label' => 'Banner Image',
                            'name' => 'pt_book_archive_banner_image',
                            'type' => 'image',
                            'instructions' => 'Replace the default image',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'return_format' => 'array',
                            'preview_size' => 'medium_large',
                            'library' => 'all',
                            'min_width' => '',
                            'min_height' => '',
                            'min_size' => '',
                            'max_width' => '',
                            'max_height' => '',
                            'max_size' => '',
                            'mime_types' => '',
                        ),
                    ),
                    'location' => array(
                        array(
                            array(
                                'param' => 'options_page',
                                'operator' => '==',
                                'value' => 'acf-options-book-options',
                            ),
                        ),
                    ),
                    'menu_order' => 0,
                    'position' => 'normal',
                    'style' => 'seamless',
                    'label_placement' => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen' => '',
                    'active' => 1,
                    'description' => '',
                ));

            endif;
        }
    }
} // !class_exists

//if (is_admin())
    $book_acf_fields = new BookAcfFields();