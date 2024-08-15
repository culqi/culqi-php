<?php

namespace Culqi;

use Culqi\Utils\Validation\OrderValidation as OrderValidation;

/**
 * Class Orders
 *
 * @package Culqi
 */
class Orders extends Resource {

    const URL_ORDERS = "/orders/";

    /**
     * @param array|null $options
     *
     * @return Get all Orders
     */
    public function all($options=[]) {
        try {
            OrderValidation::list($options);
            return $this->request("GET", self::URL_ORDERS, $api_key = $this->culqi->api_key, $options);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array|null $options
     *
     * @return create Order 
     */
    public function create($options = NULL, $encryption_params = [], $custom_headers = NULL) {
        try {
            OrderValidation::create($options);
            return $this->request("POST", self::URL_ORDERS, $api_key = $this->culqi->api_key, $options, false, $encryption_params, $custom_headers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    } 


    /**
     * @param array|null $options
     *
     * @return confirm Order 
     */
    public function confirm($id = NULL) {
        try {
            return $this->request("POST", self::URL_ORDERS . $id . "/confirm/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array|null $options
     *
     * @return confirm Order 
     */
    public function confirm_order_type($options = NULL, $encryption_params=[]) {
        try {
            OrderValidation::confirm_order_type($options);
            return $this->request("POST", self::URL_ORDERS . "confirm/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return get a Order
     */
    public function get($id) {
        try {
            $this->helpers::validateStringStart($id, "ord");
            return $this->request("GET", self::URL_ORDERS . $id . "/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return delete a Order
     */
    public function delete($id) {
        try {
            $this->helpers::validateStringStart($id, "ord");
            return $this->request("DELETE", self::URL_ORDERS . $id . "/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Order
     */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        try {
            $this->helpers::validateStringStart($id, "ord");
            return $this->request("PATCH", self::URL_ORDERS . $id . "/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
