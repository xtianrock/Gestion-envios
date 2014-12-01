<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 01/12/2014
 * Time: 17:43
 */
ob_start();?>
    <div class="lista-cabecera">
        <span class="datos">Nombre</span>
        <span class="datos">Contrase&ntilde;a</span>
        <span class="datos">Permisos</span>
    </div>
<?php
if (isset($usuarios)):
foreach ($usuarios as $usuario): ?>
<div class="lista">
    <span class="datos"><?=$usuario['nombre']?></span>
    <span class="datos"><?=$usuario['password']?></span>
    <span class="datos"><?=$usuario['permisos']?></span>
    <div class="iconos">
        <a href="?operacion=eliminar-usuario&usuario=<?=$usuario['nombre']?>" title="Eliminar"><span class="boton"><img class="icono" src="<?=URL_APP?>/Assets/img/icons/eliminar.png"></span></a>
    </div>
</div>
<?php endforeach; endif;?>
<div class="boton-mas">
        <a href="index.php?operacion=nuevo-usuario" title="Nuevo usuario">
            <b>+</b>
        </a>
    </div>
<?php $contenido = ob_get_clean();
require_once 'layout.php'?>