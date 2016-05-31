/**
 * Envía un string en formato JSON con el método POST
 *
 * @param string url
 * @param string data
 * @param function success (optional)
 * @return object
 */
function PostData(url, data, success)
{
    // Devuelve la respuesta del servidor luego de enviarse la petición
    this.respuesta = function () {
        return xhttp.responseText;
    };
    // Si success no está definido, se le da un valor de undefined
    success = success || undefined;
    // Se crea una petición que será enviada a la url
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            console.log('Información enviada al servidor.');
            if (!(success === undefined)) {
                success();
            }
        }
    };
    // Define el método de envío y envía los datos
    xhttp.open('POST', url, true);
    xhttp.send(data);
}

/**
 * Envía una petición POST con información y redirige a la url
 *
 * @param string url
 * @param string json
 */
function post(url, json)
{
    // Convertimos el json en un objeto
    var obj = JSON.parse(json);
    // Creamos un array con los nombres de las propiedades del objeto
    var objKeys = Object.keys(obj);
    // Creamos elementos <input> con el name=clave y value=valor del objeto
    var inputs = [];
    for (i = 0; i < objKeys.length; i++) {
        inputs[i] = document.createElement('INPUT');
        inputs[i].name = objKeys[i];
        inputs[i].value = obj[objKeys[i]];
    }

    var form = document.createElement('FORM');
    form.action = url;
    form.method = 'post';

    for (i = 0; i < objKeys.length; i++) {
        form.appendChild(inputs[i]);
    }

    form.submit();
}
