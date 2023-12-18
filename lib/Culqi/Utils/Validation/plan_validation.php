<?php
namespace Culqi\Utils\Validation;
use Culqi\Error\CustomException as CustomException;
use Culqi\Utils\Validation\Helpers as Helpers;
require 'country_codes.php';

class PlanValidation
{
    public function __construct($options=[])
    {}

    public static function create($data = [])
    {
        //validate amount
        if (!is_numeric($data['amount']) || intval($data['amount']) != $data['amount']) {
            throw new CustomException('Invalid amount.');
        }

        //validate interval
        $allowedValues = ['dias', 'semanas', 'meses', 'años'];
        Helpers::validateValue($data['interval'], $allowedValues);
        
        //validate currency
        Helpers::validateCurrencyCode($data['currency_code']);
    }

    public static function list($data) {
        Helpers::validateIntegerField($data, 'amount', 'Invalid amount.');
        Helpers::validateIntegerField($data, 'min_amount', 'Invalid min amount.');
        Helpers::validateIntegerField($data, 'max_amount', 'Invalid max amount.');

        if (isset($data['creation_date_from']) && isset($data['creation_date_to'])) {
            Helpers::validateDateFilter($data['creation_date_from'], $data['creation_date_to']);
        }
    }
}