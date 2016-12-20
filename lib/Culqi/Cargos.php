<?php
namespace Culqi;

class Cargos extends Resource {

    const URL_CARGOS = "/charges/";

    public function create($options = NULL)
    {
        return $this->request("POST", self::URL_CARGOS, $api_key = $this->culqi->api_key, $options);
    }

    public function getList($options = NULL)
    {
        return $this->request("GET", self::URL_CARGOS, $api_key = $this->culqi->api_key, $options);
    }

    public function get($id)
    {
        return $this->request("GET", self::URL_CARGOS . $id . "/", $api_key = $this->culqi->api_key);
    }


}
