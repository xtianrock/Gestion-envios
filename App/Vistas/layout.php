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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function($) {
            $('.accordion').find('.accordion-toggle').click(function(){

                //Expand or collapse this panel
                $(this).next().slideToggle('fast');

                //Hide the other panels
                $(".accordion-content").not($(this).next()).slideUp('fast');
            });
            $('.accordion').find('.accordion-content').click(function(){

                //Expand or collapse this panel
                $(this).next().slideToggle('fast');

                //Hide the other panels
                $(".accordion-content").not($(this).next()).slideUp('fast');
            });
        });
        function muestraConfirmacion(mensaje) {
            alert(mensaje);
        }

    </script>

</head>
<body>
<section id="cabecera">
    <nav>
        <a href="<?=URL_APP?>/App/index.php">
                 <span class="menu">
                    <img class="icono" src="<?=URL_APP?>/Assets/img/icons/home.png">
                     Home
                </span>
        </a>
        <a href="?operacion=listar">
                 <span class="menu">
                    <img class="icono" src="<?=URL_APP?>/Assets/img/icons/lista.png">
                     Listar envios
                </span>
        </a>
        <a href="?operacion=alta">
                 <span class="menu">
                    <img class="icono" src="<?=URL_APP?>/Assets/img/icons/insertar.png">
                     Nuevo envio
                </span>
        </a>

        <a href="?operacion=modificar">
                 <span class="menu">
                    <img class="icono" src="<?=URL_APP?>/Assets/img/icons/editar.png">
                     Modificar envio
                </span>
        </a>
        <a href="?operacion=eliminar">
                 <span class="menu">
                    <img class="icono" src="<?=URL_APP?>/Assets/img/icons/eliminar.png">
                     Eliminar envio
                </span>
        </a>
        <a href="?operacion=confirmar">
                 <span class="menu">
                    <img class="icono" src="<?=URL_APP?>/Assets/img/icons/confirmar.png">
                     Confirmar recepción
                </span>
        </a>
        <a href="?operacion=buscar">
                 <span class="menu">
                    <img class="icono" src="<?=URL_APP?>/Assets/img/icons/busqueda.png">
                     Buscar envio
                </span>
        </a>
    </nav>
</section>
<section id="contenido">
    <?php
    if(isset($paginacion))
        echo $paginacion;
    if(isset($contenido))
        echo $contenido;?>
</section>

</body>
</html>