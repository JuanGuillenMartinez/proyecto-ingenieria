$("#enviar").on("click",function(e) {
    pagarCarrito();
    document.location.href = '/index.php';
});
function pagarCarrito() {
    $.ajax({
        url: "/php/PagarPaqueteCarrito.php",
        async: true,
        success: function (response) {
            var respuesta = JSON.parse(response);
            alert(respuesta.estado);
        },
    });
}