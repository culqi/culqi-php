<?php
namespace Culqi;

class Tokens extends Resource {

    /**
     * @param string $id La ID del token a devolver.
     * @param array|string|null $opts
     *
     * @return Token
     */

    const URL_TOKENS = "/tokens/";

    public function create($options = NULL) {
        return $this->request("POST", self::URL_TOKENS, $api_key = $this->culqi->api_key, $options);
    }

    public function get($id = NULL) {
        return $this->request("GET", self::URL_TOKENS . $id . "/", $api_key = $this->culqi->api_key);
    }

}
