<?php

class Admin {
    
    // Agregamos las propiedades de la vista en la clase admin, de esta manera se inicializan cada vez que se instancia
    private $nombre, $descripcion, $url, $id, $masa, $numero, $galaxia;

    public function __construct() {
        // Evaluamos si las variables ya sean get o post estan en uso, sino se les asigna null
        // la funcion ISSET evalua si la propiedad de la super gobal es valida, devuelve Boolean
        $this->nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
        $this->descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : null;
        $this->url = isset($_POST['url']) ? $_POST['url'] : null;
        $this->id = isset($_POST['id']) ? $_POST['id'] : null;
        $this->masa = isset($_POST['masa']) ? $_POST['masa'] : null;
        $this->numero = isset($_POST['numero']) ? $_POST['numero'] : null;
        $this->galaxia = isset($_POST['galaxia']) ? $_POST['galaxia'] : null;
    }
    
    // Metodos Ajax o invoaciones de la vista
    
    public function get(): array {
        try {
            return Galaxia::get();
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
            return [];
        }
    }

    public function createGalaxia() {
        try {
            Galaxia::create($this->nombre, $this->url, $this->descripcion);
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }

    public function getGalaxiaById() {
        try {
            $msj = [];
            foreach (Galaxia::getById($this->id) as $gx) {
                $msj['nombre'] = $gx->nombre;
                $msj['descripcion'] = $gx->descripcion;
                $msj['url'] = $gx->img;
            }
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
            $msj['nombre'] = "NULL";
            $msj['descripcion'] = "NULL";
            $msj['url'] = "NULL";
        } finally {
            echo json_encode($msj);
        }
    }

    public function updateGalaxia() {
        try {
            Galaxia::update($this->nombre, $this->url, $this->descripcion, $this->id);
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }

    public function removeGalaxia() {
        try {
            Galaxia::delete($this->id);
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }

    public function getNameGalaxy($id) {
        try {
            $nombre = "";
            foreach (Galaxia::getById(intval($id)) as $gx) {
                $nombre = $gx->nombre;
            }
            echo $nombre;
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
            return "NULL";
        }
    }

    public function getPlanets($id) {
        try {
            return Planeta::get($id);
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
            return [];
        }
    }

    public function newPlaneta() {
        try {
            Planeta::create($this->nombre, $this->masa, $this->numero, $this->url, $this->id, $this->descripcion);
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }

    public function getPlanetById() {
        try {
            $msj = [];
            foreach (Planeta::getById($this->id) as $gx) {
                $msj['nombre'] = $gx->nombre_planeta;
                $msj['descripcion'] = $gx->descripcion;
                $msj['url'] = $gx->img;
                $msj['masa'] = $gx->masa;
                $msj['numero'] = $gx->numero;
            }
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
            $msj['nombre'] = "NULL";
            $msj['descripcion'] = "NULL";
            $msj['url'] = "NULL";
            $msj['masa'] = "NULL";
            $msj['numero'] = "NULL";
        } finally {
            echo json_encode($msj);
        }
    }

    public function updatePlaneta() {
        try {
            Planeta::update($this->nombre, $this->masa, $this->numero, $this->url, $this->galaxia, $this->descripcion, $this->id);
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }

    public function removePlaneta() {
        try {
            Planeta::delete($this->id);
        } catch (ErrorException $e) {
            Reporter::errorGet($e);
        }
    }

}
