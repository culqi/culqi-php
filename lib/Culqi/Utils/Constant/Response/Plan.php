<?php

require_once __DIR__ . '/../Request/Plan.php';


const ERROR_PARAMETER_INTERVAL_UNIT_TIME = "El campo 'interval_unit_time' tiene un valor inválido o está vacío. Estos son los únicos valores permitidos: [ 1, 2, 3, 4, 5, 6].";
const ERROR_PARAMETER_INTERVAL_COUNT = "El campo 'interval_count' solo admite valores numéricos en el rango " . INTERVAL_COUNT_MIN . " a " . INTERVAL_COUNT_MAX . ".";
const ERROR_PARAMETER_AMOUNT = "El campo 'amount' es inválido o está vacío, debe tener un valor numérico entero.";
const ERROR_PARAMETER_NAME = "El campo 'name' es inválido o está vacío. El valor debe tener un rango de " . MIN_LENGTH_PLAN_NAME . " a " . MAX_LENGTH_PLAN_NAME . " caracteres.";
const ERROR_PARAMETER_DESCRIPTION = "El campo 'description' es inválido o está vacío. El valor debe tener un rango de " . MIN_LENGTH_DESCRIPTION . " a " . MAX_LENGTH_DESCRIPTION . " caracteres.";
const ERROR_PARAMETER_SHORT_NAME = "El campo 'short_name' es inválido o está vacío. El valor debe tener un rango de " . MIN_LENGTH_PLAN_NAME . " a " . MAX_LENGTH_PLAN_NAME . " caracteres.";
const INVALID_AMOUNT_RANGE_PEN = "El campo 'amount' admite valores en el rango 300 a 500000.";
const INVALID_AMOUNT_RANGE_USD = "El campo 'amount' admite valores en el rango 100 a 150000.";
const INVALID_CURRENCY_ENUM = "El campo 'currency' es inválido o está vacío, el código de la moneda en tres letras (Formato ISO 4217). Culqi actualmente soporta las siguientes monedas: ['PEN','USD'].";
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

const INVALID_STATUS_FILTER_ENUM = "El filtro 'status' tiene un valor inválido o está vacío. Estos son los únicos valores permitidos: 1, 2.";
const MIN_AMOUNT_FILTER = "El filtro 'min_amount' admite valores en el rango " . MIN_AMOUNT_RANGE_PEN * 100 . " a " . MAX_AMOUNT_RANGE_PEN * 100 . ".";

const MAX_AMOUNT_FILTER = "El filtro 'max_amount' admite valores en el rango " . MIN_AMOUNT_RANGE_PEN * 100 . " a " . MAX_AMOUNT_RANGE_PEN * 100 . ".";

const LIMIT_FILTER = "El filtro 'limit' admite valores en el rango " . MIN_LIMIT_FILTER . " a " . MAX_LIMIT_FILTER . ".";
const INVALID_AFTER_FILTER = "El campo 'after' es inválido. La longitud debe ser de " . GENERATED_ID . " caracteres.";
const INVALID_BEFORE_FILTER = "El campo 'before' es inválido. La longitud debe ser de " . GENERATED_ID . " caracteres.";
const INVALID_CREATION_DATE_FROM_RANGE = "El campo 'creation_date_from' debe tener una longitud de 10 o 13 caracteres.";
const INVALID_CREATION_DATE_TO_RANGE = "El campo 'creation_date_to' debe tener una longitud de 10 o 13 caracteres";
const INVALID_IMAGE = "El campo 'image' es inválido o está vacío. El valor debe ser una cadena y debe ser una URL válida de 5 a 250 caracteres.";


function getFormatNumberAmount($number, $digits)
{
    return 3.0 * pow(10, 2);
}

