<?php

class CulqiValidar
{
    /**
     * Es la key de informacion_venta que Culqi enviará luego de crear la venta
     *
     * @var string
     */
    public static $informacionVenta;

    /**
     * Almacena las verificaciones de si esta validado o no cierto parametro
     *
     * @var array
     */
    public static $validaciones = array(
        "apellidos" => 0,
        "ciudad" => 0,
        "cod_pais" => 0,
        "correo_electronico" => 0,
        "descripcion" => 0,
        "direccion" => 0,
        "id_usuario_comercio" => 0,
        "moneda" => 0,
        "monto" => 0,
        "nombres" => 0,
        "num_tel" => 0,
        "numero_pedido" => 0
    );

    /**
     * Lista de posibles valores para el codigo de moneda ISO
     *
     * @var array
     */
    public static $codigosMoneda = array(
        /*
        'AED', 'AFN', 'ALL', 'AMD', 'ANG', 'AOA', 'ARS', 'AUD', 'AWG', 'AZN',
        'BAM', 'BBD', 'BDT', 'BGN', 'BHD', 'BIF', 'BMD', 'BND', 'BOV', 'BOV',
        'BRL', 'BSD', 'BTN', 'BWP', 'BYR', 'BZD', 'CAD', 'CDF', 'CHE', 'CHF',
        'CHW', 'CLF', 'CLP', 'CNY', 'COP', 'COU', 'CRC', 'CUC', 'CUP', 'CVE',
        'CZK', 'DJF', 'DKK', 'DOP', 'DZD', 'EGP', 'ERN', 'ETB', 'EUR', 'FJD',
        'FKP', 'GBP', 'GEL', 'GHS', 'GIP', 'GMD', 'GNF', 'GTQ', 'GYD', 'HKD',
        'HNL', 'HRK', 'HTG', 'HUF', 'IDR', 'ILS', 'INR', 'IQD', 'IRR', 'ISK',
        'JMD', 'JOD', 'JPY', 'KES', 'KGS', 'KHR', 'KMF', 'KPW', 'KRW', 'KWD',
        'KYD', 'KZT', 'LAK', 'LBP', 'LKR', 'LRD', 'LSL', 'LYD', 'MAD', 'MDL',
        'MGA', 'MKD', 'MMK', 'MNT', 'MOP', 'MRO', 'MUR', 'MVR', 'MWK', 'MXN',
        'MXV', 'MYR', 'MZN', 'NAD', 'NGN', 'NIO', 'NOK', 'NPR', 'NZD', 'OMR',
        */
        'PEN', 'USD'
    );

    /**
     * Genera un código aleatorio de 15 caracteres para usar 
     * como numero_pedido en el demo o modo de integración
     *
     * @return string 
     */
    public static function codigoAleatorio()
    {
        $listOfCharacters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $string = str_shuffle($listOfCharacters);
        $string = substr($string, 0, 15);

        return $string;
    }

    /**
     * Verifica si la cadena de caracteres esta dentro del rango mínimo y máximo
     *
     * @param string $string
     * @param integer $min
     * @param integer $max
     * @return boolean
     */
    public static function verifyStrLenMinMax($string, $min, $max)
    {
        if (strlen($string) >= $min && strlen($string) <= $max) {

            return true;

        } else {

            return false;

        }
    }

    /**
     * Valida si el parámetro apellidos tiene de 2 a 50 caracteres
     *
     * @param string $apellidos
     */
    public static function validarApellidos($apellidos)
    {
        if (self::verifyStrLenMinMax($apellidos, 2, 50)) {

            self::$validaciones["apellidos"] = 1;

        }
    }

    /**
     * Valida si el parámetro ciudad tiene de 2 a 30 caracteres
     *
     * @param string $ciudad
     */
    public static function validarCiudad($ciudad)
    {
        if (self::verifyStrLenMinMax($ciudad, 2, 30)) {

            self::$validaciones["ciudad"] = 1;

        }
    }

    /**
     * Valida si el parámetro código de país tiene 2 caracteres
     *
     * @param string $codPais
     */
    public static function validarCodigoDePais($codPais)
    {
        if (preg_match("/^[a-zA-Z][a-zA-Z]/", $codPais)) {

            self::$validaciones["cod_pais"] = 1;

        }
    }

