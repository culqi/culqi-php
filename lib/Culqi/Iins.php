<?php
namespace Culqi;

class Iins extends Resource {

    const URL_IINS = "/iins/";

    public function getList($options = NULL) {
        return $this->request("GET", self::URL_IINS, $api_key = $this->culqi->api_key, $options);
    }

    public function get($iin = NULL) {
        return $this->request("GET", self::URL_IINS . $iin . "/", $api_key = $this->culqi->api_key);
    }

}
