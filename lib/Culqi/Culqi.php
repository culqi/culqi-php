<?php
namespace Culqi;

class Culqi
{

    public $api_key;

    /**
    * La versión de API usada
    */
    const API_VERSION = "v2.0";

    /**
     * La URL Base por defecto
     */
    const BASE_URL = "https://api.culqi.com/v2";

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
