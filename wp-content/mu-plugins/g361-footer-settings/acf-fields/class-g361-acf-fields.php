<?php
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('G361AcfFields')) {
    class G361AcfFields
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
            $this->footer_columns();
        }

        function footer_columns()
        {
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5b88f3d249474',
                    'title'                 => 'Footer settings',
                    'fields'                => [
                        [
                            'key'               => 'field_5b88f3e8585a3',
                            'label'             => 'Columns',
                            'name'              => 'footer_columns',
                            'type'              => 'flexible_content',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'layouts'           => [
                                '5b88f449ce026'        => [
                                    'key'        => '5b88f449ce026',
                                    'name'       => 'menu',
                                    'label'      => 'Column Menu',
                                    'display'    => 'block',
                                    'sub_fields' => [
                                        [
                                            'key'               => 'field_5b88f564585a5',
                                            'label'             => 'Column heading',
                                            'name'              => 'title',
                                            'type'              => 'text',
                                            'instructions'      => 'Leave blank if not heading needed',
                                            'required'          => 0,
                                            'conditional_logic' => 0,
                                            'wrapper'           => [
                                                'width' => '50%',
                                                'class' => '',
                                                'id'    => '',
                                            ],
                                            'default_value'     => '',
                                            'placeholder'       => '',
                                            'prepend'           => '',
                                            'append'            => '',
                                            'maxlength'         => '',
                                        ],
                                        [
                                            'key'               => 'field_5b88f46c585a4',
                                            'label'             => 'Menu entries',
                                            'name'              => 'repeater',
                                            'type'              => 'repeater',
                                            'instructions'      => 'Select URL and write the Link Text',
                                            'required'          => 0,
                                            'conditional_logic' => 0,
                                            'wrapper'           => [
                                                'width' => '',
                                                'class' => '',
                                                'id'    => '',
                                            ],
                                            'collapsed'         => 'field_5b890a378d0c8',
                                            'min'               => 0,
                                            'max'               => 0,
                                            'layout'            => 'table',
                                            'button_label'      => 'Add menu entry',
                                            'sub_fields'        => [
                                                [
                                                    'key'               => 'field_5b890a378d0c8',
                                                    'label'             => 'Link',
                                                    'name'              => 'link',
                                                    'type'              => 'link',
                                                    'instructions'      => '',
                                                    'required'          => 0,
                                                    'conditional_logic' => 0,
                                                    'wrapper'           => [
                                                        'width' => '',
                                                        'class' => '',
                                                        'id'    => '',
                                                    ],
                                                    'return_format'     => 'array',
                                                ],
                                            ],
                                        ],
                                    ],
                                    'min'        => '',
                                    'max'        => '',
                                ],
                                'layout_5b88f5e6585a6' => [
                                    'key'        => 'layout_5b88f5e6585a6',
                                    'name'       => 'image',
                                    'label'      => 'Column image & text',
                                    'display'    => 'block',
                                    'sub_fields' => [
                                        [
                                            'key'               => 'field_5b88f5f9585a7',
                                            'label'             => 'Column heading',
                                            'name'              => 'title',
                                            'type'              => 'text',
                                            'instructions'      => 'Leave blank if not heading needed',
                                            'required'          => 0,
                                            'conditional_logic' => 0,
                                            'wrapper'           => [
                                                'width' => '100',
                                                'class' => '',
                                                'id'    => '',
                                            ],
                                            'default_value'     => '',
                                            'placeholder'       => '',
                                            'prepend'           => '',
                                            'append'            => '',
                                            'maxlength'         => '',
                                        ],
                                        [
                                            'key'               => 'field_5b8911e0e0e80',
                                            'label'             => 'Image',
                                            'name'              => 'image',
                                            'type'              => 'image',
                                            'instructions'      => '',
                                            'required'          => 0,
                                            'conditional_logic' => 0,
                                            'wrapper'           => [
                                                'width' => '50',
                                                'class' => '',
                                                'id'    => '',
                                            ],
                                            'return_format'     => 'array',
                                            'preview_size'      => 'thumbnail',
                                            'library'           => 'all',
                                            'min_width'         => '',
                                            'min_height'        => '',
                                            'min_size'          => '',
                                            'max_width'         => '',
                                            'max_height'        => '',
                                            'max_size'          => '',
                                            'mime_types'        => '',
                                        ],
                                        [
                                            'key'               => 'field_5b88f615585a8',
                                            'label'             => 'Link',
                                            'name'              => 'link',
                                            'type'              => 'link',
                                            'instructions'      => '',
                                            'required'          => 0,
                                            'conditional_logic' => 0,
                                            'wrapper'           => [
                                                'width' => '50',
                                                'class' => '',
                                                'id'    => '',
                                            ],
                                            'return_format'     => 'array',
                                        ],
                                        [
                                            'key'               => 'field_5b88f657585a9',
                                            'label'             => 'Description',
                                            'name'              => 'description',
                                            'type'              => 'textarea',
                                            'instructions'      => '',
                                            'required'          => 0,
                                            'conditional_logic' => 0,
                                            'wrapper'           => [
                                                'width' => '100',
                                                'class' => '',
                                                'id'    => '',
                                            ],
                                            'default_value'     => '',
                                            'placeholder'       => '',
                                            'maxlength'         => '',
                                            'rows'              => '',
                                            'new_lines'         => 'br',
                                        ],
                                    ],
                                    'min'        => '',
                                    'max'        => '1',
                                ],
                            ],
                            'button_label'      => 'Add column',
                            'min'               => '',
                            'max'               => 4,
                        ],
                    ],
                    'location'              => [
                        [
                            [
                                'param'    => 'options_page',
                                'operator' => '==',
                                'value'    => 'footer-settings',
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
$g361_acf_fields = new G361AcfFields();
