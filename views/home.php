<?php
// Componente PANEL incluido
include_once 'views/component/panel.php';
// Instancia de la clase GET
$get = new Get();
?>
<div class="container">
    <div class="row">
        <div class="col">
            <h3>Estas en el Universo</h3>
        </div>
    </div>
    <br>
    <div class="row">
        <?php
        $list = $get->getGalaxias();
        if (!empty($list)) {
            foreach ($list as $k) {
                echo ' <div class="col-md-4">
                        <div class="card shadow-sm hoverable" style="width: 15rem;">
                            <img src="' . $k->img . '" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $k->nombre . '</h5>
                                <p class="card-text">' . $k->descripcion . '</p>
                                <div class="row">
                                    <div class="col">
                                        <a href="./view/galaxy/' . $k->id_galaxia . '" class="btn btn-primary" >Viajar</a>  
                                    </div>
                                    <div class="col">  
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-menu-button"></i>                                            
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li><button type="button" class="dropdown-item" onclick="update(&#39;' . $k->id_galaxia . '&#39;)">Actualizar</button></li>
                                                <li><button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#remove" onclick="remove(&#39;' . $k->id_galaxia . '&#39;)">Eliminar</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }
        ?>
        <div class="col-md-4">
            <div class="card shadow-sm hoverable" style="width: 15rem;">
                <img src="resources/img/galaxia-espiral.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Nueva Galaxia</h5>
                    <p class="card-text">Crea una galaxia y luego agrega planetas.</p>
                    <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#modal-new-galaxia" onclick="add()">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-new-galaxia" tabindex="-1" role="dialog" aria-labelledby="modal-new-planeta" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nueva Galaxia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" maxlength="120" class="form-control" id="input-nombre-galaxia" placeholder="Nomre de la galaxia"><br>
                <input type="text" maxlength="500" class="form-control" id="input-desc-galaxia" placeholder="Descripción"><br>
                <input type="text" maxlength="300" class="form-control" id="input-url-galaxia" placeholder="Url de la imagen">
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
                ¿De verdad quieres eliminar está Glaxia?
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

