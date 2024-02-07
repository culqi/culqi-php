<?php
namespace Culqi\Utils\Validation;

require_once __DIR__ . '/../Constant/Request/Plan.php';
require_once __DIR__ . '/../Constant/Response/Plan.php';

use Culqi\Error\CustomException as CustomException;

class Helpers
{
    public function __construct($options = [])
    {
    }

    public static function isValidCardNumber($number)
    {
        // Check if it's numeric and its length is between 13 and 19
        return preg_match('/^\d{13,19}$/', $number);
    }

    public static function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validateCurrencyCode($currency_code)
    {
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

    public static function validateStringStart($string, $start)
    {
        if (strpos($string, $start . "_test_") !== 0 && strpos($string, $start . "_live_") !== 0) {
            throw new CustomException('Incorrect format. The format must be start with ' . $start . '_test_ or ' . $start . '_live_');
        }
    }

    public static function validateValue($value, $allowedValues)
    {
        if (!in_array($value, $allowedValues)) {
            throw new CustomException('Invalid value. It must be ' . json_encode($allowedValues) . ' .');
        }
    }

    public static function isFutureDate($expiration_date)
    {
        // Check if the expiration date is in the future
        return $expiration_date > time();
    }

    public static function validateDateFilter($dateFrom, $dateTo)
    {
        $_dateFrom = intval($dateFrom);
        $_dateTo = intval($dateTo);

        if ($_dateTo < $_dateFrom) {
            throw new CustomException('Invalid value. Date_from must be less than date_to');
        }
    }

    public static function validateIntegerField($data, $fieldName, $errorMessage)
    {
        if (isset($data[$fieldName]) && (!is_int($data[$fieldName]) || intval($data[$fieldName]) != $data[$fieldName])) {
            throw new CustomException($errorMessage);
        }
    }

    public static function validateParametersNumber($data)
    {
        return !isset($data) || !is_numeric($data) || empty($data);
    }

    public static function additionalValidation($data, $requiredFields, $message = "") {
        foreach ($requiredFields as $field) {
            $errorMessage = "El campo '";

            if ($message !== null && $message !== "") {
                $errorMessage .= "{$message}.";
            }
    
            $errorMessage .= "{$field}' es requerido";
    
            if (!isset($data[$field]) || $data[$field] === null || $data[$field] === "" || $data[$field] === "undefined") {
                throw new CustomException($errorMessage);
            }
        }
    
        return null;
    }
    

    public static function validateParametersString($data)
    {
        return !isset($data) || !is_string($data) || empty($data);
    }

    public static function validateRangeParameters($data, $min_data, $max_data)
    {
        return $data < $min_data || $data > $max_data;
    }

    public static function validateEnumCurrency($currency)
    {
        if (
            !in_array($currency, ENUM_CURRENCY) ||
            !is_string($currency) ||
            empty($currency)
        ) {
            throw new CustomException(INVALID_CURRENCY_ENUM);
        }
    }

    public static function validateCurrency($currency, $amount)
    {

        self::validateEnumCurrency($currency);

        $minAmountPublicApi = MIN_AMOUNT_PEN * 100;
        $maxAmountPublicApi = MAX_AMOUNT_PEN * 100;
        ;


        if ($currency == USD) {
            $minAmountPublicApi = MIN_AMOUNT_USD * 100;
            $maxAmountPublicApi = MAX_AMOUNT_USD * 100;
            ;
        }


        $validAmount = $amount >= $minAmountPublicApi && $amount <= $maxAmountPublicApi;

        if (!$validAmount) {
            if ($currency == USD) {
                throw new CustomException(INVALID_AMOUNT_RANGE_USD);
            }

            throw new CustomException(INVALID_AMOUNT_RANGE_PEN);
        }
    }

    public static function validatePayloadCreatePlan($data = [])
    {
        // Define la lista de parámetros esperados
        $expectedParameters = [
            'interval_unit_time',
            'interval_count',
            'amount',
            'name',
            'description',
            'short_name',
            'currency',
            'metadata',
            'initial_cycles',
            'image'
        ];

        // Verifica si hay parámetros adicionales
        $extraParameters = array_diff(array_keys($data), $expectedParameters);

        if (!empty($extraParameters)) {
            throw new CustomException('Parámetros adicionales no permitidos: ' . implode(', ', $extraParameters));
        }
    }

    public static function validatePayloadUpdatePlan($data = [])
    {
        // Define la lista de parámetros esperados
        $expectedParameters = [
            'name',
            'description',
            'short_name',
            'status',
            'metadata',
            'image',
        ];

        // Verifica si hay parámetros adicionales
        $extraParameters = array_diff(array_keys($data), $expectedParameters);

        if (!empty($extraParameters)) {
            throw new CustomException('Parámetros adicionales no permitidos: ' . implode(', ', $extraParameters));
        }
    }

    public static function validatePayloadFIlterPlan($data = [])
    {
        // Define la lista de parámetros esperados
        $expectedParameters = [
            'status',
            'min_amount',
            'max_amount',
            'creation_date_to',
            'creation_date_from',
            'limit',
            'after',
            'before',
        ];

        // Verifica si hay parámetros adicionales
        $extraParameters = array_diff(array_keys($data), $expectedParameters);

        if (!empty($extraParameters)) {
            throw new CustomException('Parámetros adicionales no permitidos: ' . implode(', ', $extraParameters));
        }
    }


    public static function validateInitialCycles($initial_cycles, $currency, $amount)
    {
        $hasInitialCharge = $initial_cycles['has_initial_charge'];
        $payAmount = $initial_cycles['amount'];
        $count = $initial_cycles['count'];

        if (!is_int($payAmount)) {
            throw new CustomException(INVALID_INITIAL_CYCLES_AMOUNT);
        }

        if ($hasInitialCharge) {
            self::validateCurrency($currency, $amount);

            if ($amount === $payAmount) {
                throw new CustomException(AMOUNT_PAY_AMOUNT_EQUAL);
            }

            if ($count < COUNT_MIN || $count > INTERVAL_COUNT_MAX) {
                throw new CustomException(INVALID_INITIAL_CYCLES_COUNT);
            }

            if (
                $payAmount < INITIAL_CYCLE_MIN_AMOUNT ||
                $payAmount > INITIAL_CYCLE_MAX_AMOUNT
            ) {
                throw new CustomException(INVALID_INITIAL_CYCLES_AMOUNT_RANGE);
            }
        } else {
            if ($count < 0 || $count > INTERVAL_COUNT_MAX) {
                throw new CustomException(INITIAL_CYCLES_COUNT_NON_ZERO);
            }

            if ($payAmount !== 0) {
                throw new CustomException(INITIAL_CYCLES_AMOUNT_NON_ZERO);
            }
        }
    }

    public static function validateMetadataSchema($objMetadata)
    {
        if (!is_array($objMetadata) && !is_object($objMetadata)) {
            throw new CustomException(METADATA_INVALID);
        }

        foreach ($objMetadata as $key => $value) {
            $param_key = strlen($key);
            $param_value = strlen($key);
            if ($param_key < 1 || $param_key > 30 || $param_value < 1 || $param_value > 2000) {
                throw new CustomException(METADATA_LIMIT_KEY_30_CHARACTERS_RF);
            }

        }

        if (is_array($objMetadata) && count($objMetadata) > 20) {
            throw new CustomException(METADATA_LIMIT_20);
        }

        $transformedMetadata = [];
        foreach ($objMetadata as $key => $value) {
            $transformedMetadata[$key] = is_string($value) ? $value : strval($value);
        }

        return json_encode($transformedMetadata);
    }


}