<?php

namespace Servier\Theme;

class AcfFields
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
        $this->subtitle(); // Subtitle for Default Pages
        $this->resources(); // Url + PDF
        $this->page_home(); // Home
        $this->page_about(); // Page About - editorial board
        $this->taxonomy_fields(); // Banner image + presentation for taxonomy
        $this->attachment_website();
        $this->flexible_content();
    }

    public function subtitle()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key'                   => 'group_5937ff9f41cef',
                'title'                 => 'Subtitle',
                'fields'                => [
                    [
                        'key'               => 'field_5937ffc5cae9b',
                        'label'             => '',
                        'name'              => 'subtitle',
                        'type'              => 'text',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'default_value'     => '',
                        'placeholder'       => '...',
                        'prepend'           => 'Subtitle',
                        'append'            => 'Max 250 caractères',
                        'maxlength'         => '250',
                    ],
                ],
                'location'              => [
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'page',
                        ],
                        [
                            'param'    => 'page_type',
                            'operator' => '!=',
                            'value'    => 'front_page',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'news',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'library',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'book',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'website',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'apps',
                        ],
                    ],
                ],
                'menu_order'            => 0,
                'position'              => 'acf_after_title',
                'style'                 => 'seamless',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => 1,
                'description'           => '',
            ]);

        endif;
    }

    public function resources()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key'                   => 'group_5b716dd08eb2f',
                'title'                 => 'Resources',
                'fields'                => [
                    [
                        'key'               => 'field_5b717f220593a',
                        'label'             => 'Resources',
                        'name'              => 'resources',
                        'type'              => 'group',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'layout'            => 'block',
                        'sub_fields'        => [
                            [
                                'key'               => 'field_5b716dd82cf26',
                                'label'             => 'Url',
                                'name'              => 'url',
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
                                'key'               => 'field_5b717f0305939',
                                'label'             => 'File',
                                'name'              => 'file',
                                'type'              => 'file',
                                'instructions'      => 'Allowed files: pdf',
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
                                'mime_types'        => 'pdf,pptx',
                            ],
                        ],
                    ],
                ],
                'location'              => [
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'news',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'website',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'library',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'book',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'apps',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'page',
                        ],
                        [
                            'param'    => 'page_type',
                            'operator' => '!=',
                            'value'    => 'front_page',
                        ],
                    ],
                ],
                'menu_order'            => 0,
                'position'              => 'side',
                'style'                 => 'seamless',
                'label_placement'       => 'top',
                'instruction_placement' => 'field',
                'hide_on_screen'        => '',
                'active'                => 1,
                'description'           => '',
            ]);

        endif;
    }

    public function page_home()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key'                   => 'group_5b717ad106dc3',
                'title'                 => 'Slider',
                'fields'                => [
                    [
                        'key'               => 'field_5b717ad40067f',
                        'label'             => 'Slider',
                        'name'              => 'slider',
                        'type'              => 'repeater',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'collapsed'         => '',
                        'min'               => 0,
                        'max'               => 0,
                        'layout'            => 'table',
                        'button_label'      => 'Add slider',
                        'sub_fields'        => [
                            [
                                'key'               => 'field_5b717ae200680',
                                'label'             => 'Title',
                                'name'              => 'title',
                                'type'              => 'text',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => 0,
                                'wrapper'           => [
                                    'width' => '40',
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
                                'key'               => 'field_5b717afc00681',
                                'label'             => 'Image',
                                'name'              => 'image',
                                'type'              => 'image',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => 0,
                                'wrapper'           => [
                                    'width' => '30',
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
                            [
                                'key'               => 'field_5b717b1100682',
                                'label'             => 'Link',
                                'name'              => 'link',
                                'type'              => 'link',
                                'instructions'      => 'Link and link label',
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
                'location'              => [
                    [
                        [
                            'param'    => 'page_type',
                            'operator' => '==',
                            'value'    => 'front_page',
                        ],
                    ],
                ],
                'menu_order'            => 0,
                'position'              => 'acf_after_title',
                'style'                 => 'seamless',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => 1,
                'description'           => '',
            ]);

        endif;

        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key'                   => 'group_5b71872e6e77d',
                'title'                 => 'Listing Post Types',
                'fields'                => [
                    [
                        'key'               => 'field_5b7187619b0f8',
                        'label'             => 'Sticky Post Types',
                        'name'              => 'sticky_post_types',
                        'type'              => 'repeater',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'collapsed'         => 'field_5b72df4a18041',
                        'min'               => 0,
                        'max'               => 4,
                        'layout'            => 'block',
                        'button_label'      => 'Add Thumbnail',
                        'sub_fields'        => [
                            [
                                'key'               => 'field_5b7187b99b0f9',
                                'label'             => 'Image',
                                'name'              => 'image',
                                'type'              => 'image',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => 0,
                                'wrapper'           => [
                                    'width' => '40',
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
                                'key'               => 'field_5b72df4a18041',
                                'label'             => 'Title',
                                'name'              => 'title',
                                'type'              => 'text',
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
                                'prepend'           => '',
                                'append'            => '',
                                'maxlength'         => '',
                            ],
                            [
                                'key'               => 'field_5b7187d29b0fa',
                                'label'             => 'Link',
                                'name'              => 'link',
                                'type'              => 'page_link',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => 0,
                                'wrapper'           => [
                                    'width' => '60',
                                    'class' => '',
                                    'id'    => '',
                                ],
                                'post_type'         => [
                                    0 => 'book',
                                    1 => 'library',
                                    2 => 'news',
                                    3 => 'website',
                                    4 => 'apps',
                                ],
                                'taxonomy'          => [
                                ],
                                'allow_null'        => 0,
                                'allow_archives'    => 1,
                                'multiple'          => 0,
                            ],
                            [
                                'key'               => 'field_5b72eead4ca37',
                                'label'             => 'Color',
                                'name'              => 'color',
                                'type'              => 'select',
                                'instructions'      => '',
                                'required'          => 0,
                                'conditional_logic' => 0,
                                'wrapper'           => [
                                    'width' => '40',
                                    'class' => '',
                                    'id'    => '',
                                ],
                                'choices'           => [
                                    'gray'   => 'Gray',
                                    'blue'   => 'Blue',
                                    'purple' => 'Purple',
                                    'pink'   => 'Pink',
                                    'yellow' => 'Yellow',
                                    'brown'  => 'Brown',
                                ],
                                'default_value'     => [
                                ],
                                'allow_null'        => 0,
                                'multiple'          => 0,
                                'ui'                => 0,
                                'return_format'     => 'value',
                                'ajax'              => 0,
                                'placeholder'       => '',
                            ],
                        ],
                    ],
                ],
                'location'              => [
                    [
                        [
                            'param'    => 'page_type',
                            'operator' => '==',
                            'value'    => 'front_page',
                        ],
                    ],
                ],
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'seamless',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => [
                    0 => 'the_content',
                    1 => 'page_attributes',
                    2 => 'featured_image',
                    3 => 'categories',
                    4 => 'tags',
                ],
                'active'                => 1,
                'description'           => '',
            ]);

        endif;
    }

    public function page_about()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key'                   => 'group_5b7fdea6ea4b3',
                'title'                 => 'Editorial board relationship',
                'fields'                => [
                    [
                        'key'               => 'field_5b8d250b710a3',
                        'label'             => 'Editorial Chief',
                        'name'              => 'editorial_chief_relationship',
                        'type'              => 'relationship',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'post_type'         => [
                            0 => 'editors',
                        ],
                        'taxonomy'          => [
                            0 => 'role:editorial-chief',
                        ],
                        'filters'           => [
                            0 => 'search',
                            1 => 'post_type',
                            2 => 'taxonomy',
                        ],
                        'elements'          => [
                            0 => 'featured_image',
                        ],
                        'min'               => '',
                        'max'               => '',
                        'return_format'     => 'object',
                    ],
                    [
                        'key'               => 'field_5b7fdee348d27',
                        'label'             => 'Editorial Board',
                        'name'              => 'editorial_board_relationship',
                        'type'              => 'relationship',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'post_type'         => [
                            0 => 'editors',
                        ],
                        'taxonomy'          => [
                            0 => 'role:editorial-board',
                        ],
                        'filters'           => [
                            0 => 'search',
                            1 => 'post_type',
                            2 => 'taxonomy',
                        ],
                        'elements'          => [
                            0 => 'featured_image',
                        ],
                        'min'               => '',
                        'max'               => '',
                        'return_format'     => 'object',
                    ],
                ],
                'location'              => [
                    [
                        [
                            'param'    => 'page_parent',
                            'operator' => '==',
                            'value'    => '115',
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

    public function taxonomy_fields()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key'                   => 'group_5b75357e3805f',
                'title'                 => 'Taxonomy fields',
                'fields'                => [
                    [
                        'key'               => 'field_5b7ab188879d8',
                        'label'             => 'Presentation',
                        'name'              => 'archive_presentation',
                        'type'              => 'wysiwyg',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'default_value'     => '',
                        'tabs'              => 'all',
                        'toolbar'           => 'full',
                        'media_upload'      => 0,
                        'delay'             => 0,
                    ],
                    [
                        'key'               => 'field_5b75369af1f81',
                        'label'             => 'Category Banner Image',
                        'name'              => 'archive_banner_image',
                        'type'              => 'image',
                        'instructions'      => 'Optimal minimun size : 1140x240px',
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
                        'min_width'         => 1140,
                        'min_height'        => 240,
                        'min_size'          => '',
                        'max_width'         => '',
                        'max_height'        => '',
                        'max_size'          => '',
                        'mime_types'        => '',
                    ],
                    [
                        'key'               => 'field_fetg8421672',
                        'label'             => 'Prefix "Browse all ..."',
                        'name'              => 'archive_view_all_prefix_label',
                        'type'              => 'text',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'default_value'     => 'Browse all ',
                    ],
                    [
                        'key'               => 'field_fvdgg584294',
                        'label'             => 'Button "view more" label',
                        'name'              => 'archive_view_all_button_label',
                        'type'              => 'text',
                        'instructions'      => '',
                        'required'          => 0,
                        'conditional_logic' => 0,
                        'wrapper'           => [
                            'width' => '',
                            'class' => '',
                            'id'    => '',
                        ],
                        'default_value'     => 'Browse',
                    ],
                ],
                'location'              => [
                    [
                        [
                            'param'    => 'taxonomy',
                            'operator' => '==',
                            'value'    => 'library-type',
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

    public function attachment_website()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key'                   => 'group_5b87a6ed1177b',
                'title'                 => 'Attachement website url',
                'fields'                => [
                    [
                        'key'               => 'field_5b87a70f8da6c',
                        'label'             => 'Attachment website url',
                        'name'              => 'attachment_website',
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
                            'param'    => 'attachment',
                            'operator' => '==',
                            'value'    => 'all',
                        ],
                    ],
                ],
                'menu_order'            => 0,
                'position'              => 'normal',
                'style'                 => 'default',
                'label_placement'       => 'top',
                'instruction_placement' => 'label',
                'hide_on_screen'        => '',
                'active'                => 1,
                'description'           => '',
            ]);

        endif;
    }

    public function flexible_content()
    {
        if (function_exists('acf_add_local_field_group')):

            acf_add_local_field_group([
                'key'                   => 'group_5b7e865450000',
                'title'                 => 'Flexible Content',
                'fields'                => [
                    [
                        'key'               => 'field_5b7e8660a804d',
                        'label'             => 'Flexible Content',
                        'name'              => 'flexible_content',
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
                            '5b7e8670dbfd1'        => [
                                'key'        => '5b7e8670dbfd1',
                                'name'       => 'block_gallery',
                                'label'      => 'Gallery',
                                'display'    => 'block',
                                'sub_fields' => [
                                    [
                                        'key'               => 'field_5b7e8684a804e',
                                        'label'             => 'Gallery',
                                        'name'              => 'gallery',
                                        'type'              => 'gallery',
                                        'instructions'      => '',
                                        'required'          => 0,
                                        'conditional_logic' => 0,
                                        'wrapper'           => [
                                            'width' => '',
                                            'class' => '',
                                            'id'    => '',
                                        ],
                                        'min'               => 2,
                                        'max'               => '',
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
                                'min'        => '',
                                'max'        => '',
                            ],
                            'layout_5b7e869ca804f' => [
                                'key'        => 'layout_5b7e869ca804f',
                                'name'       => 'block_text',
                                'label'      => 'Block text',
                                'display'    => 'block',
                                'sub_fields' => [
                                    [
                                        'key'               => 'field_5b7e86aaa8050',
                                        'label'             => 'Content',
                                        'name'              => 'content',
                                        'type'              => 'wysiwyg',
                                        'instructions'      => '',
                                        'required'          => 0,
                                        'conditional_logic' => 0,
                                        'wrapper'           => [
                                            'width' => '',
                                            'class' => '',
                                            'id'    => '',
                                        ],
                                        'default_value'     => '',
                                        'tabs'              => 'all',
                                        'toolbar'           => 'full',
                                        'media_upload'      => 1,
                                        'delay'             => 0,
                                    ],
                                ],
                                'min'        => '',
                                'max'        => '',
                            ],
                        ],
                        'button_label'      => 'Add Content',
                        'min'               => '',
                        'max'               => '',
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
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'book',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'news',
                        ],
                    ],
                    [
                        [
                            'param'    => 'post_type',
                            'operator' => '==',
                            'value'    => 'website',
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
