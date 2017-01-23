<?php
namespace Culqi;

class Iins extends Resource {

    const URL_IINS = "/iins/";

    public function get($id = NULL) {
        return $this->request("GET", self::URL_IINS . $id . "/", $api_key = $this->culqi->api_key);
    }

}
