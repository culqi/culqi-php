<?php

namespace Culqi;

use Culqi\Utils\Validation\RefundValidation as RefundValidation;

/**
 * Class Plans
 *
 * @package Culqi
 */
class Refunds extends Resource {

    const URL_REFUNDS = "/refunds/";

    /**
     * @param array|null $options
     *
     * @return all Refunds.
     */
    public function all($options = NULL) {
        try {
            RefundValidation::list($options);
            return $this->request("GET", self::URL_REFUNDS, $api_key = $this->culqi->api_key, $options);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array|null $options
     *
     * @return create Refund response.
     */
    public function create($options = NULL, $encryption_params = [], $custom_headers = NULL) {
        try {
            RefundValidation::create($options);
            return $this->request("POST", self::URL_REFUNDS, $api_key = $this->culqi->api_key, $options, false, $encryption_params, $custom_headers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return get a Refund.
     */
    public function get($id = NULL) {
        try {
            $this->helpers::validateStringStart($id, "ref");
            return $this->request("GET", self::URL_REFUNDS . $id . "/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Refund response.
     */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        try {
            $this->helpers::validateStringStart($id, "ref");
            return $this->request("PATCH", self::URL_REFUNDS . $id . "/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
