<?php
    require 'culqi.php';
    
    Culqi::$llaveSecreta = "zzmxZlgIJtKKy0F71DMsZPWnPVzow4S90abBScLDIrk=";
    Culqi::$codigoComercio = "testc101";
    Culqi::$servidorBase = 'https://integ-pago.culqi.com';
    
    try {
     

        $data = Pago::anular("TICKET");
        
        var_dump($data);
        
        
    } catch (InvalidParamsException $e) {
        
        echo $e->getMessage()."\n";
        
    }
    ?>
