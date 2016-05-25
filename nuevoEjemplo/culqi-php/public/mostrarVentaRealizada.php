<?php

$datosDeVentaConfirmada = array(
    'apellido_tarjeta_habiente' => $_POST['apellido_tarjeta_habiente'],
    'marca'                     => $_POST['marca'],
    'mensaje_respuesta_usuario' => $_POST['mensaje_respuesta_usuario'],
    'nombre_tarjeta_habiente'   => $_POST['nombre_tarjeta_habiente'],
    'numero_pedido'             => $_POST['numero_pedido'],
    'numero_tarjeta'            => $_POST['numero_tarjeta'],
);

$fecha = date('d-m-Y, g:i:s a');

require '../views/ventaRealizada.php';
