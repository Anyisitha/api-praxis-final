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

        add_action( 'phpmailer_init', array($this, 'mailerConfig'), 1, 1);
        add_action( 'wp_mail_failed', array($this, 'onMailError'), 10, 1 );
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
            "content_admin"
        );

        /** Home Submenu */
        add_submenu_page(
            "content_admin",
            "Home - Content Admin | Praxis' Api",
            "Home",
            "manage_options",
            "home-content-admin",
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

    /**
     * This function is used from configurate the mailer for send emails.
     * @param any $phpmailer with the construct the mailer.
     * @return void
     */
    public function mailerConfig( $phpmailer )
    {
        $phpmailer->Host = "mail.praxispharmaceutical.com.co";
        $phpmailer->Port = 587;
        $phpmailer->Username = "_mainaccount@praxispharmaceutical.com.co";
        $phpmailer->Password = "yy?8~Gu)?5";
        $phpmailer->SMTPAuth = true;
        $phpmailer->SMTPSecure = "tls";
        $phpmailer->isSMTP();
    }
    
     
    public function onMailError( $wp_error ) {
        echo "<pre>";
        echo json_encode($wp_error);
        echo "</pre>";
    }   
}