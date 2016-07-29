<?php
// Implementamos la librería de Culqi
require_once dirname(__FILE__) . '/../../../lib/culqi.php';
// Implementamos la librería de validación de Culqi
require 'culqiValidar.php';



// Se recupera los datos del cliente desde el formulario
$datosDeCliente = array(
    // Apellidos del cliente
    'apellidos'          => $_POST['apellidos'],
    // Ciudad del cliente
    'ciudad'             => $_POST['ciudad'],
    // Código de país del cliente
    'cod_pais'           => $_POST['cod_pais'],
    // Correo electrónico del cliente
    'correo_electronico' => $_POST['correo_electronico'],
    // Dirección del cliente
    'direccion'          => $_POST['direccion'],
    // Nombre o nobres del  cliente
    'nombres'            => $_POST['nombres'],
    // Número de teléfono del cliente
    'num_tel'            => $_POST['num_tel']
);

// Se guarda la información de la venta para enviarla a Culqi
$datosDeVenta = array(
    // Identificador de usuario del cliente
    'id_usuario_comercio' => 'ID002',
    // Descripción de la venta
    'descripcion' => 'Un protector de smartphone y una memoria microSD de 32 GB.',
    // Moneda de la venta ("PEN" O "USD")
    'moneda' => 'PEN',
    // Monto de la venta (ejem: 10.25, no se incluye el punto decimal)
    'monto' => '1025',
    // Número de pedido de la venta, y debe ser único (de no ser así, recibirá como respuesta un error)
    'numero_pedido' => CulqiValidar::codigoAleatorio()
);

// Validamos si los datos del cliente y de la venta cumplen con las restricciones
CulqiValidar::validarDatosDeCliente($datosDeCliente);
CulqiValidar::validarDatosDeVenta($datosDeVenta);

// Enviamos los datos de la venta al Servidor de Culqi
CulqiValidar::crearVenta($datosDeCliente, $datosDeVenta);
