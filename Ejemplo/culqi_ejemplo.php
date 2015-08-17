<?php

require 'culqi_src.php';

Culqi::$llaveSecreta = "zzmxZlgIJtKKy0F71DMsZPWnPVzow4S90abBScLDIrk=";
Culqi::$codigoComercio = "testc101";
Culqi::$servidorBase = 'https://integ-pago.culqi.com';
    
try {
    
//    $data = Pago::crearDatospago(array(
//        Pago::PARAM_NUM_PEDIDO => "tlvh20150727-1",
//        Pago::PARAM_MONEDA => "PEN",
//        Pago::PARAM_MONTO => "123",
//    ));
    
//    $informacionVenta = $data[Pago::PARAM_INFO_VENTA];
    
//    $dataDecifrada = Culqi::decifrar($informacionVenta);
//
//    echo "Información de la venta: $informacionVenta\n";
//    var_dump($dataDecifrada);
//    $data = Pago::consultar("0MXpbwlGjRU9Sr0IwIOqHh1aVJICjGh9KIq");
    
    $data = Pago::anular("0MXpbwlGjRU9Sr0IwIOqHh1aVJICjGh9KIq");
    
    $data = Pago::consultar("0MXpbwlGjRU9Sr0IwIOqHh1aVJICjGh9KIq");
    
    $codigoRespuesta = $data['codigo_respuesta'];
    
    echo $codigoRespuesta;
    var_dump($data);


} catch (InvalidParamsException $e) {
    echo $e->getMessage()."\n";
}
