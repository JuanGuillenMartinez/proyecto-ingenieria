$(document).ready(function () {
    mostrarRegistros();
    escucharBotonIngresar();
    escucharBotonBuscar();
    escucharBotonInformacion();
    escucharBotonGuardar();
    escucharBotonEliminar();
    escucharBotonEditar();
    escucharCheckbox();
});

function mostrarRegistroId(id) {
    $.ajax({
        url: "/php/ObtenerPaqueteId.php",
        method: "POST",
        async: true,
        data: {
            idPaquete: id,
        },
        success: function (response) {
            var respuesta = JSON.parse(response);
            var element = respuesta.data;
            var noticiaHtml = `<tr>
                                        <td scope="row">${element.id_paquete}</td>
                                        <td>${element.nombre_paquete}</td>
                                        <td>${element.precio_paquete}</td>
                                        <td>${element.precio_final}</td>
                                        <td>${element.descuento}</td>
                                        <td>${element.aerolinea}</td>
                                        <td>${element.origen_vuelo}</td>
                                        <td>${element.destino_vuelo}</td>
                                        <td><button id="btnInformacion" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalInformacion">Información</button></td>
                                        </tr>`;
            $("#rowsContact").html(noticiaHtml);
        },
    });
}

function mostrarRegistros() {
    $.ajax({
        url: "/php/ObtenerPaquetes.php",
        method: "POST",
        async: true,
        success: function (response) {
            var registros = JSON.parse(response);
            registros.data.forEach((element) => {
                var noticiaHtml = `<tr>
                                        <td scope="row">${element.id_paquete}</td>
                                        <td>${element.nombre_paquete}</td>
                                        <td>${element.precio_paquete}</td>
                                        <td>${element.precio_final}</td>
                                        <td>${element.descuento}</td>
                                        <td>${element.aerolinea}</td>
                                        <td>${element.origen_vuelo}</td>
                                        <td>${element.destino_vuelo}</td>
                                        <td><button id="btnInformacion" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalInformacion">Información</button></td>
                                        </tr>`;
                $("#rowsContact").append(noticiaHtml);
            });
        },
    });
}

function guardarRegistro() {
    var titulo = $("#inputTitulo").val();
    var descripcion = $("#inputDescripcion").val();
    var encabezado = $("#inputEncabezado").val();
    var idUsuario = $("#inputUsuario").val();
    var fecha = $("#inputFechaPublicacion").val();
    var idEtiqueta = $("#inputEtiqueta").val();
    $.ajax({
        url: "/php/ColeccionNoticias.php",
        method: "POST",
        async: true,
        data: {
            intent: "registrar",
            titulo: titulo,
            descripcion: descripcion,
            encabezado: encabezado,
            idUsuario: idUsuario,
            fechaPublicacion: fecha,
            idEtiqueta: idEtiqueta,
        },
        success: function (response) {
            var obj = response;
            console.log(obj);
            $("#modalInformacion").modal("hide");
            $("#tblContact > tbody").empty();
            mostrarRegistros();
        },
    });
}

function mostrarInformacionRegistro(id) {
    obtenerVuelos();
    $.ajax({
        url: "/php/ObtenerPaqueteId.php",
        method: "POST",
        async: false,
        data: {
            idPaquete: id,
        },
        success: function (response) {
            var respuesta = JSON.parse(response);
            var arrayRegistro = respuesta.data;
            $("#img-paquete-modal").attr("src", arrayRegistro.url_imagen);
            $("#inputIdPaquete").val(arrayRegistro.id_paquete);
            $("#inputNombre").val(arrayRegistro.nombre_paquete);
            $("#inputPrecioPaquete").val(arrayRegistro.precio_paquete);
            $("#inputPrecioFinal").val(arrayRegistro.precio_final);
            $("#inputDescuento").val(arrayRegistro.descuento);
            $("#dropdownAerolinea").html(arrayRegistro.aerolinea);
            $("#inputOrigen").val(arrayRegistro.origen_vuelo);
            $("#inputDestino").val(arrayRegistro.destino_vuelo);
            $("#inputAlojamiento").val(arrayRegistro.nombre_alojamiento);
            $("#inputPrecioNoche").val(arrayRegistro.precio_noche);
            $("#inputTraslado").val(arrayRegistro.modelo_auto);
            $("#inputDestinoTraslado").val(arrayRegistro.destino_traslado);
        },
    });
}

