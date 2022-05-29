<?php
// Instancia de la clase GET
$get = new Get();
// Componete PANEL incluido
include_once 'views/component/panel.php';
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Estas en <?= $get->getNameGalaxy($_GET['galaxy']); ?></h3>
        </div>
    </div>
    <br>

    <div class="row">
        <?php
        $list = $get->getPlanets($_GET['galaxy']);
        if (!empty($list)) {
            foreach ($list as $pl) {
                echo '<div class="col-md-4">
                        <div class="card shadow-sm hoverable" style="width: 15rem;">
                            <img src="' . $pl->img . '" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"></div>
                                        <div class="col">  
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-menu-button"></i> 
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li><button type="button" class="dropdown-item" onclick="update(' . $pl->id_planeta . ')">Actualizar</button></li>
                                                    <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#remove" onclick="remove(' . $pl->id_planeta . ')">Eliminar</button></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="card-title">' . $pl->nombre_planeta . '</h5>
                                    <p class="card-text">Masa: ' . $pl->masa . '</p>
                                    <p class="card-text">Número: ' . $pl->numero . '</p>
                                    <p class="card-text">Descripción: ' . $pl->descripcion . '</p>
                                </div>
                        </div>
                    </div>   ';
            }
        }
        ?>
        <div class="col-md-4">
            <div class="card shadow-sm hoverable" style="width: 15rem;">
                <img src="<?= PATH ?>resources/img/polvo-cosmico.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nuevo Planeta</h5>
                    <p class="card-text">Crea un Planeta con atributos y descripción.</p>
                    <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modal-new-planeta" onclick="add()">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-new-planeta" tabindex="-1" role="dialog" aria-labelledby="modal-new-galaxia" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nuevo Planeta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" value="<?= $_GET['galaxy'] ?>" id="hidden-id-galaxia">
                <input type="text" maxlength="120" class="form-control" id="input-nombre-planeta" placeholder="Nomre del Planeta"><br>
                <div class="input-group">
                    <input type="text" maxlength="50" class="form-control" id="input-masa-planeta" placeholder="Masa">
                    <input type="number" min="1" max="99" class="form-control" id="input-numero-planeta" placeholder="Número">
                </div><br>
                <input type="text" maxlength="300" class="form-control" id="input-descripcion-planeta" placeholder="Descripción"><br>
                <input type="text" maxlength="400" class="form-control" id="input-url-planeta" placeholder="Url de la imagen">
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="remove" tabindex="-1" aria-labelledby="removeLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeLabel">Eliminar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿De verdad quieres eliminar este Planeta?
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


