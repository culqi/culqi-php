<?php
namespace Culqi;

class Devoluciones extends Resource {

    const URL_REFUND = "/devolver/";

    public function create($id = NULL, $options = NULL)
    {
        return $this->request("POST", "/cargos/" . $id . self::URL_REFUND, $api_key = $this->culqi->api_key, $options);
    }

}
