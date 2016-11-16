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

      // Entorno: Integración (pruebas)
      $culqi->setEnv("INTEG");

      $pedidoId = time();

      // Creando Cargo a una tarjeta
      $cargo = $culqi->Cargos->create(
          array(
            "token"=> "{AQUI TOKEN OBTENIDO DE CULQI.JS}",
            "moneda"=> "PEN",
            "monto"=> 19900,
            "descripcion"=> "Venta de prueba",
            "pedido"=> $pedidoId,
            "codigo_pais"=> "PE",
            "direccion"=> "Avenida Lima 1232",
            "ciudad"=> "Lima",
            "usuario"=> "71701956",
            "telefono"=> 3333339,
            "nombres"=> "Brayan",
            "apellidos"=> "Cruces",
            "correo_electronico"=> "micorreo@gmail.com"
          )
      );

      // Respuesta
      print_r($cargo);

} catch (Exception $e) {

      echo $e->getMessage();

}
