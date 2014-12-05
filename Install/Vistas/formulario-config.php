<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/12/2014
 * Time: 19:37
 */
ob_start();?>
    <p>Introduzca los siguientes datos</p>

<form action="" method="POST">
    <p>Servidor: <input type="text" name="servidor" value="<?=$datos['servidor']?>" required="required" /></p>
    <p>Base de datos: <input type="text" name="bd" value="<?=$datos['bd'] ?>" required="required" /></p>
    <p>Usuario: <input type="text" name="usuario" value="<?=$datos['usuario'] ?>" required="required" /></p>
    <p>Contraseña: <input type="password" name="clave" value="<?=$datos['clave']?>"/></p>
    <input type="submit" value="Siguiente" />
</form>

<?php $contenido=ob_get_clean();
require_once RUTA_ABS.'/Install/Vistas/layout.php'?>