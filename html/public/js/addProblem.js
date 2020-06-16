window.addEventListener("load", addProblem);

function addProblem() {
    var list = document.getElementsByClassName("addProblem");
    for (var _p of list) {
        _p.addEventListener("click", function (e) {
            e.preventDefault();
            document.location.href = "/addProblem?idProblem=" +encodeURI(this.id);
        })

    }
}