<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 07/11/2014
 * Time: 2:40
 */
?>
<html>
<head>
    <meta charset="utf-8" />
    <title><?=$titulo?></title>
    <link rel="stylesheet" href="../Assets/css/index.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../Assets/js/ripple.js"></script>
</head>
<body>

<section id="cabecera">

</section>

<section id="principal">
    <div id="menu-lateral">
        <?php
        require_once RUTA_ABS.'/App/Vistas/menu-lateral.php'?>
    </div>
    <div id="contenido">
        <?php
        if(isset($paginacion))
            echo $paginacion;
        if(isset($contenido))
            echo $contenido;?>
    </div>
</section>

</body>
</html>