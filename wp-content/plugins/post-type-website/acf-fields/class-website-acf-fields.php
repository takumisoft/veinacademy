<?php
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('WebsiteAcfFields')) {
    class WebsiteAcfFields
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
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5bcdc487630e4',
                    'title'                 => 'Websites options',
                    'fields'                => [
                        [
                            'key'               => 'field_5bcdc48773162',
                            'label'             => 'Label',
                            'name'              => 'pt_website_label',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'default_value'     => 'Websites',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ],
                        [
                            'key'               => 'field_5bcdc4877327a',
                            'label'             => 'Description',
                            'name'              => 'pt_website_description',
                            'type'              => 'textarea',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'default_value'     => '',
                            'placeholder'       => '',
                            'maxlength'         => '',
                            'rows'              => 4,
                            'new_lines'         => 'br',
                        ],
                        [
                            'key'               => 'field_5bcdc4877335d',
                            'label'             => 'Banner Image',
                            'name'              => 'pt_website_archive_banner_image',
                            'type'              => 'image',
                            'instructions'      => 'Replace the default image',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'return_format'     => 'array',
                            'preview_size'      => 'medium_large',
                            'library'           => 'all',
                            'min_width'         => '',
                            'min_height'        => '',
                            'min_size'          => '',
                            'max_width'         => '',
                            'max_height'        => '',
                            'max_size'          => '',
                            'mime_types'        => '',
                        ],
                    ],
                    'location'              => [
                        [
                            [
                                'param'    => 'options_page',
                                'operator' => '==',
                                'value'    => 'acf-options-website-options',
                            ],
                        ],
                    ],
                    'menu_order'            => 0,
                    'position'              => 'normal',
                    'style'                 => 'seamless',
                    'label_placement'       => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen'        => '',
                    'active'                => 1,
                    'description'           => '',
                ]);

            endif;
        }
    }
} // !class_exists

//if (is_admin())
$website_acf_fields = new WebsiteAcfFields();