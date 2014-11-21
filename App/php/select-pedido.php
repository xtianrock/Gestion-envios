<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 05/11/2014
 * Time: 0:48
 */
require_once("../Modelos/DatabaseProvider.php");
require_once("../config.php");

$db=DataBaseLayer::getConnection("MySqlProvider");
$consulta="select * from envios";
$envios=$db->execute($consulta);
//print_r($provincias);
echo'<html>
<head>
    <meta charset="utf-8" />
    <title>listado</title>
<link rel="stylesheet" href="../../Assets/css/index.css">

</head>
<body>';
foreach ($envios as $envio)
{
    //echo "<option value='".$envio['codigo_envio']."'>".$envio['codigo_envio']."</option>";
    echo '<div class="lista">';
    echo '<span class="datos">'.$envio['codigo_envio'].'</span>';
    echo '<span class="datos">'.$envio['destinatario'].'</span>';
   // echo '<span class="datos">'.$envio['telefono'].'</span>';
   // echo '<span class="datos">'.$envio['direccion'].'</span>';
   // echo '<span class="datos">'.$envio['poblacion'].'</span>';
   // echo '<span class="datos">'.$envio['cp'].'</span>';
   // echo '<span class="datos">'.$envio['provincia'].'</span>';
   // echo '<span class="datos">'.$envio['correo_electronico'].'</span>';
    echo '<span class="datos">'.$envio['estado'].'</span>';
    echo '<span class="datos">'.$envio['fecha_envio'].'</span>';
    echo '<span class="datos">'.$envio['fecha_entrega'].'</span>';
    echo '<span class="iconos">';
    echo ' <a href="" title="Detalles"><span class="boton"><img src="../../Assets/img/icons/lista.png"></span></a>';
    echo ' <a href="" title="Editar"><span class="boton"><img src="../../Assets/img/icons/editar.png"></span></a>';
    echo ' <a href="" title="Eliminar"><span class="boton"><img src="../../Assets/img/icons/eliminar.png"></span></a>';
    echo ' <a href="" title="Confirmar entrega"><span class="boton"><img src="../../Assets/img/icons/confirmar.png"></span></a>';
    echo '</span>';
    echo '</div>';

}
echo '</body></html>';