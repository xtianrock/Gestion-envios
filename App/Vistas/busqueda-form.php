<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 25/11/2014
 * Time: 19:41
 */
ob_start();?>

    <form name="formBuscar"  method="POST">
        <table>
            <tr>
                <th>Código</th>
                <td><?= creaListaDesplegable("tipocodigo", $parametrosBusqueda['numero']) ?></td>
                <td>
                    <input type="text" name="valorcodigo" />
                    <input type="hidden" name="codigo" />
                </td>
            </tr>
            <tr>
                <th>Destinatario</th>
                <td><?= creaListaDesplegable("tipodestinatario",$parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valordestinatario" />
                    <input type="hidden" name="destinatario" />
                </td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td><?= creaListaDesplegable("tipotelefono",$parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valortelefono" />
                    <input type="hidden" name="telefono" />
                </td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td><?= creaListaDesplegable("tipodireccion",$parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valordireccion" />
                    <input type="hidden" name="direccion" />
                </td>
            </tr>
            <tr>
                <th>Población</th>
                <td><?= creaListaDesplegable("tipopoblacion", $parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valorpoblacion" />
                    <input type="hidden" name="poblacion" />
                </td>
            </tr>
            <tr>
                <th>Código Postal</th>
                <td><?= creaListaDesplegable("tipocod_postal",$parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valorcod_postal" />
                    <input type="hidden" name="cod_postal" />
                </td>
            </tr>
            <tr>
                <th>Provincia</th>
                <td><?= creaListaDesplegable("tipoprovincia",$parametrosBusqueda['lista']) ?></td>
                <td>
                    <?= creaListaDesplegable("valorprovincia", $provincias, "0", [ 'nombre' => '--Seleccionar--', 'cod' => "0"],['desc' => 'nombre', 'valor' => 'cod']) ?>
                    <input type="hidden" name="provincia" />
                </td>
            </tr>
            <tr>
                <th>Correo Electrónico</th>
                <td><?= creaListaDesplegable("tipoemail",$parametrosBusqueda['palabra']) ?></td>
                <td>
                    <input type="text" name="valoremail" />
                    <input type="hidden" name="email" />
                </td>
            </tr>
            <tr>
                <th>Estado</th>
                <td><?= creaListaDesplegable("tipoestado", $parametrosBusqueda['lista']) ?></td>
                <td>
                    <?= creaListaDesplegable("valorestado", $estados, "0", [ 'nombre' => '--Seleccionar--', 'codigo' => "0"]) ?>
                    <input type="hidden" name="estado" />
                </td>
            </tr>
            <tr>
                <th>Fecha de creación</th>
                <td><?= creaListaDesplegable("tipofecha_creacion", $parametrosBusqueda['numero']) ?></td>
                <td>
                    <input type="date" name="valorfecha_creacion" />
                    <input type="hidden" name="fecha_creacion" />
                </td>
            </tr>
            <tr>
                <th>Fecha de entrega</th>
                <td><?= creaListaDesplegable("tipofecha_entrega", $parametrosBusqueda['numero']) ?></td>
                <td>
                    <input type="date" name="valorfecha_entrega" />
                    <input type="hidden" name="fecha_entrega" />
                </td>
            </tr>
            <tr>
                <th>Observaciones</th>
                <td><?= creaListaDesplegable("tipoobservaciones",$parametrosBusqueda['palabra']) ?></td>
                <td>
                    <textarea name="valorobservaciones"></textarea>
                    <input type="hidden" name="observaciones" />
                </td>
            </tr>
        </table>
        <input type="submit" value="Buscar" />
    </form>
<?php $contenido = ob_get_clean();
include 'layout.php';