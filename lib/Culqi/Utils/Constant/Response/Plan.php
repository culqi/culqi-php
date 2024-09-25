<?php

require_once __DIR__ . '/../Request/Plan.php';

$enumItervalUnitTimeAsString = implode(', ', ENUM_INTERVALS);
define('ERROR_PARAMETER_INTERVAL_UNIT_TIME_STRING', "El campo 'interval_unit_time' tiene un valor inválido o está vacío. Estos son los únicos valores permitidos: [{$enumItervalUnitTimeAsString}].");
const ERROR_PARAMETER_INTERVAL_UNIT_TIME = ERROR_PARAMETER_INTERVAL_UNIT_TIME_STRING;

const ERROR_PARAMETER_INTERVAL_COUNT = "El campo 'interval_count' solo admite valores numéricos en el rango " . INTERVAL_COUNT_MIN . " a " . INTERVAL_COUNT_MAX . ".";
const ERROR_PARAMETER_AMOUNT = "El campo 'amount' es inválido o está vacío, debe tener un valor numérico entero.";
const ERROR_PARAMETER_NAME = "El campo 'name' es inválido o está vacío. El valor debe tener un rango de " . MIN_LENGTH_PLAN_NAME . " a " . MAX_LENGTH_PLAN_NAME . " caracteres.";
const ERROR_PARAMETER_DESCRIPTION = "El campo 'description' es inválido o está vacío. El valor debe tener un rango de " . MIN_LENGTH_DESCRIPTION . " a " . MAX_LENGTH_DESCRIPTION . " caracteres.";
const ERROR_PARAMETER_SHORT_NAME = "El campo 'short_name' es inválido o está vacío. El valor debe tener un rango de " . MIN_LENGTH_PLAN_NAME . " a " . MAX_LENGTH_PLAN_NAME . " caracteres.";

$enumCurrencyAsString = implode(', ', ENUM_CURRENCY);
define('INVALID_CURRENCY_ENUM_STRING', "El campo 'currency' es inválido o está vacío, el código de la moneda en tres letras (Formato ISO 4217). Culqi actualmente soporta las siguientes monedas: [{$enumCurrencyAsString}].");
const INVALID_CURRENCY_ENUM = INVALID_CURRENCY_ENUM_STRING;

const INVALID_INITIAL_CYCLES_AMOUNT = "El campo 'initial_cycles.amount' es inválido o está vacío, debe tener un valor numérico entero.";
const AMOUNT_PAY_AMOUNT_EQUAL = "El campo 'initial_cycles.amount' es inválido o está vacío. El valor no debe ser igual al monto del plan.";
const INVALID_INITIAL_CYCLES_COUNT = "El campo 'initial_cycles.count' solo admite valores numéricos en el rango " . INITIAL_CYCLES_COUNT_MIN . " a " . INTERVAL_COUNT_MAX . ".";
const INVALID_INITIAL_CYCLES_AMOUNT_RANGE = "El campo 'initial_cycles.amount' admite valores en el rango " . INITIAL_CYCLE_MIN_AMOUNT . " a " . INITIAL_CYCLE_MAX_AMOUNT . ".";
const INITIAL_CYCLES_COUNT_NON_ZERO = "El campo 'initial_cycles.count' solo admite valores numéricos en el rango 0 a " . INTERVAL_COUNT_MAX . ".";
const INITIAL_CYCLES_AMOUNT_NON_ZERO = "El campo 'initial_cycles.amount' es inválido, debe ser 0.";
const METADATA_LIMIT_KEY_30_CHARACTERS_RF = "El objeto 'metadata' es inválido, límite key (1 - 30), value (1 - 200)";
const METADATA_INVALID = 'Enviaste el campo metadata con un formato incorrecto.';
const METADATA_LIMIT_20 = 'Enviaste más de 20 parámetros en el metadata. El límite es 20.';
const METADATA_LIMIT_VALUE_200_CHARACTERS_RF = "El objeto 'metadata' es inválido, límite key (1 - 30), value (1 - 200)";

$enumPlanStutsAsString = implode(', ', PLAN_STATUS);
define('INVALID_STATUS_FILTER_ENUM_STRING', "El filtro 'status' tiene un valor inválido o está vacío. Estos son los únicos valores permitidos: [{$enumPlanStutsAsString}].");
const INVALID_STATUS_FILTER_ENUM = INVALID_STATUS_FILTER_ENUM_STRING;

const MIN_AMOUNT_FILTER = "El filtro 'min_amount' es invalido, debe tener un valor numérico entero.";

const MAX_AMOUNT_FILTER = "El filtro 'max_amount' es invalido, debe tener un valor numérico entero.";

const LIMIT_FILTER = "El filtro 'limit' admite valores en el rango " . MIN_LIMIT_FILTER . " a " . MAX_LIMIT_FILTER . ".";
const INVALID_AFTER_FILTER = "El campo 'after' es inválido. La longitud debe ser de " . GENERATED_ID . " caracteres.";
const INVALID_BEFORE_FILTER = "El campo 'before' es inválido. La longitud debe ser de " . GENERATED_ID . " caracteres.";
const INVALID_CREATION_DATE_FROM_RANGE = "El campo 'creation_date_from' debe tener una longitud de " . RANGE_DATE_MIN . " o " . RANGE_DATE_MAX . " caracteres.";
const INVALID_CREATION_DATE_TO_RANGE = "El campo 'creation_date_to' debe tener una longitud de " . RANGE_DATE_MIN . " o " . RANGE_DATE_MAX . " caracteres.";
const INVALID_IMAGE = "El campo 'image' es inválido o está vacío. El valor debe ser una cadena y debe ser una URL válida de " . MIN_IMAGE_LENGTH . " a " . MAX_IMAGE_LENGTH . " caracteres.";

