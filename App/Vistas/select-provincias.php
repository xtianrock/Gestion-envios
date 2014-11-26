<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 04/11/2014
 * Time: 1:44
 */


foreach ($provincias as $provincia)
{
    echo "<option value='".$provincia['cod']."'>".$provincia["nombre"]."</option>";
}