<?php

namespace Servier\Theme;

class Media
{
    public function __construct()
    {
        add_filter('jpeg_quality', [$this, 'set_new_image_quality']);
        add_filter('wp_editor_set_quality', [$this, 'set_new_image_quality']);
        add_filter('image_size_names_choose', [$this, 'add_custom_image_names']);
        add_action('after_setup_theme', [$this, 'add_custom_image_sizes']);
        // Accept svg files
        add_filter('upload_mimes', [$this, 'allow_svg_uploads']);
        // Iframe embeds
        add_filter('embed_oembed_html', [$this, 'embed_responsive_wrapper'], 10, 3);
        add_filter('video_embed_html', [$this, 'embed_responsive_wrapper']); // Jetpack

    }

    public function set_new_image_quality($quality)
    {
        return 70;
    }

    public function add_custom_image_names($sizes)
    {
        $images = $this->getImages();

        return array_merge($sizes, array_column($images, 'label', 'slug'));
    }

    public function getImages()
    {
        return [
            [
                'label'  => __('Listing 360x360'),
                'slug'   => 'medium',
                'width'  => 360,
                'height' => 360,
                'crop'   => true,
            ],
            [
                'label'  => __('Ratio 8:5 (websites)'),
                'slug'   => 'ratio_8_5',
                'width'  => 800,
                'height' => 500,
                'crop'   => ['center', 'top'],
            ],
        ];
    }

    public function add_custom_image_sizes()
    {
        $images = $this->getImages();
        foreach ($images as $image) {
            add_image_size($image['slug'], $image['width'], $image['height'], $image['crop']);
        }
    }

    public function allow_svg_uploads($mimes)
    {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }

    //  Add responsive container to iframe embeds
    function embed_responsive_wrapper($html)
    {
        return '<div class="embed-responsive embed-responsive-16by9">' . $html . '</div>';
    }

}
