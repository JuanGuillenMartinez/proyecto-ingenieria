var myWidget = cloudinary.createUploadWidget(
    {
        cloudName: "dx6sa00ie",
        uploadPreset: "aalwcpqi",
        publicId: "PruebaJS"
    },
    (error, result) => {
        if (!error && result && result.event === "success") {
            console.log("Done! Here is the image info: ", result.info);
        }
    }
);

document.getElementById("upload_widget").addEventListener(
    "click", function () {
        myWidget.open();
    }, false
);
