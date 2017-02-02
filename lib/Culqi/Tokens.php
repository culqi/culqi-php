<?php
namespace Culqi;

class Tokens extends Resource {

    const URL_TOKENS = "/tokens/";

    public function getList($options = NULL) {
        return $this->request("GET", self::URL_TOKENS, $api_key = $this->culqi->api_key, $options);
    }

    public function create($options = NULL) {
        return $this->request("POST", self::URL_TOKENS, $api_key = $this->culqi->api_key, $options);
    }

    public function get($id = NULL) {
        return $this->request("GET", self::URL_TOKENS . $id . "/", $api_key = $this->culqi->api_key);
    }

}
