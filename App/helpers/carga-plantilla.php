<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 25/11/2014
 * Time: 17:47
 */


/**
 * Carga las distintas plantillas.
 *
 * @param       $rutaFichero
 * @param array $variablesDeVista
 *
 * @return string
 */
function & CargaVista($rutaFichero, array  $variablesDeVista=NULL)
{


    if (! file_exists($rutaFichero)) {
        $htmlError="<div>No existe: $rutaFichero</div>"; // Nada que incluir
        return $htmlError;
    }

    // Creamos variables que hemos pasado en el array
    if(!is_null($variablesDeVista))
    {
        foreach($variablesDeVista as $nombreVariableArrayEnForeach=>$valorVariableArray)
        {   // OJO al doble $
            $$nombreVariableArrayEnForeach=$valorVariableArray;
        }
    }

    // Interpretamos plantilla
    ob_start();
    include($rutaFichero);
    $html = ob_get_clean();


    return $html;


}