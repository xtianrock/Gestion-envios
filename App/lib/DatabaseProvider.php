<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 04/11/2014
 * Time: 0:43
 */


abstract class DatabaseProvider
{
    #Guarda internamente el objeto de conexión
    protected $resource;
    #Se conecta según los datos especificados
    public abstract function connect($host, $user, $pass, $dbname);
    #Obtiene el número del error
    public abstract function getErrorNo();
    #Obtiene el texto del error
    public abstract function getError();
    #Envía una consulta
    public abstract function query($q);
    #Convierte en array la fila actual y mueve el cursor
    public abstract function fetchAssoc($resource);
    #Comprueba si está conectado
    public abstract function isConnected();
    #Escapa los parámetros para prevenir inyección
    public abstract function escape($var);
    #Obtiene el id del ultimo elemento insertado
}
class MySqlProvider extends DatabaseProvider
{
    /**
     * Conecta con la mysqli
     *
     * @param $host
     * @param $user
     * @param $pass
     * @param $dbname
     *
     * @return \mysqli
     */
    public function connect($host, $user, $pass, $dbname){
        $this->resource = @new mysqli($host, $user, $pass, $dbname);
        return  $this->resource;
    }

    /**
     * Obtiene el codigo de error.
     *
     * @return int
     */
    public function getErrorNo(){
        return mysqli_errno($this->resource);
    }

    /**
     * Obtiene el texto del error.
     *
     * @return string
     */
    public function getError(){
        return mysqli_error($this->resource);
    }

    /**
     * Ejecuta una consulta
     *
     * @param $q -consulta a ejecutar
     *
     * @return bool|\mysqli_result
     */
    public function query($q){
        return mysqli_query($this->resource,$q);
    }

    /**
     * Obtiene el siguiente registro.
     *
     * @param $result
     *
     * @return array|null
     */
    public function fetchAssoc($result){
        return mysqli_fetch_assoc($result);
    }

    /**
     * Devuelve si esta conectado o no.
     *
     * @return bool
     */
    public function isConnected(){
        return !is_null($this->resource);
    }

    /**
     * Evita la inyeccion de codigo.
     *
     * @param $var
     *
     * @return string
     */
    public function escape($var){
        return mysqli_real_escape_string($this->resource,$var);
    }

    /**
     * Devuelve el indice del ultimo elemento insertado.
     *
     * @return mixed
     */
    public function insert_id()
    {
        return $this->resource->insert_id;
    }
}
class DataBaseLayer
{
    private $provider;
    private $params;
    private static $_con;

    /**
     * Constructor de la capa de abstracion.
     *
     * Es privado para que no puede ser llamado desde fuera de la clase.
     *
     * @param $provider
     * @param $parametros -se usa para el instalador, cuando aun no existe Config.php
     *
     * @throws \Exception
     */
    private function __construct($provider,$parametros){
        if(!class_exists($provider)){
            throw new Exception("El proveedor especificado no ha sido implentado o añadido.");
        }
        elseif($parametros)
        {
        $this->provider = new $provider;
        $this->provider->connect($parametros["servidor"],$parametros["usuario"],$parametros["clave"],$parametros["bd"]);
        }
        else
        {
            $this->provider = new $provider;
            $this->provider->connect(Config::$hostname,Config::$usuario,Config::$clave,Config::$bd);
        }

        if(!$this->provider->isConnected()){
            /*Controlar error de conexion*/
        }
    }

    /**
     * Obtiene la conexion.
     *
     * Si no existe crea una nueva.
     *
     * @param      $provider
     * @param null $parametros
     *
     * @return mixed
     */
    public static function getConnection($provider,$parametros=null){
        if(self::$_con){
            return self::$_con;
        }
        else{
            $class = __CLASS__;
            self::$_con = new $class($provider,$parametros);
            return self::$_con;

        }
    }

    /**
     * Comprueba si los datos de conexion proporcionados son validos.
     *
     * @param $provider
     * @param $parametros
     *
     * @return bool
     */
    public static function tryConnection($provider,$parametros)
    {
        $conexion=new $provider();
        $conexion=$conexion->connect($parametros["servidor"],$parametros["usuario"],$parametros["clave"],$parametros["bd"]);
        if (!$conexion->connect_error)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * @param $coincidencias
     *
     * @return mixed
     */
    private function replaceParams($coincidencias){
        $b=current($this->params);
        next($this->params);
        return $b;
    }

    /**
     * Prepara la consulta para evitar inyeccion de codigo.
     *
     * @param $sql
     * @param $params
     *
     * @return mixed
     */
    private function prepare($sql, $params){
        for($i=0;$i<sizeof($params); $i++){
            if(is_bool($params[$i])){
                $params[$i] = $params[$i]? 1:0;
            }
            elseif(is_double($params[$i]))
                $params[$i] = str_replace(',', '.', $params[$i]);
            elseif(is_numeric($params[$i]))
                $params[$i] = $this->provider->escape($params[$i]);
            elseif(is_null($params[$i]))
                $params[$i] = "NULL";
            else
                $params[$i] = "'".$this->provider->escape($params[$i])."'";
        }

        $this->params = $params;
        $q = preg_replace_callback("/(\?)/i", array($this,"replaceParams"), $sql);

        return $q;
    }

    /**
     * Ejecuta una consulta que no devolvera valores.
     *
     * @param      $q
     * @param null $params
     *
     * @return mixed
     */
    public function sendQuery($q, $params=null){
        $query = $this->prepare($q, $params);
        $result = $this->provider->query($query);
        if($this->provider->getErrorNo()){
            /*Controlar errores*/
        }
        return $result;
    }

    /**
     * Realiza una consulta que devolvera un valor unico.
     *
     * @param      $q
     * @param null $params
     *
     * @return mixed|null
     */
    public function executeScalar($q, $params=null){
        $result = $this->sendQuery($q, $params);
        if(!is_null($result)){
            if(!is_object($result)){
                return $result;
            }
            else{
                $row = $this->provider->fetchAssoc($result);

                return $row;
            }
        }
        return null;
    }

    /**
     * Realiza una consulta que devolvera un array de valores
     *
     * @param      $q
     * @param null $params
     *
     * @return array|null
     */
    public function execute($q, $params=null){
        $result = $this->sendQuery($q, $params);
        if(is_object($result)){
            $arr = array();
            while($row = $this->provider->fetchAssoc($result)){
                $arr[] = $row;
            }
            return $arr;
        }
        return null;

    }

    /**
     * Obtiene el indice del ultimo elemento
     *
     * @return mixed
     */
    public function lastIndex()
    {
        return $this->provider->insert_id();
    }

    /**
     * Obtiene el error
     *
     * @return mixed
     */
    public function obtenerError()
    {
        return $this->provider->getError();
    }

    /**
     * Cierra la conexion con la base de datos.
     */
    public function disconnect()
    {
        //mysql_close($this->provider);
        /*
         * Por lo visto no es necesario llamar al metodo close() ya
         * que los enlaces abiertos no persistentes son automáticamente
         * cerrados al final de la ejecución del script.*/
    }
}

?>

