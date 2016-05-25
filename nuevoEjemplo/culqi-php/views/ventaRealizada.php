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
            <h3><?= $datosDeVentaConfirmada['mensaje_respuesta_usuario'] ?></h3>
            <p><b>Número de pedido:</b> <?= $datosDeVentaConfirmada['numero_pedido'] ?></p>
            <p><b>Número de tarjeta:</b> <?= $datosDeVentaConfirmada['numero_tarjeta'] ?></p>
            <p><b>Marca de la tarjeta:</b> <?= $datosDeVentaConfirmada['marca'] ?></p>
            <p><b>Nombres:</b> <?= $datosDeVentaConfirmada['nombre_tarjeta_habiente'] ?></p>
            <p><b>Apellidos:</b> <?= $datosDeVentaConfirmada['apellido_tarjeta_habiente'] ?></p>
            <p><b>Fecha:</b> <?= $fecha ?></p>
        </div>

        <div><a class="seguir-comprando" href="/">Seguir Comprando</a></div>
    </body>
</html>
