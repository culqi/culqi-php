<?php
/**
 * Ejemplo 5
 * Como crear un plan usando Culqi PHP.
 */

## Ejecuta ejemplo: php examples/subscription/03-get-subscription-id.php
try {
    // Usando Composer (o puedes incluir las dependencias manualmente)
    require 'vendor/autoload.php';

    // Configurar tu API Key y autenticación
    $SECRET_KEY = "sk_*************";
    $culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

    //Obtener Subscriptions
    $subscription = $culqi->Subscriptions->get(
        "sxn_*********************"
    );

    // Respuesta
    echo json_encode($subscription);

} catch (Exception $e) {
    echo json_encode($e->getMessage());
}
