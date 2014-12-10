<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 10/11/2014
 * Time: 16:50
 */

class TratamientoFormularios {


    /**
     * Funcion encargada de validar datos que llegan por post.
     *
         * @param $criterios array con los criterios para el filtrado
     *
     * @return array array con los datos no validos.
     */
  static public function validarArray($criterios)
    {
        $datosValidados = filter_input_array(INPUT_POST,$criterios);
        $datosErroneos=array();
        foreach ($datosValidados as $clave=>$valor)
        {
            if(!$valor)
            {
                $datosErroneos[$clave]=true;
            }

        }
        return $datosErroneos;
    }

    /**
     * Valida codigo de envio.
     *
     * @param $codigoEnvio
     *
     * @return mixed
     */
    public static function validarCodigo($codigoEnvio)
    {
        $opciones=array("options"=>
                array("min_range"=>0, "max_range"=>99999999));
        return filter_var($codigoEnvio,FILTER_VALIDATE_INT,$opciones);
    }

    /**
     * Valida codigo postal.
     *
     * @param $valor
     *
     * @return bool
     */
    static function cp($valor)
    {
        //El código postal en España son cinco números. Los dos primeros van del 01 al 52 (las provincias)
        //y los tres restantes pueden ser cualquier valor numérico
        $permitidos='/^0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}$/';
        if (preg_match($permitidos,$valor))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Valida codigo provincias.
     *
     * @param $valor
     *
     * @return bool
     */
    static function provincias($valor)
    {
        //Las provincias en España van numeradas desde eñ 01 hasta el 52.
        $permitidos='/^0[1-9]|[1-4][0-9]|5[0-2]$/';
        if (preg_match($permitidos,$valor))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Valida campos de texto.
     *
     * @param $valor
     *
     * @return bool
     */
   static function alfabetico($valor)
    {
        $permitidos = '/^[A-Z üÜáéíóúÁÉÍÓÚñÑ]{1,50}$/i';
        if(empty($valor))
        {
            return false; // Campo vacio
        }
        else
        {
            if (preg_match($permitidos,$valor))
            {
                return true; // Campo permitido 
            }
            else
            {
                return false; // Error uno de los caracteres no hace parte de la expresión regular 
            }
        }
    }

    /**
     * Valida campos alfanumericos y co ciertos simbolos.
     *
     * @param $valor
     *
     * @return bool
     */
    static function alfanumericoSimbolos($valor)
    {
        $permitidos = '/^[A-Z 0-9 üÜáéíóúÁÉÍÓÚñÑ,.-ºª"]{1,150}$/i';
        if(empty($valor))
        {
            return true; // Campo vacio
        }
        else
        {
            if (preg_match($permitidos,$valor))
            {
                return true; // Campo permitido 
            }
            else
            {
                return false; // Error uno de los caracteres no hace parte de la expresión regular 
            }
        }
    }

    /**
     * Valida campos numericos.
     *
     * @param $valor
     *
     * @return bool
     */
   static function numerico($valor)
    {
        if(empty($valor))
        {
            return false; //campo vacio no validar
        }
        else
        {
            if(ctype_digit($valor))
            {
                return true; // Si es un número
            }
            else
            {
                return false; // Error no es un número
            }
        }
    }

    /**
     * Valida campos de tipo fecha.
     *
     * @param $input
     *
     * @return bool
     */
    static function fecha($input)
    {
        $input_array= explode("-",$input);
        if(checkdate($input_array[1],$input_array[2],$input_array[0]))
        {
            $fechaActual = date("y-m-d");
            $fechaEntrega = date_create(input);
            $direfencia = date_diff($fechaActual, $fechaEntrega);
            if($direfencia->format('%R')=="-")
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }


    }

    /**
     * Rellena un array con los datos que llegan por post.
     *
     * @param $datos
     */
   static public function rellenarCamposConPost(& $datos)
    {
        foreach ($datos as $nombreCampo=>$valor)
        {
            $datos[$nombreCampo] = $_POST[$nombreCampo."-form"];
        }
    }

    /**
     * Rellena un array con unos valores dados.
     *
     * @param $datos
     */
   static public function rellenarValorDefecto(& $datos)
    {
        foreach ($datos as $nombreCampo=>$valor)
        {
            if($nombreCampo!="mensaje")
            {
                $datos[$nombreCampo] = "";
            }
        }
    }

}