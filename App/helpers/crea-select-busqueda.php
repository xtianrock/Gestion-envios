<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 25/11/2014
 * Time: 19:55
 */

/**
 * Crea las disntntas listas desplegables del apartado buscar.
 *
 * @param       $nombre
 * @param       $datos
 * @param null  $valorPorDefecto
 * @param null  $nullValue
 * @param array $camposDatos
 *
 * @return string
 */

function creaListaDesplegable(
    $nombre,
    $datos,
    $valorPorDefecto = NULL,
    $nullValue = NULL,
    $camposDatos = ['desc' => 'nombre', 'valor' => 'codigo']) {
    $html = "<select name='$nombre'>\n";
    if (is_array($nullValue)) {
        if ($nullValue[$camposDatos['valor']] == $valorPorDefecto) {
            $html .= "<option value='{$nullValue[$camposDatos['valor']]}' selected='selected'>{$nullValue[$camposDatos['desc']]}</option>\n";
        } else {
            $html .= "<option value='{$nullValue[$camposDatos['valor']]}'>{$nullValue[$camposDatos['desc']]}</option>\n";
        }
    }
    foreach ($datos as $dato) {
        if ($dato[$camposDatos['valor']] == $valorPorDefecto) {
            $html .= "<option value='{$dato[$camposDatos['valor']]}' selected='selected'>{$dato[$camposDatos['desc']]}</option>\n";
        } else {
            $html .= "<option value='{$dato[$camposDatos['valor']]}'>{$dato[$camposDatos['desc']]}</option>\n";
        }
    }
    $html .= "</select>\n";

    return $html;
}