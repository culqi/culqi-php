<?php

namespace Culqi;

use Culqi\Utils\Validation\CardValidation as CardValidation;

/**
 * Class Cards
 *
 * @package Culqi
 */
class Cards extends Resource {

    const URL_CARDS = "/cards/";

    /**
    * @param array|null $options
    *
    * @return all Cards.
    */
    public function all($options = []) {
        try {
            CardValidation::list($options);
            return $this->request("GET", self::URL_CARDS, $api_key = $this->culqi->api_key, $options);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
    * @param array|null $options
    *
    * @return create Card response.
    */
    public function create($options = NULL, $encryption_params = [], $custom_headers = NULL) {
        try {
            CardValidation::create($options);
            return $this->request("POST", self::URL_CARDS, $api_key = $this->culqi->api_key, $options, false, $encryption_params, $custom_headers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
    * @param string|null $id
    *
    * @return delete a Card response.
    */
    public function delete($id = NULL) {
        try {
            $this->helpers::validateStringStart($id, "crd");
            return $this->request("DELETE", self::URL_CARDS . $id . "/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
    * @param string|null $id
    *
    * @return get a Card.
    */
    public function get($id = NULL) {
        try {
            $this->helpers::validateStringStart($id, "crd");
            return $this->request("GET", self::URL_CARDS . $id . "/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
    * @param string|null $id
    * @param array|null $options
    *
    * @return update Card response.
    */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        try {
            $this->helpers::validateStringStart($id, "crd");
            return $this->request("PATCH", self::URL_CARDS . $id . "/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
