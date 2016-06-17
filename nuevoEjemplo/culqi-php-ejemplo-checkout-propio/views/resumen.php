<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Resumen de Compras</title>
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Lato:400,300,700'>
    </head>

    <body>
        <div class="contacto-info">
            <p><?= $datosDeCliente['nombres'] . ' ' . $datosDeCliente['apellidos'] ?></p>
            <p><?= $datosDeCliente['direccion'] ?></p>
            <p><?= $datosDeCliente['ciudad'] . ' ' . $datosDeCliente['cod_pais'] ?></p>
            <p><?= $datosDeCliente['correo_electronico'] ?></p>
            <p><?= $datosDeCliente['num_tel'] ?></p>
        </div>

        <div class="resumen">
            <div class="title">Resumen de Compra</div>
            <div class="float-left">
                <div>Producto A</div>
                <div>Producto B</div>
                <div>Env&iacute;o</div>
                <div class="total">Total</div>
            </div>
            <div class="float-right">
                <div>460.00</div>
                <div>345.00</div>
                <div>65.00</div>
                <div class="total">870.00</div>
            </div>
        </div>

        <form id="formulario-culqi">
            <span>Nombre</span>
            <input type="text" size="50" id="nombre" value="Ricardo"><br>

            <span>Apellido</span>
            <input type="text" size="50" id="apellido" value="Huamani"><br>

            <span>Correo electrónico</span>
            <input type="text" size="50" id="email" value="drihupp@gmail.com"><br>

            <span>Número de tarjeta</span>
            <input type="text" size="20" id="numero_tarjeta" value="4111111111111111"><br>

            <span>Fecha de vencimiento (MM/AAAA)</span>
            <input type="text" size="2" id="exp_mes" value="09">
            <input type="text" size="4" id="exp_anio" value="2020"><br>

            <span>CVV</span>
            <input type="text" size="4" id="cvv" value="123"><br>
        </form>

        <!-- Botón de pago de Culqi -->
        <button id="btn_pago">Pagar</button>

        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script src="https://integ-pago.culqi.com/api/v2/culqi.js"></script>
        <script src="/js/culqi-helpers.js"></script>

        <!-- Aquí configuramos el botón de pago de Culqi. -->
        <script>
        // Código del comercio
        CulqiJS.codigo_comercio = '<?= Culqi::$codigoComercio ?>';
        // La informacion_venta es el contenido del parámetro que recibiste en la creación de la venta.
        CulqiJS.informacion_venta = '<?= CulqiValidar::$informacionVenta ?>';
        // Activa el botón de pago, al darle click mostrará el formulario de pago
        /*
        document.getElementById('btn_pago').addEventListener('click', function (e) {
            checkout.abrir();
            e.preventDefault();
        });
        // Esta función es llamada al terminar el proceso de pago.
        // Debe de ser usada siempre, para poder obtener la respuesta.
        function culqi(checkout)
        {
            // Aquí recibes la respuesta del formulario de pago.
            // Si el usuario cierra el formulario de pago: checkout.respuesta tendrá en valor "checkout_cerrado"
            console.log(checkout.respuesta);
            // Cierra el formulario de pago de Culqi.
            checkout.cerrar();
            // Envía la respuesta cifrada que recibiste del formulario de Culqi a tu
            // servidor para descifrarlo, tu servidor lo descifra con la librería
            // de culqi y con esos datos muestra la vista de venta realizada
            var json = JSON.stringify({
                informacionDeVentaCifrada: checkout.respuesta
            });
            post('/mostrarVentaRealizada.php', json);
        };
        */
        $('#btn_pago').on('click', function(e) {
        // Realizas el pago usando Culqi.
            CulqiJS.pagarVenta({
                numero: document.getElementById("numero_tarjeta").value,
                exp_m: document.getElementById("exp_mes").value,
                exp_a: document.getElementById("exp_anio").value,
                cvc: document.getElementById("cvv").value,
                nombre: document.getElementById("nombre").value,
                apellido: document.getElementById("apellido").value,
                correo: document.getElementById("email").value
            });

            e.preventDefault();
        });

        function culqi (checkout) {
            //Aquí recibes la respuesta del formulario de pago.
            //checkout.respuesta tendrá el valor: "error", "parametro_invalido"
            //Y si ha expirado, "venta_expirada"
            console.log(CulqiJS.respuesta);
            // Envía la respuesta cifrada que recibiste del formulario de Culqi a tu
            // servidor para descifrarlo, tu servidor lo descifra con la librería
            // de culqi y con esos datos muestra la vista de venta realizada
            
            var json = JSON.stringify({
                informacionDeVentaCifrada: CulqiJS.respuesta
            });
            post('/mostrarVentaRealizada.php', json);
            
        };
        </script>
    </body>
</html>
