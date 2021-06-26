$("#btnLogin").click(function() {
    let correo = $("#correoEmpleado").val();
    let contraseña = $("#contraseñaEmpleado").val();
    $.ajax({
        url: "/dashboard/php/IniciarSesionEmpleado.php",
        method: "POST",
        data: {
            correo: correo,
            contraseña, contraseña
        },
        async: true,
        success: function(response) {
            let objRespuesta = JSON.parse(response);
            let respuesta = objRespuesta.respuesta;
            if(respuesta=="400" || respuesta==null) {
                alert("Credenciales incorrectas");
            } else {
                alert("Credenciales correctas");
                $(location).attr('href','/dashboard/html/dashboard.html');
            }
        }
    });
});