<?php
    require 'culqi.php';
    
    Culqi::$llaveSecreta = "zzmxZlgIJtKKy0F71DMsZPWnPVzow4S90abBScLDIrk=";
    Culqi::$codigoComercio = "testc101";
    Culqi::$servidorBase = 'https://devpago.culqi.com';
    
    try {
        
        $inputJSON = file_get_contents('php://input');
        
        $input= json_decode( $inputJSON, TRUE );
        
        $data = json_decode(Culqi::decifrar($input['respuesta']), TRUE);
        
        echo json_encode($data);
        
    } catch (InvalidParamsException $e) {
        
        echo $e->getMessage()."\n";
        
    }
    ?>
