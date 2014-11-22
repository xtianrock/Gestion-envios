<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 22/11/2014
 * Time: 14:48
 */
ob_start();
echo '<div class="paginacion"><h1>';
if ($numeroPaginas > 1) {
    if ($pagina != 1)
    {
        echo '<a href="'.URL_APP.'/App/index.php?operacion=listar&pagina=1">Primera</a>';
        echo '<a href="'.URL_APP.'/App/index.php?operacion=listar&pagina='.($pagina-1).'"><img class="icono" src="'.URL_APP.'\Assets\img\icons\icon_left.png" border="0"></a>';
    }
    else
    {
        echo 'Primera';
        echo '<img class="icono" src="'.URL_APP.'\Assets\img\icons\icon_left.png" border="0">';

    }

    for ($i=1;$i<=$numeroPaginas;$i++) {
        if ($pagina == $i)
            //si muestro el índice de la página actual, no coloco enlace
            echo $pagina;
        else
            //si el índice no corresponde con la página mostrada actualmente,
            //coloco el enlace para ir a esa página
            echo '  <a href="'.URL_APP.'/App/index.php?operacion=listar&pagina='.$i.'">'.$i.'</a>  ';
    }

    if ($pagina != $numeroPaginas)
    {
        echo '<a href="'.URL_APP.'/App/index.php?operacion=listar&pagina='.($pagina+1).'"><img class="icono" src="'.URL_APP.'\Assets\img\icons\icon_right.png"" border="0"></a>';
        echo '<a href="'.URL_APP.'/App/index.php?operacion=listar&pagina='.$numeroPaginas.'">Última</a>';
    }
    else
    {
        echo '<img class="icono" src="'.URL_APP.'\Assets\img\icons\icon_right.png" border="0">';
        echo 'Última';

    }
}
echo '</h1></div>';
$paginacion=ob_get_clean();
