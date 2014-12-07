<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 06/12/2014
 * Time: 14:20
 */


/**
 * Class ModeloInstall.
 *
 * Clase que alberga la logica de negocio del instalador.
 */
class ModeloInstall {


    protected $conexion;

    /**
     * Constructor de la clase.
     */
    public function __construct()
    {

        $mvc_bd_conexion = DataBaseLayer::getConnection("MySqlProvider",$_SESSION["parametros"]);

        if (!$mvc_bd_conexion) {
            die('No ha sido posible realizar la conexión con la base de datos: ' . $mvc_bd_conexion->obtenerError());
        }

        $this->conexion = $mvc_bd_conexion;
    }

    /**
     * Comprueba si existen tablas en la bd dada.
     *
     * @return mixed
     */
    public function existenTablas()
    {
        $consulta="SELECT table_name FROM information_schema.tables WHERE table_schema = '{$_SESSION['parametros']['bd']}'";
        $result=$this->conexion->execute($consulta);
        return $result;
    }


    /**
     * Elimina todas las tablas de la bd.
     *
     * @param $tablas
     */
    public function eliminarTablas($tablas)
    {
        foreach ($tablas as $tabla)
        {
            $consulta='DROP TABLE `'.$_SESSION['parametros']['bd'].'`.`'.$tabla["table_name"].'`';
            $result= $this->conexion->sendQuery($consulta);
        }

    }

    /**
     * Ejecuta una a una las consultas que se le pasan.
     *
     * @param $consultas
     *
     * @return bool
     */
    public function importarDb($consultas)
    {
        foreach ($consultas as $consulta)
        {
            $consulta=$consulta.";";
            $this->conexion->sendQuery($consulta);
            $error=$this->conexion->obtenerError();
            print_r($error);
            if($error)
            {
                return false;
            }
        }
        return true;
    }
} 