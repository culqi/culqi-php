<?php
/**
 * Ejemplo 5
 * Como crear un plan usando Culqi PHP.
 */

## Ejecuta ejemplo: php examples/plan/01-get-all-plan.php
try {
    // Usando Composer (o puedes incluir las dependencias manualmente)
    require 'vendor/autoload.php';

    // Configurar tu API Key y autenticación
    $SECRET_KEY = "sk_*************";
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

    // Obtener Todos los planes
    #$plan = $culqi->Plans->all();

    //Obtener planes por filtro
    $plan = $culqi->Plans->all(
        array(
            "before" => "pln_live_qnJOtJiuGT88dAa5",
            "after" => "pln_live_c6cm1JuefM0WVkli",
            "limit" => 100,
            "min_amount" => 300,
            "max_amount" => 500000,
            "status" => 1,
            #"creation_date_from" => "2023-12-20T00:00:00.000Z",
            #"creation_date_to" => "2023-12-20T00:00:00.000Z",
        )
    );


    // Respuesta
    echo json_encode($plan);

} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
