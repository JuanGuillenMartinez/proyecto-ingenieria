var idVueloForm = 0;
var idAlojamientoForm = 0;
var idTrasladoForm = 0;
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
    var nombrePaquete = $("#inputNombre").val();
    var precioPaquete = $("#inputPrecioPaquete").val();
    var idAerolinea = idVueloForm;
    var idAlojamiento = idAlojamientoForm;
    var idTraslado = idTrasladoForm;
    var descuento = $("#inputDescuento").val();
    var precioFinal = $("#inputPrecioFinal").val();
    var urlImagen = $("#img-paquete-modal").attr("src");
    $.ajax({
        url: "/php/RegistrarPaquete.php",
        method: "POST",
        async: true,
        data: {
            nombrePaquete: nombrePaquete,
            precioPaquete: precioPaquete,
            idAerolinea: idAerolinea,
            idAlojamiento: idAlojamiento,
            idTraslado: idTraslado,
            descuento: descuento,
            precioFinal: precioFinal,
            urlImagen: urlImagen,
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
    obtenerAlojamientos();
    obtenerTraslados();
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
            $("#inputPrecioNoche").val(arrayRegistro.precio_noche);
            $("#dropdownAlojamiento").html(arrayRegistro.nombre_alojamiento);
            $("#dropdownTraslado").html(arrayRegistro.descripcion_traslado);
            $("#inputDestinoTraslado").val(arrayRegistro.destino_traslado);
            idVueloForm = arrayRegistro.id_vuelo;
            idAlojamientoForm = arrayRegistro.id_alojamiento;
            idTrasladoForm = arrayRegistro.id_traslado;
        },
    });
}

function editarRegistro() {
    var idPaquete = $("#inputIdPaquete").val();
    var nombrePaquete = $("#inputNombre").val();
    var precioPaquete = $("#inputPrecioPaquete").val();
    var idAerolinea = idVueloForm;
    var idAlojamiento = idAlojamientoForm;
    var idTraslado = idTrasladoForm;
    var descuento = $("#inputDescuento").val();
    var precioFinal = $("#inputPrecioFinal").val();
    var urlImagen = $("#img-paquete-modal").attr("src");
    $.ajax({
        url: "/php/EditarPaquete.php",
        method: "POST",
        async: true,
        data: {
            idPaquete: idPaquete,
            nombrePaquete: nombrePaquete,
            precioPaquete: precioPaquete,
            idAerolinea: idAerolinea,
            idAlojamiento: idAlojamiento,
            idTraslado: idTraslado,
            descuento: descuento,
            precioFinal: precioFinal,
            urlImagen: urlImagen,
        },
        success: function (response) {
            $("#modalInformacion").modal("hide");
            $("#tblContact > tbody").empty();
            mostrarRegistros();
        },
    });
}

