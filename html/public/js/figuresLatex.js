document.addEventListener("readystatechange", figuresEmbed);
document.addEventListener("readystatechange", centerLatex);
document.addEventListener("readystatechange", centerTikz);

function figuresEmbed() {
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

function centerLatex() {
    var list = document.getElementsByClassName("tex");
    for (var _p of list) {
        var regEx = new RegExp(/\\begin{center}((.|\n|\r)*?)\\includegraphics(\[(?:.*)\])?{(.*)\/([0-9]*)\.(.*)}((.|\n|\r)*?)\\end{center}/, "g");
        _p.innerHTML = _p.innerHTML.replace(regEx, `<img class="mt-3 mb-3 mx-auto d-block img-fluid" src="http://192.168.56.101:5000/v1/users/dependency/$5">`);
    }
}

function centerTikz() {
    var list = document.getElementsByClassName("tex");
    for (var _p of list) {
        var regEx = new RegExp(/\\begin{center}((.|\n|\r)*?)(\\begin(\[(?:.*)\])?{tikzpicture}((.|\n|\r)*?))\\end{center}/, "g");
        _p.innerHTML = _p.innerHTML.replace(regEx, `<div class="mt-3 mb-3 row justify-content-center"><script type="text/tikz"> $3 </script></div>`);
    }
}

function getID(path) {
    var listPath = path.split("/");
    return listPath[listPath.length - 1].split(".")[0];
}

function escapePath(str) {
    return str.replace(/\//g,"\\/");
}
