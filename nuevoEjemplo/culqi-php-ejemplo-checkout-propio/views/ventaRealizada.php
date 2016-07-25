<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Venta Realizada</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Lato:400,300,700'>
    </head>

    <body>
        <div class="contacto-info">
            <?php if ($respuestaCifrada): ?>
                <h3><?= $datosDeVentaRealizada->mensaje_respuesta_usuario ?></h3>
                <p><b>Número de pedido:</b> <?= $datosDeVentaRealizada->numero_pedido ?></p>
                <p><b>Número de tarjeta:</b> <?= $datosDeVentaRealizada->numero_tarjeta ?></p>
                <p><b>Marca de la tarjeta:</b> <?= $datosDeVentaRealizada->marca ?></p>
                <p><b>Nombres:</b> <?= $datosDeVentaRealizada->nombre_tarjeta_habiente ?></p>
                <p><b>Apellidos:</b> <?= $datosDeVentaRealizada->apellido_tarjeta_habiente ?></p>
                <p><b>Fecha:</b> <?= $fecha ?></p>
            <?php else: ?>
                <h3><?= $datosDeVentaRealizada ?></h3>
            <?php endif; ?>
        </div>

        <div><a class="seguir-comprando" href="/">Seguir Comprando</a></div>
    </body>
</html>
