function escucharBotonImagen() {
    $("#img-paquete-modal").click(function () {
        var nombreImagen = $("#inputNombre").val();
        var myWidget = cloudinary.createUploadWidget(
            {
                cloudName: "dx6sa00ie",
                uploadPreset: "aalwcpqi",
                publicId: nombreImagen,
                preBatch: (cb, data) => {
                    var mensaje;
                    var opcion = confirm("¿Subir imagen?");
                    if (opcion == true) {
                        cb();
                    } else {
                        cb({ cancel: true });
                    }
                },
            },
            (error, result) => {
                if (!error && result && result.event === "success") {
                    $("#img-paquete-modal").attr("src", result.info.url);
                    $("#img-paquete-modal").attr("height", "140px");
                    $("#img-paquete-modal").attr("disabled", "true");
                }
            }
        );
        myWidget.open();
    });
    
}