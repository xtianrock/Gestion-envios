<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/12/2014
 * Time: 18:57
 */
ob_start();?>

<div>
    <h2>Bienvenido al instalador de la App</h2>
    <a href="<?=URL_APP.'/App/index.php?operacion=instalar2'?>">Continuar</a>
</div>

<?php $contenido=ob_get_clean();
require_once RUTA_ABS.'/Install/Vistas/layout.php'?>