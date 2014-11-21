<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 31/10/2014
 * Time: 19:57
 */
?>
<form id="alta-contacto" name="alta-form" action="../Vistas/ingreso-form.php" method="post" >
    <fieldset>
        <legend>
            Alta Contacto
        </legend>
        <div>
            <label for="destinatario">Destinatario: </label>
            <input type="text" id="destinatario" placeholder="Inserte destinatario" name="destinatario-form" required/>
        </div>
        <div>
            <label for="telefono">Telefono: &nbsp;</label>
            <input type="text" id="telefono" placeholder="Inserte telefono" name="telefono-form" required />
        </div>
        <div>
            <label for="direccion">Direccion: </label>
            <input type="text" id="direccion" placeholder="Inserte direccion" name="direccion-form" required />
        </div>
        <div>
            <label for="poblacion">Poblacion: </label>
            <input type="text" id="poblacion" placeholder="Inserte poblacion" name="poblacion-form" required />
        </div>
        <div>
            <label for="codigo-postal">Codigo postal: </label>
            <input type="text" id="codigo-postal" placeholder="Inserte C.P." name="cp-form"/>
        </div>
        <div>
            <label for="provincia">Provincia: </label>
            <select  id="provincia" name="provincia-form" required>
                <option value="">- - -</option>
                <?php include("select-provincias.php"); ?>
            </select>
        </div>
        <div>
            <label for="email">E-mail: </label>
            <input type="email" id="email" placeholder="Inserte E-mail" name="email-form" required />
        </div>
        <div>
            <label for="entrega">Fecha entrega: </label>
          <input type="date" id="entrega" name="entrega-form">
        </div>
        <div class="observaciones">
            <label for="observaciones">Observaciones:
            <textarea id="observaciones" rows="5" cols="50" placeholder="Escriba aquí cualquier información adicional" name="observaciones-form"></textarea>
            </label>
        </div>
        <div>
            <input type="submit" name="enviar-form" value="Añadir envio" />
        </div>
        <?php include("mensajes.php");?>
    </fieldset>

</form>
