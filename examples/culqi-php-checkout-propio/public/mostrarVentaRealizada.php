<?php
// Implementamos la librería de Culqi
require_once dirname(__FILE__) . '/../../../lib/culqi.php';
// Implementamos la librería de validación de Culqi
require 'culqiValidar.php';


try {
    // Se recibe la respuesta (información de la venta) cifrada a través de una petición POST
    $datosDeVentaRealizada = $_POST['informacionDeVentaCifrada'];
    // Si determinamos que la respuesta esta cifrada, la cambiaremos a true
    $respuestaCifrada = false;

    switch ($datosDeVentaRealizada) {
        case 'checkout_cerrado':
            $datosDeVentaRealizada = 'Ha cerrado el formulario de pago.';
            break;
        case 'error':
            $datosDeVentaRealizada = 'Ha ocurrido un error mientras CULQI procesaba la transacción.';
            break;
        case 'parametro_invalido':
            $datosDeVentaRealizada = 'La información enviada para cargar el formulario de pago es inválida.';
            break;
        case 'venta_expirada':
            $datosDeVentaRealizada = 'La venta ha expirado, ya que han pasado 10 minutos.';
            break;
        default:
            $respuestaCifrada = true;
            // Se descifra la llave
            $datosDeVentaRealizada = Culqi::descifrar($datosDeVentaRealizada, true);
            // Se convierte en objeto los datos de la venta
            $datosDeVentaRealizada = json_decode($datosDeVentaRealizada);
            break;
    }
    // Se determina la fecha y hora de la venta
    $fecha = date('d-m-Y, g:i:s a');
    // Se muestra la vista de venta realizada
    require '../views/ventaRealizada.php';

} catch (InvalidParamsException $e) {
    // En caso de error, se muestra el mensaje
    echo $e->getMessage()."\n";
}
