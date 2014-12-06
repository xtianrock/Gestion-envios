<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 24/11/2014
 * Time: 2:07
 */
echo'

<ul>
    <li>
        <a href="<?= URL_APP ?>/App/index.php">
            <span class="menu">
                <img class="icono" src="<?= URL_APP ?>/Assets/img/icons/home.png">
                Home
            </span>
        </a>
    </li>
    <li>
        <a href="?operacion=listar">
            <span class="menu">
                <img class="icono" src="<?= URL_APP ?>/Assets/img/icons/lista.png">
                Listar envios
            </span>
        </a>
    </li>
    <li>
        <a href="?operacion=alta">
            <span class="menu">
                <img class="icono" src="<?= URL_APP ?>/Assets/img/icons/insertar.png">
                Nuevo envio
            </span>
        </a>
    </li>
    <li>
        <a href="?operacion=modificar">
            <span class="menu">
                <img class="icono" src="<?= URL_APP ?>/Assets/img/icons/editar.png">
                Modificar envio
            </span>
        </a>
    </li>
    <li>
        <a href="?operacion=eliminar">
            <span class="menu">
                <img class="icono" src="<?= URL_APP ?>/Assets/img/icons/eliminar.png">
                Eliminar envio
            </span>
        </a>
    </li>
    <li>
        <a href="?operacion=confirmar">
            <span class="menu">
                <img class="icono" src="<?= URL_APP ?>/Assets/img/icons/confirmar.png">
                Confirmar recepción
            </span>
        </a>
    </li>
    <li>
        <a href="?operacion=buscar">
            <span class="menu">
                <img class="icono" src="<?= URL_APP ?>/Assets/img/icons/busqueda.png">
                Buscar envio
            </span>
        </a>
    </li>
</ul>';