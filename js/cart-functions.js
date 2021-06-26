$(document).ready(function() {
    mostrarPaqueteCarrito();
});
function mostrarPaqueteCarrito() {
    $.ajax({
        url: "/php/ObtenerPaqueteCarritoId.php",
        async: true,
        success: function (response) {
            var respuesta = JSON.parse(response);
            var paquete = respuesta.data;
            $("#imgCart").attr("src", paquete.url_imagen);
            $("#lblNombrePaquete").html(paquete.nombre_paquete);
            $("#inputPrecioPaquete").val(paquete.precio_paquete);
            $("#inputSubtotal").val(paquete.precio_paquete);
            $("#inputDescuento").val(paquete.descuento);
            $("#inputTotal").val(paquete.precio_final);
            $("#precio_pagar").html("$"+paquete.precio_final);
        },
    });
}