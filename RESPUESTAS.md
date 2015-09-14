
# Respuestas

##Validación de una venta
Al validar una venta puedes recibir las siguientes respuestas:

Tipo | Código | Mensaje | Mensaje Usuario
--------- | --------- | ------- | -----------
|| 001 | El código de comercio es inválido.
|error_procesamiento| 002 | El comercio no fue encontrado.
|error_procesamiento| 003 | El comercio no existe.
|error_procesamiento| 004 | El comercio no tiene una llave activa.
|error_procesamiento| 005 | El comercio no está activo. 
|parametro_invalido| 006 | El número de pedido es inválido.
|error_procesamiento| 007 | La información del comercio no coincide con la enviada. 
|parametro_invalido| 008 | El código de moneda enviado es inválido.
|error_procesamiento| 009 | La moneda no existe.
|parametro_invalido| 010 | El comercio no puede aceptar la moneda enviada.
|parametro_invalido| 011 | El código de país es inválido.
|parametro_invalido| 012 | El nombre de la ciudad es inválido.
|parametro_invalido| 013 | La dirección es inválida.
|parametro_invalido| 014 | El número de teléfono es inválido.
|parametro_invalido| 015 | El correo electrónico es inválido. 
|parametro_invalido| 016 | Los apellidos son inválidos.
|parametro_invalido| 017 | Los nombres son inválidos. 
|error_procesamiento| 018 | La transacción ya existe. 
|parametro_invalido| 019 | El monto es inválido.
|error_procesamiento| 020 | La transaccion no existe.
|error_procesamiento| 021 | La transacción ya fue autorizada.
|error_procesamiento| 022 | La transacción ha expirado.
|parametro_invalido| 023 | El producto no existe.
|error_procesamiento| 024 | La transacción no ha sido autorizada.
|error_procesamiento| 025 | La información enviada no pudo ser descifrada.
|error_procesamiento| 026 | No se pudo leer la información de la venta.
|error_procesamiento| 027 | No se enviaron todos los campos obligatorios.
|error_procesamiento| 028 | La transacción no pudo ser anulada.
|error_procesamiento| 029 | La transacción ha expirado.
|error_procesamiento| 030 | El número de tarjeta es inválido.
|error_procesamiento| 031 | Ocurrió un error en el procesamiento.
|validacion_exitosa| 100 | Venta creada exitosamente.

##Pago de una venta
Al pagar una venta puedes recibir las siguientes respuestas:

Tipo | Código | Mensaje | Mensaje Usuario
--------- | --------- | ------- | -----------
|venta_exitosa| 101 | Venta realizada exitosamente.


##Consulta de una venta
Al consultar una venta puedes recibir las siguientes respuestas:

Tipo | Código | Mensaje | Mensaje Usuario
--------- | --------- | ------- | -----------
|consulta_exitosa| 102 | Venta consultada exitosamente.

##Anulación de una venta
Al anular una venta puedes recibir las siguientes respuestas:

Tipo | Código | Mensaje | Mensaje Usuario
--------- | --------- | ------- | -----------
|anulacion_exitosa| 103 | Venta anulada exitosamente.
