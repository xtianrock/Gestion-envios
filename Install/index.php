<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/12/2014
 * Time: 18:38
 */




require_once(RUTA_ABS."/Install/Controlador.php");
require_once(RUTA_ABS."/App/lib/DatabaseProvider.php");

// enrutamiento
$map = array(
    'instalar1' => array('controlador'=>'Controlador','metodo' =>'instalar1','titulo' =>'instalar'),
    'instalar2' => array('controlador'=>'Controlador','metodo' =>'instalar2','titulo' =>'instalar'),
    'instalar3' => array('controlador'=>'Controlador','metodo' =>'instalar3','titulo' =>'instalar'),
    'instalar4' => array('controlador'=>'Controlador','metodo' =>'instalar4','titulo' =>'instalar'),
    'instalar5' => array('controlador'=>'Controlador','metodo' =>'instalar5','titulo' =>'instalar'));


    // Parseo de la ruta
    if (isset($_GET['operacion'])) {
        if (isset($map[$_GET['operacion']])) {
            $ruta = $_GET['operacion'];
        } else {
            header('Status: 404 Not Found');
            echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                $_GET['operacion'] .
                '</p></body></html>';
            exit;
        }
    }
    else {
        $ruta = 'instalar1';
    }
    $titulo=$map[$ruta]["titulo"];
    $controlador = $map[$ruta]["controlador"];
    $metodo = $map[$ruta]["metodo"];
// Ejecución del controlador asociado a la ruta

    if (method_exists($controlador,$metodo)) {
        $controlador::$metodo();

    }
    else {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Error 404: El metodo <i>' .
            $metodo.
            ' de la clase Controlador, no existe.' .
            '</i> no existe</h1></body></html>';

    }

require_once(RUTA_ABS."/Install/Vistas/layout.php");


