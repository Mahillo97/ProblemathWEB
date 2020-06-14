document.addEventListener("readystatechange", figuresLatex);
document.addEventListener("readystatechange", centerLatex);
document.addEventListener("readystatechange", centerTikz);

function figuresLatex() {
    var list = document.getElementsByClassName("tex");
    for (var _p of list) {
        var regEx = new RegExp(/\\begin{figure}((.|\n|\r)*?)\\includegraphics(\[(?:.*)\])?{(.*)\/([0-9]*)\.(.*)}((.|\n|\r)*?)\\end{figure}/, "g");
        _p.innerHTML = _p.innerHTML.replace(regEx, `<img class="mt-3 mb-3 mx-auto d-block img-fluid" src="http://192.168.56.101:5000/v1/users/dependency/$5">`);
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
        console.log(_p.innerHTML);
        _p.innerHTML = _p.innerHTML.replace(regEx, `<div class="mt-3 mb-3 row justify-content-center"><script type="text/tikz"> $3 </script></div>`);
        console.log(_p.innerHTML);
    }
}