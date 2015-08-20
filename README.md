# Integrando el Botón de Pago Web en una aplicación PHP

## Introducción
Este documento tiene como intención ser una Guía rápida para que el desarrollador pueda integrar rápidamente el Botón de Pago Web de Culqi.

Para realizar una operación de autorización, se debe realizar 2 pasos: 
   - Crear un Venta --> se validará los datos del comercio y de la compra.
   - Procesar la Venta --> se solicitará los datos de la tarjeta y se procesará con la marca correspondiente.

Adicionalmente, se podrá realizar las siguientes operaciones:
   - Consultar una Venta --> obtendrás el estado de la venta y sus datos.
   - Anular una Venta --> se procesará la anulación siempre y cuando la venta esté autorizada.

## Requerimientos

Para que la aplicación o proyecto que estes desarrollando pueda utilizar el Botón de Pago Web de Culqi, debes instalar lo siguiente:

* PHP 5.3.3 o posterior.
* [Mcrypt](http://php.net/manual/es/book.mcrypt.php)
* [CURL](http://php.net/manual/es/book.curl.php)
* [Ctype](http://php.net/manual/es/book.ctype.php)

## Instalación

> Culqi ha desarrollado una libreria en PHP para simplificar la implementación del Botón de Pago Web en tu aplicación o proyecto. Puedes descargar la [última versión](https://github.com/culqi/Culqi-PHP/releases/download/v1.0/culqi.php) de la librería de PHP e importarla a tu proyecto:

```php
require 'culqi.php';
```
## Comercio de prueba

Para facilitarle la implementación a nuestro Entorno de Integración, hemos creado un comercio de prueba denominado "Comercio Demo", el cual considera el logotipo de Culqi, asi como los siguientes datos que deberás utilizar en los próximos pasos.

  * Código de comercio: **xdemo**
  * Llave del comercio: **Aq+yGWgYrDK9qWi30yj6+LicpKXxuVqZEGKsu9U4pwE=**

Te brindamos algunas tarjetas de diferentes marcas que podrás utilizar una vez que te integres mediante del Botón de Pago Web:

Marca | Número de tarjeta | Fecha de expiración | CVV
-------------- | -------------- | -------------- | --------------
Visa | 4111 1111 1111 1111 | 09/2020 | 123
Visa | 4444 3333 2222 1111 | 09/2019 | 123
MasterCard | 5111 1111 1111 1111 | 06/2020 | 472
Amex | 3712 121212 1212 | 11/2017 | 284
Diners | 3600 121212 1210 | 04/2018 | 964

<aside class="notice">
Si necesitas alguna ayuda u orientación, puedes comunicarte con nosotros vía email a soporte@culqi.com.
</aside>

## Configuración

Para empezar debes de configurar la librería en tu proyecto e iniciar las variables con los datos del "Comercio Demo":

```php
<?php
Culqi::$llaveSecreta = "xdemo";
Culqi::$codigoComercio = "Aq+yGWgYrDK9qWi30yj6+LicpKXxuVqZEGKsu9U4pwE=";
Culqi::$servidorBase = 'https://integ-pago.culqi.com';
?>
```

> Los valores de las variables "llave_secreta" y "codigo_comercio" son los provistos para el "Comercio Demo". Cuando obtengas los valores de esas variables de tu comercio que debes solicitar a Culqi, solo reemplázalos. El valor de la variable "servidorBase", esta apuntando por defecto al Entorno de Integración de Culqi.

Estos son los parámetros de configuración:

Parámetro | Descripción
--------- | -----------
llaveSecreta | Llave secreta del comercio
codigoComercio | Código del comercio asignado por Culqi.
servidorBase | URL de Culqi a la que te conectarás. 
 | `Entorno de Integración la URL es: https://integ-pago.culqi.com` 
 | `Entorno de Producción: la URL es: https://pago.culqi.com`


## Operación de Autorización

### Creando una venta

Este paso es para pre-registrar y validar los datos de la venta del Comercio en la Pasarela de Pagos de Culqi, antes de solicitar los datos de la tarjeta al cliente. Si la respuesta es satisfactoria se debe proseguir con el siguiente paso, caso contrario, ustede debe revisar el código y mensaje de la respuesta que se le brinde.

Para crear una nueva venta deberá configurar la información de la misma, mediante los valores que establezca en los parámetros obligatorios.

#### Parámetros de envío obligatorios

Nombre | Parámetro | Descripción | Tipo | Tamaño Máximo
--------- | --------- | ------- | ----------- | -----------
Número de Pedido | PARAM_NUM_PEDIDO | Número de pedido de la venta. ***Debe ser único por cada venta.*** | AN | 100 caracteres
Moneda | PARAM_MONEDA | Código de la Moneda de la venta. Ej: Nuevos Soles: PEN , Dólares: USD | N | 3 caracteres
Monto | PARAM_MONTO | Monto de la venta, sin punto decimal Ej: 100.25 sería 10025 | N | 7 caracteres
Descripción | PARAM_DESCRIPCION | Breve descripción del producto o servicio brindado. | AN | 120 caracteres
País | PARAM_COD_PAIS | Código del País del cliente. Ej. Perú : PE | A | 2 caracteres
Ciudad | PARAM_CIUDAD | Ciudad del cliente. | A | 30 caracteres
Dirección | PARAM_DIRECCION | Dirección del cliente. | AN | 80 caracteres
Teléfono | PARAM_NUM_TEL | Número de teléfono del cliente. | N | 20 caracteres

`AN = Alfanumérico` 
`N = Numérico` 

#### Parámetros de envío opcionales

Nombre | Parámetro | Descripción | Tipo | Tamaño Máximo
--------- | --------- | ------- | ----------- | -----------
Vigencia | PARAM_VIGENCIA | Cantidad de minutos en los que el cliente puede realizar el pago. | N | 2 caracteres

`N = Numérico` 
`El tiempo de la vigencia es por defecto 10 minutos. Si va a usar este campo con otro valor, contáctese con Culqi para su habilitación.` 

Ejemplo de código para crear la venta:

```php
<?php
require 'culqi.php';

Culqi::$llaveSecreta = "xdemo";
Culqi::$codigoComercio = "Aq+yGWgYrDK9qWi30yj6+LicpKXxuVqZEGKsu9U4pwE=";
Culqi::$servidorBase = 'https://integ-pago.culqi.com';

try {

$data = Pago::crearDatospago(array(

//Numero de pedido de la venta, y debe ser único (de no ser así, recibirá como respuesta un error)
Pago::PARAM_NUM_PEDIDO => "tlvh20150727-1",

//Moneda de la venta ("PEN" O "USD")
Pago::PARAM_MONEDA => "PEN",

//Monto de la venta (ejem: 10.25, va sin el punto decimal)
Pago::PARAM_MONTO => "1025",

//Descripción de la venta
Pago::PARAM_DESCRIPCION => "Un protector de smartphone y una memoria microSD de 32 GB.",

//Código del país del cliente Ej. PE, US
Pago::PARAM_COD_PAIS => "PE",

//Ciudad del cliente
Pago::PARAM_CIUDAD => "Lima",

//Dirección del cliente
Pago::PARAM_DIRECCION => "Avenida Javier Prado 2132, San Isidro",

//Número de teléfono del cliente
Pago::PARAM_NUM_TEL => "992765900",

));

//Respuesta de la creación de la venta. Cadena cifrada.
$informacionVenta = $data[Pago::PARAM_INFO_VENTA];
echo "Información de la venta: $informacionVenta";

echo "Codigo de Comercio: " . $data["codigo_comercio"];
echo "Número de pedido: " . $data["nro_pedido"];
echo "Código de respuesta: " . $data["codigo_respuesta"];
echo "Mensaje de respuesta: " . $data["mensaje_respuestaa"];
echo "Token de la transacción: " . $data["token"];

} catch (InvalidParamsException $e) {

echo $e->getMessage()."\n";

}
?>
```

La respuesta que obtendrá será una cadena cifrada que contiene un JSON.

```json
{"info_venta":"dkladkldlakdmdaaldklakd",
 "codigo_comercio":"testc101",
 "nro_pedido":"testc101",
 "codigo_respuesta":"OK",
 "mensaje_respuesta":"Venta Creada",
 "token":"PqHLeGVGBniY7i4XN1N94QIx4MyHHYZhztE"}
```

#### Parámetros de respuesta

Nombre | Parámetro | Descripción | Tipo
--------- | --------- | ------- | -----------
Informacion de Venta | PARAM_INFO_VENTA | La información de la venta que se usa para configurar el botón de pago de Culqi. | AN
Código de Comercio | codigo_comercio | Código del comercio en Culqi. | AN
Número de Pedido | nro_pedido | Número de orden de la venta. | AN
Código de Respuesta | codigo_respuesta | Código de la respuesta. | AN
Mensaje de Respuesta | mensaje_respuesta | Mensaje de respuesta. | AN
Token | token | Token de la transacción. | AN

`AN = Alfanumérico` 

> El parámetro "PARAM_INFO_VENTA" contenido en la respuesta del servidor de Culqi, debe de ser usado para configurar el Botón de Pago Web en la página del comercio como siguiente paso, ya que asi se inicia la solicitud de los datos de la tarjeta al cliente.

> Es importante que almacenes estos datos, ya que el parámetro "Token" lo usarás para otras operaciones.

### Procesando una Venta

Para empezar, agrega el siguiente código en JavaScript en la página web donde tendrás el Botón de Pago Web:

`<script type="text/javascript" src="https://integ-pago.culqi.com/culqi.js"></script>`

Usar una copia local no está soportado, y puede resultar en errores visibles por el usuario.

Esta integración te permite crear un botón customizado y pasar un token de Culqi a un callback (Función `Culqi()`) en Javacript. Puedes usar cualquier elemento HTML o evento JavaScript para abrir el formulario de pagos, y es independiente del lenguaje de programación que uses en tu backend.

> Puedes usar Culqi.js de la siguiente manera usando Jquery.

```javascript
//Puedes crear un botón de pago
<button id="btn_pago">Pagar</button>

//Aqui configuramos el botón de pago de Culqi.
<script>

//El código del comercio
checkout.codigo_comercio = "xdemo";

//La información de la venta
checkout.informacion_venta = "PARAM_INFO_VENTA";


$('#btn_pago').on('click', function(e) {

// Abre el formulario de pago de Culqi.
checkout.abrir();

e.preventDefault();

});

//Esta función es llamada al terminar el proceso de pago.
function culqi (checkout) {

//Aquí recibes la respuesta del formulario de pago.
console.log(checkout.respuesta);

// Cierra el formulario de pago de Culqi.
checkout.cerrar();

};

</script>
```

#### Parámetros de envío

Nombre | Parámetro | Descripción | Tipo
--------- | --------- | ------- | -----------
Código de Comercio | codigo_comercio | Código de comercio en Culqi. | AN
Información Venta | informacion_venta | Información de la venta cifrada.  | AN

Es muy importante que entiendas que la variable `codigo_comercio` se encarga de identificar a tu comercio en la comunicación con los servidores de Culqi, y la variable `informacion_venta` se encarga de enviar la información de la venta.

En este punto, debes visualizar el formulario de pago de Culqi. Luego que el cliente ingrese los datos de la tarjeta y se procese la venta, obtendrás como respuesta una cadena de texto, que puedes leer usando la variable `checkout.respuesta` que lo encuentras en el ejemplo de Javascript que se mostró previamente. Este contiene un JSON cifrado y se imprime en el log del navegador web. 

<aside class="error">
Es de suma importancia que envíes el contenido de la variable "checkout.respuesta" a tus servidores para decrifrarlo usando la librería "culqi.php", ya que la llave no debe ser usada en el navegador web por tu seguridad como comercio.</aside>

#### Enviando la respuesta a tu servidor

Una vez que obtengas la respuesta de Culqi en tu página web es necesario que la envíes a tu servidor para decifrarla y poder mostrar al usuario el resultado de la transacción. A continuación un ejemplo utilizando Ajax y que invoca a una entrada llamada "/respuesta":

```javascript
$.ajax({
            url: "/respuesta",
            type: "POST",
            contentType: "application/json",
            data: JSON.stringify(
                    {
                        'respuesta' : checkout.respuesta
                    }),
            success: function(data){
                var obj = JSON.parse(data);
                var codigo_respuesta_venta = obj["codigo_respuesta"];
                if (codigo_respuesta_venta == "OK") {
                    checkout.cerrar();
                } else {
                    // Brindale un mensaje amigable al cliente (no uses el mensaje de Culqi) e invitalo a reintentarlo
                    checkout.cerrar();
                }
            },
            error:function( ){
            }
        });
```

#### Decrifrando la respuesta

Una vez recibida la respuesta, puedes decifrarla utilizando la librería PHP.

```php
<?php
Culqi.llaveSecreta = "Aq+yGWgYrDK9qWi30yj6+LicpKXxuVqZEGKsu9U4pwE=";
Culqi.codigoComercio = "xdemo";

//Retorna el JSON Descifrado
$respuesta = Culqi.decifrar(respuestaCifrada.getRespuesta());

//Codigo del comercio
echo "Código Comercio" . $respuesta["codigo_comercio"];

//Número de pedido
echo "Número de pedido" . $respuesta["nro_pedido"];

//Código de respuesta
echo "Código Respuesta" . $respuesta["codigo_respuesta"];

//Mensaje de respuesta
echo "Mensaje Respuesta" . $respuesta["mensaje_respuesta"];

//ID de la Transacción
echo "ID Transacción" . $respuesta["id_transaccion"];

//Código de referencia
echo "Código Referencia" . $respuesta["codigo_referencia"];

//Código de autorización
echo "Código Autorización" . $respuesta["codigo_autorizacion"];

//Marca de la tarjeta
echo "Marca" . $respuesta["marca"];

//Emisor de la tarjeta (dato referencial)
echo "Emisor" . $respuesta["emisor"];

//País de la tarjeta (dato referencial)
echo "País Tarjeta" . $respuesta["pais_tarjeta"];

}
?>
```
Obtendrás un JSON que contendrá los siguientes parámetros:

Nombre | Parámetro | Descripción | Tipo
--------- | ------- | ----------- | -----------
Código de Comercio | codigo_comercio | Código del comercio en Culqi. | AN
Número de Pedido | nro_pedido | Número de orden de la venta. | AN
Código de Respuesta | codigo_respuesta | Código de la respuesta. | AN
Mensaje de Respuesta | mensaje_respuesta | Mensaje de respuesta. | AN
ID Transacción | id_transaccion | ID de la transacción. | AN
Código Referencia | codigo_referencia | Código de referencia de la transacción. | AN
Código Autorización | codigo_autorizacion | Código de autorización de la transacción. | AN
Marca | marca | Marca de la tarjeta usada para realizar el pago. | AN
Emisor | emisor | Banco emisor de la tarjeta usada para realizar el pago. Es referencial. | AN
País Tarjeta | pais_tarjeta | País de origen de la tarjeta usada para realizar el pago. Es referencial. | AN

`AN = Alfanumérico` 

> Almacena estos datos por cada petición que realices, y considera que los reintentos esta relacionado al mismo número de pedido, por ello usamos el parámetro de código de referencia.

## Operación de Consulta de una venta

Para consultar una venta debes de enviar el token de la transacción (que debes haber guardado) usando la librería de Culqi.

```php
<?php
require 'culqi.php';

Culqi::$llaveSecreta = "Aq+yGWgYrDK9qWi30yj6+LicpKXxuVqZEGKsu9U4pwE=";
Culqi::$codigoComercio = "xdemo";
Culqi::$servidorBase = 'https://integ-pago.culqi.com';

try {

// TOKEN de la venta
$data = Pago::consultar("0MXpbwlGjRU9Sr0IwIOqHh1aVJICjGh9KIq");

//Codigo del comercio
echo "Código Comercio" . $data['codigo_comercio'];

//Número de Pedido
echo "Número de pedido" . $data['nro_pedido'];

//Token de la transacción
echo "Token" + $data['token'];

//Estado de la transacción
echo "Estado de la transacción" . $data['estado_transaccion'];

//Código de respuesta
echo "Código de Respuesta" . $data['codigo_respuesta'];

//Mensaje de respuesta
echo "Mensaje de Respuesta" . $data['mensaje_respuesta'];


} catch (InvalidParamsException $e) {

echo $e->getMessage()."\n";

}
?>
```

### Parámetros de envío

Nombre | Parámetro| Descripción | Tipo 
--------- | ----------- | ----------- | -----------
Token | token | El código de la transacción que quieres consultar. | AN


### Parámetros de respuesta

Nombre | Parámetro| Descripción | Tipo 
--------- | --------- | ----------- | -----------
Código de Comercio | codigo_comercio | El código del comercio en Culqi. | AN
Número de Pedido | nro_pedido | El número de orden de tu venta. | AN
Token | token | El código de la transacción. | AN
Estado de Transacción | estado_transaccion | El estado de la transacción. | AN
Código de Respuesta | codigo_respuesta | El código de la respuesta. | AN
Mensaje de Respuesta | mensaje_respuesta | El mensaje de respuesta. | AN

## Operación de Anulación de una venta

Para anular una venta debes de enviar el token de la transacción usando la librería de Culqi.

```php
<?php
require 'culqi.php';

Culqi::$llaveSecreta = "Aq+yGWgYrDK9qWi30yj6+LicpKXxuVqZEGKsu9U4pwE=";
Culqi::$codigoComercio = "xdemo";
Culqi::$servidorBase = 'https://integ-pago.culqi.com';

try {

// TOKEN de la venta
$data = Pago::anular("0MXpbwlGjRU9Sr0IwIOqHh1aVJICjGh9KIq");

//Codigo del comercio
echo "Código Comercio" . $data['codigo_comercio'];

//Número de Pedido
echo "Número de pedido" . $data['nro_pedido'];

//Token de la transacción
echo "Token" + $data['token'];

//Código de respuesta
echo "Código de Respuesta" . $data['codigo_respuesta'];

//Mensaje de respuesta
echo "Mensaje de Respuesta" . $data['mensaje_respuesta'];


} catch (InvalidParamsException $e) {

echo $e->getMessage()."\n";

}
?>

```

### Parámetros de envío

Parámetro | Tipo | Descripción
--------- | ----------- | -----------
token | AN | El código de la transacción que quieres anular.


### Parámetros de respuesta

Parámetro | Tipo | Descripción
--------- | ----------- | -----------
codigo_comercio | AN | El código del comercio en Culqi.
nro_pedido | AN | El número de orden de tu venta.
token | AN | El código de la transacción.
codigo_respuesta | AN | El código de la respuesta.
mensaje_respuesta | AN | El mensaje de respuesta.

