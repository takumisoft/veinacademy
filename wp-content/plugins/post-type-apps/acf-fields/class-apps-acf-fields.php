<?php
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('AppsAcfFields')) {
    class AppsAcfFields
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
            $this->apps_url(); // Google play + App store fields
            $this->gallery();
        }

        public function options_page()
        {
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5bcdc8987a906',
                    'title'                 => 'Apps options',
                    'fields'                => [
                        [
                            'key'               => 'field_5bcdc8988c2c8',
                            'label'             => 'Label',
                            'name'              => 'pt_apps_label',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'default_value'     => 'Apps',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ],
                        [
                            'key'               => 'field_5bcdc8988c3b7',
                            'label'             => 'Description',
                            'name'              => 'pt_apps_description',
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
                            'key'               => 'field_5bcdc8988c497',
                            'label'             => 'Banner Image',
                            'name'              => 'pt_apps_archive_banner_image',
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
                                'value'    => 'acf-options-apps-options',
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

        public function apps_url()
        {
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5b76ce0fe282e',
                    'title'                 => 'Url Apps',
                    'fields'                => [
                        [
                            'key'               => 'field_5b76ce16e90b6',
                            'label'             => 'Url Google Play',
                            'name'              => 'url_google_play',
                            'type'              => 'url',
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
                        ],
                        [
                            'key'               => 'field_5b76ce86e90b7',
                            'label'             => 'Url App Store',
                            'name'              => 'url_app_store',
                            'type'              => 'url',
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
                        ],
                    ],
                    'location'              => [
                        [
                            [
                                'param'    => 'post_type',
                                'operator' => '==',
                                'value'    => 'apps',
                            ],
                        ],
                    ],
                    'menu_order'            => 0,
                    'position'              => 'side',
                    'style'                 => 'seamless',
                    'label_placement'       => 'top',
                    'instruction_placement' => 'label',
                    'hide_on_screen'        => '',
                    'active'                => 1,
                    'description'           => '',
                ]);

            endif;
        }

        public function gallery()
        {
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5b7d76236b914',
                    'title'                 => 'Apps Gallery',
                    'fields'                => [
                        [
                            'key'               => 'field_5b7d762f13540',
                            'label'             => 'Apps screenshots',
                            'name'              => 'apps_gallery',
                            'type'              => 'gallery',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'min'               => 1,
                            'max'               => 3,
                            'insert'            => 'append',
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
                                'param'    => 'post_type',
                                'operator' => '==',
                                'value'    => 'apps',
                            ],
                        ],
                    ],
                    'menu_order'            => 0,
                    'position'              => 'side',
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

$apps_acf_fields = new AppsAcfFields();
