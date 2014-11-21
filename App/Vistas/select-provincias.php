<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 04/11/2014
 * Time: 1:44
 */


foreach ($provincias as $provincia)
{
    $nombreProvincia=utf8_encode($provincia["nombre"]);
    echo "<option value='".$provincia['cod']."'>".$nombreProvincia."</option>";

}