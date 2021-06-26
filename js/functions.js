var contadorCarrito = 1;
$(document).ready(function() {
    mostrarCarruselPaquetes();
    escucharCarrusel();
});

function iniciarCarrusel() {
    $(function(){
        $('.bxslider').bxSlider({
          mode: 'fade',
          captions: true
        });
      });
}
function mostrarCarruselPaquetes() {
    $.ajax({
        url: "/php/ObtenerPaquetes.php",
        success: function(data) {
            iniciarCarrusel();
            var obj = JSON.parse(data);
            llenarCarrusel(obj.data);
        }
    });
}

function llenarCarrusel(arreglo) {
    arreglo.forEach(function(value) {
        var nombrePaquete = value.nombre_paquete;
        var img = value.url_imagen;
        var idPaquete = value.id_paquete;
        var list = $(`<li><img alt="${idPaquete}" id="imgCarrusel" src="${img}" title="${nombrePaquete}" height="500px" width="800px"></li>`);
        $('.bxslider').append(list);
    });
}
function escucharCarrusel(data) {
    $(".bxslider").on("click", "#imgCarrusel", function(e) {
        var id = $(this).attr("alt");
        mostrarInformacionPaqueteId(id);
    });
}
function mostrarInformacionPaqueteId(id) {
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
            $("#img-paquete-modal").attr("src", paquete.url_imagen);
            $("#img-paquete-modal").attr("alt", paquete.id_paquete);
            $("#titulo-modal").html(paquete.nombre_paquete);
            $("#input-nombre-paquete").val(paquete.nombre_paquete);
            $("#input-origen").val(paquete.origen_vuelo);
            $("#input-destino").val(paquete.destino_vuelo);
            $("#input-precio").val(paquete.precio_paquete);
            $('#modalInformacionPaquete').modal('show');
        },
    });
}
function agregarPaqueteCarrito() {
    if(contadorCarrito>1) {
        alert("Solo se puede agregar un paquete al carrito");
    } else {
        var id = $("#img-paquete-modal").attr("alt");
        $.ajax({
            url: "/php/AgregarPaqueteCarrito.php",
            type: "POST",
            async: true,
            data: {
                idPaquete: id
            },
            success: function (response) {
                alert("Paquete agregado correctamente");
                contadorCarrito++;
            },
        });
    }
}