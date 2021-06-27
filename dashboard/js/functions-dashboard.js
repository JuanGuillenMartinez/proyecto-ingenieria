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
    $.ajax({
        url: "/php/ColeccionNoticias.php",
        method: "POST",
        async: true,
        data: {
            intent: "buscarId",
            idNoticia: id,
        },
        success: function (response) {
            var objNoticia = JSON.parse(response);
            $("#btnModalEliminar").attr("disabled", false);
            $("#inputIdNoticia").val(objNoticia[0]);
            $("#inputTitulo").val(objNoticia[1]);
            $("#inputDescripcion").val(objNoticia[2]);
            $("#inputEncabezado").val(objNoticia[3]);
            $("#inputUsuario").val(objNoticia[4]);
            $("#inputFechaPublicacion").val(objNoticia[5]);
            $("#inputEtiqueta").val(objNoticia[6]);
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
        deshabilitarBotones();
        e.preventDefault(); // cancela el evento por defecto ***MUY IMPORTANTE PARA EL FUNCIONAMIENTO**
        var filaActual = $(this).closest("tr"); // obtiene la fila actual
        var id = filaActual.find("td:eq(0)").text(); // obtiene el valor del primer TD de la fila actual
        mostrarInformacionRegistro(id);
    });
}

function escucharBotonEliminar() {
    $("#btnModalEliminar").click(function() {
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
    $("#exampleCheck1").click(function () {
        if($("#exampleCheck1").is(":checked")) {
            $("#btnModalEditar").attr("disabled", false);
        } else {
            $("#btnModalEditar").attr("disabled", true);
        }
    });
}
function escucharBotonIngresar() {
    $("#btnNuevoRegistro").click(function () {
        deshabilitarBotones();
        $("#btnModalGuardar").attr("disabled", false);
        $("#inputIdNoticia").val("");
        $("#inputTitulo").val("");
        $("#inputDescripcion").val("");
        $("#inputEncabezado").val("");
        $("#inputUsuario").val("");
        $("#inputFechaPublicacion").val("");
        $("#inputEtiqueta").val("");
    });
}
function deshabilitarBotones() {
    $("#btnModalEditar").attr("disabled", true);
    $("#btnModalEliminar").attr("disabled", true);
    $("#btnModalGuardar").attr("disabled", true);
}

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