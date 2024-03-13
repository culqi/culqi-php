<?php
namespace Culqi\Utils\Validation;
use Culqi\Error\CustomException as CustomException;
use Culqi\Utils\Validation\Helpers as Helpers;
require_once 'country_codes.php';

class TokenValidation
{
    public function __construct($options=[])
    {}

    public static function create($data = [])
    {
        // Validate card number (using Luhn algorithm for simplicity)
        if (!Helpers::isValidCardNumber($data['card_number'])) {
            throw new CustomException('Invalid card number.');
        }
    
        // Validate CVV
        if (!preg_match('/^\d{3,4}$/', $data['cvv'])) {
            throw new CustomException('Invalid CVV.');
        }
    
        // Validate email
        if (!Helpers::isValidEmail($data['email'])) {
            throw new CustomException('Invalid email.');
        }
    
        // Validate expiration month
        if (!preg_match('/^(0?[1-9]|1[012])$/', $data['expiration_month'])) {
            throw new CustomException('Invalid expiration month.');
        }
    
        // Validate expiration year
        if (!preg_match('/^\d{4}$/', $data['expiration_year']) || (int)$data['expiration_year'] < (int)date("Y")) {
            throw new CustomException('Invalid expiration year.');
        }
    
        // Check if the card is expired
        $expDate = \DateTime::createFromFormat('Y-m', $data['expiration_year'] . '-' . $data['expiration_month']);
        $currentDate = new \DateTime();
        if ($expDate < $currentDate) {
            throw new CustomException('Card has expired.');
        }
    }

    public static function createYape($data = [])
    {
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }
    }

    public static function list($data) {
        if (isset($data['device_type'])) {
            $allowedDeviceValues = ['desktop', 'mobile', 'tablet'];
            Helpers::validateValue($data['device_type'], $allowedDeviceValues);
        }

        if (isset($data['card_brand'])) {
            $allowedBrandValues = ['Visa', 'Mastercard', 'Amex', 'Diners'];
            Helpers::validateValue($data['card_brand'], $allowedBrandValues);
        }

        if (isset($data['card_type'])) {
            $allowedCardTypeValues = ['credito', 'debito', 'internacional'];
            Helpers::validateValue($data['card_type'], $allowedCardTypeValues);
        }

        if (isset($data['country_code'])) {
            Helpers::validateValue($data['country_code'], get_country_codes());
        }

        if (isset($data['creation_date_from']) && isset($data['creation_date_to'])) {
            Helpers::validateDateFilter($data['creation_date_from'], $data['creation_date_to']);
        }
    }
}