<?php
/**
 * Ejemplo 3 (03-crear-plan.php)
 * Como crear un plan usando Culqi PHP.
 */

try {
      // Usando Composer (o puedes incluir las dependencias manualmente)
      require '../vendor/autoload.php';

      // Configurar tu API Key y autenticación
      $SECRET_API_KEY = "vk9Xjpe2YZMEOSBzEwiRcPDibnx2NlPBYsusKbDobAk=";
      $culqi = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

      // Entorno: Integración (pruebas)
      $culqi->setEnv("INTEG");

      // Creando Cargo a una tarjeta
      $plan = $culqi->Planes->create(
          array(
            "moneda"=> "PEN",
            "monto"=> 1000,
            "id"=> "plan-12345",
            "periodo"=> "dias",
            "nombre"=> "Plan de prueba",
            "intervalo"=> 2,
            "gracia"=> 5,
            "gracia_medida"=> "dias",
            "ciclos"=> 12
          )
      );

      // Respuesta
      print_r($plan);

} catch (Exception $e) {

      echo $e->getMessage();

}
