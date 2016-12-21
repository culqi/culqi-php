<?php
/**
 * Ejemplo 1 (01-crear-cargo.php)
 * Como crear un cargo a una tarjeta usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $SECRET_API_KEY = "Mde0GIf0MsixrvyhRDDzj9IM7UXtv9ndnYHf2UZwEyE=";
  $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

  $pedidoId = time();

  // Creando Cargo a una tarjeta
  $cargo = $culqi->Cargos->create(
      array(
          "address" => "Avenida Lima 1232",
          "address_city" => "LIMA",
          "amount" => 1000,
          "country_code" => "PE",
          "currency_code" => "PEN",
          "cvv" => "123",
          "email" => "wmuro@me.com",
          "first_name" => "William",
          "installments" => 0,
          "last_name" => "Muro",
          "metadata" => "",
          "order_id" => "70",
          "phone_number" => 3333339,
          "product_description" => "Venta de prueba",
          "token" => "e58wm3Q3DhBOOZ8ytRHQxqRnsy4fH43w"
      )
  );
  // Respuesta
  print_r($cargo);

} catch (Exception $e) {
  echo $e->getMessage();
}
