<?php
namespace Culqi\Utils\Validation;

require_once __DIR__ . '/../Constant/Request/Plan.php';
require_once __DIR__ . '/../Constant/Response/Plan.php';
use Culqi\Error\CustomException as CustomException;
use Culqi\Utils\Validation\Helpers as Helpers;

require_once 'country_codes.php';

class PlanValidation
{
    public function __construct($options = [])
    {
    }

    public static function validId($id){
        $expectedParameters = [
            'id'
        ];
        
        $data = [
            'id'=> $id,
        ];
        Helpers::additionalValidation($data, $expectedParameters);
        if (empty($id) || strlen($id) != 25) {
            throw new CustomException("El campo 'id' es inválido. La longitud debe ser de 25 caracteres.");
        }
    }

    public static function create($data = [])
    {
        //Validar payload
        $expectedParameters = [
            'interval_unit_time',
            'interval_count',
            'amount',
            'name',
            'description',
            'short_name',
            'currency',
            'initial_cycles'
        ];
        Helpers::additionalValidation($data, $expectedParameters);

        // Instanciar Valores para su validacion
        $interval_unit_time = $data['interval_unit_time'];
        $interval_count = $data['interval_count'];
        $amount = $data['amount'];
        $name = $data['name'];
        $description = $data['description'];
        $short_name = $data['short_name'];
        $currency = $data['currency'];
        $metadata = isset($data['metadata']) ? $data['metadata'] : null;
        $initial_cycles = $data['initial_cycles'];

        //Validate parameter: interval_unit_time
        if (
            Helpers::validateParametersNumber($interval_unit_time) ||
            !in_array($interval_unit_time, ENUM_INTERVALS)
        ) {
            throw new CustomException(ERROR_PARAMETER_INTERVAL_UNIT_TIME);
        }

        //Validate parameter: interval_count
        if (
            !isset($interval_count) || !is_numeric($interval_count) ||
            Helpers::validateRangeParameters($interval_count, INTERVAL_COUNT_MIN, INTERVAL_COUNT_MAX)
        ) {
            throw new CustomException(ERROR_PARAMETER_INTERVAL_COUNT);
        }

        if (!isset($amount) || !is_numeric($amount)) {
            throw new CustomException(ERROR_PARAMETER_AMOUNT);
        }


        Helpers::validateEnumCurrency($currency);

        //Validate parameter: name
        if (
            Helpers::validateParametersString($name) ||
            Helpers::validateRangeParameters(strlen($name), MIN_LENGTH_PLAN_NAME, MAX_LENGTH_PLAN_NAME)
        ) {
            throw new CustomException(ERROR_PARAMETER_NAME);
        }

        //Validate parameter: description
        if (
            Helpers::validateParametersString($description) ||
            Helpers::validateRangeParameters(strlen($description), MIN_LENGTH_DESCRIPTION, MAX_LENGTH_DESCRIPTION)
        ) {
            throw new CustomException(ERROR_PARAMETER_DESCRIPTION);
        }

        //Validate parameter: short_name
        if (
            Helpers::validateParametersString($short_name) ||
            Helpers::validateRangeParameters(strlen($short_name), MIN_LENGTH_PLAN_NAME, MAX_LENGTH_PLAN_NAME)
        ) {
            throw new CustomException(ERROR_PARAMETER_SHORT_NAME);
        }

        //Validate parameter: currency
        Helpers::validateEnumCurrency($currency);

        //Validate parameter: metadata
        if ($metadata) {
            Helpers::validateMetadataSchema($metadata);
        }

        //Validate parameter: initial_cycles
        $expectedParametersIitialCycles = [
            'count',
            'amount',
            'has_initial_charge',
            'interval_unit_time'
        ];
        Helpers::additionalValidation($initial_cycles, $expectedParametersIitialCycles, "initial_cycles");
        Helpers::validateInitialCyclesParameters($initial_cycles);
        Helpers::validateInitialCycles($initial_cycles);


        //Validate image: optional
        $image = isset($data['image']) ? $data['image'] : null;
        if (
            $image &&
            (Helpers::validateRangeParameters(strlen($image), MIN_IMAGE_LENGTH, MAX_IMAGE_LENGTH) ||
            !preg_match(REGEX_IMAGE, $image))
        ) {
            throw new CustomException(INVALID_IMAGE);
        }
    }


