<?php
namespace Culqi;

class Culqi
{

    public $api_key;
    public static $api_base = "https://api.culqi.com/api/v2";

    // Constructor
    public function __construct($options)
    {
        $this->api_key = $options["api_key"];
        if (!$this->api_key) {
            throw new InvalidApiKey();
        }

        $this->Cargos = new Cargos($this);
        $this->Suscripciones = new Suscripciones($this);
        $this->Devoluciones = new Devoluciones($this);
        $this->Planes = new Planes($this);

    }

}
