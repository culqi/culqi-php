<?php
// Cargamos Culqi y librerías
require_once "test/culqi.php";
//require_once 'test/rmccue/Requests.php';
Requests::register_autoloader();

// Credenciales
$COD_COMERCIO = "X1QjlYMBBSV8";
$SECRET_API_KEY = "123";


// HTTP basic authentication (aun no usado)
$culqiConnect = new Culqi\Culqi(array('api_key' => $SECRET_API_KEY));

// Creando Suscriptor a un plan
$suscriptor = $culqiConnect->Suscripciones->create(
    array(
        "codigo_comercio" => $COD_COMERCIO,
        "codigo_pais"=> "PE",
        "direccion"=> "Avenida Lima 123213",
        "ciudad"=> "Lima",
        "telefono"=> "1234567789",
        "nombre"=> "Brayan",
        "correo_electronico"=> "brayan2259@gmail.com",
        "apellido"=> "Cruces",
        "usuario"=> "jose@gmail.com",
        "plan_id"=> "PP02",
        "token"=> "wNjBRhnEKFtBEEiRiNdTCVj7ogiNJ1Q8"
    )
);


// Respuesta
print_r($suscriptor);
