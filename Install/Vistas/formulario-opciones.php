<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 07/12/2014
 * Time: 18:52
 */

ob_start();?>
    <h2>Instalador de KeNoLLega S.L</h2>
    <p>Configure los siguientes parametros.</p>

    <form action="" method="POST">
        <div>
            <p>Tiempo de conexion:
                <select name="tiempo">
                    <?php require(RUTA_ABS . "/Install/helpers/crea-option-tiempo.php"); ?>
                </select></p>
            </p>
        </div>
        <div>
            <p>Paginas:
                <select name="paginas">
                    <?php require(RUTA_ABS . "/Install/helpers/crea-option-paginas.php"); ?>
            </select></p>
        </div>

        <input type="submit" value="Siguiente" name="crear" />
        <?php if(isset($datos['mensaje']))
            echo "<br /><p class='mensaje'>".$datos["mensaje"]."</p><br />";
        ?>
    </form>


<?php $contenido=ob_get_clean();
require_once RUTA_ABS.'/Install/Vistas/layout.php'?>