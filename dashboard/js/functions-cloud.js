$("#img-paquete-modal").click(function () {
    var nombreImagen = $("#inputNombre").val();
    var myWidget = cloudinary.createUploadWidget(
        {
            cloudName: "dx6sa00ie",
            uploadPreset: "aalwcpqi",
            publicId: nombreImagen,
        },
        (error, result) => {
            if (!error && result && result.event === "success") {
                console.log("Done! Here is the image info: ", result.info);
                alert(result.info.url);
            }
        }
    );
    myWidget.open();
});

// document.getElementById("upload_widget").addEventListener(
//     "click", function () {
//         myWidget.open();
//     }, false
// );
