<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 01/12/2014
 * Time: 15:53
 */

/**
 * Class ControladorUsuarios
 *
 * Contiene las funciones que actuan como controladores relacionados con los usuarios.
 */
class ControladorUsuarios {

    /**
     * Se encarga de logear al usuario.
     */
    public static function login()
    {
        $accion="login";
        if (isset($_POST["log-in"])) {
            $modelo = new ModeloUsuarios();
            $datosUsuario = $modelo->comprobarUsuario($_POST["usuario"]);
            if (isset($datosUsuario)&&$datosUsuario["nombre"]==$_POST["usuario"]
            &&$datosUsuario["password"]== sha1($_POST["password"])) {
                $_SESSION["usuario"]=$datosUsuario["nombre"];
                $_SESSION["acceso"]=$datosUsuario["permisos"];
            } else {
                $mensaje="El nombre de usuario o la contraseña es incorrecta";
                require_once RUTA_ABS . "/App/Vistas/login-form.php";
            }
        } else {
            require_once RUTA_ABS . "/App/Vistas/login-form.php";
        }

    }

    /**
     * Termina la session del usuario.
     */
    public static function logout()
    {
       session_destroy();
        header('Location: '.URL_APP.'/App/index.php?operacion=login');
    }

    /**
     * Accede al menu de control de usuario.
     */
    public static function control()
    {
        $modelo=new ModeloUsuarios();
        $usuarios=$modelo->obtenerUsuarios();
        require_once RUTA_ABS . "/App/Vistas/listado-usuarios.php";
    }

    /**
     * Inserte un nuevo usuario.
     */
    public static function nuevo()
    {
        $accion="insertar";
        if (isset($_POST["sign-in"])) {
            $modelo = new ModeloUsuarios();
            $mensaje = $modelo->insertaUsuario($_POST["usuario"], sha1($_POST["password"]),$_POST["privilegios"]);
            require_once RUTA_ABS . "/App/Vistas/login-form.php";
        } else {
            require_once RUTA_ABS . "/App/Vistas/login-form.php";
        }
    }

    /**
     * Elimina un usuario.
     */
    public static function eliminar()
    {
        $modelo=new ModeloUsuarios();
        $accion="eliminado";
        $usuario = ControladorUsuarios::obtenerNombreUsuario($modelo, $accion);
        if (isset($_POST['enviar-form']))
        {
            if ($_POST['enviar-form'] == 'Si') {
                $modelo->eliminar($usuario);
                header('Location: '.URL_APP.'/App/index.php?operacion=control-usuario');
            }

        }
        require RUTA_ABS.'\App\Vistas\confirmacion-usuario.php';
    }

    /**
     * Obtiene el nombre del usuario sobre el cual se ejecuto la accion de eliminar.
     *
     * @param $modelo
     * @param $accion
     *
     * @return mixed
     */
    public static function obtenerNombreUsuario($modelo, $accion)
    {
        if (isset($_GET['usuario'])) {
            $usuario = $_GET['usuario'];
            return $usuario;
        }elseif (isset($_POST['enviar-form'])) {
            $usuario = $_POST['usuario'];
            return $usuario;
        }
    }
} 