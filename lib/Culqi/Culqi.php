<?php
namespace Culqi;

class Culqi
{

    public $api_key;
    public static $api_base = "http://192.168.0.110:8000/v2";

    // Constructor
    public function __construct($options)
    {
        $this->api_key = $options["api_key"];
        if (!$this->api_key) {
          throw new InvalidApiKey();
        }

        $this->Tokens = new Tokens($this);
        $this->Cargos = new Cargos($this);
        $this->Suscripciones = new Suscripciones($this);
        $this->Devoluciones = new Devoluciones($this);
        $this->Planes = new Planes($this);

    }

}
