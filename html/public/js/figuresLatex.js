//Este script deberá ir dentro del controlador y ya no será un script

document.addEventListener("readystatechange", figuresLatex);

function figuresLatex() {
    var list = document.getElementsByClassName("tex");
    for (var _p of list) {
        var regEx = new RegExp(/\\begin{figure}((.|\n|\r)*?)\\includegraphics(\[(?:.*)\])?{(.*)\/([0-9]*)\.(.*)}((.|\n|\r)*?)\\end{figure}/, "g");
        _p.innerHTML = _p.innerHTML.replace(regEx, `<img class="mt-3 mb-3 mx-auto d-block img-fluid" src="http://192.168.56.101:5000/v1/users/dependency/$5">`);
    }
}