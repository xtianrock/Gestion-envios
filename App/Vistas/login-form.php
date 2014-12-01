<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 01/12/2014
 * Time: 15:58
 */
ob_start();
?>
<form id="alta-contacto" name="login-form" action="" method="post" >
    <legend>Login</legend>
    <div>
        <label for="usuario">Usuario: </label>
        <input type="text" id="usuario" placeholder="Inserte usuario" value="" name="usuario" required/>

    </div>
    <div>
        <label for="contraseña">Contrase&ntilde;a: </label>
        <input type="text" id="contrasenia" placeholder="Inserte contraseña" value="" name="password" required />
    </div>
    <?php if (isset($accion)&&$accion=='insertar'):?>
    <div>
        <label for="privilegios">Privililegios: </label>
        <div>
            <input type="radio" id="privilegios" name="privilegios" value="usuario">Usuario<br>
            <input type="radio" id="privilegios" name="privilegios" value="administrador">Administrador
        </div>

    </div>
    <?php endif;?>
    <input type="submit" name="<?php echo $accion=='insertar'? 'sign-in':'log-in'?>" value="<?php echo $accion=='insertar'? 'Insertar usuario':'Entrar'?>"/>
    <?php if(isset($mensaje))
        echo "<br/><br/><p class='mensaje'>".$mensaje."</p><br />";
    ?>
</form>
<?php $contenido = ob_get_clean();
require_once'layout.php';