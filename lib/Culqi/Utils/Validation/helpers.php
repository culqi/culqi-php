<?php
namespace Culqi\Utils\Validation;

use Culqi\Error\CustomException as CustomException;
class Helpers
{
    public function __construct($options=[])
    {}
    
    public static function isValidCardNumber($number) {
        // Check if it's numeric and its length is between 13 and 19
        return preg_match('/^\d{13,19}$/', $number);
    }
    
    public static function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validateCurrencyCode($currency_code) {
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
    
    public static function validateStringStart($string, $start) {
        if (strpos($string, $start."_test_") !== 0 && strpos($string, $start."_live_") !== 0) {
            throw new CustomException('Incorrect format. The format must be start with '. $start . '_test_ or '. $start . '_live_');
        }
    }
    
    public static function validateValue($value, $allowedValues) {
        if (!in_array($value, $allowedValues)) {
            throw new CustomException('Invalid value. It must be '.json_encode($allowedValues).' .');
        }
    }

    public static function isFutureDate($expiration_date) {
        // Check if the expiration date is in the future
        return $expiration_date > time();
    }

    public static function validateDateFilter($dateFrom, $dateTo) {
        $_dateFrom = intval($dateFrom);
        $_dateTo = intval($dateTo);
    
        if ($_dateTo < $_dateFrom) {
            throw new CustomException('Invalid value. Date_from must be less than date_to');
        }
    }

    public static function validateIntegerField($data, $fieldName, $errorMessage) {
        if (isset($data[$fieldName]) && (!is_int($data[$fieldName]) || intval($data[$fieldName]) != $data[$fieldName])) {
            throw new CustomException($errorMessage);
        }
    }
}