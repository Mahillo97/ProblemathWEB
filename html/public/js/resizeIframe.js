window.addEventListener("load",resizeIframe);
window.addEventListener("resize",resizeIframe);

function resizeIframe() {
    var list = document.getElementsByClassName("tex");
    for (var _p of list) {
        _p.style.height = _p.contentWindow.document.body.clientHeight + 'px';
    }
}