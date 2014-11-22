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
                Seleccione un envio para que sea <?=$accion?>
            </legend>
            <div>
                <label for="codigo-envio">Codigo de envio: </label>
                <input <?php echo(isset($codigoEnvio))?"style='color: #FF0000'":"";?> type="text" id="codigo-envio" placeholder="Inserte codigo de envio" value="<?php echo(isset($codigoEnvio))?$codigoEnvio:"";?>" name="codigo-envio" required/>
            </div>
            <input type="submit" name="comprobar-envio" value="Continuar">
            <?php if(isset($mensaje))
                echo "<br /><p class='mensaje'>".$mensaje."</p><br />";
            ?>
        </fieldset>

    </form>
<?php $contenido = ob_get_clean();
$titulo="Seleccione envio para la operación";
include_once 'layout.php';