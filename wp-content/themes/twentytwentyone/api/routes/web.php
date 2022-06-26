<?php

namespace Api;

require dirname(__DIR__) . "/app/Http/Controllers/Web/HomeController.php";
require dirname(__DIR__) . "/app/Http/Controllers/Web/TerapeuticNumberController.php";
require dirname(__DIR__) . "/app/Http/Controllers/AuthController.php";
require dirname(__DIR__) . "/app/Http/Controllers/Web/ProductsController.php";
require dirname(__DIR__) . "/app/Http/Controllers/Web/BlogController.php";

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProductsController;
use App\Http\Controllers\Web\TerapeuticNumberController;

class RoutesWeb
{
    public ?HomeController $home = null;
    public ?TerapeuticNumberController $terapeutic_number = null;
    public ?AuthController $auth = null;
    public ?ProductsController $products = null;
    public ?BlogController $blog = null;

    public function __construct()
    {
        $this->initControllers();

        add_action(
            'rest_api_init',
            array($this, 'configRoutes')
        );
    }

    public function initControllers()
    {
        $this->home = new HomeController;
        $this->terapeutic_number = new TerapeuticNumberController;
        $this->auth = new AuthController;
        $this->products = new ProductsController;
        $this->blog = new BlogController();
    }

    public function configRoutes()
    {
        $this->homeRoutes();
        $this->terapeuticNumberRoutes();
        $this->authRoutes();
        $this->blogRoutes();
    }

    public function createRoutes($args)
    {
        foreach ($args as $value){
            register_rest_route($value->prefix, $value->route, $value->args);
        }
    }

    public function homeRoutes()
    {
        register_rest_route('complements', 'get-logo', array(
            'methods' => 'GET',
            'callback' => array($this->home, 'getLogo')
        ));

        register_rest_route('complements', 'get-menus', array(
            'methods' => 'GET',
            'callback' => array($this->home, 'getMenus')
        ));

        register_rest_route('home', 'get-home-assets', array(
            'methods' => 'GET',
            'callback' => array($this->home, 'getHomeAssets')
        ));
    }

    public function terapeuticNumberRoutes()
    {
        register_rest_route('terapeutic-number', 'get-assets', array(
            'methods' => 'GET',
            'callback' => array($this->terapeutic_number, 'getTerapeuticNumberAssets')
        ));
    }

    public function authRoutes()
    {
        register_rest_route('auth', 'register', array(
            'methods' => 'POST',
            'callback' => array($this->auth, 'register')
        ));

        register_rest_route('auth', 'login', array(
            'methods' => 'POST',
            'callback' => array($this->auth, 'login')
        ));

        register_rest_route('users', 'get-users', array(
            'methods' => 'GET',
            'callback' => array($this->auth, 'getUsers')
        ));

        register_rest_route('users', 'delete-user', array(
            'methods' => 'POST',
            'callback' => array($this->auth, 'deleteUser')
        ));

        register_rest_route('users', 'active-user', array(
            'methods' => 'POST',
            'callback' => array($this->auth, 'activeUser')
        ));

        register_rest_route('products', 'get-assets', array(
            'methods' => 'GET',
            'callback' => array($this->products, 'productsAssets')
        ));
    }

    public function blogRoutes()
    {
        register_rest_route("blogs", "get-blog-posts", array(
           "methods" => "GET",
           "callback" => array($this->blog, "getEntriesBlog")
        ));

        register_rest_route("blogs", "get-assets", array(
           "methods" => "GET",
           "callback" => array($this->blog, "getAssets")
        ));

        register_rest_route("blogs", "get-recent-posts", array(
            "methods" => "GET",
            "callback" => array($this->blog, "getRecentPosts")
        ));

        register_rest_route("blogs", "get-posts", array(
            "methods" => "GET",
            "callback" => array($this->blog, "getPosts")
        ));
    }
}
