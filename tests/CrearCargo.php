<?php

require_once dirname(__DIR__).'/vendor/autoload.php';
require_once dirname(__DIR__).'/lib/culqi.php';

use PHPUnit\Framework\TestCase;

/**
 *  Clase CrearCargos (Test)
 */
class CrearCargos extends TestCase
{

      protected function setUp() {
        $this->PUBLIC_API_KEY = "test_hupNaBiZ4J2F"; //COD_COMERCIO
        $this->API_KEY = "N4Eim7OKvOnB844Zkc3Z4KFUpPFdC19tcUsynAkaeI0="; //API_KEY

        $this->culqi = new Culqi(array("api_key" => $this->API_KEY));
        $this->conexion = new Client();
      }


      /**
       * Creación de un token con los datos de una tarjeta de prueba
       */
      protected function createToken() {
          $testToken = array(
            "card_number" => "4111111111111111",
            "currency" => "PEN",
            "cvv" => "123",
            "expiration_month" => "09",
            "expiration_year" => "2020",
            "fingerprint" => "test",
            "last_name" => "Cruces",
            "mail" => "myemail@email.com",
            "name" => "Brayan"
          );
          $response = $this->conexion->request(
          "POST",
          "/tokens/",
          $this->PUBLIC_API_KEY, $testToken
        );
        // Recibimos el Token (id)
        return $response->id;
      }

     /**
      * Cargos
      */
     public function testCrearCargo(){
         // Token
         $token = $this->createToken();
         // Cargo
         /*$cargo = $this->culqi->Cargos->create(array(
             "moneda"=> "PEN",
             "monto"=> 19900,
             "usuario"=> "71701956",
             "descripcion"=> "Venta de prueba",
             "pedido"=> "PEDI000034",
             "codigo_pais"=> "PE",
             "direccion"=> "Avenida Lima 1232",
             "ciudad"=> "Lima",
             "telefono"=> 3333339,
             "nombres"=> "Brayan",
             "apellidos"=> "Cruces",
             "correo_electronico"=> "brayan.cruces@culqi.com",
             "token"=> $token
         ));*/
         $this->assertNotNull($token);
     }


     /*public function testGetCargo(){
         $token = $this->createToken();
         $charge = $this->culqi->Charges->create(array(
             "amount" => 1000,
             "email" => "test-php@example.org",
             "token" => $token
         ));
         $response = $this->culqi->Cargos->get($charge->uid);
         $this->assertEquals($response->uid, $charge->uid);
     }*/

}
