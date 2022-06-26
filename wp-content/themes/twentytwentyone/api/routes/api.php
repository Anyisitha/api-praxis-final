<?php

namespace Api;

require_once dirname(__DIR__) . "/app/Http/Controllers/HomeController.php";
require_once dirname(__DIR__) . "/app/Http/Controllers/ComplementsController.php";
require_once dirname(__DIR__) . "/app/http/controllers/TerapeuticNumber.php";
require_once dirname(__DIR__) . "/app/http/controllers/ProductsController.php";
require_once dirname(__DIR__) . "/app/http/controllers/AliadosControllers.php";

use App\Http\Controllers\ComplementsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TerapeuticNumberController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\AliadosController;

class Routes
{
    public $home = null;
    public $complements = null;
    public $terapeutic_number = null;
    public $products = null;
    public $aliados = null;

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
        $this->home = new HomeController();
        $this->complements = new ComplementsController();
        $this->terapeutic_number = new TerapeuticNumberController();
        $this->products = new ProductsController();
        $this->aliados = new AliadosController();
    }

    public function configRoutes()
    {
        $this->homeRoutes();
        $this->terapeuticNumberRoutes();
        $this->productsRoutes();
        $this->aliadosRoutes();
    }

    public function homeRoutes()
    {
        register_rest_route('/admin/home', 'get-content-types', array(
            'methods' => 'GET',
            'callback' => array($this->complements, 'getContentTypes')
        ));

        register_rest_route('/admin/home', 'get-home-contents', array(
            'methods' => 'GET',
            'callback' => array($this->home, 'getHomeContents')
        ));

        register_rest_route('/admin/home', 'create-home-contents', array(
            'methods' => 'POST',
            'callback' => array($this->home, 'createHomeContents')
        ));

        register_rest_route('/admin/home', 'edit-home-contents', array(
            'methods' => 'POST',
            'callback' => array($this->home, 'editHomeContents')
        ));

        register_rest_route('/admin/home', 'change-status', array(
            'methods' => 'POST',
            'callback' => array($this->home, 'changeStatus')
        ));
    }

    public function terapeuticNumberRoutes()
    {
        register_rest_route('/admin/terapeutic-number', 'get-terapeutic-number-contents', array(
            'methods' => 'GET',
            'callback' => array($this->terapeutic_number, 'getTerapeuticNumberContents')
        ));

        register_rest_route('/admin/terapeutic-number', 'create-terapeutic-number-contents', array(
            'methods' => 'POST',
            'callback' => array($this->terapeutic_number, 'createTerapeuticNumberContents')
        ));

        register_rest_route('/admin/terapeutic-number', 'edit-terapeutic-number-contents', array(
            'methods' => 'POST',
            'callback' => array($this->terapeutic_number, 'editTerapeuticNumberContents')
        ));

        register_rest_route('/admin/terapeutic-number', 'change-status', array(
            'methods' => 'POST',
            'callback' => array($this->terapeutic_number, 'changeStatus')
        ));
    }

    public function productsRoutes()
    {
        register_rest_route('/admin/products', 'get-products-contents', array(
            'methods' => 'GET',
            'callback' => array($this->products, 'getProductsContents')
        ));

        register_rest_route('/admin/products', 'create-products-contents', array(
            'methods' => 'POST',
            'callback' => array($this->products, 'createProductsContents')
        ));

        register_rest_route('/admin/products', 'edit-products-contents', array(
            'methods' => 'POST',
            'callback' => array($this->products, 'editProductsContents')
        ));

        register_rest_route('/admin/products', 'change-status', array(
            'methods' => 'POST',
            'callback' => array($this->products, 'changeStatus')
        ));
    }

    public function aliadosRoutes()
    {
        register_rest_route('/admin/aliados', 'get-aliados-contents', array(
            'methods' => 'GET',
            'callback' => array($this->aliados, 'getAliadosContents')
        ));

        register_rest_route('/admin/aliados', 'create-aliados-contents', array(
            'methods' => 'POST',
            'callback' => array($this->aliados, 'createAliadosContents')
        ));

        register_rest_route('/admin/aliados', 'edit-aliados-contents', array(
            'methods' => 'POST',
            'callback' => array($this->aliados, 'editAliadosContents')
        ));

        register_rest_route('/admin/aliados', 'change-status', array(
            'methods' => 'POST',
            'callback' => array($this->aliados, 'changeStatus')
        ));
    }
}
