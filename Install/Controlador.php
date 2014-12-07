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
        if(isset($_POST["continuar"]))
        {
            header("Location: index.php?operacion=instalar2");
        }
        $datos["texto"]="A continuacion se procedera a realizar las acciones necesarias para la instalacion.";
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
        if (isset($_POST["continuar"])&&$tablas)
        {
            require_once(RUTA_ABS.'/Install/Vistas/confirmacion.php');
        }
        elseif (isset($_POST["continuar"])&&!$tablas)
        {
            header("Location: index.php?operacion=instalar4");
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
        $datos["texto"]="Se procedera a crear las tablas.";
        if(isset($_POST["continuar"]))
        {
            header("Location: index.php?operacion=instalar5");
        }
        $modelo = new ModeloInstall();
        if (importSql( RUTA_ABS . "/Install/db.sql", $modelo))
        {
            $datos['mensaje'] = "Se han creado las tablas correctamente.";
        } else
        {
            $datos['mensaje'] = "Ha fallado algo en la creación de las tablas. Pulse para volver a intentarlo.";
        }

        require_once(RUTA_ABS.'/Install/Vistas/instalador.php');
    }

    public static function instalar5()
    {
        if(isset($_POST["continuar"]))
        {
            header("Location: ".RUTA_ABS."/App/index.php");
        }
        $fichero = fopen( RUTA_ABS . "/App/Config.php", "w");
        fwrite($fichero, "<?php\n");
        fwrite($fichero, "\n");
        fwrite($fichero, "class Config {\n");
        fwrite($fichero, "static public \$hostname = \"{$_SESSION['parametros']['servidor']}\";\n");
        fwrite($fichero, "static public \$bd = \"{$_SESSION['parametros']['bd']}\";\n");
        fwrite($fichero, "static public \$usuario = \"{$_SESSION['parametros']['usuario']}\";\n");
        fwrite($fichero, "static public \$clave = \"{$_SESSION['parametros']['clave']}\";\n");
        fwrite($fichero, "}");
        fclose($fichero);

        $datos["texto"]="Se procedera a crear el fichro de configuracion";
        $datos['mensaje'] = "El fichero Config.php se ha creado con exito.<br><br>Proceso de instalacion concluido.";
        require_once(RUTA_ABS.'/Install/Vistas/instalador.php');
    }

} 