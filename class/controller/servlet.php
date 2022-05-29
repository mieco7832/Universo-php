<?php
/**
 * 
 * Servlet, todas las peticiones se controlan a través de la clase servlet.
 * 
 */
include_once 'class/config/log.php';
include_once 'class/config/init.php';
include_once 'class/controller/view.php';
include_once 'class/controller/get.php';
include_once 'class/domain/admin.php';
include_once 'class/models/Galaxia.php';
include_once 'class/models/Planeta.php';

class Servlet {

    public function __construct() {
        
    }
    
    // El inicializador se la primera instancia, es la pagina de inicio
    public static function start(): void {
        try {
            //Incluye componentes de 
            include_once 'views/component/head.php';
            include_once 'views/home.php';
            include_once 'views/component/foot.php';
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }
    
    // Todas las peticiones de vista las controla la función view
    public static function view(): void {
        try {
            //Incluye componentes
            include_once 'views/component/head.php';
            View::redirect(VIEW);
            include_once 'views/component/foot.php';
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }
    
    // Para peticiones de texto o json se utiliza la funcion get
    public static function get() {
        try {
            if (method_exists(new Get(), GET)) {
                call_user_func([new Get(), GET]);
            }
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }

}
