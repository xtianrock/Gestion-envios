<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 21/11/2014
 * Time: 1:45
 */
ob_start();
?>
    <form method="post">
        <fieldset>
            <legend>
                Seleccione un envio para <?=$accion?>
            </legend>
            <div>
                <label for="codigo-envio">Codigo de envio: </label>
                <input type="text" id="codigo-envio" placeholder="Inserte codigo de envio" value="" name="codigo-envio" required/>
            </div>
            <input type="submit" name="comprobar-envio" value="Continuar">
        </fieldset>

    </form>
<?php $contenido = ob_get_clean();
$titulo="Seleccione envio para la operación";
include_once 'layout.php';