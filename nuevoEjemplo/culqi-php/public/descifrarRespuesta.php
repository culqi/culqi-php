<?php

require 'culqi.php';
require 'culqiValidar.php';

Culqi::$llaveSecreta = 'JlhLlpOB5s1aS6upiioJkmdQ0OYZ6HLS2+/o4iYO2MQ=';

try {
    // Se recibe la informacion_respuesta a través de una petición POST
    $llaveCifrada = CulqiValidar::postData();

    // Se descifra la llave
    $data = Culqi::decifrar($llaveCifrada, true);

    // Se muestra la información descifrada
    echo $data;

} catch (InvalidParamsException $e) {
    // En caso de error, se muestra el mensaje
    echo $e->getMessage()."\n";
}
