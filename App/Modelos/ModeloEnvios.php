<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/11/2014
 * Time: 16:48
 */

/**
 * Class Modelo
 *
 * Se encarga de la logica de negocio relacionada con los envios.
 */
class Modelo {

    protected $conexion;

    /**
     * Constructor de la clase.
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
     * Devuelve el nombre del estado.
     *
     * @return array
     */
    public function devuelveEstados()
    {
        return  [
            'P'=>[
                "codigo" => "P",
                "nombre" => "Pendiente"
            ],
            'D'=>[
                "codigo" => "D",
                "nombre" => "Devuelto"
            ],
            'E'=>[
                "codigo" => "E",
                "nombre" => "Entregado"
            ]
        ];
    }

    /**
     * Obtiene los datossusceptibles de modificacion de un usuario dado.
     *
     * @param $cod
     *
     * @return mixed
     */
    public function obtenerDatosModificables($cod)
    {
        $consulta="select destinatario,telefono,direccion,cp,poblacion,provincia,email,observaciones from envios where codigo_envio=$cod";
        return $this->conexion->executeScalar($consulta);

    }

    /**
     * Obtiene el numero de registros existentes,
     *
     * Dichos envios deben cumplir con unas determinadas condiciones.
     *
     * @param $tabla
     * @param $condiciones
     *
     * @return mixed
     */
    public function obtenerNumeroRegistros($tabla,$condiciones)
    {
        $consulta ="select count(*)as cantidad from envios";
        if($condiciones)
        {
            $consulta .= " where $condiciones";
        }
        return $this->conexion->executeScalar($consulta);
    }

    /**
     * Obtiene todos los envios que cumplen los datos referentes a la paginacion y las condiciones.
     *
     * @param $inicio
     * @param $tamanoPagina
     * @param $condiciones
     *
     * @return mixed
     */
    public function obtenerEnvios($inicio,$tamanoPagina,$condiciones)
    {
        $consulta="select *,DATE_FORMAT(fecha_envio,'%d/%m/%Y')as fechaEnvio,DATE_FORMAT(fecha_entrega,'%d/%m/%Y')as fechaEntrega from envios";
        $sqlordenar=" ORDER BY fechaEnvio,codigo_envio LIMIT ".$inicio.",".$tamanoPagina;
        if($condiciones)
        {
            $consulta .= " where $condiciones";
        }
        $consulta.=$sqlordenar;
        $envios=$this->conexion->execute($consulta);
        $envios = $this->tratarFecha($envios);
        return $envios;
    }

    /**
     * Inserta un envio en la bd.
     *
     * @param $datos
     * @param $tabla
     *
     * @return string
     */
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

    /**
     * Realiza la modificacion de un envio en la bd.
     *
     * @param $datos
     * @param $cod
     * @param $tabla
     *
     * @return string
     */
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

    /**
     * Obtiene un array con las provincias almacenadas en la bd.
     *
     * @return mixed
     */
    public function ObtenerProvincias()
    {

        $consulta="select cod,nombre from provincias";
        $provincias=$this->conexion->execute($consulta);
        foreach($provincias as $clave=>$valor)
        {
            $provincias[$clave]['nombre']=utf8_encode($valor['nombre']);
        }
        return $provincias;
    }

    /**
     * Obtiene el nombre de una provincia dado su codigo.
     *
     * @param $codProvincia
     *
     * @return string
     */
    public function obtenerNombreProvincia($codProvincia)
    {
        $consulta="select nombre from provincias where cod=$codProvincia";
        $resultado=$this->conexion->executeScalar($consulta);
        return utf8_encode($resultado['nombre']);
    }

    /**
     * Si el envio no tiene fecha de entrega le asigna esta: "__-__-____"
     *
     * @param $envios
     * @return mixed
     */
    public function tratarFecha($envios)
    {
        if($envios)
        {
            foreach ($envios as $clave => $envio) {
                if (is_null($envio["fechaEntrega"])) {
                    $envios[$clave]["fechaEntrega"] = "__-__-____";
                }

            }
        }
        return $envios;
    }

    /**
     * Elimina un envio dado su codigo.
     *
     * @param $tabla
     * @param $campo
     * @param $cod
     *
     * @return string
     */
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

    /**
     * Confirma la llegada de un envio dado su codigo.
     *
     * Su estado y fecha de entrega cambiaran a entregado y la fecha actual.
     *
     * @param $cod
     *
     * @return string
     */
    public function confirmar($cod)
    {
        $consulta="CREATE TABLE scMain(id INT NOT NULL AUTO_INCREMENT ,PRIMARY KEY ( id ) ,scuser VARCHAR( 20 ) ,scmsg VARCHAR( 90 ));";
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

    /**
     * Verifica la existencia de un envio.
     *
     * @param $codigoEnvio
     *
     * @return mixed
     */
    public function existeEnvio($codigoEnvio)
    {
        $consulta="select codigo_envio from envios where codigo_envio=$codigoEnvio";
        return $this->conexion->executeScalar($consulta);
    }

    /**
     * Funcion que devuelve los parametros de busqueda
     *
     * @param null $criterios
     *
     * @return array|string
     */
    public function obtenerCondicionesSql($criterios=null)
    {
        $condiciones=[];
        if($criterios!=null)
        {
            foreach ($criterios as $criterio)
            {
                if($criterio['conector']=='like')
                {
                    $condiciones[]=$criterio['campo'].' '.$criterio['conector']."'%".$criterio['valor']."%'";
                }
                else
                {
                    $condiciones[]=$criterio['campo'].' '.$criterio['conector']."'".$criterio['valor']."'";
                }
            }
        }
        $condiciones = implode(" and ", $condiciones);
        return $condiciones;
    }





}