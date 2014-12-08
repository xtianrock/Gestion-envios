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
    <h1 id="titulo">KeNoLLega S.L.</h1>
    <div class="controles-cabecera">
        <?php if(isset($_SESSION["usuario"])):?>
            <?=date('G:i:s', $_SESSION['hora'])?>
            <a href="?operacion=logout" title="Logout">
            <label ><?=$_SESSION["usuario"];?></label>
            <span class="boton" ><img class="icono" src="<?=URL_APP?>/Assets/img/icons/salir.png"></span>
        </a>

        <?php if(isset($_SESSION["acceso"])&&$_SESSION["acceso"]=="administrador"):?>
        <a href="?operacion=control-usuario" title="Gestion de usuarios">
            <span class="boton"><img class="icono" src="<?=URL_APP?>/Assets/img/icons/usuarios.png"></span>
        </a>
        <?php endif;?><?php endif;?>
    </div>
</div>