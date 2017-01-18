<?php

require_once('TestAutoload.php');

use Culqi\Culqi;
use Culqi\Client;

class CulqiTest extends PHPUnit_Framework_TestCase {

  protected $API_KEY;
  protected $PUBLIC_API_KEY;

  protected function setUp() {
    $this->PUBLIC_API_KEY = "test_462ikymMGqUf";
    $this->API_KEY = "C/9qeO95+Ii6qjupoJkeaDKlepFSx5Q6LbXpovObijc=";
    $this->culqi_token = new Culqi(array("api_key" => $this->PUBLIC_API_KEY ));
    $this->culqi = new Culqi(array("api_key" => $this->API_KEY ));
  }

  protected function createToken() {
    $token = $this->culqi_token->Tokens->create(
        array(
          "correo_electronico"=> "wmuro@me.com",
          "nombre"=> "William",
          "apellido"=> "Muro",
          "numero"=> 4444333322221111,
          "cvv"=> 123,
          "m_exp"=> 9,
          "a_exp"=> 2019,
          "guardar"=> true
        )
    );
    return $token;
  }

  public function testVerifyToken() {
    $this->assertEquals('token', $this->createToken()->objeto);
  }

  protected function createCharge() {
    $cargo = $this->culqi->Cargos->create(
      array(
        "token"=> $this->createToken()->id,
        "moneda"=> "PEN",
        "monto"=> 19900,
        "descripcion"=> "Venta de prueba",
        "pedido"=> uniqid(),
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
    return $cargo;
  }

  public function testCreateCharge() {
    $this->assertEquals('cargo', $this->createCharge()->objeto);
  }

  public function testFindCharge() {
    $cargo = $this->culqi->Cargos->get($this->createCharge()->id);
    $this->assertEquals('cargo', $this->createCharge()->objeto);
  }

  public function createPlan() {
    $plan = $this->culqi->Planes->create(
          array(
            "codigo_comercio"=> $this->PUBLIC_API_KEY,
            "moneda"=> "PEN",
            "monto"=> "1000",
            "id"=> "plan-".uniqid(),
            "periodo"=> "dias",
            "nombre"=> "Plan de prueba-".uniqid(),
            "intervalo"=> 2,
            "gracia"=> 5,
            "gracia_medida"=> "dias",
            "ciclos"=> 12
          )
        );
    return $plan;
  }

  public function testCreatePlan() {
    $this->assertEquals('plan', $this->createPlan()->objeto);
  }

  public function testCreateSuscripcion() {
    $suscripcion = $this->culqi->Suscripciones->create(
          array(
            "token"=> $this->createToken()->id,
            "codigo_pais"=> "PE",
            "direccion"=> "Avenida Lima 123213",
            "ciudad"=> "Lima",
            "usuario"=> "soporteculqi",
            "telefono"=> 1234567789,
            "nombre"=> "Jon",
            "apellido"=> "Doe",
            "correo_electronico"=> "soporte@culqi.com",
            "plan_id"=> $this->createPlan()->id
          )
        );
    $this->assertEquals('suscripcion', $suscripcion->objeto);
  }

}
