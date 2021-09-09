<?php

namespace Servier\Admin;

class UserRoles
{
    public function __construct()
    {
        $role_object = get_role('editor');
        if (!$role_object->has_cap('edit_theme_options')) {
            $role_object->add_cap('edit_theme_options');
        }
    }
}
