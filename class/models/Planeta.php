<?php

/*
 * Todos los derechos reservados
 */

/**
 * Description of Planeta
 *
 * @author echo
 */
class Planeta {

    public function __construct() {
        
    }
    
    // CRUDId
    // Read, en el caso de agrupación o según la necesidad, como en este ejemplo, 
    // no se pueden mostrar todos los registros, ya que pertenecen a una tabla madre
    public static function get(int $id): array {
        try {
            $query = "SELECT * FROM universo.planeta WHERE galaxia = ?";
            $stament = Init::conectar()->prepare($query);
            $stament->execute([$id]);
            return $stament->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return [];
        }
    }
    
    // Get By Id
    public static function getById(int $id_planeta): array {
        try {
            $query = "SELECT * FROM planeta WHERE id_planeta = ?";
            $stament = Init::conectar()->prepare($query);
            $stament->execute([$id_planeta]);
            return $stament->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return [];
        }
    }
    
    // Create
    public static function create(string $nombre_planeta, string $masa, int $numero, string $img, int $galaxia, string $descripcion): bool {
        try {
            $conector = Init::conectar();
            $conector->beginTransaction();
            $query = "INSERT INTO planeta(nombre_planeta,masa,numero,img,galaxia,descripcion) VALUES (?, ?, ?, ?, ?, ?)";
            $stament = $conector->prepare($query);
            $stament->execute([$nombre_planeta, $masa, $numero, $img, $galaxia, $descripcion]);
            return $conector->commit();
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return false;
        }
    }
    
    // Update
    public static function update(string $nombre_planeta, string $masa, int $numero, string $img, int $galaxia, string $descripcion, int $id_planeta): bool {
        try {
            $conector = Init::conectar();
            $conector->beginTransaction();
            $query = "UPDATE planeta SET nombre_planeta = ?, masa = ?, numero = ?, img = ?, galaxia = ?, descripcion = ? WHERE id_planeta = ?";
            $stament = $conector->prepare($query);
            $stament->execute([$nombre_planeta, $masa, $numero, $img, $galaxia, $descripcion, $id_planeta]);
            return $conector->commit();
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return false;
        }
    }
    
    // Delete
    public static function delete(int $id_planeta): bool {
        try {
            $conector = Init::conectar();
            $conector->beginTransaction();
            $query = "DELETE FROM planeta WHERE id_planeta = ?";
            $stament = $conector->prepare($query);
            $stament->execute([$id_planeta]);
            return $conector->commit();
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return false;
        }
    }

}
