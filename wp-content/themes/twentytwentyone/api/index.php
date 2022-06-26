<?php

namespace Api;

require_once __DIR__ . "/resources/views/Aliados/aliados.php";
require_once __DIR__ . "/resources/views/home/home.php";
require_once __DIR__ . "/resources/views/terapeutic_number/teraupetic_number.php";
require_once __DIR__ . "/resources/views/Products/products.php";
require get_template_directory() . "/api/routes/api.php";
require get_template_directory() . "/api/routes/web.php";

use Api\Resources\Views\Home;
use Api\Resources\Views\Products;
use Api\Resources\Views\TerapeuticNumber;
use Api\Resources\Views\Aliados;
use Api\Routes;
use Api\RoutesWeb;

class Api
{
    /** 
     * @var Home 
     */
    public $home = null;
    public $terapeutic_number = null;
    public $products = null;
    public $aliados = null;
    public $routes = null;
    public $webRoutes = null;

    /**
     * This function is used from initialize the api component.
     * @return void
     */
    public function __construct()
    {
        add_action("admin_menu", array($this, "configMenuBar"));

        $this->home = new Home();
        $this->terapeutic_number = new TerapeuticNumber();
        $this->products = new Products();
        $this->aliados = new Aliados();
        $this->routes = new Routes();
        $this->webRoutes = new RoutesWeb();
    }

    /**
     * This function is used from config the sidebar menu in the wordpress' admin.
     * @return void
     */
    public function configMenuBar()
    {
        add_menu_page(
            "Administrador de contenido | Api Praxis",
            "Administrador de contenido",
            "manage_links",
            "content_admin",
        );

        add_submenu_page(
            "content_admin",
            "Home - Administrador de contenido | Api Praxis",
            "Home",
            "manage_options",
            "home_content_admin",
            array($this->home, "HomeView"),
            1
        );

        add_submenu_page(
            "content_admin",
            "Lineas Terapeuticas - Administrador de contenido | Api Praxis",
            "Lineas Terapeuticas",
            "manage_options",
            "terapeutic_number_content_admin",
            array($this->terapeutic_number, "TerapeuticNumberView"),
            2
        );

        add_submenu_page(
            "content_admin",
            "Productos - Administrador de contenido | Api Praxis",
            "Productos",
            "manage_options",
            "Products_content_admin",
            array($this->products, "productsView"),
            2
        );

        add_submenu_page(
            "content_admin",
            "Aliados - Administrador de contenido | Api Praxis",
            "Aliados",
            "manage_options",
            "Aliados_content_admin",
            array($this->aliados, "AliadosView"),
            4
        );
    }
}
