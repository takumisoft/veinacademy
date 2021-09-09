<?php

namespace Servier\Plugins;

class JuizSps
{
    public function __construct()
    {
        add_filter('juiz_sps_container_tag', [$this, 'container_tag'], 10);
        add_filter('juiz_sps_container_classes', [$this, 'container_classes'], 10);
    }

    public function container_tag()
    {
        return 'nav';
    }

    public function container_classes()
    {
        return 'post-share';
    }

}


