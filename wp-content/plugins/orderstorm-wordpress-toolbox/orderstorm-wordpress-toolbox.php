<?php
/*
Plugin Name: OrderStorm WordPress Toolbox
Plugin URI: http://www.orderstorm.com/wordpress-ecommerce
Description: A plugin containing code snippets to re-implement WordPress default widgets (recent posts, categories, archives) as shortcodes.
Version: 0.2
Author: OrderStorm, Inc.
Author URI: http://www.orderstorm.com
License: GPL2 or later
*/

/*
	Copyright (C) 2010-2011 OrderStorm, Inc. (e-mail: wordpress-ecommerce@orderstorm.com)
	
    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

/*
Re-implementation of WordPress default widgets as shortcodes
*/
add_shortcode('orderstorm_archives', 'orderstorm_archives_shortcode');
add_shortcode('orderstorm_categories', 'orderstorm_categories_shortcode');
add_shortcode('orderstorm_recent_posts', 'orderstorm_recent_posts_shortcode');

function orderstorm_archives_shortcode($attributes)
{
	$html = "";
	
	extract
	(
		shortcode_atts
		(
			array
			(
				'title' => __('Archives'),
				'before_list' => '',
				'before_title' => '',
				'after_title' => '',
				'after_list' => '',
				'display_as_dropdown' => false,
				'show_post_counts' => false
			),
			$attributes
		)
	);
	
	$display_as_dropdown = interpret_as_boolean($display_as_dropdown, false);
	$show_post_counts = interpret_as_boolean($show_post_counts, false);
	
	if (!(is_null($display_as_dropdown) || is_null($show_post_counts)))
	{
		$title = apply_filters('orderstorm_shortcode_title', $title, 'archives');
		
		$html .= $before_list;
		if ($title)
		{
			$html .= $before_title . $title . $after_title;
		}
		
		if ($display_as_dropdown)
		{
			$html .=	"<select name=\"archive-dropdown\" onchange=\"document.location.href=this.options[this.selectedIndex].value;\"> <option value=\"\">"
						. esc_attr(__('Select Month'))
						. "</option> "
						. wp_get_archives(apply_filters('orderstorm_archives_shortcode_dropdown_args', array('echo' => 0, 'type' => 'monthly', 'format' => 'option', 'show_post_count' => $show_post_counts)))
						. " </select>";
		}
		else
		{
			$html .=	"<ul>"
						. wp_get_archives(apply_filters('orderstorm_archives_shortcode_args', array('echo' => 0, 'type' => 'monthly', 'show_post_count' => $show_post_counts)))
						. "</ul>";
		}
		
		$html .= $after_list;
	}
	
	return $html;
}

function orderstorm_categories_shortcode($attributes)
{
	$html = "";
	
	extract
	(
		shortcode_atts
		(
			array
			(
				'title' => __('Categories'),
				'before_list' => '',
				'before_title' => '',
				'after_title' => '',
				'after_list' => '',
				'display_as_dropdown' => false,
				'show_post_counts' => false,
				'show_hierarchy' => false,
				"name" => "ostrm_cat",
				"id" => "ostrm_cat"
			),
			$attributes
		)
	);
	
	$display_as_dropdown = interpret_as_boolean($display_as_dropdown, false);
	$show_post_counts = interpret_as_boolean($show_post_counts, false);
	$show_hierarchy = interpret_as_boolean($show_hierarchy, false);
	
	if (!(is_null($display_as_dropdown) || is_null($show_post_counts) || is_null($show_hierarchy)))
	{
		$title = apply_filters('orderstorm_shortcode_title', $title, 'categories');
		
		$html .= $before_list;
		if ($title)
		{
			$html .= $before_title . $title . $after_title;
		}
		
		$cat_args = array("name" => $name, id => $id, "echo" => 0, "orderby" => "name", "show_count" => ($show_post_counts?1:0), "hierarchical" => ($show_hierarchy?1:0));
		
		if ($display_as_dropdown)
		{
			$cat_args["show_option_name"] = __("Select Category");
			$html .= wp_dropdown_categories(apply_filters('orderstorm_categories_shortcode_dropdown_args', $cat_args));
			wp_enqueue_script('ostrm_categories_dropdown', plugin_dir_url(__FILE__) . 'js/ostrm_categories_dropdown.js', array('jquery'), '1.0', true);
			$categoriesDropdownGlobals = array
			(
				"id" => $id,
				"home_url" => home_url()
			);
			wp_localize_script
			(
				'ostrm_categories_dropdown',
				'categoriesDropdownGlobals',
				$categoriesDropdownGlobals
			);
		}
		else
		{
			$cat_args["title_li"] = "";
			$html .=	"<ul>"
						. wp_list_categories(apply_filters('orderstorm_categories_shortcode_args', $cat_args))
						. "</ul>";
		}
		
		$html .= $after_list;
	}
	
	return $html;
}

function orderstorm_recent_posts_shortcode($attributes)
{
	$html = "";
	
	extract
	(
		shortcode_atts
		(
			array
			(
				'title' => __('Recent Posts'),
				'before_list' => '',
				'before_title' => '',
				'after_title' => '',
				'after_list' => '',
				'number' => 10
			),
			$attributes
		)
	);
	
	$r = new WP_Query(array('posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true));
	if ($r->have_posts())
	{
		$title = apply_filters('orderstorm_shortcode_title', $title, 'recent_posts');
		
		$html .= $before_list;
		if ($title)
		{
			$html .= $before_title . $title . $after_title;
		}
		
		$html .= "<ul>";
		while ($r->have_posts())
		{
			$r->the_post();
			$recent_post_title = (get_the_title()?get_the_title():get_the_ID());
			$html .=	"<li><a href=\""
						. get_permalink()
						. "\" title=\""
						. esc_attr($recent_post_title)
						. "\">"
						. $recent_post_title
						. "</a></li>";
		}
		$html .= "</ul>";
		
		$html .= $after_list;
		
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
	}
	
	return $html;
}

function interpret_as_boolean($value, $default)
{
	if (!is_bool($default)) $default = false;
	
	if (!is_bool($value))
	{
		$value = strtolower((string) $value);
		if (in_array($value, array('0', '1', 'true', 'false'), true))
		{
			if ($value === '0' || $value === 'false')
			{
				$value = false;
			}
			elseif ($value === '1' || $value === 'true')
			{
				$value = true;
			}
			else
			{
				$value = null;
			}
		}
		else
		{
			$value = null;
		}
	}
	
	return $value;
}
?>