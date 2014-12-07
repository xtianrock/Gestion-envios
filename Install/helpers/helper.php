<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 06/12/2014
 * Time: 17:13
 */

/**
 * Divide el archi de base de datos en consultas simples y las ejecuta.
 *
 * @param $fichero
 * @param $modelo
 *
 * @return mixed
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
    array_pop($consultas);
    return $modelo->importarDb($consultas);

}
