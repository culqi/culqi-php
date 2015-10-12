### Respuestas en la creación de una venta

| ESTADO | CODIGO RESPUESTA | MENSAJE |                                                                                                                                                                      
|-----------------|------------------|---------------------|
| En Proceso | REG0000 | Venta creada exitosamente. | 
| Rechazada | INV0001 | El código de comercio es inválido. | 
| Rechazada | INV0002 | El comercio no fue encontrado. | 
| Rechazada | INV0003 | El comercio no tiene una llave activa. | 
| Rechazada | INV0004 | El comercio no está activo. | 
| Rechazada | INV0005 | El número de pedido es inválido. | 
| Rechazada | INV0006 | La información del comercio no coincide con la enviada. | 
| Rechazada  | INV0007 | El código de moneda enviado es inválido. | 
| Rechazada  | INV0008 | La moneda no existe. | 
| Rechazada  | INV0009 | El comercio no puede aceptar la moneda enviada |
| Rechazada  | INV0010 | El código de país es inválido. | 
| Rechazada  | INV0011 | La dirección es inválida. | 
| Rechazada  | INV0012 | El número de teléfono es inválido. | 
| Rechazada  | INV0013 | El correo electrónico es inválido. | 
| Rechazada  | INV0014 | Los apellidos son inválidos. | 
| Rechazada  | INV0015 | Los nombres son inválidos. | 
| Rechazada  | INV0016 | La transacción ya existe. | 
| Rechazada  | INV0017 | El monto es inválido. | 
| Rechazada  | INV0018 | La transaccion no existe. | 
| Rechazada  | INV0019 | La transacción ya fue autorizada. | 
| Rechazada  | INV0020 | La transacción ha expirado. | 
| Rechazada  | INV0021 | El producto enviado no existe. | 
| Rechazada  | INV0022 | La transacción no ha sido autorizada. | 
| Rechazada  | INV0023 | La información enviada no pudo ser descifrada. | 
| Rechazada  | INV0024 | No se pudo leer la información de la venta. | 
| Rechazada  | INV0025 | Parámetros recibidos inválidos | 
| Rechazada  | INV0026 | El parámetro 'moneda' no puede ser nulo o vacio. | 
| Rechazada  | INV0027 | El parámetro 'moneda' debe de tener solo 3 caracteres alfabéticos en mayúsculas. | 
| Rechazada  | INV0028 | El parámetro 'monto' no puede ser nulo o vacio. | 
| Rechazada  | INV0029 | El parámetro 'monto' debe de tener solo entre 3 y 15 caracteres numéricos. | 
| Rechazada  | INV0030 | El parámetro 'codigo_comercio' no puede ser nulo o vacio. | 
| Rechazada  | INV0031 | El parámetro 'codigo_comercio' debe de tener máximo 12 caracteres. | 
| Rechazada  | INV0032 | El parámetro 'descripcion' no puede ser nulo o vacio. | 
| Rechazada  | INV0033 | El parámetro 'descripcion' debe de tener entre 5 y 80 caracteres. | 
| Rechazada  | INV0034 | El parámetro 'numero_pedido' no puede ser nulo o vacio. | 
| Rechazada  | INV0035 | El parámetro 'numero_pedido' debe de tener entre 1 y 33 caracteres. | 
| Rechazada  | INV0036 | El parámetro 'cod_pais' no puede ser nulo o vacio. | 
| Rechazada  | INV0037 | El parámetro 'cod_pais' debe de tener solo 2 caracteres alfabéticos. | 
| Rechazada  | INV0038 | El parámetro 'direccion' no puede ser nulo o vacio. | 
| Rechazada  | INV0039 | El parámetro 'direccion' debe de tener entre 5 y 100 caracteres. | 
| Rechazada  | INV0040 | El parámetro 'ciudad' no puede ser nulo o vacio. | 
| Rechazada  | INV0041 | El parámetro 'ciudad' debe de tener entre 2 y 30 caracteres. | 
| Rechazada  | INV0042 | El parámetro 'num_tel' no puede ser nulo o vacio. | 
| Rechazada  | INV0043 | El parámetro 'num_tel' debe de tener entre 5 y 15 caracteres | 
| Rechazada  | INV0044 | El parámetro 'nombres' no puede ser nulo o vacio. | 
| Rechazada  | INV0045 | El parámetro 'nombres' debe de tener entre 2 y 15 caracteres | 
| Rechazada  | INV0046 | El parámetro 'nombres' debe de tener un nombre válido. | 
| Rechazada  | INV0047 | El parámetro 'apellidos' no puede ser nulo o vacio. | 
| Rechazada  | INV0048 | El parámetro 'apellidos' debe de tener entre 2 y 15 caracteres | 
| Rechazada  | INV0049 | El parámetro 'apellidos' debe de tener un apellido válido | 
| Rechazada  | INV0050 | El parámetro 'correo_electronico' no puede ser nulo o vacio. | 
| Rechazada  | INV0051 | El parámetro 'correo_electronico' tiene que ser un email válido | 
| Rechazada  | INV0052 | El parámetro 'correo_electronico' debe de tener entre 5 y 50 caracteres | 
| Rechazada  | INV0053 | El parámetro 'id_usuario_comercio' no puede ser nulo o vacio. | 
| Rechazada  | INV0054 | El parámetro 'id_usuario_comercio' debe de tener entre 2 y 20 caracteres | 
| Rechazada  | INV9999 | Ha sucedido alguna excepción inesperada | 

