<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 06/12/2014
 * Time: 17:13
 */


function importSql($fichero, $modelo) {
    $consultas = file($fichero);
    foreach ($consultas as $key => $consulta) {
        if (substr($consulta, 0, 2) == "--") {
            unset($consultas[$key]);
        }
    }
    $consultas = array_values($consultas);

    $consultas = implode(" ", $consultas);
    $consultas = explode(";", $consultas);
    return $modelo->importarDb($consultas);

}
