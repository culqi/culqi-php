<?php
/**
 * Ejemplo 5
 * Como crear un Cargoo con configuracion usando Culqi PHP.
 */

## Ejecuta ejemplo: php examples/charge/01-create-charge-with-custom-headers.php

try {
  require 'vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_KEY = "{SECRET KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

  $req_body = array(
    "amount" => 10000,
    "capture" => true,
    "currency_code" => "PEN",
    "description" => "Venta de prueba",
    "installments" => 0,
    "email" => "test@culqi.com",
    "metadata" => array("test"=>"test"),
    "source_id" => "tkn_live_**" // previamente generado usando create token
  );

  $custom_headers = array(
    "X-Charge-Channel" => 'recurrent',
    "X-add-header" => false,
    "x-header-Integer" => 300
  );

  // Creando Cargo a una tarjeta
  $charge = $culqi->Charges->create($req_body, [], $custom_headers);
  // Respuesta
  echo json_encode($charge);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
