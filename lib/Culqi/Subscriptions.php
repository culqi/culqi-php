<?php

namespace Culqi;

use Culqi\Utils\Validation\SubscriptionValidation as SubscriptionValidation;

/**
 * Class Subscriptions
 *
 * @package Culqi
 */
class Subscriptions extends Resource {

    const URL_SUBSCRIPTIONS = "/subscriptions/";

    /**
     * @param array|null $options
     *
     * @return all Subscriptions.
     */
    public function all($options = []) {
        SubscriptionValidation::list($options);
        return $this->request("GET", self::URL_SUBSCRIPTIONS, $api_key = $this->culqi->api_key, $options);
    }

    /**
     * @param array|null $options
     *
     * @return create Subscription response.
     */
    public function create($options = NULL, $encryption_params=[]) {
        SubscriptionValidation::create($options);
        return $this->request("POST", self::URL_SUBSCRIPTIONS, $api_key = $this->culqi->api_key, $options, false, $encryption_params);
    }

    /**
     * @param string|null $id
     *
     * @return delete a Subscription response.
     */
    public function delete($id = NULL) {
       return $this->request("DELETE", self::URL_SUBSCRIPTIONS . $id . "/", $api_key = $this->culqi->api_key);
    }

    /**
     * @param string|null $id
     *
     * @return get a Subscription.
     */
    public function get($id = NULL) {
        $this->helpers::validateStringStart($id, "sub");
        return $this->request("GET", self::URL_SUBSCRIPTIONS . $id . "/", $api_key = $this->culqi->api_key);
    }

    /**
     * @param string|null $id
     * @param array|null $options
     *
     * @return update Subscription response.
     */
    public function update($id = NULL, $options = NULL, $encryption_params=[]) {
        $this->helpers::validateStringStart($id, "sub");
        return $this->request("PATCH", self::URL_SUBSCRIPTIONS . $id . "/", $api_key = $this->culqi->api_key, $options, false, $encryption_params);
    }

}
