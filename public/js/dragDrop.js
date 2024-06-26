const dropArea = document.querySelector(".drop-area");

dropArea.addEventListener("dragover", (event) => {
    event.preventDefault();
    dropArea.classList.add("dragging");
});
dropArea.addEventListener("dragleave", (event) => {
    event.preventDefault();
    dropArea.classList.remove("dragging");
});
dropArea.addEventListener("drop", (event) => {
    event.preventDefault();
    dropArea.classList.remove("dragging");
    let files = event.dataTransfer.files;
    if (!(files === undefined)){
        uploadFile(files[0]);
    }
});

function uploadFile(file) {
    console.log(file);
    const fileType = file.type;
    console.log(fileType);
    const validExtensions = ["image/png", "application/pdf", "application/vnd.openxmlformats-officedocument.wordprocessingml.document"];
    console.log(validExtensions.includes(fileType))
    if (validExtensions.includes(fileType)) {
        console.log("File uploaded");
    const formData = new FormData();
    formData.append("fitxers", file);
    let pathSegments = window.location.pathname.split('/');
    let folderId = pathSegments[pathSegments.length - 1]; // Asume que el ID de la carpeta es el último segmento
    formData.append("id", folderId);

$.ajax({
    url: '/pujarFitxers',
    type: 'POST',
    data: formData,
    processData: false,
    contentType: false,
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function() {
        location.reload();
    },
    error: function(data) {
        console.log("Upload failed!");
    }
});
    }else {
    // Crear el div
var errorDiv = document.getElementById('errors');
errorDiv.textContent = 'Els fitxers han de ser: pdf, docx o png';
errorDiv.hidden = false;

// Eliminar el div después de 5 segundos
setTimeout(function() {
    errorDiv.textContent = '';
    errorDiv.hidden = true;
}, 5000);
}
}
