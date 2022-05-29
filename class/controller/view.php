<?php

class View {

    public function __construct() {
        
    }
    
    // La funcion redirect, como su nombre lo indica controla la dirección en la que se quiere acceder
    public static function redirect(string $view): void {
        switch ($view) {
            case "galaxy":
                include_once 'views/galaxia.php';
                break;
            default:
                include_once '404.html';
                break;
        }
    }

}
