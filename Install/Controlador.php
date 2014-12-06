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
            if (DataBaseLayer::tryConnection("MySqlProvider",$datos)) {
                $_SESSION['parametros'] = $datos;
               header("Location: index.php?operacion=instalar3");
            }
            else
            {
                $datos["mensaje"]="Datos de conexion erroneos";
            }
        }
        require_once(RUTA_ABS.'/Install/Vistas/formulario-config.php');
    }

    public static function instalar3()
    {
        $modelo = new ModeloInstall();
        $tablas = $modelo->existenTablas();
        if (isset($_POST["continuar"]))
        {
            require_once(RUTA_ABS.'/Install/Vistas/confirmacion.php');
        }
        elseif(isset($_POST["confirmacion"])&&$_POST["confirmacion"]=="Si")
        {
          $modelo->eliminarTablas($tablas);
            header("Location: index.php?operacion=instalar4");
        }
        else
        {
            require_once(RUTA_ABS.'/Install/Vistas/muestra-tablas.php');
        }

    }

    public static function instalar4()
    {
        $modelo = new ModeloInstall();
        if (importSql( RUTA_ABS . "/Install/envios.sql", $modelo)) {
            $datos['mensaje'] = "Se han creado las tablas correctamente.";


        } else {
            $datos['mensaje'] = "Ha fallado algo en la creación de las tablas. Pulse para volver a intentarlo.";

        }
        require_once(RUTA_ABS.'/Install/Vistas/formulario-config.php');
    }

    public static function instalar5()
    {

    }

} 