<?php

namespace Servier\Twig;

class CleanTitle extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('clean_title', [$this, 'replace_pipe']),
        ];
    }

    public function replace_pipe($text)
    {
        $text = str_replace("|", "", $text);
        return $text;
    }
}