    /**
     * Valida si el parámetro correo_electronico tiene el formato correcto
     *
     * @param string $email
     */
    public static function validarCorreo($email)
    {
        if (preg_match("/^([a-zA-Z0-9])([a-zA-Z0-9\._-])*@([a-zA-Z0-9])([a-zA-Z0-9-])+\.[a-zA-Z]{1}/", $email)) {

            if (self::verifyStrLenMinMax($email, 5, 50)) {

                self::$validaciones["correo_electronico"] = 1;

            }

        }
    }


    /**
     * Valida si la descripcion tiene de 5 a 80 caracteres
     *
     * @param string $descripcion
     */
    public function validarDescripcion($descripcion)
    {
        if (self::verifyStrLenMinMax($descripcion, 5, 80)) {

            self::$validaciones['descripcion'] = 1;

        }
    }

    /**
     * Valida si la dirección tiene la longitud de caracteres correcta
     *
     * @param string $direccion
     */
    public static function validarDireccion($direccion)
    {
        if (self::verifyStrLenMinMax($direccion, 5, 100)) {

            self::$validaciones["direccion"] = 1;

        }
    }

    /**
     * Valida si el parámetro id_usuario_comercio tiene de 2 a 15 caracteres
     *
     * @param string $idUsuarioComercio
     */
    public static function validarIdUsuarioComercio($idUsuarioComercio)
    {
        if (self::verifyStrLenMinMax($idUsuarioComercio, 2, 15)) {

            self::$validaciones["id_usuario_comercio"] = 1;

        }
    }

    /**
     * Valida si el parámetro moneda pertenece a uno de los codigos de moneda ISO
     *
     * @param string $moneda
     */
    public static function validarMoneda($moneda)
    {
        $codigosMoneda = self::$codigosMoneda;

        for ($i = 0; $i < count($codigosMoneda); $i++) {

            if ($moneda === $codigosMoneda[$i]) {

                //Registra que el parámetro moneda está validado
                self::$validaciones["moneda"] = 1;

            }

        }
    }

    /**
     * Valida si el parámetro monto, eliminando el punto decimal tiene de 3 a 9 caracteres
     *
     * @param string $monto
     */
    public static function validarMonto($monto)
    {
        $montoSinPunto = str_replace('.', '', $monto);

        if (self::verifyStrLenMinMax($montoSinPunto, 3, 9)) {

            self::$validaciones["monto"] = 1;

        }
    }

    /**
     * Valida si el parámetro nombres tiene de 2 a 50 caracteres
     *
     * @param string $nombre
     */
    public static function validarNombres($nombres)
    {
        if (self::verifyStrLenMinMax($nombres, 2, 50)) {

            self::$validaciones["nombres"] = 1;

        }
    }

    /**
     * Valida si el parámetro numero_pedido tiene a lo más 33 caracteres
     *
     * @param string $numeroPedido
     */
    public static function validarNumeroPedido($numeroPedido)
    {
        if (self::verifyStrLenMinMax($numeroPedido, 0, 33)) {

            self::$validaciones['numero_pedido'] = 1;

        }
    }

    /**
     * Valida si el parámetro num_tel tiene de 5 a 15 caracteres
     *
     * @param string $numTel
     */
    public static function validarTelefono($numTel)
    {
        if (self::verifyStrLenMinMax($numTel, 5, 15)) {

            self::$validaciones["num_tel"] = 1;

        }
    }

    /**
     * Entregará un mensaje de alerta en la vista de formulario alertando
     * solo aquellos parámetros del formulario que no están validados
     *
     * @param array $datosDeCliente
     */
    public static function validarDatosDeCliente($datosDeCliente)
    {
        $clienteValidado = true;

        // Determina que valor tendrá cada una de las validaciones del cliente
        // Será 1 si está validado y 0 si no lo está
        self::validarApellidos($datosDeCliente['apellidos']);
        self::validarCiudad($datosDeCliente['ciudad']);
        self::validarCodigoDePais($datosDeCliente['cod_pais']);
        self::validarCorreo($datosDeCliente['correo_electronico']);
        self::validarDireccion($datosDeCliente['direccion']);
        self::validarNombres($datosDeCliente['nombres']);
        self::validarTelefono($datosDeCliente['num_tel']);

        // Se genera un nuevo array solo con las validaciones (1 ó 0) del cliente
        $validacionesDeCliente = array(
            'apellidos'          => self::$validaciones['apellidos'],
            'ciudad'             => self::$validaciones['ciudad'],
            'cod_pais'           => self::$validaciones['cod_pais'],
            'correo_electronico' => self::$validaciones['correo_electronico'],
            'direccion'          => self::$validaciones['direccion'],
            'nombres'            => self::$validaciones['nombres'],
            'num_tel'            => self::$validaciones['num_tel']
        );

        // Si alguno de las validaciones es nula (cero), el cliente no estará validado
        foreach ($validacionesDeCliente as $clave => $valor) {

            if ($valor === 0) {

                $clienteValidado = false;

            }
        }

        // Si no está validado, se devolverá la misma vista
        // Pero alertando qué campos no están validados
        if (!$clienteValidado) {

            $camposNoValidados = array();

            foreach ($validacionesDeCliente as $clave => $valor) {

                if ($valor === 0) {

                    array_push($camposNoValidados, $clave);

                }
            }

            $alerta .= implode(', ', $camposNoValidados);
            $alerta .= '.';
            $alerta = 'Los siguientes campos no están validados: ' . $alerta;

            require '../views/formulario.php';

            exit;
        }
    }

