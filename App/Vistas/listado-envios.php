<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 11/11/2014
 * Time: 20:16
 */

ob_start();?>



    <div class="lista-cabecera">
        <span class="datos">Codigo envio</span>
        <span class="datos">Destinatario</span>
        <span class="datos">Estado</span>
        <span class="datos">Fecha envio</span>
        <span class="datos">Fecha entrega</span>
    </div>

        <?php
if (isset($envios)):
foreach ($envios as $envio): ?>
    <div class="accordion">
        <div class="accordion-toggle lista">
            <span class="datos"><?=$envio['codigo_envio']?></span>
            <span class="datos"><?=$envio['destinatario']?></span>
            <span class="datos"><?=$estados[$envio['estado']]['nombre']?></span>
            <span class="datos"><?=$envio['fechaEnvio']?></span>
            <span class="datos"><?=$envio['fechaEntrega']?></span>
        <div class="iconos">
            <a href="?operacion=modificar&envio=<?=$envio['codigo_envio']?>" title="Editar"><span class="boton"><img class="icono" src="<?=URL_APP?>/Assets/img/icons/editar.png"></span></a>
            <a href="?operacion=eliminar&envio=<?=$envio['codigo_envio']?>" title="Eliminar"><span class="boton"><img class="icono" src="<?=URL_APP?>/Assets/img/icons/eliminar.png"></span></a>
            <a href="?operacion=confirmar&envio=<?=$envio['codigo_envio']?>" title="Confirmar entrega"><span class="boton"><img  class="icono"src="<?=URL_APP?>/Assets/img/icons/confirmar.png"></span></a>
        </div>
        </div>
        <div class="accordion-content lista">
            <span class="datos"><?=$envio['codigo_envio']?></span>
            <span class="datos"><?=$envio['destinatario']?></span>
            <span class="datos"><?=$estados[$envio['estado']]['nombre']?></span>
            <span class="datos"><?=$envio['fechaEnvio']?></span>
            <span class="datos"><?=$envio['fechaEntrega']?></span>
            <span class="datos"><?=$envio['telefono']?></span>
            <span class="datos"><?=$envio['direccion']?></span>
            <span class="datos"><?=$envio['poblacion']?></span>
            <span class="datos"><?=$envio['cp']?></span>
            <span class="datos"><?=$provincias[$envio['provincia']+1]['nombre']?></span>
            <span class="datos"><?=$envio['email']?></span>
            <span class="datos"><?=$envio['observaciones']?></span>
            <div class="iconos">
                <a href="?operacion=modificar&envio=<?=$envio['codigo_envio']?>" title="Editar"><span class="boton"><img class="icono" src="<?=URL_APP?>/Assets/img/icons/editar.png"></span></a>
                <a href="?operacion=eliminar&envio=<?=$envio['codigo_envio']?>" title="Eliminar"><span class="boton"><img class="icono" src="<?=URL_APP?>/Assets/img/icons/eliminar.png"></span></a>
                <a href="?operacion=confirmar&envio=<?=$envio['codigo_envio']?>" title="Confirmar entrega"><span class="boton"><img  class="icono"src="<?=URL_APP?>/Assets/img/icons/confirmar.png"></span></a>
            </div>
        </div>
    </div>

<?php endforeach; endif;

if (isset ($accion)&& $accion=='buscar'): ?>
    <div class="boton-mas">
        <a href="index.php?operacion=buscar&&nueva=true" title="Nueva busqueda">
            <b>+</b>
        </a>
    </div>
<?php endif;
$contenido = ob_get_clean();
require_once 'layout.php';