<?php

namespace Culqi;

use Culqi\Utils\Validation\ChargeValidation as ChargeValidation;
/**
 * Class Charges
 *
 * @package Culqi
 */
class Charges extends Resource {

    const URL_CHARGES = "/charges";

    /**
     * @param array|null $options
     *
     * @return all Charges.
     */
    public function all($options = []) {
        try {
            ChargeValidation::list($options);
            return $this->request("GET", self::URL_CHARGES, $api_key = $this->culqi->api_key, $options);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array|null $options
     *
     * @return create Charge response.
     */
    public function create($options = NULL, $encryption_params = [], $custom_headers = NULL) {
        try {
            ChargeValidation::create($options);
            return $this->request("POST", self::URL_CHARGES, $api_key = $this->culqi->api_key, $options, false, $encryption_params, $custom_headers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return get a Charge.
     */
    public function get($id = NULL) {
        try {
            $this->helpers::validateStringStart($id, "chr");
            return $this->request("GET", self::URL_CHARGES . $id . "/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return get a capture of Charge.
     */
    public function capture($id = NULL) {
        try {
            $this->helpers::validateStringStart($id, "chr");
            return $this->request("POST", self::URL_CHARGES . $id . "/capture/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Charge response.
     */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        try {
            $this->helpers::validateStringStart($id, "chr");
            return $this->request("PATCH", self::URL_CHARGES ."/". $id . "/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
