<?php

namespace Culqi;
use Culqi\Utils\Validation\TokenValidation as TokenValidation;
/**
 * Class Tokens
 *
 * @package Culqi
 */

class Tokens extends Resource {

    const URL_TOKENS = "/tokens/";
    const URL_TOKENS_YAPE = "/tokens/yape/";

    /**
     * @param array|string|null $options
     *
     * @return all Tokens.
     */
    public function all($options = []) {
        TokenValidation::list($options);
        return $this->request("GET", self::URL_TOKENS, $api_key = $this->culqi->api_key, $options);
    }

    /**
     * @param array|null $options
     *
     * @return create Token response.
     */
    public function create($options = NULL, $encryption_params = []) {
        TokenValidation::create($options);
        return $this->request("POST", self::URL_TOKENS, $api_key = $this->culqi->api_key, $options, true, $encryption_params);

    }

    public function createYape($options = NULL) {
        TokenValidation::createYape($options);
        return $this->request("POST", self::URL_TOKENS_YAPE, $api_key = $this->culqi->api_key, $options, true);
    }

    /**
     * @param string|null $id
     *
     * @return get a Token.
     */
    public function get($id = NULL) {
        $this->helpers::validateStringStart($id, "tkn");
        return $this->request("GET", self::URL_TOKENS . $id . "/", $api_key = $this->culqi->api_key);
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Token response.
     */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        $this->helpers::validateStringStart($id, "tkn");
        return $this->request("PATCH", self::URL_TOKENS . $id . "/", $api_key = $this->culqi->api_key, $options, $encryption_params);
    }

}
