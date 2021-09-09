<?php

namespace Servier;

use Timber\FunctionWrapper;
use Timber\Menu;
use Timber\Site;
use Timber\URLHelper;
use Timber\Helper;
// use HelloNico\Twig\DumpExtension;

final class ServierSite extends Site
{
    private static $google_font_query = 'Heebo:100,300,400,500,700';

    public function __construct()
    {
        parent::__construct();

        add_filter('timber_context', [$this, 'add_to_context']);
        add_filter('get_twig', [$this, 'add_to_twig']);
        add_theme_support( 'post-thumbnails' );
        $this->initConfig();
    }

    public function initConfig()
    {
        // Admin
        new Admin\AdminBar('bottom');
        new Admin\AdminStyleSheet();
        new Admin\AdminSidebar();
        new Admin\AdminFooter();
        new Admin\AdminWidgets();
        new Admin\AdminDashboard();

        new Admin\LastModifiedDate();
        new Admin\UserRoles();

        // Front
        new Front\Head();
        new Front\Fonts(self::$google_font_query);
        new Front\BodyClass();
        new Front\Search();

        // Theme
        new Theme\AcfFields();
        new Theme\Media();
        new Theme\ThemeFeatures();

        new Theme\RegisterMenu('Sidebar menu', 'sidebar_menu');

        // Plugins
        new Plugins\YaostSeo();
        new Plugins\JuizSps();

    }

    function add_to_context($context)
    {
        // Menus
        $context['current_url'] = URLHelper::get_current_url();
        $context['footer_columns'] = get_field('footer_columns', 'option');
        $context['is_home'] = is_front_page();
        $context['is_search'] = is_search();
        $context['post_type'] = get_post_type() ? get_post_type() : 'page';

        $context['get_posts'] = new FunctionWrapper('get_posts');

        $context['get_category_query'] = isset($_GET['cat']) && !empty( $_GET['cat'] ) ? preg_replace('/,+/', ',', ltrim($_GET['cat'],',')) : false;
		$context['get_libcat_query'] = isset($_GET['libcat']) && !empty( $_GET['libcat'] ) ? $_GET['libcat'] : false;

        return $context;
    }

    function add_to_twig($twig)
    {
        $twig->addExtension(new Twig\CleanTitle());
        $twig->addExtension(new Twig\BreakTitle());
        $twig->addExtension(new Twig\HighLight());
        // $twig->addExtension(new DumpExtension());

        return $twig;
    }

}