    public static function list($data)
    {
        //Validar payload
        Helpers::validatePayloadFIlterPlan($data);

        $status = isset($data['status']) ? $data['status'] : null;
        $min_amount = isset($data['min_amount']) ? $data['min_amount'] : null;
        $max_amount = isset($data['max_amount']) ? $data['max_amount'] : null;
        $creation_date_from = isset($data['creation_date_from']) ? $data['creation_date_from'] : null;
        $creation_date_to = isset($data['creation_date_to']) ? $data['creation_date_to'] : null;
        $limit = isset($data['limit']) ? $data['limit'] : null;
        $before = isset($data['before']) ? $data['before'] : null;
        $after = isset($data['after']) ? $data['after'] : null;

        if (
            $status &&
            !in_array($status, PLAN_STATUS)
        ) {
            throw new CustomException(INVALID_STATUS_FILTER_ENUM);
        }

        if (
            $min_amount &&
            !is_numeric($min_amount)
        ) {
            throw new CustomException(MIN_AMOUNT_FILTER);
        }

        if (
            $max_amount &&
            !is_numeric($max_amount)
        ) {
            throw new CustomException(MAX_AMOUNT_FILTER);
        }

        if (
            $limit &&
            Helpers::validateRangeParameters($limit, MIN_LIMIT_FILTER, MAX_LIMIT_FILTER)
        ) {
            throw new CustomException(LIMIT_FILTER);
        }

        if (
            $before &&
            strlen($before) != GENERATED_ID
        ) {
            throw new CustomException(INVALID_BEFORE_FILTER);
        }

        if (
            $after &&
            strlen($after) != GENERATED_ID
        ) {
            throw new CustomException(INVALID_AFTER_FILTER);
        }

        if (
            $creation_date_from && !(strlen($creation_date_from) == 10 ||
                strlen($creation_date_from) == 13)
        ) {
            throw new CustomException(INVALID_CREATION_DATE_FROM_RANGE);
        }

        if (
            $creation_date_to && !(strlen($creation_date_to) == 10 ||
                strlen($creation_date_to) == 13)
        ) {
            throw new CustomException(INVALID_CREATION_DATE_TO_RANGE);
        }

        if (
            isset($creation_date_from) &&
            isset($creation_date_to)
        ) {
            Helpers::validateDateFilter($creation_date_from, $creation_date_to);
        }
    }

    public static function update($data)
    {
        //Validar payload
        Helpers::validatePayloadUpdatePlan($data);

        $name = isset($data['name']) ? $data['name'] : null;
        $description = isset($data['description']) ? $data['description'] : null;
        $short_name = isset($data['short_name']) ? $data['short_name'] : null;
        $status = isset($data['status']) ? $data['status'] : null;
        $image = isset($data['image']) ? $data['image'] : null;
        $metadata = isset($data['metadata']) ? $data['metadata'] : null;

        //Validate parameter: name
        if (
            $name && 
            (Helpers::validateParametersString($name) ||
            Helpers::validateRangeParameters(strlen($name), MIN_LENGTH_PLAN_NAME, MAX_LENGTH_PLAN_NAME))
        ) {
            throw new CustomException(ERROR_PARAMETER_NAME);
        }

        //Validate parameter: description
        if (
            $description &&
            (Helpers::validateParametersString($description) ||
            Helpers::validateRangeParameters(strlen($description), MIN_LENGTH_DESCRIPTION, MAX_LENGTH_DESCRIPTION))
        ) {
            throw new CustomException(ERROR_PARAMETER_DESCRIPTION);
        }

        //Validate parameter: short_name
        if (
            $short_name &&
            (Helpers::validateParametersString($short_name) ||
            Helpers::validateRangeParameters(strlen($short_name), MIN_LENGTH_PLAN_NAME, MAX_LENGTH_PLAN_NAME))
        ) {
            throw new CustomException(ERROR_PARAMETER_SHORT_NAME);
        }

        if (
            $status &&
            !in_array($status, PLAN_STATUS)
        ) {
            throw new CustomException(INVALID_STATUS_FILTER_ENUM);
        }

        if (
            $image &&
            (Helpers::validateRangeParameters(strlen($image), MIN_IMAGE_LENGTH, MAX_IMAGE_LENGTH) ||
            !preg_match(REGEX_IMAGE, $image))
        ) {
            throw new CustomException(INVALID_IMAGE);
        }



        //Validate parameter: metadata
        if ($metadata) {
            Helpers::validateMetadataSchema($metadata);
        }

    }
}