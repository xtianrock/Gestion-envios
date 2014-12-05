<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/12/2014
 * Time: 15:36
 */

ob_start();
?>
    <form method="post">
        <legend>
            ¿Desea que el usuario "<?=$usuario?>" sea eliminado?
        </legend>
        <input type="submit" name="enviar-form" value="Si" onclick="muestraConfirmacion('Usuario <?=$usuario?> <?=$accion?>');">
        <input type="submit" name="enviar-form" value="No">

        <input type="hidden" name="usuario" value="<?=$usuario?>">

    </form>
<?php $contenido = ob_get_clean();
$titulo="confirmacion";
include_once'layout.php';