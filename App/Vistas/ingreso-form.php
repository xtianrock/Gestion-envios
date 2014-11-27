<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 04/11/2014
 * Time: 17:26
 */
ob_start();


?>
    <form id="alta-contacto" name="alta-form" action="" method="post" >
            <legend><?=$accion?> envio</legend>
            <div>
                <label for="destinatario">Destinatario: </label>
                <input <?php echo(isset($datosErroneos["destinatario-form"]))?"style='color: #FF0000'":"";?> type="text" id="destinatario" placeholder="Inserte destinatario" value="<?=$datos["destinatario"]?>" name="destinatario-form" required/>

            </div>
            <div>
                <label for="telefono">Telefono: &nbsp;</label>
                <input <?php echo(isset($datosErroneos["telefono-form"]))?"style='color: #FF0000'":"";?> type="text" id="telefono" placeholder="Inserte telefono" value="<?= $datos["telefono"]?>" name="telefono-form" required />
            </div>
            <div>
                <label for="direccion">Direccion: </label>
                <input <?php echo(isset($datosErroneos["direccion-form"]))?"style='color: #FF0000'":"";?> type="text" id="direccion" placeholder="Inserte direccion" value="<?=$datos["direccion"]?>" name="direccion-form" required />
            </div>
            <div>
                <label for="poblacion">Poblacion: </label>
                <input <?php echo(isset($datosErroneos["poblacion-form"]))?"style='color: #FF0000'":"";?> type="text" id="poblacion" placeholder="Inserte poblacion" value="<?=$datos["poblacion"]?>" name="poblacion-form" required />
            </div>
            <div>
                <label for="codigo-postal">Codigo postal: </label>
                <input <?php echo(isset($datosErroneos["cp-form"]))?"style='color: #FF0000'":"";?> type="text" id="codigo-postal" placeholder="Inserte C.P." value="<?=$datos["cp"]?>" name="cp-form"/>
            </div>
            <div>
                <label for="provincia">Provincia: </label>
                <select  id="provincia" name="provincia-form" required>
                    <option <?php echo(isset($datosErroneos["provincia-form"]))?"style='color: #FF0000'":"";?> value="<?=$datos["provincia"]?>"><?=$datos["nombreProvincia"]?></option>
                    <?php require(RUTA_ABS."/App/vistas/select-provincias.php"); ?>
                </select>
            </div>
            <div>
                <label for="email">E-mail: </label>
                <input <?php echo(isset($datosErroneos["email-form"]))?"style='color: #FF0000'":"";?> type="email" id="email" placeholder="Inserte E-mail" value="<?=$datos["email"]?>" name="email-form" required />
            </div>
            <div class="observaciones">
                <label for="observaciones">Observaciones:
                    <textarea <?php echo(isset($datosErroneos["observaciones-form"]))?"style='color: #FF0000'":"";?> id="observaciones" rows="5" cols="50" placeholder="Escriba aquí cualquier información adicional" name="observaciones-form"><?=$datos["observaciones"]?></textarea>
                </label>

            </div>
            <input type="hidden" name="cod" value="<?=$codigoEnvio?>">
            <div>
                <input type="submit" name="enviar-form" value="<?php echo($accion=='Modificar'? "Guardar cambios":'Añadir envio')?>" />
            </div>
            <?php if(isset($datos['mensaje']))
                echo "<br /><p class='mensaje'>".$datos["mensaje"]."</p><br />";
            ?>


    </form>

<?php $contenido = ob_get_clean();
$titulo="prueba";
require_once'layout.php';