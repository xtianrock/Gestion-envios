<?php
/**
 * Created by PhpStorm.
 * User: 2DAWT
 * Date: 05/12/2014
 * Time: 19:16
 */
?>
<html>
<head>
    <meta charset="utf-8" />
    <title><?=$GLOBALS["titulo"]?></title>
<link rel="stylesheet" href="../Assets/css/instalador.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../Assets/js/ripple.js"></script>
</head>
<body>

<div id="instalador">
    <?php if(isset($contenido))
        echo $contenido;?>
</div>

</body>
</html>