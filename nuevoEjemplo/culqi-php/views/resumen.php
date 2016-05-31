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

        <!-- Botón de pago de Culqi -->
        <button id="btn_pago">Pagar</button>

        <script src="https://integ-pago.culqi.com/api/v1/culqi.js"></script>
        <script src="/js/culqi-helpers.js"></script>

        <!-- Aquí configuramos el botón de pago de Culqi. -->
        <script>
        // Código del comercio
        checkout.codigo_comercio = '<?= Culqi::$codigoComercio ?>';
        // La informacion_venta es el contenido del parámetro que recibiste en la creación.
        checkout.informacion_venta = '<?= CulqiValidar::$informacionVenta ?>';
        // Activa el botón de pago, al darle click mostrará el formulario de pago
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
        </script>
    </body>
</html>
