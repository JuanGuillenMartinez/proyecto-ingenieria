$(document).ready(function() {
    obtenerIdPaqueteCarrito();
});
function mostrarPaqueteCarrito(id) {
    var id = id;
    $.ajax({
        url: "/php/ObtenerPaqueteId.php",
        type: "POST",
        async: true,
        data: {
            idPaquete: id
        },
        success: function (response) {
            var respuesta = JSON.parse(response);
            var paquete = respuesta.data;
            $("#imgCart").attr("src", paquete.url_imagen);
            $("#lblNombrePaquete").html(paquete.nombre_paquete);
            $("#inputPrecioPaquete").val(paquete.precio_paquete);
            $("#inputSubtotal").val(paquete.precio_paquete);
            $("#inputDescuento").val(paquete.precio);
            $("#inputTotal").val(paquete.precio_final);
        },
    });
}
function obtenerIdPaqueteCarrito() {
    $.ajax({
        url: "/php/ObtenerPaqueteCarritoId.php",
        async: true,
        success: function (response) {
            var respuesta = JSON.parse(response);
            var id = respuesta.id;
            mostrarPaqueteCarrito(id);
        }
    });
}