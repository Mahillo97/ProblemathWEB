window.addEventListener("load", addTag);

function addTag() {
    var auxTags = document.fProblems.auxTags;
    auxTags.addEventListener("keydown", function (e) {
        var keyCode = e.keyCode ? e.keyCode : e.which;
        if (keyCode == 13 || keyCode == 188) {
            event.preventDefault();
            if (!event.repeat) {
                var tagname = auxTags.value;
                if (tagname && !document.getElementById(tagname.trim().toLowerCase())) {
                    createTag(tagname);
                    document.fProblems.tags.value = document.fProblems.tags.value + tagname.trim().toLowerCase() + ",";
                }
                auxTags.value = "";
            }
        }
    });
}

function createTag(tagname) {
    var tagList = document.getElementById("tagList");

    var newTag = document.createElement("div");
    newTag.id = tagname.trim().toLowerCase();
    newTag.classList.add("tag", "badge", "badge-danger", "mt-2", "mr-1", "d-flex", "justify-content-between");

    var divText = document.createElement("div");
    divText.classList.add("my-auto", "mr-1");
    divText.innerText = tagname.toLowerCase();

    var auxDiv = document.createElement("div");
    var btn = document.createElement("button");
    btn.classList.add("btn", "btn-danger", "p-0");
    btn.type = "button";
    btn.innerHTML = '<i class="far fa-times-circle"></i>'
    btn.addEventListener("click", function (e) {
        var deletetag = this.parentNode.parentNode.id;
        console.log(deletetag)
        document.fProblems.tags.value = document.fProblems.tags.value.replace(deletetag+',', '')
        console.log(document.fProblems.tags.value)
        this.parentNode.parentNode.remove();
    });

    auxDiv.appendChild(btn);

    newTag.appendChild(divText);
    newTag.appendChild(auxDiv);

    tagList.appendChild(newTag);
}



