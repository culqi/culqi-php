<?php
/**
 * Ejemplo 1 (01-crear-cargo.php)
 * Como crear un cargo a una tarjeta usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "gjkf2ehJxmuXnjwanj3AIbCSrncDMEvk29sHR/n8ZwM=";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  $pedidoId = time();

  // Creando Cargo a una tarjeta
  $cargo = $culqi->Cargos->create(
      array(
          "address" => "Avenida Lima 1232",
          "amount" => 1000,
          "city" => "LIMA",
          "country" => "PE",
          "currency" => "PEN",
          "cvv" => "123",
          "description" => "Venta de prueba",
          "installments" => 0,
          "last_name" => "Muro",
          "email" => "wmuro@me.com",
          "metadata" => "",
          "name" => "William",
          "order_number" => "10",
          "phone" => 3333339,
          "token" => "aousSaEKzV7yvsUEun43RKRVLkfhwjiq"
      )
  );
  // Respuesta
  print_r($cargo);

} catch (Exception $e) {
  echo $e->getMessage();
}
