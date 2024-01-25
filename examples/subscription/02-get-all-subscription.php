<?php
/**
 * Ejemplo 5
 * Como crear un plan usando Culqi PHP.
 */

## Ejecuta ejemplo: php examples/subscription/02-get-all-subscription.php
try {
    // Usando Composer (o puedes incluir las dependencias manualmente)
    require 'vendor/autoload.php';

    // Configurar tu API Key y autenticación
    $SECRET_KEY = "sk_*************";
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

    // Obtener Todos los Subscriptions
    $subscription = $culqi->Subscriptions->all();

    //Obtener Subscriptions por filtro
    #$subscription = $culqi->Subscriptions->all(
    #    array(
    #        "status" => 10,
    #        "plan_id" => "pln_*********************",
    #        "before" => "sxn_*********************",
    #        "after" => "sxn_*********************",
    #        "limit" => 100,
    #        #"creation_date_from" => "2023-12-20T00:00:00.000Z",
    #        #"creation_date_to" => "2023-12-20T00:00:00.000Z",
    #    )
    #);

    // Respuesta
    echo json_encode($subscription);

} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
