<?php

class Get {
    
    // Agrega como propiedades el dominio, indispensable ne mvc4
    private $domain;

    // Se inicializa cada vez que se crea una instancia de la clase
    public function __construct() {
        $this->domain = new Admin();
    }

    private function notGet(): void {
        if (isset($_GET)) {
            header("Location: " . PATH_URI);
        }
    }

    // Metodos Get

    public function getGalaxias() {
        return $this->domain->get();
    }

    public function newGalaxia() {
        $this->domain->createGalaxia();
    }

    public function getGalaxiaById() {
        $this->domain->getGalaxiaById();
    }

    public function updateGalaxia() {
        $this->domain->updateGalaxia();
    }

    public function removeGalaxia() {
        $this->domain->removeGalaxia();
    }

    public function getNameGalaxy($id) {
        $this->domain->getNameGalaxy($id);
    }

    public function getPlanets($id) {
        return $this->domain->getPlanets($id);
    }

    public function newPlaneta() {
        $this->domain->newPlaneta();
    }

    public function getPlanetById() {
        $this->domain->getPlanetById();
    }

    public function updatePlaneta() {
        $this->domain->updatePlaneta();
    }
    
    public function removePlaneta(){
        $this->domain->removePlaneta();
    }

}
