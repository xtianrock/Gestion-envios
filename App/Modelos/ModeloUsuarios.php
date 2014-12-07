<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 01/12/2014
 * Time: 16:17
 */

/**
 * Class ModeloUsuarios.
 *
 * Contiene la logica de negociio relacionada con los usuarios
 */
class ModeloUsuarios {

    protected $conexion;

    /**
     *Constructor de la clase.
     */
    public function __construct()
    {

        $mvc_bd_conexion = DataBaseLayer::getConnection("MySqlProvider");

        if (!$mvc_bd_conexion) {
            die('No ha sido posible realizar la conexión con la base de datos: ' . $mvc_bd_conexion->obtenerError());
        }

        $this->conexion = $mvc_bd_conexion;
    }

    /**
     * Comprueba si existe un usuario con ese nombre y contraseña.
     *
     * @param $nombre
     * @param $password
     *
     * @return mixed
     */
    public function comprobarUsuario($nombre)
    {
        $consulta="select * from usuarios where nombre='$nombre'";
        return $this->conexion->executeScalar($consulta);

    }

    /**
     * Obtiene los datos de los usuarios existentes.
     *
     * @return mixed
     */
    public function obtenerUsuarios()
    {
        $consulta="select * from usuarios";
        return $this->conexion->execute($consulta);
    }

    /**
     * Inserta un usuario en la bd.
     *
     * @param $nombre
     * @param $password
     * @param $privilegios
     *
     * @return string
     */
    public function insertaUsuario($nombre,$password,$privilegios)
    {
        $consulta="insert into usuarios values('$nombre','$password','$privilegios')";
        $consultaRealizada=$this->conexion->sendQuery($consulta);
        if($consultaRealizada)
        {
            $mensaje="Usuario insertado con exito";
        }
        else
        {
            $mensaje="No se pudo realizar la inserción del usuario";
        }
        return $mensaje;
    }

    /**
     * Elimina un suario dado de la bd.
     *
     * @param $usuario
     *
     * @return string
     */
    public function eliminar($usuario)
    {
        $consulta="delete from usuarios where nombre='$usuario'";
        $consultaRealizada=$this->conexion->sendQuery($consulta);
        if($consultaRealizada)
        {
            $mensaje="Usuario ".$usuario.' eliminado con exito';
        }
        else
        {
            $mensaje="No se pudo eliminar el usuario ".$usuario;
        }
        return $mensaje;
    }

} 