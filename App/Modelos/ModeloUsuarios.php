<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 01/12/2014
 * Time: 16:17
 */

class ModeloUsuarios {

    protected $conexion;

    public function __construct()
    {

        $mvc_bd_conexion = DataBaseLayer::getConnection("MySqlProvider");

        if (!$mvc_bd_conexion) {
            die('No ha sido posible realizar la conexión con la base de datos: ' . $mvc_bd_conexion->obtenerError());
        }

        $this->conexion = $mvc_bd_conexion;
    }

    public function comprobarUsuario($nombre,$password)
    {
        $consulta="select * from usuarios where nombre='$nombre' and password='$password'";
        return $this->conexion->executeScalar($consulta);

    }

    public function obtenerUsuarios()
    {
        $consulta="select * from usuarios";
        return $this->conexion->execute($consulta);
    }

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

} 