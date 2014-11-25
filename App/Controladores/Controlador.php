<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/11/2014
 * Time: 16:38
 */

class Controlador {

    public static  $criterios = array(
        'destinatario-form'  => array(
            'filter'=> FILTER_CALLBACK,
            'options'  => "TratamientoFormularios::alfabetico"),
        'telefono-form'  => array(
            'filter'=> FILTER_CALLBACK,
            'options'  => "TratamientoFormularios::numerico"),
        'direccion-form'  => array(
            'filter'=> FILTER_CALLBACK,
            'options'  =>  "TratamientoFormularios::alfanumericoSimbolos"),
        'poblacion-form'  => array(
            'filter'=> FILTER_CALLBACK,
            'options'  =>  "TratamientoFormularios::alfabetico"),
        'cp-form'  => array(
            'filter'=> FILTER_CALLBACK,
            'options' => "TratamientoFormularios::cp"),
        'provincia-form'  => array(
            'filter'=> FILTER_CALLBACK,
            'options'  => "TratamientoFormularios::provincias"),
        'email-form'  => array(
            'filter'=> FILTER_VALIDATE_EMAIL),
        'observaciones-form' => array(
            'filter'=> FILTER_CALLBACK,
            'options' => "TratamientoFormularios::alfanumericoSimbolos"),
    );
    public function inicio()
    {

    }
    public function listarEnvio()
    {
        $modelo=new Modelo();

        $numeroEnvios=$modelo->obtenerNumeroRegistros("envios")["cantidad"];
        $tamanoPagina=10;
        $estados=$modelo->devuelveEstados();
        if(isset($_GET["pagina"]))
        {
            $pagina=$_GET["pagina"];
            $inicio = ($pagina - 1) * $tamanoPagina;
        }
        else
        {
            $inicio = 0;
            $pagina = 1;
        }
        $numeroPaginas = ceil($numeroEnvios / $tamanoPagina);
        $envios=$modelo->obtenerEnvios($inicio,$tamanoPagina);
        require RUTA_ABS.'\App\Vistas\paginacion.php';
        require RUTA_ABS.'\App\Vistas\listado-envios.php';



    }
    public function insertarEnvio()
    {
        $modelo=new Modelo();
        $accion="Insertar";
        $datos = array(
            'destinatario'=>'',
            'telefono' =>'',
            'direccion' =>'',
            'poblacion' =>'',
            'cp' =>'',
            'provincia' => '',
            'email' =>'',
            'observaciones' => ''
        );
        //relleno el array con las provincias disponibles, sera usado para generar las <option> del <select> provincia
        $provincias=$modelo->ObtenerProvincias();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //relleno el array con los datos del post
            TratamientoFormularios::rellenarCamposConPost($datos);

            /* filtro los datos segun los criterios establecidos en el array $criterios
            ** y me devuelve un array con los posibles errores*/
            $datosErroneos=TratamientoFormularios::validarArray($this::$criterios);
            if (!$datosErroneos) {
                //le añado al array los datos autogenerados
                $datos['estado']='P';
                $datos['fecha_envio']='';
                //llamo a la funcion insertar pasandole los datos y la tabla donde insertarlos, y que devuelve un mensaje de error o confirmacion.
                $datos["mensaje"]=$modelo->insertar($datos,'envios');

                //Borro los campos para que puedainsertar un nuevo envio
                TratamientoFormularios::rellenarValorDefecto($datos);
            }
            else
            {
                $datos["mensaje"]="Datos erroneos";
            }
        }
        else
        {
            TratamientoFormularios::rellenarValorDefecto($datos);
        }
        //como guardamos la provincia por su codigo, ahora tengo que recuperar su nombre para mostrarlo en el formulario.
        $datos["nombreProvincia"] = $modelo->obtenerNombreProvincia($datos["provincia"]);
        require RUTA_ABS.'\App\Vistas\ingreso-form.php';
    }



  /*  public function detalleEnvio()
    {
        if(isset($_GET["id"]))
        {
            $id=$_GET["id"];
            $modelo=new Modelo();
            $detalles=$modelo->obtenerDatosModificables($id);
            $estados=$modelo->devuelveEstados();
            require $GLOBALS["rutaAbsoluta"].'\App\Vistas\ingreso-form.php';
        }

    }
*/

    public function modificarEnvio()
    {
        // Le indica a la vista que se esta llevando a cabo una modificacion
        //para que esta muestre un mensaje distinto en el boton del formulario
        $accion='modificado';
        $modelo=new Modelo();
        $codigoEnvio = $this->obtenerCodigoEnvio($modelo, $accion);
        $datos=$modelo->obtenerDatosModificables($codigoEnvio);
        if (isset($_POST['enviar-form']))
        {
            TratamientoFormularios::rellenarCamposConPost($datos);
            $datosErroneos=TratamientoFormularios::validarArray($this::$criterios);
            if (!$datosErroneos) {
                //llamo a la funcion insertar envio que devuelve un mensaje de error o confirmacion.
                $datos["mensaje"]=$modelo->editar($datos,$codigoEnvio,"envios");
            }
            else
            {
                $datos["mensaje"]="Datos erroneos";
            }
        }
        $datos["nombreProvincia"] = $modelo->obtenerNombreProvincia($datos["provincia"]);
        $provincias=$modelo->ObtenerProvincias();
        require RUTA_ABS.'\App\Vistas\ingreso-form.php';
    }

    public function eliminarEnvio()
    {
        $modelo=new Modelo();
        $accion="eliminado";
        $codigoEnvio = $this->obtenerCodigoEnvio($modelo, $accion);
        if (isset($_POST['enviar-form']))
        {
            if ($_POST['enviar-form'] == 'Si') {
                $codigoEnvio=$_POST['cod'];
               $mensaje=$modelo->eliminar('envios','codigo_envio',$codigoEnvio);
            }
            header('Location: '.URL_APP.'/App/index.php?operacion=listar');
        }
        require RUTA_ABS.'\App\Vistas\confirmacion.php';
    }


    public function confirmarRecepcion()
    {
        $modelo=new Modelo();
        $accion="marcado como recibido";
        $codigoEnvio = $this->obtenerCodigoEnvio($modelo, $accion);
        if (isset($_POST['enviar-form']))
        {
            if ($_POST['enviar-form'] == 'Si') {
                $modelo=new Modelo();
                $codigoEnvio=$_POST['cod'];
                $mensaje=$modelo->confirmar($codigoEnvio,date("y-m-d"));
            }
            header('Location: '.URL_APP.'/App/index.php?operacion=listar');
        }
        require RUTA_ABS.'\App\Vistas\confirmacion.php';
    }



    public function CompruebaEnvio($codigoEnvio, $modelo,$accion)
    {
        $codigoValidado = TratamientoFormularios::validarCodigo($codigoEnvio);
        if (!$codigoValidado || !$modelo->existeEnvio($codigoEnvio)) {
            $mensaje = !$codigoValidado ? 'Codigo de envio no valido' : 'El envio nº ' . $codigoEnvio . ' no existe';
            require RUTA_ABS . '\App\Vistas\introduce-envio.php';
            exit();
        }
    }

    /**
     * @param $modelo
     * @param $accion
     */
    public function obtenerCodigoEnvio($modelo, $accion)
    {
        if (isset($_GET['envio'])) {
            $codigoEnvio = $_GET['envio'];
            $this->CompruebaEnvio($codigoEnvio, $modelo, $accion);
            return $codigoEnvio;
        } elseif (isset($_POST['comprobar-envio'])) {
            $codigoEnvio = $_POST['codigo-envio'];
            $this->CompruebaEnvio($codigoEnvio, $modelo, $accion);
            return $codigoEnvio;
        } elseif (isset($_POST['enviar-form'])) {
            $codigoEnvio = $_POST['cod'];
            return $codigoEnvio;
        } else {
            require RUTA_ABS . '\App\Vistas\introduce-envio.php';
            exit();
        }
    }


    public function buscarEnvio()
    {
        $parametrosBusqueda=[
            "palabra" => [
                [
                    "codigo" => "=",
                    "nombre" => "Igual que"
                ],
                [
                    "codigo" => "!=",
                    "nombre" => "Distinto de"
                ],
                [
                    "codigo" => "like",
                    "nombre" => "Que contenga"
                ]
            ],
            "numero" => [
                [
                    "codigo" => "=",
                    "nombre" => "Igual que"
                ],
                [
                    "codigo" => "!=",
                    "nombre" => "Distinto de"
                ],
                [
                    "codigo" => "&gt;",
                    "nombre" => "Mayor que"
                ],
                [
                    "codigo" => "&gt;=",
                    "nombre" => "Mayor o igual que"
                ],
                [
                    "codigo" => "&lt;",
                    "nombre" => "Menor que"
                ],
                [
                    "codigo" => "&lt;=",
                    "nombre" => "Menor o igual que"
                ]
            ],
            "lista" => [
                [
                    "codigo" => "=",
                    "nombre" => "Igual que"
                ],
                [
                    "codigo" => "!=",
                    "nombre" => "Distinto de"
                ]
            ]
        ];
        require RUTA_ABS . '\App\Vistas\busqueda-form.php';
    }

} 