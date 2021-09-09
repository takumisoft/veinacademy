<?php

namespace Servier\Theme;

use Timber\Menu;

class RegisterMenu
{
    private $name;
    private $slug;

    public function __construct($name, $slug)
    {
        if ($name == null && $slug == null) return;

        add_action('init', [$this, 'register_location']);
        add_filter('timber_context', [$this, 'add_menus_to_context']);

        $this->name = $name;
        $this->slug = $slug;
    }

    public function add_menus_to_context($context)
    {
        if (has_nav_menu($this->slug)) {
            $context[$this->slug] = new Menu($this->slug);
        }

        return $context;
    }

    function register_location()
    {
        register_nav_menu($this->slug, __($this->name));
    }
}