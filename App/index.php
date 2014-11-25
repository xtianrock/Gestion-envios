
<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 31/10/2014
 * Time: 13:34
 */

define("RUTA_ABS", realpath(__DIR__.'/..'));
define("URL_APP", "http://".$_SERVER["HTTP_HOST"]."/Gestion-envios");


require_once(RUTA_ABS."/App/Controladores/Controlador.php");
require_once(RUTA_ABS."/App/Modelos/Modelo.php");
require_once(RUTA_ABS."/App/Modelos/DatabaseProvider.php");
require_once(RUTA_ABS."/App/config.php");
require_once(RUTA_ABS."/App/lib/Tratamiento-form.php");
require_once(RUTA_ABS."/App/helpers/crea-select-busqueda.php");
require_once(RUTA_ABS."/App/helpers/carga-plantilla.php");
// enrutamiento
$map = array(
    'home' => array('metodo' =>'inicio','titulo' =>'Envios'),
    'listar' => array('metodo' =>'listarEnvio','titulo' =>'Lista envio'),
    'alta' => array('metodo' =>'insertarEnvio','titulo' =>'Insercción envio'),
    'modificar' => array('metodo' =>'modificarEnvio','titulo' =>'Editar envio'),
    'eliminar' => array('metodo' =>'eliminarEnvio','titulo' =>'Cancelar envio'),
    'confirmar' => array('metodo' =>'confirmarRecepcion','titulo' =>'confirmar envio'),
     'buscar' => array('metodo' =>'buscarEnvio','titulo' =>'Buscar envios')
);

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

 $metodo = $map[$ruta]["metodo"];
// Ejecución del controlador asociado a la ruta


if (method_exists("Controlador",$metodo)) {
    $controlador=new Controlador();
    $controlador->$metodo();
    //call_user_func(array(new $controlador['clase'], $controlador['metodo']));
} else {

    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' .
        $controlador['clase'] .
        '->' .
        $controlador['metodo'] .
        '</i> no existe</h1></body></html>';

}

require_once(RUTA_ABS."/App/Vistas/layout.php");
