<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/12/2014
 * Time: 18:51
 */

class Controlador {


    public static function instalar1()
    {
        require_once(RUTA_ABS.'/Install/Vistas/instalador.php');
    }

    public static function instalar2()
    {


        $datos = [
                'servidor' => '',
                'bd' => '',
                'usuario' => '',
                'clave' => ''
        ];
        if ($_POST) {
            $datos = $_POST;
            print_r($datos);
            if (DataBaseLayer::tryConnection("MySqlProvider",$datos)) {
                $_SESSION['parametros'] = $datos;
               // header("Location: index.php?action=instalar3");
                echo "correcto";
            }
        }
        require_once(RUTA_ABS.'/Install/Vistas/formulario-config.php');
    }

    public static function instalar3()
    {

    }

    public static function instalar4()
    {

    }

    public static function instalar5()
    {

    }

} 