function editarRegistro() {
    var idNoticia = $("#inputIdNoticia").val();
    var titulo = $("#inputTitulo").val();
    var descripcion = $("#inputDescripcion").val();
    var encabezado = $("#inputEncabezado").val();
    var idUsuario = $("#inputUsuario").val();
    var fecha = $("#inputFechaPublicacion").val();
    var idEtiqueta = $("#inputEtiqueta").val();
    $.ajax({
        url: "/php/ColeccionNoticias.php",
        method: "POST",
        async: true,
        data: {
            intent: "editar",
            idNoticia: idNoticia,
            titulo: titulo,
            descripcion: descripcion,
            encabezado: encabezado,
            idUsuario: idUsuario,
            fechaPublicacion: fecha,
            idEtiqueta: idEtiqueta,
        },
        success: function (response) {
            $("#modalInformacion").modal("hide");
            $("#tblContact > tbody").empty();
            mostrarRegistros();
        },
    });
}

function eliminarRegistro(id) {
    $("#modalInformacion").on("click", "#btnModalEliminar", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/php/ColeccionNoticias.php",
            method: "POST",
            async: true,
            data: {
                intent: "eliminar",
                idNoticia: id,
            },
            success: function (response) {
                $("#modalInformacion").modal("hide");
                $("#tblContact > tbody").empty();
                mostrarRegistros();
            },
        });
    });
}

function escucharBotonInformacion() {
    $("#rowsContact").on("click", "#btnInformacion", function (e) {
        e.preventDefault(); // cancela el evento por defecto ***MUY IMPORTANTE PARA EL FUNCIONAMIENTO**
        $(this).html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`);
        limpiarInput();
        deshabilitarBotones();
        habilitarBoton("#btnModalEliminar");
        habilitarBoton("#checkboxEditar");
        $("#img-paquete-modal").attr("height", "140px");
        var filaActual = $(this).closest("tr"); // obtiene la fila actual
        var id = filaActual.find("td:eq(0)").text(); // obtiene el valor del primer TD de la fila actual
        mostrarInformacionRegistro(id);
        $(this).html("Informacion");
    });
}

function escucharBotonEliminar() {
    $("#btnModalEliminar").click(function () {
        let id = $("#inputIdNoticia").val();
        eliminarRegistro(id);
    });
}
function escucharBotonGuardar() {
    $("#btnModalGuardar").on("click", function (e) {
        guardarRegistro();
    });
}
function escucharBotonBuscar() {
    $("#btnSearch").click(function () {
        var id = $("#txtSearch").val();
        mostrarRegistroId(id);
    });
}
function escucharBotonEditar() {
    $("#btnModalEditar").click(function () {
        editarRegistro();
    });
}
function escucharCheckbox() {
    $("#checkboxEditar").click(function () {
        if ($("#checkboxEditar").is(":checked")) {
            habilitarBoton("#btnModalEditar");
            
        } else {
            $("#btnModalEditar").attr("disabled", true);
        }
    });
}
function escucharBotonIngresar() {
    $("#btnNuevoRegistro").click(function () {
        deshabilitarBotones();
        deshabilitarBoton("#checkboxEditar");
        $("#btnModalGuardar").attr("disabled", false);
        limpiarInput();
    });
}
function deshabilitarBotones() {
    deshabilitarBoton("#btnModalEditar");
    deshabilitarBoton("#btnModalEliminar");
    deshabilitarBoton("#btnModalGuardar");
}
function deshabilitarBoton(nombreBoton) {
    $(nombreBoton).attr("disabled", true);
}
function habilitarBoton(nombreBoton) {
    $(nombreBoton).attr("disabled", false);
}

function obtenerVuelos() {
    $.ajax({
        url: "/php/ObtenerVuelos.php",
        async: true,
        success: function (response) {
            var respuesta = JSON.parse(response);
            var arrayVuelos = respuesta.data;
            llenarDropdown(arrayVuelos);
        },
    });
}

function llenarInfoVueloForm(origen, destino, descripcion) {
    $("#dropdownAerolinea").html(descripcion);
    $("#inputOrigen").val(origen);
    $("#inputDestino").val(destino);
}

function llenarDropdown(arreglo) {
    arreglo.forEach((element) => {
        var objDropdown = `<span class="dropdown-item" onclick="llenarInfoVueloForm('${element.origen}', '${element.destino}', '${element.descripcion}')" value="${element.idvuelo}">${element.descripcion}</span>`;
        $("#dropdown-vuelos").append(objDropdown);
    });
}

function limpiarInput() {
    $("#img-paquete-modal").attr("src", "/media/btnload.png");
    $("#img-paquete-modal").attr("height", "200");
    $("#inputIdPaquete").val("");
    $("#inputNombre").val("");
    $("#inputPrecioPaquete").val("");
    $("#inputPrecioFinal").val("");
    $("#inputDescuento").val("");
    $("#dropdownAerolinea").val("");
    $("#inputOrigen").val("");
    $("#inputDestino").val("");
    $("#inputAlojamiento").val("");
    $("#inputPrecioNoche").val("");
    $("#inputTraslado").val("");
    $("#inputDestinoTraslado").val("");
}