### Respuestas en pago de una venta

| ESTADO | CODIGO RESPUESTA | MENSAJE | MENSAJE SUGERIDO AL COMPRADOR |                                                                                                                                                                      
|-----------------|------------------|------------------|------------------|
|Exitosa|AUT0000| La operación de venta ha sido autorizada exitosamente| Su compra ha sido exitosa. | 
| Rechazada | DNGE0001 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0002 | Exceso de actividad. | El emisor tiene exceso de procesamiento, intente nuevamete en algunos minutos. | 
| Rechazada | DNGE0003 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0004 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0005 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0006 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0007 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0008 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0009 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0010 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0011 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0012 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0013 | Contactar con entidad emisora de su tarjeta. | Contáctese con la entidad emisora de su tarjeta. | 
| Rechazada | DNGE0014 | Código de seguridad inválido. | Su tarjeta es inválida. Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0015 | Fondos Insuficientes. | Su tarjeta no tiene fondos suficientes. Recárgela o intente con otra tarjeta. |
| Rechazada | DNGE0016 | La tarjeta es cuotas. | Su tarjeta solo soporta pago en cuotas. Seleccione una cuota ó intente con otra tarjeta. |                                                                                                           | Rechazada | DNGE0017 | La tarjeta ha superado la cantidad máxima de transacciones en el día. | Su tarjeta superó el número de compras permitidas. Intente nuevamente con otra tarjeta. |
| Rechazada | DNGE0018 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |  
| Rechazada | DNGE0019 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. | 
| Rechazada | DNGE0020 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |  
| Rechazada | DNGE0021 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. | 
| Rechazada | DNGE0022 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |                                               
| Rechazada | DNGE0023 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. | 
| Rechazada | DNGE0024 | Retener tarjeta. | Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0025 | Tarjeta con restricciones de crédito. | Su tarjeta tiene restricciones. Contáctese con la entidad emisora de su tarjeta. |  
| Rechazada | DNGE0026 | Tarjeta con restricciones de débito. | Su tarjeta tiene restricciones. Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0027 | Tarjeta no autenticada. | Su tarjeta no ha podido ser autenticada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0028 | Tarjeta restringida. | Su tarjeta tiene restricciones. Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0029 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta.|
| Rechazada | DNGE0030 | Tarjeta reportada como perdida. | Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0031 | Tarjeta reportada como robada. | Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0032 | Operación no permitida para esta tarjeta. | Operación no permitida para esta tarjeta. Contáctese con la entidad emisora de su tarjeta. |                                                                                                           | Rechazada | DNGE0033 | Operación no permitida para esta tarjeta. | Operación no permitida para esta tarjeta. Contáctese con la entidad emisora de su tarjeta. |                                                                                                           | Rechazada | DNGE0034 | Operación no permitida para esta tarjeta. | Operación no permitida para esta tarjeta. Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0035 | Tarjeta Inválida. | Su tarjeta es inválida. Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0036 | Tarjeta Inválida. | Su tarjeta es inválida. Contáctese con la entidad emisora de su tarjeta. |
| Rechazada | DNGE0037 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0038 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0039 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0040 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0041 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0042 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0043 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. | 
| Rechazada | DNGE0044 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0045 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0046 | Operación denegada por emisor | Operación denegada por la entidad emisora de su tarjeta. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0047 | Código de seguridad (CVV) no coincide | El código de seguridad (CVV) de su tarjeta es inválido. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0048 | Código de seguridad (CVV) no procesado por la entidad emisora de la tarjeta | El código de seguridad (CVV) no ha podido ser procesado. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0049 | Código de seguridad (CVV) no procesado por la entidad emisora de la tarjeta | El código de seguridad (CVV) no ha podido ser procesado. Intente nuevamente ó utilice otra tarjeta. |                                                                                                           | Rechazada | DNGE0050 | Código de seguridad (CVV) no ingresado | El código de seguridad (CVV) no ha sido ingresado. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0051 | Código de seguridad (CVV) no reconocido por la entidad emisora de la tarjeta | El código de seguridad (CVV) de su tarjeta no es reconocido. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGE0052 | Tarjeta vencida. | Su tarjeta esta vencida. Contáctese con su emisor de tarjeta ó intente nuevamente con otra tarjeta. |
| Rechazada | DNGE0053 | Tarjeta vencida. | Su tarjeta esta vencida. Contáctese con su emisor de tarjeta ó intente nuevamente con otra tarjeta. |
| Rechazada | DNGA9999 | "La transaccion no ha sido exitosa, denegación genérica." | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0001 | La tarjeta no es de la marca VISA | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0002 | La tarjeta es inválida | Su tarjeta es inválida. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0003 | Error en formato interno | "Por favor, intente nuevamente ó utilice otra tarjeta. " |
| Rechazada | DNGA0004 | Transaccion inválida | "Por favor, intente nuevamente ó utilice otra tarjeta. " |
| Rechazada | DNGA0005 | Tarjeta vencida. | Su tarjeta esta vencida. Contáctese con su emisor de tarjeta ó intente nuevamente con otra tarjeta. |
| Rechazada | DNGA0006 | Tarjeta excede monto maximo de compra | Su tarjeta excedió el monto por compra. Intente nuevamente con otra tarjeta. |
| Rechazada | DNGA0007 | "El Emisor no responde, no procesa." | "Por favor, intente nuevamente ó utilice otra tarjeta. " |
| Rechazada | DNGA0008 | "El Adquirente no responde, no procesa." | "Por favor, intente nuevamente ó utilice otra tarjeta. " |
| Rechazada | DNGA0009 | Contactar con el comercio. | "Operación denegada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0010 | El monto de la transacción supera el valor máximo permitido para operaciones virtuales. | El monto de la compra supera el valor máximo permitido. Contáctese con el Comercio. |
| Rechazada | DNGA0011 | El monto de la transacción supera el valor máximo permitido. | El monto de la compra supera el valor máximo permitido. Contáctese con el Comercio. |
| Rechazada | DNGA0012 | El monto de la transacción no llega al mínimo permitido. | El monto de la compra no llega al mínimo permitido. Contáctese con el Comercio. |
| Rechazada | DNGA0013 | El comercio ha superado la cantidad máxima de transacciones en el día. | Operación denegada. Contáctese con el Comercio. |
| Rechazada | DNGA0014 | Módulo antifraude | Operación denegada. Contáctese con el Comercio. |
| Rechazada | DNGA0015 | Módulo antifraude | Operación denegada. Contáctese con el Comercio. |
| Rechazada | DNGA0016 | Respuesta del módulo antifraude inválida. | "Operación denegada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0017 | No hay respuesta del módulo antifraude. | "Operación denegada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0018 | Violación de seguridad. | "Operación denegada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0019 | "Comercio mal configurado, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0020 | Error interno en el adquirente. | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0021 | Error interno en el adquirente. | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0022 | Error interno en el adquirente. | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0023 | Error interno en el adquirente. | Operación denegada. Intente nuevamente. |
| Rechazada | DNGA0024 | Entidad emisora de la tarjeta no disponible para la autorización. | Operación denegada. Su entidad emisora no esta disponible. Intente nuevamente ó utilice otra tarjeta.
| Rechazada | DNGA0025 | Entidad emisora de la tarjeta no disponible para la autenticación. | Operación denegada. Su entidad emisora no esta disponible. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0026 | Transacción duplicada. | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0027 | Comunicación duplicada. | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0028 | Formato de mensaje erroneo. | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0029 | "Error en el envío de parámetros, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0030 | "Número de pedido del comercio duplicado, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0031 | "Comercio inhabilitada, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0032 | "El comercio no está configurado, contactar a CULQI. " | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0033 | Se canceló/interrumpio el proceso de pago. | La compra no ha podido ser procesada. Intente nuevamente. |
| Rechazada | DNGA0034 | "Sin respuesta del autorizador, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." | |  |  | Rechazada | DNGA0035 | eTicket inválido. | "La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0036 | Valor ECI inválido. | "La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0037 | No activó la opción enviar al autorizador. | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0038 | Intento de pago fuera del tiempo permitido. | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0039 | Datos originales distintos. | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0040 | Código de referencia repetido. | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0041 | Transaccción inválida. | "Por favor, intente nuevamente ó utilice otra tarjeta. " |
| Rechazada | DNGA0042 | Emisor inválido. | Operación denegada. Su entidad emisora no esta disponible. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0043 | Transaccion no permitida. | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0044 | "Cuenta del comercio "from", invalida o no existe." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0045 | No se puede enrutar la transaccion. | "La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0046 | "El ciclo de vida de la autorizacion, es invalida." | "La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0047 | Cuenta del comercio invalida o no existe (General). | "La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0048 | Cuenta del comercio "to", invalida o no existe. | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0049 | Monto Invalido. | "El monto de su compra es inválido. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0050 | "Sistema No disponible, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." | 
| Rechazada | DNGA0051 | "Permiso Denegado, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0052 | "Llave Denegada, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0053 | Número de Referencia Invalido | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0054 | Fecha de Expiracion Invalida. | La fecha de expiración de su tarjeta es inválida. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0055 | "Moneda Invalida, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio. |
| Rechazada | DNGA0056 | "Fecha Invalida, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio. |
| Rechazada | DNGA0057 | "Hora Invalida, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio. |
| Rechazada | DNGA0058 | Diferido Invalido | El diferido de su compra es inválido. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0059 | Cuota Invalida | La cuota de su compra es inválida. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0060 | Monto Invalido | "El monto de su compra es inválido. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio. |
| Rechazada | DNGA0061 | Tarjeta de Credito Invalida. | Su tarjeta es inválida. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0062 | Comercio Invalido, contactar a CULQI. | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0063 | Mensaje del protocolo de autenticación SecureCode | La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. |                                                                                                           | Rechazada | DNGA0064 | Error de cifrado A, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0065 | "Error de cifrado B, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0066 | Marca Inválida | La marca de su tarjeta es inválida. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0067 | Proceso Inválido | La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. | 
| Rechazada | DNGA0068 | El Numero de Referencia es inválido | La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. | 
| Rechazada | DNGA0069 | "Número de Tarjeta vacío, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio." | 
| Rechazada | DNGA0070 | Número de Referencia Duplicada | Operación denegada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0071 | "Error de Procesamiento, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0072 | Error de Validación | La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. | 
| Rechazada | DNGA0073 | "El tipo de proceso es inválido, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0074 | "El tipo de proceso es inválido, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0075 | "El código cliente es inválido, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0076 | "El código país es inválido, contactar a CULQI." | "La compra no ha podido ser procesada. Intente nuevamente. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0077 | Código de seguridad (CVV) es inválido. | El código de seguridad (CVV) de su tarjeta es inválido. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0078 | Código de seguridad (CVV) es inválido. | El código de seguridad (CVV) de su tarjeta es inválido. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0079 | Fecha de Expiracion Inválida. | La fecha de expiración de su tarjeta es inválida. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | DNGA0080 | Monto Inválido. | "El monto de su compra es inválido. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio." |
| Rechazada | DNGA0081 | Monto Inválido. | "El monto de su compra es inválido. Intente nuevamente ó utilice otra tarjeta. Si el problema persiste, contáctese con el Comercio."                                                                             | Rechazada | DNGA0082 | Cuota Invalida. | La cuota de su compra es inválida. Intente nuevamente ó utilice otra tarjeta. |                                                                                                           | Rechazada | DNGA0083 | "Codigo de Comercio Facilitador ausente, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | DNGA0084 | Tarjeta vencida. | Su tarjeta esta vencida. Contáctese con su emisor de tarjeta ó intente nuevamente con otra tarjeta. |
| Rechazada | DNGI0001 | Operacion denegada. | La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | REC0001 | Revisar configuración del comercio, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | REC0002 | Marca Inválida. | La marca de su tarjeta es inválida. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | REC0003 | El Email ingresado por el comprador, es inválido." | "El correo electrónico que ingresó, es inválido. Inténtelo nuevamente." |
| Rechazada | REC0004 | El Email ingresado por el comprador, es inválido." | "El correo electrónico que ingresó, es inválido. Inténtelo nuevamente." | 
| Rechazada | REC0005 | El Nombre ingresado por el comprador, es inválido." | "El nombre que ingresó, es inválido. Inténtelo nuevamente. |
| Rechazada | REC0006 | El Nombre ingresado por el comprador, es inválido." | "El nombre que ingresó, es inválido. Inténtelo nuevamente." |
| Rechazada | REC0007 | El Apellido ingresado por el comprador, es inválido. | El apellido que ingresó, es inválido. Inténtelo nuevamente. |
| Rechazada | REC0008 | El Apellido ingresado por el comprador, es inválido." | El apellido que ingresó es inválido. Inténtelo nuevamente. | 
| Rechazada | REC0009 | El Número de tarjeta ingresado por el comprador, es inválido." | "El número de tarjeta que ingresó, es inválido. Inténtelo nuevamente." |  |  | 
| Rechazada | REC0010 | El año de expiración de la tarjeta ingresada por el comprador es inválido." | "El año de expiración de su tarjeta que ingresó es inválido. Inténtelo nuevamente." | 
| Rechazada | REC0011 | El año de expiración de la tarjeta ingresada por el comprador es inválido." | "El año de expiración de su tarjeta que ingresó es inválido. Inténtelo nuevamente." | 
| Rechazada | REC0012 | El año de expiración de la tarjeta ingresada por el comprador es inválido." | "El año de expiración de su tarjeta que ingresó es inválido. Inténtelo nuevamente." | 
| Rechazada | REC0013 | El mes de expiración de la tarjeta ingresada por el comprador es inválido." | "El mes de expiración de su tarjeta que ingresó es inválido. Inténtelo nuevamente." | 
| Rechazada | REC0014 | El mes de expiración de la tarjeta ingresada por el comprador es inválido." | "El mes de expiración de su tarjeta que ingresó  es inválido. Inténtelo nuevamente." |
| Rechazada | REC0015 | El mes de expiración de la tarjeta ingresada por el comprador es inválido." | "El mes de expiración de su tarjeta que ingresó es inválido. Inténtelo nuevamente." |
| Rechazada | REC0016 | El codigo de seguridad (CVV) de la tarjeta ingresada por el comprador es inválido." | "El código de seguridad (CVV) de su tarjeta que ingresó es inválido. Inténtelo nuevamente." |  |  | 
| Rechazada | REC0017 | El codigo de seguridad (CVV) de la tarjeta ingresada por el comprador es inválido." | "El código de seguridad (CVV) de su tarjeta que ingresó es inválido. Inténtelo nuevamente." |  |  | 
| Rechazada | REC0018 | Ausencia de campo de verificación.  | No se pudo iniciar el proceso de compra con su tarjeta. Inténtelo nuevamente. | 
| Rechazada | REC0019 | "Falta configurar al comercio, contactar a CULQI. | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | REC0020 | Número de tarjeta inválido. | Su número de tarjeta es inválida. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | INC0001 | "Error inesperado, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | INC0002 | "Error de comunicación, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | INC0003 | "Error de comunicación, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | INC0004 | "Codigo nuevo interno, contactar a CULQI." | La compra no ha podido ser procesada. Intente nuevamente ó utilice otra tarjeta. |
| Rechazada | INC0005 | "Error de comunicación, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | INC0006 | "Error de comunicación, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |
| Rechazada | INC0007 | "Error inesperado, contactar a CULQI." | La compra no ha podido ser procesada. Intente más tarde o contáctese con el comercio. |

