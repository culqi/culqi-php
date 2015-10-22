<?php
    require 'culqi.php';
    
    Culqi::$codigoComercio = "demo";
    Culqi::$llaveSecreta = "JlhLlpOB5s1aS6upiioJkmdQ0OYZ6HLS2+/o4iYO2MQ=";
    Culqi::$servidorBase = 'https://integ-pago.culqi.com';
    
    try {
     

        $data = Pago::anular("TICKET");
        
        var_dump($data);
        
        
    } catch (InvalidParamsException $e) {
        
        echo $e->getMessage()."\n";
        
    }
    ?>
