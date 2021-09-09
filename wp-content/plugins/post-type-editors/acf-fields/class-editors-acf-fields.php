<?php
// If this file is called directly, abort.
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('EditorsAcfFields')) {
    class EditorsAcfFields
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
            if (function_exists('acf_add_local_field_group')):

                acf_add_local_field_group([
                    'key'                   => 'group_5b7fdd8f55b05',
                    'title'                 => 'Editors Resume',
                    'fields'                => [
                        [
                            'key'               => 'field_5b7fdd9788164',
                            'label'             => 'Resume file',
                            'name'              => 'resume',
                            'type'              => 'file',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => [
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ],
                            'return_format'     => 'array',
                            'library'           => 'all',
                            'min_size'          => '',
                            'max_size'          => '',
                            'mime_types'        => 'pdf,txt',
                        ],
                    ],
                    'location'              => [
                        [
                            [
                                'param'    => 'post_type',
                                'operator' => '==',
                                'value'    => EDITORS_SLUG,
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

//if (is_admin())
$editors_acf_fields = new EditorsAcfFields();