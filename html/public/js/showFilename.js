window.addEventListener("load", initializeShowFilename);

function initializeShowFilename() {
    //Show the file of the statement
    showFilename("statement");
    showFilename("solution1");
}

function showFilename(id) {
    //Show the file of the statement
    var fileUpload = document.getElementById(id);
    fileUpload.addEventListener("change", function (event) {
        var output = document.getElementById(`label_${id}`);
        output.innerHTML = event.target.files[0].name;
    });
}