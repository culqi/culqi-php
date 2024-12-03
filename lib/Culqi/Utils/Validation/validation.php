<?php
namespace Culqi\Utils\Validation;

class CulqiValidation
{

    public function __construct($options=[])
    {}
    
    public function charge_validation($data = [])
    {
        // Validate email
        if (!$this->isValidEmail($data['email'])) {
            throw new CustomException('Invalid email.');
        }

        //validate amount
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }

        $this->validateCurrencyCode($data['currency_code']);
    }
    
    public function refund_validation($data = [])
    {
        // Validate charge format
        $this->validateStringStart($data['charge_id'], "chr");

        //validate reason
        $allowedValues = ['duplicado', 'fraudulento', 'solicitud_comprador'];
        $this->validateValue($data['reason'], $allowedValues);

        //validate amount
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }
    }
    
    public function plan_validation($data = [])
    {
        //validate amount
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }

        //validate interval
        $allowedValues = ['dias', 'semanas', 'meses', 'años'];
        $this->validateValue($data['interval'], $allowedValues);
        
        //validate currency
        $this->validateCurrencyCode($data['currency_code']);
    }
    
    public function customer_validation($data = [])
    {
        //validate address, firstname and lastname
        if (empty($data['first_name'])) {
            throw new CustomException('first name is empty.');
        }
        
        if (empty($data['last_name'])) {
            throw new CustomException('last name is empty.');
        }
        
        if (empty($data['address'])) {
            throw new CustomException('address is empty.');
        }
        
        if (empty($data['address_city'])) {
            throw new CustomException('address_city is empty.');
        }

        //validate coountry code
        $this->validateValue($data['country_code'], encryption_params());

        //validate email
        if (!$this->isValidEmail($data['email'])) {
            throw new CustomException('Invalid email.');
        }
        
    }

    public function card_validation($data = []) {
        // Validate customer format
        $this->validateStringStart($data['customer_id'], "cus");
        
        // Validate token format
        $this->validateStringStart($data['token_id'], "tkn");
    }
    
    public function subscription_validation($data = []) {
        // Validate customer format
        $this->validateStringStart($data['card_id'], "crd");
        
        // Validate token format
        $this->validateStringStart($data['plan_id'], "pln");
    }

    public function order_validation($data = []) {
        //validate amount
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }

        //validate currency
        $this->validateCurrencyCode($data['currency_code']);

        //validate firstname, lastname and phone
        if (empty($data['client_details']['first_name'])) {
            throw new CustomException('first name is empty.');
        }
        
        if (empty($data['client_details']['last_name'])) {
            throw new CustomException('last name is empty.');
        }
        
        if (empty($data['client_details']['phone_number'])) {
            throw new CustomException('phone_number is empty.');
        }

        //validate email
        if (!$this->isValidEmail($data['client_details']['email'])) {
            throw new CustomException('Invalid email.');
        }

        //validate expiration date

        if(!$this->isFutureDate($data['expiration_date'])) {
            throw new CustomException('expiration_date must be a future date.');
        }

    }

    public function confirm_order_type_validation($data = []) {
        // Validate order id format
        $this->validateStringStart($data['order_id'], "ord");
    }
    
    private function isValidCardNumber($number) {
        // Check if it's numeric and its length is between 13 and 19
        return preg_match('/^\d{13,19}$/', $number);
    }
    
    private function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    private function validateCurrencyCode($currency_code) {
        if (empty($currency_code)) {
            throw new CustomException('Currency code is empty.');
        }
        
        if (!is_string($currency_code)) {
            throw new CustomException('Currency code must be a string.');
        }
        
        $allowedValues = ['PEN', 'USD'];
        if (!in_array($currency_code, $allowedValues)) {
            throw new CustomException('Currency code must be either "PEN" or "USD".');
        }
    }
    
    public function validateStringStart($string, $start) {
        if (strpos($string, $start."_test_") !== 0 && strpos($string, $start."_live_") !== 0) {
            throw new CustomException('Incorrect format. The format must be start with '. $start . '_test_ or '. $start . '_live_');
        }
    }
    
    private function validateValue($value, $allowedValues) {
        if (!in_array($value, $allowedValues)) {
            throw new CustomException('Invalid value. It must be '.json_encode($allowedValues).' .');
        }
    }

    private function isFutureDate($expiration_date) {
        // Check if the expiration date is in the future
        return $expiration_date > time();
    }
}