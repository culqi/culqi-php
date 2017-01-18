<?php
namespace Culqi;


class Suscripciones extends Resource {

    const URL_SUSCRIPCIONES = "/suscripciones/";

    public function create($options = NULL)
    {
        return $this->request("POST", self::URL_SUSCRIPCIONES, $api_key = $this->culqi->api_key, $options);
    }

}
