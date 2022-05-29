<?php

/**
 * / [Reporte en archivos de texto] /
 * 
 *  El documento se localiza en (root/.log/*)
 *  
 *  .sql.log Guarda los reportes de error de la base de datos
 *  .log Guarda los reportes de Vista, ya sea método GET o POST
 * 
 */
class Reporter {

    //Inicialización, no mostrar errores en pantalla
    public static function err(): void {
        set_error_handler(function ($severidad, $mensaje, $fichero, $línea) {
            if (0 === error_reporting()) {
                return false;
            }
            throw new ErrorException($mensaje, 0, $severidad, $fichero, $línea);
        });
    }

    // Borra todo regsitro del archivo 
    public static function rollbackReporter($file): void {
        try {
            $fl = fopen(filter_input(INPUT_SERVER, "DOCUMENT_ROOT") . "/.log/$file", 'wb');
            fwrite($fl, '# Reporting' . $file . "\n" . '[Fecha]            [Reporte]');
            fclose($fl);
        } catch (Exception $e) {
            
        }
    }

    // Destinado para los errores de la base de datos
    public static function errorSql($e): void {
        try {
            error_log("\n" . date('Y-m-d H:i:s') . " Causa: $e", 3, '.log/.sqllog');
        } catch (Exception $e) {
            
        }
    }

    // Destinado para los errores de GET o POST
    public static function errorGet($e): void {
        try {
            error_log("\n" . date('Y-m-d H:i:s') . " Causa: $e", 3, '.log/.log');
        } catch (Exception $e) {
            
        }
    }

}
