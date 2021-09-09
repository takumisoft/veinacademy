<?php

namespace Servier\Twig;

class BreakTitle extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('break_title', [$this, 'replace_pipe']),
        ];
    }

    public function replace_pipe($text)
    {
        $text = str_replace("|", "<br>", $text);
        return $text;
    }
}
