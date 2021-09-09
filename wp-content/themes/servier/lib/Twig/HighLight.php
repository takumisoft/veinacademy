<?php

namespace Servier\Twig;

class HighLight extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('highlight', [$this, 'highlight']),
        ];
    }


    public function highlight($text, $search_query)
    {
        if (isset($search_query) && (!empty($search_query) && !is_null($search_query))) {
            $keys = explode(" ",$search_query);
            $keys = array_filter($keys);
            $text = preg_replace('/('.implode('|', $keys) .')/iu', '<mark>'.$search_query.'</mark>', $text);
        }
        return $text;
    }
}
