<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/12/2014
 * Time: 19:37
 */
ob_start();?>
    <h2>Instalador de KeNoLLega S.L</h2>
    <p>Introduzca la informacion de la base de datos.</p>

<form action="" method="POST">
    <div>
        <p>Servidor: <input type="text" name="servidor" value="<?=$datos['servidor']?>" required="required" /></p>
    </div>
    <div>
        <p>Base de datos: <input type="text" name="bd" value="<?=$datos['bd'] ?>" required="required" /></p>
    </div>
    <div>
        <p>Usuario: <input type="text" name="usuario" value="<?=$datos['usuario'] ?>" required="required" /></p>
    </div>
    <div>
        <p>Contraseña: <input type="password" name="clave" value="<?=$datos['clave']?>"/></p>
    </div>

    <input type="submit" value="Siguiente" />
    <?php if(isset($datos['mensaje']))
        echo "<br /><p class='mensaje'>".$datos["mensaje"]."</p><br />";
    ?>
</form>


<?php $contenido=ob_get_clean();
require_once RUTA_ABS.'/Install/Vistas/layout.php'?>