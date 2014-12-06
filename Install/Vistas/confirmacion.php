<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 06/12/2014
 * Time: 16:17
 */
ob_start();
?>
    <form method="post">
        <legend>¿Esta seguro de que desea eliminar las tablas y continuar con el proceso de instalacion?<legend>
        <input type="submit" name="confirmacion" value="Si">
        <input type="submit" name="confirmacion" value="No">

        <input type="hidden" name="cod" value="<?=$codigoEnvio?>">

    </form>
<?php $contenido = ob_get_clean();
$titulo="confirmacion";
include_once'layout.php';