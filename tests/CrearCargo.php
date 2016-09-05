<?php require_once dirname(__FILE__).'/TestAutoload.php';


/**
 *  Clase CrearCargos (Test)
 */
{

      protected function setUp() {

        $this->PUBLIC_API_KEY = getenv("INTEG_COD_COMERCIO");
        $this->API_KEY = getenv("INTEG_API_KEY");

        $this->culqi = new Culqi(array("api_key" => $this->API_KEY));
        $this->conexion = new Client();
      }


      /**
       * Creación de un token con los datos de una tarjeta de prueba
       */
      protected function createToken() {
          $testToken = array(
            "correo_electronico" => "brayan.cruces@culqi.com",
            "nombre" => "Brayan",
            "apellido" => "Cruces",
            "numero" => "4507990000000010",
            "m_exp" => "12",
            "a_exp" => "2020",
            "cvv" => "123"
          );
          $response = $this->conexion->request(
          "POST",
          "/tokens/",
          $this->PUBLIC_API_KEY,
          $testToken
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
         $cargo = $this->culqi->Cargos->create(array(
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
         ));
         $this->assertTrue(strlen($cargo->id) > 0);
     }





}
