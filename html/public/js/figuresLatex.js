document.addEventListener("readystatechange", embedFigure);
document.addEventListener("readystatechange", embedNoFigure);

function embedFigure() {
    var listFigures = document.getElementsByClassName("figure");
    for (var index in listFigures) {
        //First we center the image
        listFigures[index].classList.add("d-flex", "flex-column", "align-items-center");
        listFigures[index].id = `figure${parseInt(index) + 1}`;

        //Now we replace the embed tag by its img tag
        var embed = listFigures[index].getElementsByTagName("embed")[0];

        //We get the data from the embed file
        var filename = embed.getAttribute("src");
        var width = embed.style.width;
        var ID = getID(filename);

        //We create an image tag
        var image = document.createElement("img");
        image.src = `http://192.168.56.101:5000/v1/users/dependency/${ID}`;
        image.style.width = width;

        //We replace the embed tag with the new image
        embed.replaceWith(image);

        //Finally we have to check if this image has been referenced and place a corrected 
        caption = listFigures[index].getElementsByClassName("caption")[0];
        caption.innerHTML = `<span class="font-weight-bold"> Figura ${parseInt(index) + 1}.</span> ${caption.innerHTML}`;

        //We replace the references
        listTex = document.getElementsByClassName("tex");
        for (var tex of listTex) {
            var fileScaped = "\\[" + escapePath(filename) + "\\]";
            var regEx = new RegExp(fileScaped, "g");
            tex.innerHTML = tex.innerHTML.replace(regEx, `<a href="#figure${parseInt(index) + 1}"> (${parseInt(index) + 1})<a>`);
        }
    }
}

function embedNoFigure() {
    var listFigures = document.getElementsByTagName("embed");
    for (var embed of listFigures) {
        if (!embed.parentElement.classList.contains("figure")) {
            //We get the data from the embed file
            var filename = embed.getAttribute("src");
            var width = embed.style.width;
            var ID = getID(filename);

            //We create an image tag
            var image = document.createElement("img");
            image.src = `http://192.168.56.101:5000/v1/users/dependency/${ID}`;
            image.classList.add("d-block", "mx-auto");
            image.style.width = width;

            //We replace the embed tag with the new image
            embed.replaceWith(image);
        }
    }
}

function getID(path) {
    var listPath = path.split("/");
    return listPath[listPath.length - 1].split(".")[0];
}

function escapePath(str) {
    return str.replace(/\//g, "\\/");
}
