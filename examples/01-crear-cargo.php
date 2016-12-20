<?php
/**
 * Ejemplo 1 (01-crear-cargo.php)
 * Como crear un cargo a una tarjeta usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "vk9Xjpe2YZMEOSBzEwiRcPDibnx2NlPBYsusKbDobAk";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  $pedidoId = time();

  // Creando Cargo a una tarjeta
  $cargo = $culqi->Cargos->create(
      array(
          "address" => "Avenida Lima 1232",
          "amount" => 1000,
          "city" => "LIMA",
          "country" => "PERU",
          "currency" => "PEN",
          "cvv" => "123",
          "description" => "Venta de prueba",
          "installments" => 0,
          "last_name" => "Cruces",
          "mail" => "micorreo@gmail.com",
          "metadata" => "",
          "name" => "Brayan",
          "order_number" => "10",
          "phone" => 3333339,
          "token" => "{AQUI TOKEN OBTENIDO DE CULQI.JS}"
      )
  );
  // Respuesta
  print_r($cargo);

} catch (Exception $e) {
  echo $e->getMessage();
}
