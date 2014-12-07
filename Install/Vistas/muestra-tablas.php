<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 06/12/2014
 * Time: 14:47
 */

ob_start();?>

    <h2>Instalador de KeNoLLega S.L</h2>
    <p>Preparando la bd <?=$_SESSION["parametros"]["bd"]?>.</p>
<?php if($tablas):?>
   <p class='mensaje'>Existen las siguientes tablas dentro de la base de datos:</p><br />
<?php foreach ($tablas as $tabla):?>
        <p class='mensaje'><?=$tabla["table_name"]?></p>
        <?php endforeach;?>
   <p class='mensaje'>Es necesario eliminarlas para continuar</p>
<?php else:?>
    <p class='mensaje'>La base de datos esta lista, pulse siguiente para continuar.</p>
<?php endif;?>
    <form action="" method="POST">
        <input type="submit" name="continuar" value="Siguiente" />
    </form>

<?php $contenido=ob_get_clean();
require_once RUTA_ABS.'/Install/Vistas/layout.php';