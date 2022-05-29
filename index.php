<?php

/**
 * 
 * Incluye las servlet y configuraciones iniciales
 *  
 */
include_once 'class/controller/servlet.php';
// Ya que siempre se llama al archivo index desde el navegador las variables e inicializador se incluyen aquí. 
new Init();
Reporter::err();
/** @var type $_REQUEST */
// Si la variable view esta incluida en la url se accede a este la funcion View
if (isset($_REQUEST['view'])) {
    Servlet::view();
// Si no si, esta incluida la variable get, se accede a la function Get
} elseif (isset($_REQUEST['get'])) {
    Servlet::get();
// Si no, se va a inicio
} else {
    Servlet::start();
}
