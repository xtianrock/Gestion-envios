<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 04/11/2014
 * Time: 17:34
 */
if(isset($_GET["mensaje"]))
{
    $mensaje=$_GET["mensaje"];
    echo "<br /><span class='mensaje'>".$mensaje."</span><br />";
}
