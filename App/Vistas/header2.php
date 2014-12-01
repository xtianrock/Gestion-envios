<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 24/11/2014
 * Time: 19:55
 */
?>
<div class="cabecera1"></div>
<div class="cabecera2">
    <div class="bontroles-cabecera">
        <?php if(isset($_SESSION["usuario"])):?>
        <a href="?operacion=logout" title="Logout">
            <span class="boton"><img class="icono" src="<?=URL_APP?>/Assets/img/icons/eliminar.png"></span>
        </a>

        <?php if(isset($_SESSION["acceso"])&&$_SESSION["acceso"]=="administrador"):?>
        <a href="?operacion=control-usuario" title="control">
            <span class="boton"><img class="icono" src="<?=URL_APP?>/Assets/img/icons/lista.png"></span>
        </a>
        <?php endif;?><?php endif;?>
    </div>
</div>