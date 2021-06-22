$("document").ready(function() {
    $.ajax({
        url: "/php/ObtenerPaqueteCarritoId.php",
        success: function (response) {
            var respuesta = JSON.parse(response);
            $("#lblNombrePaquete").html(respuesta.id);
        },
    });
});