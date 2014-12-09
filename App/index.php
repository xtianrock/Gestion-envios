<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 31/10/2014
 * Time: 13:34
 */
session_name('envios');
session_start();
if (!isset($_SESSION["hora"]))
$_SESSION["hora"]=time();
define("RUTA_ABS", realpath(__DIR__.'/..'));
define("URL_APP", "http://".$_SERVER["HTTP_HOST"]."/Gestion-envios");
if (!file_exists("Config.php"))
{
    require_once RUTA_ABS."/Install/index.php";
}
else
{

require_once(RUTA_ABS."/App/Controladores/ControladorEnvios.php");
require_once(RUTA_ABS."/App/Controladores/ControladorUsuarios.php");
require_once(RUTA_ABS."/App/Modelos/ModeloEnvios.php");
require_once(RUTA_ABS."/App/Modelos/ModeloUsuarios.php");
require_once(RUTA_ABS."/App/lib/DatabaseProvider.php");
require_once(RUTA_ABS . "/App/Config.php");
require_once(RUTA_ABS."/App/lib/Tratamiento-form.php");
require_once(RUTA_ABS."/App/helpers/crea-select-busqueda.php");
require_once(RUTA_ABS."/App/helpers/carga-plantilla.php");


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > Config::$tiempo)) {
    session_unset();     // unset $_SESSION variable for the run-time
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

// enrutamiento
    $map = array(
        'home' => array('controlador'=>'ControladorEnvios','metodo' =>'inicio','titulo' =>'Envios'),
        'listar' => array('controlador'=>'ControladorEnvios','metodo' =>'listarEnvio','titulo' =>'Lista de envios'),
        'alta' => array('controlador'=>'ControladorEnvios','metodo' =>'insertarEnvio','titulo' =>'Insercción envio'),
        'modificar' => array('controlador'=>'ControladorEnvios','metodo' =>'modificarEnvio','titulo' =>'Editar envio'),
        'eliminar' => array('controlador'=>'ControladorEnvios','metodo' =>'eliminarEnvio','titulo' =>'Cancelar envio'),
        'confirmar' => array('controlador'=>'ControladorEnvios','metodo' =>'confirmarRecepcion','titulo' =>'Confirmar envio'),
        'buscar' => array('controlador'=>'ControladorEnvios','metodo' =>'buscarEnvio','titulo' =>'Buscar envios'),
        'login' => array('controlador'=>'ControladorUsuarios','metodo' =>'login','titulo' =>'Login'),
        'logout' => array('controlador'=>'ControladorUsuarios','metodo' =>'logout','titulo' =>'Logout'),
        'control-usuario' => array('controlador'=>'ControladorUsuarios','metodo' =>'control','titulo' =>'Control de usuarios'),
        'nuevo-usuario' => array('controlador'=>'ControladorUsuarios','metodo' =>'nuevo','titulo' =>'Sign in'),
        'eliminar-usuario' => array('controlador'=>'ControladorUsuarios','metodo' =>'eliminar','titulo' =>'Eliminar usuario')
    );

    if(isset($_SESSION['usuario']))
    {
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
        } else {
            $ruta = 'home';
        }
        $titulo=$map[$ruta]["titulo"];
        $controlador = $map[$ruta]["controlador"];
        $metodo = $map[$ruta]["metodo"];
// Ejecución del controlador asociado a la ruta

        if (method_exists($controlador,$metodo)) {
            $controlador::$metodo();

        } else {
            header('Status: 404 Not Found');
            echo '<html><body><h1>Error 404: El metodo <i>' .
                $metodo.
                ' de la clase Controlador, no existe.' .
                '</i> no existe</h1></body></html>';

        }

        require_once(RUTA_ABS."/App/Vistas/layout.php");

    }
    else
    {
        ControladorUsuarios::login();
    }

    require_once(RUTA_ABS."/App/Vistas/layout.php");
}