function eliminarRegistro(id) {
    var idpaquete = id;
    $("#modalInformacion").on("click", "#btnModalEliminar", function (e) {
        e.preventDefault();
        $.ajax({
            url: "/php/EliminarPaquete.php",
            method: "POST",
            async: true,
            data: {
                idPaquete: idpaquete,
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
        $(this).html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
        );
        $(":checkbox").prop('checked', false).parent().removeClass('active');
        deshabilitarInputs();
        $("#img-paquete-modal").off("click");
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
        let id = $("#inputIdPaquete").val();
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
            habilitarInputs();
            habilitarBoton("#btnModalEditar");
        } else {
            deshabilitarInputs();
            $("#btnModalEditar").attr("disabled", true);
        }
    });
}
function escucharBotonIngresar() {
    $("#btnNuevoRegistro").click(function () {
        $(this).html(
            `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>`
        );
        obtenerVuelos();
        obtenerAlojamientos();
        obtenerTraslados();
        habilitarInputs();
        $("#img-paquete-modal").on("click", escucharBotonImagen());
        deshabilitarBotones();
        deshabilitarBoton("#checkboxEditar");
        $("#btnModalGuardar").attr("disabled", false);
        limpiarInput();
        $(this).html("Ingresar");
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

function llenarInfoVueloForm(origen, destino, descripcion, idVuelo) {
    idVueloForm = idVuelo;
    $("#dropdownAerolinea").html(descripcion);
    $("#inputOrigen").val(origen);
    $("#inputDestino").val(destino);
}

function llenarDropdown(arreglo) {
    $("#dropdown-vuelos").empty();
    arreglo.forEach((element) => {
        var objDropdown = `<span id="itemVuelo" class="dropdown-item" onclick="llenarInfoVueloForm('${element.origen}', '${element.destino}', '${element.descripcion}', '${element.idvuelo}')" value="${element.idvuelo}">${element.descripcion}</span>`;
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
    $("#inputOrigen").val("");
    $("#inputDestino").val("");
    $("#inputPrecioNoche").val("");
    $("#inputDestinoTraslado").val("");
}

function obtenerAlojamientos() {
    $.ajax({
        url: "/php/ObtenerAlojamientos.php",
        async: true,
        success: function (response) {
            var respuesta = JSON.parse(response);
            var arrayAlojamientos = respuesta.data;
            llenarDropdownAlojamiento(arrayAlojamientos);
        },
    });
}

function llenarInfoAlojamientoForm(precioNoche, descripcion, idAlojamiento) {
    idAlojamientoForm = idAlojamiento;
    $("#dropdownAlojamiento").html(descripcion);
    $("#inputPrecioNoche").val(precioNoche);
}

function llenarDropdownAlojamiento(arreglo) {
    $("#dropdown-alojamientos").empty();
    arreglo.forEach((element) => {
        var objDropdown = `<span class="dropdown-item" onclick="llenarInfoAlojamientoForm('${element.precio_noche}', '${element.nombre_alojamiento}', '${element.idalojamiento}')" value="${element.idalojamiento}">${element.nombre_alojamiento}</span>`;
        $("#dropdown-alojamientos").append(objDropdown);
    });
}

function obtenerTraslados() {
    $.ajax({
        url: "/php/ObtenerTraslados.php",
        async: true,
        success: function (response) {
            var respuesta = JSON.parse(response);
            var array = respuesta.data;
            llenarDropdownTraslado(array);
        },
    });
}

function llenarInfoTrasladoForm(destino, descripcion, idTraslado) {
    idTrasladoForm = idTraslado;
    $("#dropdownTraslado").html(descripcion);
    $("#inputDestinoTraslado").val(destino);
}

function llenarDropdownTraslado(arreglo) {
    $("#dropdown-traslado").empty();
    arreglo.forEach((element) => {
        var objDropdown = `<span class="dropdown-item" onclick="llenarInfoTrasladoForm('${element.destino}', '${element.descripcion}', '${element.idtraslado}')" value="${element.idtraslado}">${element.descripcion}</span>`;
        $("#dropdown-traslado").append(objDropdown);
    });
}

function habilitarInputs() {
    $("#inputNombre").attr("readonly", false);
    $("#inputPrecioPaquete").attr("readonly", false);
    $("#inputPrecioFinal").attr("readonly", false);
    $("#inputDescuento").attr("readonly", false);
    habilitarBoton("#dropdownAerolinea");
    habilitarBoton("#dropdownAlojamiento");
    habilitarBoton("#dropdownTraslado");
}

function deshabilitarInputs() {
    $("#inputNombre").attr("readonly", true);
    $("#inputPrecioPaquete").attr("readonly", true);
    $("#inputPrecioFinal").attr("readonly", true);
    $("#inputDescuento").attr("readonly", true);
    deshabilitarBoton("#dropdownAerolinea");
    deshabilitarBoton("#dropdownAlojamiento");
    deshabilitarBoton("#dropdownTraslado");
}