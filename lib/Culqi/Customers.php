<?php

namespace Culqi;

use Culqi\Utils\Validation\CustomerValidation as CustomerValidation;

/**
 * Class Customers
 *
 * @package Culqi
 */
class Customers extends Resource {

    const URL_CUSTOMERS = "/customers/";

    /**
     * @param array|null $options
     *
     * @return all Customers.
     */
    public function all($options = []) {
        try {
            CustomerValidation::list($options);
            return $this->request("GET", self::URL_CUSTOMERS, $api_key = $this->culqi->api_key, $options);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array|null $options
     *
     * @return create Customer response.
     */
    public function create($options = NULL, $encryption_params=[], $custom_headers = NULL) {
        try {
            CustomerValidation::create($options);
            return $this->request("POST", self::URL_CUSTOMERS, $api_key = $this->culqi->api_key, $options, false, $encryption_params, $custom_headers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return delete a Customer response.
     */
    public function delete($id = NULL) {
        try {
            $this->helpers::validateStringStart($id, "cus");
            return $this->request("DELETE", self::URL_CUSTOMERS . $id . "/", $api_key = $this->culqi->api_key);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param string|null $id
     *
     * @return get a Customer.
     */
    public function get($id = NULL) {
        try {
            $this->helpers::validateStringStart($id, "cus");
            return $this->request("GET", self::URL_CUSTOMERS . $id . "/", $api_key = $this->culqi->api_key);
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
            $this->helpers::validateStringStart($id, "cus");
            return $this->request("PATCH", self::URL_CUSTOMERS . $id . "/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
