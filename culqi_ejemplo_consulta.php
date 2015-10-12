<?php
    require 'culqi.php';
    
    Culqi::$llaveSecreta = "zzmxZlgIJtKKy0F71DMsZPWnPVzow4S90abBScLDIrk=";
    Culqi::$codigoComercio = "testc101";
    Culqi::$servidorBase = 'https://devpago.culqi.com';
    
    try {
     

        $data = Pago::consultar("INSERTAR_TICKET_VENTA");
        
        var_dump($data);
        
        
    } catch (InvalidParamsException $e) {
        
        echo $e->getMessage()."\n";
        
    }
    ?>
