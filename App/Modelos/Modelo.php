<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/11/2014
 * Time: 16:48
 */

class Modelo {

    protected $conexion;

    public function __construct()
    {

        $mvc_bd_conexion = DataBaseLayer::getConnection("MySqlProvider");

        if (!$mvc_bd_conexion) {
            die('No ha sido posible realizar la conexión con la base de datos: ' . $mvc_bd_conexion->obtenerError());
        }

        $this->conexion = $mvc_bd_conexion;
    }
    public function devuelveEstados()
    {
        return array("P"=>"Pendiente","D"=>"Devuelto","E"=>"Entregado");
    }
    public function obtenerDatosEnvio($cod)
    {
        $sql="select destinatario,telefono,direccion,cp,poblacion,provincia,email,observaciones from envios where codigo_envio=$cod";
        $envios=$this->conexion->executeScalar($sql);
        return $envios;
    }

    public function obtenerEnvios()
    {
         $sql="select *,DATE_FORMAT(fecha_envio,'%d/%m/%Y')as fechaEnvio,DATE_FORMAT(fecha_entrega,'%d/%m/%Y')as fechaEntrega from envios";
        $envios=$this->conexion->execute($sql);
        $envios = $this->tratarFecha($envios);
        return $envios;
    }
    public function insertar(& $datos,$tabla)
    {
        $campos = [];
        $camposRellenos = [];
        foreach ($datos as $clave => $valor)
        {
             $campos[] = $clave;
            if ($clave=='fecha_envio')
            {
                $camposRellenos[]="CURDATE()";
            }
            else
            {
                $camposRellenos[]="'$valor'";
            }
        }
        $campos = implode(",", $campos);
        $camposRellenos = implode(",", $camposRellenos);

        $consulta = "insert into $tabla ($campos) values ($camposRellenos)";
        echo $consulta;
        $consultaRealizada=$this->conexion->sendQuery($consulta);
        if($consultaRealizada)
        {
            $mensaje="Insertado envio ".$this->conexion->lastIndex();
        }
        else
        {
            $mensaje="No se pudo realizar la inserción del envio";
        }
        //$this->conexion->disconnect();
        /*
        * Por lo visto no es necesario llamar al metodo close() ya
        * que los enlaces abiertos no persistentes son automáticamente
        * cerrados al final de la ejecución del script.*/
        return $mensaje;
    }

    public function editar(& $datos,$cod,$tabla)
    {
        $campos = [];
        foreach ($datos as $clave => $valor) {

            $valor = "'$valor'";
            $campos[] = "$clave = $valor";
        }
        $campos = implode(",", $campos);

        $consulta = "update $tabla set $campos where codigo_envio = $cod";

        $consultaRealizada=$this->conexion->sendQuery($consulta);
        if($consultaRealizada)
        {
            $mensaje="Envio modificado correctamente ";
        }
        else
        {
            $mensaje="No se pudo realizar la inserción del envio";
        }
        return $mensaje;
    }

    public function ObtenerProvincias()
    {

        $consulta="select cod,nombre from provincias";
        $provincias=$this->conexion->execute($consulta);
        return $provincias;
        //print_r($provincias);
    }
    public function obtenerNombreProvincia($codProvincia)
    {
        $consulta="select nombre from provincias where cod=$codProvincia";
        $resultado=$this->conexion->executeScalar($consulta);
        return utf8_encode($resultado['nombre']);
    }

    /**
     * @param $envios
     * @return mixed
     */
    public function tratarFecha($envios)
    {
        foreach ($envios as $clave => $envio) {
            if (is_null($envio["fechaEntrega"])) {
                $envios[$clave]["fechaEntrega"] = "__-__-____";
            }

        }
        return $envios;
    }

    public function eliminar($tabla,$campo,$cod)
    {
        $consulta="delete from $tabla where $campo=$cod";
        $consultaRealizada=$this->conexion->sendQuery($consulta);
        if($consultaRealizada)
        {
            $mensaje="Envio ".$cod.' eliminado con exito';
        }
        else
        {
            $mensaje="No se pudo eliminar el envio";
        }
        return $mensaje;

    }
    public function confirmar($cod)
    {
        $consulta="update envios set estado='E',fecha_entrega=CURDATE() where codigo_envio=$cod";
        echo $consulta;
        $consultaRealizada=$this->conexion->sendQuery($consulta);
        if($consultaRealizada)
        {
            $mensaje="Envio ".$cod.' eliminado con exito';
        }
        else
        {
            $mensaje="No se pudo eliminar el envio";
        }
        return $mensaje;

    }

    public function existeEnvio($codigoEnvio)
    {
        $consulta="select codigo_envio from envios where codigo_envio=$codigoEnvio";
        return $this->conexion->executeScalar($consulta);
    }

}