<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/12/2014
 * Time: 18:57
 */
ob_start();?>

<div>
    <h2>Instalador de KeNoLLega S.L</h2>
    <?php if(isset($datos['texto']))
        echo "<br /><p class='texto'>".$datos["texto"]."</p><br />";
    if(isset($datos['mensaje']))
        echo "<br /><p class='mensaje'>".$datos["mensaje"]."</p><br />";
    ?>
    <form action="" method="POST">
        <input type="submit" name="continuar" value="Siguiente" />

    </form>
</div>

<?php $contenido=ob_get_clean();
require_once RUTA_ABS.'/Install/Vistas/layout.php'?>