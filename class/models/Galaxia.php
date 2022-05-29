<?php

/*
 * Todos los derechos reservados 
 *
 */

/**
 * Description of Galaxia
 *
 * @author echo
 */
class Galaxia {
    
    public function __construct() {
        
    }
    
    // CRUDId
    
    // Read
    public static function get(): array {
        try {
            $query = "SELECT * FROM galaxia";
            $stament = Init::conectar()->prepare($query);
            $stament->execute();
            return $stament->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return [];
        }
    }
    
    // Get By Id
    public static function getById(int $id_galaxia): array {
        try {
            $query = "SELECT * FROM galaxia WHERE id_galaxia = ?";
            $stament = Init::conectar()->prepare($query);
            $stament->execute([$id_galaxia]);
            return $stament->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return [];
        }
    }
    
    // Create
    public static function create(string $nombre, string $img, string $descripcion): bool {
        try {
            $conector = Init::conectar();
            $conector->beginTransaction();
            $query = "INSERT INTO galaxia(nombre,img,descripcion) VALUES (?, ?, ?)";
            $stament = $conector->prepare($query);
            $stament->execute([$nombre, $img, $descripcion]);
            return $conector->commit();
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return false;
        }
    }
    
    // Update
    public static function update(string $nombre, string $img, string $descripcion, int $id_galaxia): bool {
        try {
            $conector = Init::conectar();
            $conector->beginTransaction();
            $query = "UPDATE galaxia SET nombre = ?, img = ?, descripcion = ? WHERE id_galaxia = ?";
            $stament = $conector->prepare($query);
            $stament->execute([$nombre, $img, $descripcion, $id_galaxia]);
            return $conector->commit();
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return false;
        }
    }
    
    // Delete
    public static function delete(int $id_galaxia): bool {
        try {
            $conector = Init::conectar();
            $conector->beginTransaction();
            $query = "DELETE FROM galaxia WHERE id_galaxia = ?";
            $stament = $conector->prepare($query);
            $stament->execute([$id_galaxia]);
            return $conector->commit();
        } catch (PDOException $e) {
            Reporter::errorSql($e);
            return false;
        }
    }

}
