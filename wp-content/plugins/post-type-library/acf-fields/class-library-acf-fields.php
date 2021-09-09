<?php
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('LibraryAcfFields')) {
    class LibraryAcfFields
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
            $this->media();
        }

        public function options_page()
        {
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5bcdcc9c803e9',
                    'title'                 => 'Library options',
                    'fields'                => [
                        [
                            'key'               => 'field_5bcdcc9c91028',
                            'label'             => 'Label',
                            'name'              => 'pt_library_label',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'default_value'     => 'Library',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ],
                        [
                            'key'               => 'field_5bcdcc9c91109',
                            'label'             => 'Description',
                            'name'              => 'pt_library_description',
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
                            'key'               => 'field_5bcdcc9c911e0',
                            'label'             => 'Banner Image',
                            'name'              => 'pt_library_archive_banner_image',
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
                                'value'    => 'acf-options-library-options',
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

        public function media()
        {
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5b7c335e1c77c',
                    'title'                 => 'Library media',
                    'fields'                => [
                        [
                            'key'               => 'field_5b8ff12bd1bb2',
                            'label'             => 'Video file',
                            'name'              => 'file_video',
                            'type'              => 'file',
                            'instructions'      => 'File type accepted mp4',
                            'required'          => 0,
                            'conditional_logic' => [
                                [
                                    [
                                        'field'    => 'field_5b8ff100d1bb1',
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
                            'return_format'     => 'array',
                            'library'           => 'all',
                            'min_size'          => '',
                            'max_size'          => '',
                            'mime_types'        => 'mp4',
                        ],
                        [
                            'key'               => 'field_5b8ff100d1bb1',
                            'label'             => 'OR Upload embed url (Youtube/Slideshare)',
                            'name'              => 'is_embed_enabled',
                            'type'              => 'true_false',
                            'instructions'      => 'Youtube/Slideshare',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'message'           => 'You can also add any embed videos, images, tweets, audio, and other content.',
                            'default_value'     => 0,
                            'ui'                => 0,
                            'ui_on_text'        => '',
                            'ui_off_text'       => '',
                        ],
                        [
                            'key'               => 'field_5b7c338160e55',
                            'label'             => 'Embed url',
                            'name'              => 'embed',
                            'type'              => 'oembed',
                            'instructions'      => 'Paste your embed url (youtube, slideshare)',
                            'required'          => 0,
                            'conditional_logic' => [
                                [
                                    [
                                        'field'    => 'field_5b8ff100d1bb1',
                                        'operator' => '==',
                                        'value'    => '1',
                                    ],
                                ],
                            ],
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'width'             => '',
                            'height'            => '',
                        ],
                    ],
                    'location'              => [
                        [
                            [
                                'param'    => 'post_type',
                                'operator' => '==',
                                'value'    => 'library',
                            ],
                        ],
                    ],
                    'menu_order'            => 0,
                    'position'              => 'acf_after_title',
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
$library_acf_fields = new LibraryAcfFields();