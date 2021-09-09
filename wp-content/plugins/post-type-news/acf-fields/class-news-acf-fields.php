<?php
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('NewsAcfFields')) {
    class NewsAcfFields
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
            $this->date_event();
        }

        public function options_page()
        {
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5bcd9f9eebec4',
                    'title'                 => 'News options',
                    'fields'                => [
                        [
                            'key'               => 'field_5bcda089ab0b5',
                            'label'             => 'Label',
                            'name'              => 'pt_news_label',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'default_value'     => 'News',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ],
                        [
                            'key'               => 'field_5bcda0445d9a7',
                            'label'             => 'Description',
                            'name'              => 'pt_news_description',
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
                            'key'               => 'field_5bcd9fe51035f',
                            'label'             => 'Banner Image',
                            'name'              => 'pt_news_archive_banner_image',
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
                                'value'    => 'acf-options-news-options',
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

        public function date_event()
        {
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5b7171c126981',
                    'title'                 => 'Event Date',
                    'fields'                => [
                        [
                            'key'               => 'field_5b7171c42a92b',
                            'label'             => 'Date Start',
                            'name'              => 'date_start',
                            'type'              => 'date_picker',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'display_format'    => 'd/m/Y',
                            'return_format'     => 'j F Y',
                            'first_day'         => 1,
                        ],
                        [
                            'key'               => 'field_5b71728c841a4',
                            'label'             => '',
                            'name'              => 'date_day_disabled',
                            'type'              => 'true_false',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'message'           => 'Return August, 2018 (F, Y) format',
                            'default_value'     => 0,
                            'ui'                => 0,
                            'ui_on_text'        => '',
                            'ui_off_text'       => '',
                        ],
                        [
                            'key'               => 'field_5b71720b2a92c',
                            'label'             => 'Date End',
                            'name'              => 'date_end',
                            'type'              => 'date_picker',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => [
                                [
                                    [
                                        'field'    => 'field_5b71728c841a4',
                                        'operator' => '!=',
                                        'value'    => '1',
                                    ],
                                ],
                            ],
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'display_format'    => 'd/m/Y',
                            'return_format'     => 'j F Y',
                            'first_day'         => 1,
                        ],
                    ],
                    'location'              => [
                        [
                            [
                                'param'    => 'post_type',
                                'operator' => '==',
                                'value'    => 'news',
                            ],
                            [
                                'param'    => 'post_taxonomy',
                                'operator' => '==',
                                'value'    => 'category:events-congress',
                            ],
                        ],
                    ],
                    'menu_order'            => 0,
                    'position'              => 'side',
                    'style'                 => 'default',
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
$news_acf_fields = new NewsAcfFields();