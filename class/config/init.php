<?php

# *******************************************************
# *     Inicializa los paramétros de la aplicación      *
# *******************************************************

class Init {
# Define el constructor; 
# La fecha del servidor
# Variables constantes
# Uso de Sesiones

    public function __construct() {
        date_default_timezone_set('America/El_Salvador');
        define("VERSION", "0.01b");
        define("PATH", (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER["HTTP_HOST"] . "/universo/");
        //define("PATH_URI", (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER["HTTP_HOST"] . "sub dominios");
        define("CURRENTURI", (isset($_SERVER['HTTPS']) ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        define("VIEW", isset($_REQUEST['view']) ? $_REQUEST['view'] : null);
        define("GET", isset($_REQUEST['get']) ? $_REQUEST['get'] : null);
        setcookie("CURRENTURI", CURRENTURI);
        $this->set_sesssion();
    }

# Conecciones a las bases de datos

    public static function conectar(): PDO {
        try {
# Nombre de la base de datos
            $dbanme = "universo";
# Usuarios para la base de datos
            $user = "root";
# Contraseña del usuario
            $pass = "442AA6EC";
# Host de base de datos
            $host = "127.0.0.1";
# Puerto de base de datos
            $puerto = "3310";
# Opciones para establecer la conexión
            $options = [
                PDO::ATTR_PERSISTENT => true,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
# Inicia una nueva conexión con los atributos establecidos previamente
            $db = new PDO("mysql:host=$host:$puerto;dbname=$dbanme", "$user", "$pass", $options);
            return $db;
        } catch (ErrorException $e) {
# En caso de un error genera un error y devuelve un mesaje
            Reporter::errorSql($e);
            return null;
        }
    }

# Opciones de la sesión en la aplicación, no depende del servidor

    private function set_sesssion() {
# Nombre de la sesión, se agrega en forma de HASH
        session_name(hash("sha256", "SESSION_BINARY_MUNE_00"));
# Tiempo en que expira, 24 horas
        session_cache_expire(1440);
        session_start();
    }

}
