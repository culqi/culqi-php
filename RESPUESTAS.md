
# Respuestas

##Validación de una venta
Al validar una venta puedes recibir las siguientes respuestas:

Tipo | Código | Mensaje | Mensaje Usuario
--------- | --------- | ------- | -----------
|| 001 | El código de comercio es inválido. | 
|| 002 | El comercio no fue encontrado. | 
|| 003 | El comercio no existe. | 
|| 004 | El comercio no tiene una llave activa. | 
|| 005 | El comercio no está activo. | 
|| 006 | El número de pedido es inválido. | 
|| 007 | La información del comercio no coincide con la enviada. | 
|| 008 | El código de moneda enviado es inválido. | 
|| 009 | La moneda no existe. | 
|| 010 | El comercio no puede aceptar la moneda enviada. | 
|| 011 | El código de país es inválido. | 
|| 012 | El nombre de la ciudad es inválido. | 
|| 013 | La dirección es inválida. | 
|| 014 | El número de teléfono es inválido. | 
|| 015 | El correo electrónico es inválido. | 
|| 016 | Los apellidos son inválidos. | 
|| 017 | Los nombres son inválidos. | 
|| 018 | La transacción ya existe. | 
|| 019 | El monto no es válido. | 
|| 020 | La transaccion no existe. | 
|| 021 | La transacción ya fue autorizada. | 
|| 022 | La transacción ha expirado. | 
|| 023 | El producto no existe. | 
|| 024 | La transacción no ha sido autorizada | 
|| 025 | La información enviada no pudo ser descifrada. | 
|| 026 | El objeto de la venta no pudo ser mapeado. | 
|| 027 | No se enviaron todos los campos obligatorios. | 
|| 028 | La transacción no pudo ser anulada | 
|| 029 | La transacción ha expirado. | 
|| 030 | El número de tarjeta es inválido. | 
|| 031 | Ocurrió un error en el procesamiento. | 
|validacion_exitosa| 100 | Venta creada exitosamente. | 

##Pago de una venta
Al pagar una venta puedes recibir las siguientes respuestas:

Tipo | Código | Mensaje | Mensaje Usuario
--------- | --------- | ------- | -----------
|venta_exitosa| 101 | Venta realizada exitosamente. | 


##Consulta de una venta
Al consultar una venta puedes recibir las siguientes respuestas:

Tipo | Código | Mensaje | Mensaje Usuario
--------- | --------- | ------- | -----------
|consulta_exitosa| 102 | Venta consultada exitosamente. | 

##Anulación de una venta
Al anular una venta puedes recibir las siguientes respuestas:

Tipo | Código | Mensaje | Mensaje Usuario
--------- | --------- | ------- | -----------
|anulacion_exitosa| 103 | Venta anulada exitosamente. | 