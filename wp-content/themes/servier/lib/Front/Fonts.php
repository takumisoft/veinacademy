<?php

namespace Servier\Front;

class Fonts
{
    protected $font_query;

    public function __construct($google_font_query = null )
    {
        if (is_null($google_font_query) || empty($google_font_query)) return;
        add_action('wp_enqueue_scripts', [$this, 'enqueue_google_fonts']);
        $this->font_query = $google_font_query;
    }

    public function enqueue_google_fonts()
    {
        wp_enqueue_style('google-fonts', $this->getGoogleFontUrl(), [], null);
    }

    /**
     * Register Google fonts
     *
     * @return string Google fonts URL for the theme.
     */
    public function getGoogleFontUrl()
    {
        $fonts_url = '';
        $fonts = [];
        $subsets = 'latin,latin-ext';

        if ('off' !== _x('on', 'Custom font: on or off')) {
            $fonts[] = $this->font_query;
        }

        $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)');

        if ('cyrillic' == $subset) {
            $subsets .= ',cyrillic,cyrillic-ext';
        } elseif ('greek' == $subset) {
            $subsets .= ',greek,greek-ext';
        } elseif ('devanagari' == $subset) {
            $subsets .= ',devanagari';
        } elseif ('vietnamese' == $subset) {
            $subsets .= ',vietnamese';
        }

        if (!empty($fonts)) {
            $fonts_url = add_query_arg([
                'family' => urlencode(implode('|', $fonts)),
                'subset' => urlencode($subsets),
            ], 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }
}
