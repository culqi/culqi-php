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
        try {
            TokenValidation::list($options);
            return $this->request("GET", self::URL_TOKENS, $api_key = $this->culqi->api_key, $options);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array|null $options
     *
     * @return create Token response.
     */
    public function create($options = NULL, $encryption_params = [], $custom_headers = NULL) {
        try {
            TokenValidation::create($options);
            return $this->request("POST", self::URL_TOKENS, $api_key = $this->culqi->api_key, $options, true, $encryption_params, $custom_headers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function createYape($options = NULL) {
        try {
            TokenValidation::createYape($options);
            return $this->request("POST", self::URL_TOKENS_YAPE, $api_key = $this->culqi->api_key, $options, true);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return get a Token.
     */
    public function get($id = NULL) {
        try {
            $this->helpers::validateStringStart($id, "tkn");
            return $this->request("GET", self::URL_TOKENS . $id . "/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Token response.
     */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        try {
            $this->helpers::validateStringStart($id, "tkn");
            return $this->request("PATCH", self::URL_TOKENS . $id . "/", $api_key = $this->culqi->api_key, $options, $encryption_params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
