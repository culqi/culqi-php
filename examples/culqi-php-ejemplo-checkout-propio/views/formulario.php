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
            <input type="text" value="Ricardo" name="nombres"><br>
            Apellidos:<br>
            <input type="text" value="Huamani" name="apellidos"><br>
            Tel&eacute;fono:<br>
            <input type="text" value="999999999" name="num_tel"><br>
            Correo electr&oacute;nico:<br>
            <input type="email" value="drihupp@gmail.com" name="correo_electronico"><br>
            Direcci&oacute;n:<br>
            <input type="text" value="Lima, Peru" name="direccion"><br>
            Pa&iacute;s:<br>
            <select name="cod_pais">
                <option value="PE">Per&uacute;</option>
                <option value="US">Estados Unidos</option>
            </select><br>
            Ciudad:<br>
            <input type="text" value="Lima" name="ciudad"><br>
            <input type="checkbox" name="term_cond" value="checked">He le&iacute;do y acepto los <a href="mostrarTerminosYCondiciones.php" target="_blank">T&eacute;rminos y Condiciones</a>

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