### Respuestas en la anulación de una venta

| ESTADO | CODIGO RESPUESTA | MENSAJE |                                                                                                                                                                      
|-----------------|------------------|---------------------|
| Devuelta | ANU0000 | La transacción ha sido anulada exitosamente con el emisor. | 
| Exitosa | ANU0001 | La transacción no ha podido ser anulada. |
| Exitosa | ANU0002 | El código de autorización es inválido. | 
| Exitosa | ANU0003 | El código de operación es inválido, contactar a CULQI. | 
| Exitosa | ANU0004 | El mensaje procesado es inválido, contactar a CULQI. |                       
| Exitosa | ANU0005 | El mensaje procesado es inválido, contactar a CULQI. |                       
| Exitosa | ANU0006 | El mensaje procesado es inválido, contactar a CULQI. |                       
| Exitosa | ANU0007 | El mensaje procesado es inválido, contactar a CULQI. |                       
| Exitosa | ANU0008 | El mensaje procesado es inválido, contactar a CULQI. |                       
| Exitosa | ANU0009 | El mensaje procesado es inválido, contactar a CULQI. |                       
| Exitosa | ANU0010 | No se realizó la operación, contactar a CULQI. |
| Exitosa | ANU0011 | La transacción ya fue anulada con anterioridad. |                      
| Exitosa | ANU0012 | El mensaje enviado es inválido, contactar a CULQI. | 
| Exitosa | ANU0013 | La transacción no existe.| 
| Exitosa | ANU0014 | El mensaje enviado es inválido, contactar a CULQI. | 
| Exitosa | ANU0015 | Error de comunicación, contactar a CULQI. |                       
| Exitosa | ANU0016 | Error de comunicación, contactar a CULQI. |
| Exitosa | ANU0017 | Error inesperado, contactar a CULQI. |
| Exitosa | ANU0018 | El comercio no existe. | 
| Exitosa | ANU0019 | Error en la petición, contactar a CULQI. |                       
| | ANU0020 | La transacción no existe.| 
| Exitosa | ANU0021 | Error de comunicación, contactar a CULQI. |                       
| Exitosa | ANU0022 | Error de comunicación, contactar a CULQI. |                       
| |  ANU0023 | La transacción no se encuentra autorizada, por ende no se puede anular.| 
| Autorizada | ANU9999 | No se realizó la operación, contactar a CULQI. | 
| Exitosa | DEP0000 | La transaccion a sido enviada a anular exitosamente. | 
| Exitosa | DEP0001 | La transacción no puso ser enviada a anular exitosamente. | 
| Exitosa | DEP0002 | El código de autorización es inválido. |
| Exitosa | DEP0003 | El código de operación es inválido, contactar a CULQI. | 
| Exitosa | DEP0004 | El mensaje procesado es inválido, contactar a CULQI. | 
| Exitosa | DEP0005 | El mensaje procesado es inválido, contactar a CULQI. | 
| Exitosa | DEP0006 | El mensaje procesado es inválido, contactar a CULQI. | 
| Exitosa | DEP0007 | El mensaje procesado es inválido, contactar a CULQI. | 
| Exitosa | DEP0008 | El mensaje procesado es inválido, contactar a CULQI. | 
| Exitosa | DEP0009 | El mensaje procesado es inválido, contactar a CULQI. | 
| Exitosa | DEP0010 | El mensaje procesado es inválido, contactar a CULQI. | 
| Exitosa | DEP0011 | El mensaje procesado es inválido, contactar a CULQI. |
| Exitosa | DEP0012 | Error de comunicación, contactar a CULQI. |                       
| Exitosa | DEP0013 | Error de comunicación, contactar a CULQI. |                       
| Exitosa | DEP0014 | Error inesperado, contactar a CULQI. |                       
| Exitosa | DEP9999 | No se realizó la operación, contactar a CULQI.| 
