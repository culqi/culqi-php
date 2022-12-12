<?php
/**
 * Ejemplo 8
 * Como confirmar una orden usando Culqi PHP.
 */

try {
  // Usando Composer (o puedes incluir las dependencias manualmente)
  require '../vendor/autoload.php';

  // Configurar tu API Key y autenticación
  $PUBLIC_KEY = "{PUBLIC KEY}";
  $culqi = new Culqi\Culqi(array('api_key' => $PUBLIC_KEY));

  // Confirmando tipo de orden
  $order = $culqi->Orders->confirm_order_type(
      array(
        "order_id" => "", //Ejm: ord_test_5XD7CwFWBkiJyrLK
        "order_types" => array("cuotealo", "cip")
      )
  );
  // Respuesta
  echo json_encode($order);

} catch (Exception $e) {
  echo json_encode($e->getMessage());
}