    /**
     * Entregará un mensaje de alerta en la vista de formulario alertando que
     * los parámetros internos del comercio o de la venta misma no están 
     * validados, sin especificar qué parámetros no fueron validados
     *
     * @param array $datosDeVenta
     */
    public static function validarDatosDeVenta($datosDeVenta)
    {
        $ventaValidada = true;

        // Determina que valor tendrá cada una de las validaciones de la venta
        // Será 1 si está validado y 0 si no lo está
        self::validarIdUsuarioComercio($datosDeVenta['id_usuario_comercio']);
        self::validarDescripcion($datosDeVenta['descripcion']);
        self::validarMoneda($datosDeVenta['moneda']);
        self::validarMonto($datosDeVenta['monto']);
        self::validarNumeroPedido($datosDeVenta['numero_pedido']);

        // Se genera un nuevo array solo con las validaciones del comercio y la venta
        $validacionesDeVenta = array(
            'id_usuario_comercio' => self::$validaciones['id_usuario_comercio'],
            'descripcion' => self::$validaciones['descripcion'],
            'moneda' => self::$validaciones['moneda'],
            'monto' => self::$validaciones['monto'],
            'numero_pedido' => self::$validaciones['numero_pedido']
        );

        // Si alguna de las validaciones es nula (cero), la venta no estará validada
        foreach ($validacionesDeVenta as $clave => $valor) {

            if ($valor === 0) {

                $ventaValidada = false;

            }

        }

        // Si no está validada, se devolverá la misma vista, pero alertando
        // que los campos no están validados sin especificar cuáles
        if (!$ventaValidada) {

            $alerta = 'Los datos internos de venta no están validados.';

            require '../views/formulario.php';

            exit;

        }
    }

    /**
     * Registra la transacción en los servidores de Culqi, muestra los 
     * datos del pedido y devuelve la vista del resumen de compras
     *
     * @param array $datosDeCliente
     * @param array $datosDeVenta
     */
    public static function crearVenta($datosDeCliente, $datosDeVenta)
    {
        $datosDeClienteVenta = array_merge($datosDeCliente, $datosDeVenta);

        try {
            $data = Pago::crearDatospago($datosDeClienteVenta);

            // Muestra los datos del pedido
            echo "Información de la venta: " . $data["informacion_venta"] . '<br>';
            echo "Código de comercio: " . $data["codigo_comercio"] . '<br>';
            echo "Número de pedido: " . $data["numero_pedido"] . '<br>';
            echo "Código de respuesta: " . $data["codigo_respuesta"] . '<br>';
            echo "Mensaje de respuesta: " . $data["mensaje_respuesta"] . '<br>';
            echo "Ticket de la venta: " . $data["ticket"] . '<br>';

            // Genera la llave Culqi::$informacionVenta para usarla en las vistas
            self::$informacionVenta = $data['informacion_venta'];

        } catch (InvalidParamsException $e) {

            echo $e->getMessage()."\n";

        }

        // Muestra la vista de Resumen de Compras
        require '../views/resumen.php';
    }

    /**
     * Devuelve los datos enviados por método POST
     *
     * @return string
     */
    public static function postData()
    {
        $data = file_get_contents('php://input');
        return $data;
    }

    /**
     * Convierte el string en formato JSON a un array
     *
     * @param string $json
     * @return array
     */
    public static function jsonToArray($json)
    {
        $array = json_decode($json, true);
        return $array;
    }
}
