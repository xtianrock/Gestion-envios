<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 06/12/2014
 * Time: 14:47
 */

ob_start();?>

    <div>
        <h2>paso 3 tablaaaaas</h2>

    </div>
<?php if($tablas):?>
   <p class='mensaje'>Existen las siguientes tablas dentro de la base de datos proporcionada:</p><br />
<?php foreach ($tablas as $tabla):?>
        <p class='mensaje'><?=$tabla["table_name"]?></p>
        <?php endforeach;?>
   <p class='mensaje'>Es necesario eliminarlas para continuar</p>
<?php endif;?>
    <form action="" method="POST">
        <input type="submit" name="continuar" value="Siguiente" />
    </form>

<?php $contenido=ob_get_clean();
require_once RUTA_ABS.'/Install/Vistas/layout.php';