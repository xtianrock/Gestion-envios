<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 20/11/2014
 * Time: 2:06
 */

ob_start();
?>
<form method="post">
        <legend>
            Desea que el envio nº <?=$codigoEnvio?> sea <?=$accion?>
        </legend>
        <input type="submit" name="enviar-form" value="Si" onclick="muestraConfirmacion('Envio nº <?=$codigoEnvio?> <?=$accion?>');">
        <input type="submit" name="enviar-form" value="No">

        <input type="hidden" name="cod" value="<?=$codigoEnvio?>">

</form>
<?php $contenido = ob_get_clean();
$titulo="confirmacion";
include_once'layout.php';