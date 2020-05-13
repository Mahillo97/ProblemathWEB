//Este script deberá ir dentro del controlador y ya no será un script

document.addEventListener("readystatechange", figuresLatex);

function figuresLatex() {
    var list = document.getElementsByClassName("tex");
    for (var _p of list) {
        console.log(_p.innerHTML);
        var regEx = new RegExp(/\\begin{figure}((.|\n|\r)*?)\\includegraphics(\[(?:.*)\])?{(.*)}((.|\n|\r)*?)\\end{figure}/, "g");
        `<img class="mx-auto d-block img-fluid" href="#" src=public\\img\\serie.svg>`
        _p.innerHTML = _p.innerHTML.replace(regEx, `<img class="mt-3 mb-3 mx-auto d-block img-fluid" href="#" src=public\\img\\$4.svg>`);
        console.log(_p.innerHTML);

    }
}