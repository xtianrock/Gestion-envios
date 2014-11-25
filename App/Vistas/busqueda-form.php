<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 25/11/2014
 * Time: 19:41
 */
ob_start();
?>
<form name="formBuscar" method="POST">
    <table>
        <label for="codigo">
            <tr>
                <th>Código</th>
                <td><?= creaListaDesplegable("tipocodigo", $parametrosBusqueda['numero']) ?></td>
                <td>
                    <input type="text" name="valorcodigo" />
                    <input type="hidden" name="codigo" />
                </td>
            </tr>
        </label>
        <label for="destinatario">
            <tr>
                <th>Destinatario</th>
                <td><?= creaListaDesplegable("tipodestinatario",$parametrosBusqueda['palabra'])?></td>
                <td><input type="text" name="valordestinatario" /></td>
            </tr>
        </label>
        <label for="telefono">
            <tr>
                <th>Teléfono</th>
                <td><?= creaListaDesplegable("tipotelefono", $parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valortelefono" />
                    <input type="hidden" name="telefono" />
                </td>
            </tr>
        </label>
        <label for="direccion">
            <tr>
                <th>Dirección</th>
                <td><?= creaListaDesplegable("tipodireccion",$parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valordireccion" />
                    <input type="hidden" name="direccion" />
                </td>
            </tr>
        </label>
        <label for="poblacion">
            <tr>
                <th>Población</th>
                <td><?= creaListaDesplegable("tipopoblacion", $parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valorpoblacion" />
                    <input type="hidden" name="poblacion" />
                </td>
            </tr>
        </label>
        <label for="cod_postal">
            <tr>
                <th>Código Postal</th>
                <td><?= creaListaDesplegable("tipocod_postal", $parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valorcod_postal" />
                    <input type="hidden" name="cod_postal" />
                </td>
            </tr>
        </label>
        <label for="provincia">
            <tr>
                <th>Provincia</th>
                <td><?= creaListaDesplegable("tipoprovincia",$parametrosBusqueda['lista']) ?></td>
                <td>
                    <?= creaListaDesplegable("valorprovincia", $params['provincias'], "0", [ 'nombre' => '--Seleccionar--', 'codigo' => "0"])?>
                    <input type="hidden" name="provincia" />
                </td>
            </tr>
        </label>
        <label for="email">
            <tr>
                <th>Correo Electrónico</th>
                <td><?= creaListaDesplegable("tipoemail", $parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valoremail" />
                    <input type="hidden" name="email" />
                </td>
            </tr>
        </label>
        <label for="estado">
            <tr>
                <th>Estado</th>
                <td><?= creaListaDesplegable("tipoestado", $params['tipo_busqueda']['lista']) ?></td>
                <td>
                    <?= creaListaDesplegable("valorestado", $params['estados'], "0", [ 'nombre' => '--Seleccionar--', 'codigo' => "0"])?>
                    <input type="hidden" name="estado" />
                </td>
            </tr>
        </label>
        <label for="fecha_creacion">
            <tr>
                <th>Fecha de creación</th>
                <td><?= creaListaDesplegable("tipofecha_creacion", $params['tipo_busqueda']['numero']) ?></td>
                <td>
                    <input type="date" name="valorfecha_creacion" />
                    <input type="hidden" name="fecha_creacion" />
                </td>
            </tr>
        </label>
        <label for="fecha_entrega">
            <tr>
                <th>Fecha de entrega</th>
                <td><?= creaListaDesplegable("tipofecha_entrega", $params['tipo_busqueda']['numero']) ?></td>
                <td>
                    <input type="date" name="valorfecha_entrega" />
                    <input type="hidden" name="fecha_entrega" />
                </td>
            </tr>
        </label>
        <label for="observaciones">
            <tr>
                <th>Observaciones</th>
                <td><?= creaListaDesplegable("tipoobservaciones", $params['tipo_busqueda']['palabra']) ?></td>
                <td>
                    <textarea name="valorobservaciones"></textarea>
                    <input type="hidden" name="observaciones" />
                </td>
            </tr>
        </label>
    </table>
    <input type="submit" value="<?= $params['action'] ?>" />
</form>
<?php$contenido=ob_get_clean();
include_once'layout.php';