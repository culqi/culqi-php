<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Carrito de Compras</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Lato:400,300,700'>
    </head>

    <body>
        <h3>Datos del Cliente</h3>
        <form action="validarCliente.php" method="post">
            <?= '<div style="color:#FF6464; margin:15px 0">'. $alerta .'</div>' ?>
            Nombre:<br>
            <input type="text" value="Ricardo" name="nombres"><br><br>
            Apellidos:<br>
            <input type="text" value="Huamani" name="apellidos"><br><br>
            Tel&eacute;fono:<br>
            <input type="text" value="555666777" name="num_tel"><br><br>
            Correo electr&oacute;nico:<br>
            <input type="email" value="brayan2259@gmail.com" name="correo_electronico"><br><br>
            Direcci&oacute;n:<br>
            <input type="text" value="av tusilagos" name="direccion"><br><br>
            Pa&iacute;s:<br>
            <select name="cod_pais">
                <option value="PE">Per&uacute;</option>
                <option value="US">Estados Unidos</option>
            </select><br><br>
            Ciudad:<br>
            <input type="text" value="Lima" name="ciudad"><br><br>

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

            <button type="submit">Continuar con el Pago</button>
        </form>
    </body>
</html>
