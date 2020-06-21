window.addEventListener("load", function () {
    addTag("primary");
}
);

function addTag(param_color) {
    var auxTags = document.fProblems.auxTags;
    auxTags.addEventListener("keydown", function (e) {
        var keyCode = e.keyCode ? e.keyCode : e.which;
        if (keyCode == 13 || keyCode == 188) {
            event.preventDefault();
            if (!event.repeat) {
                var tagValue = this.value;
                if (this.value.indexOf(',') > -1) {
                    tags = this.value.split(',');
                    for (let tagname of tags) {
                        createTag(tagname, param_color);
                    }
                } else {
                    createTag(tagValue, param_color);
                }
                this.value = "";
            }
        }
    });
}

function createTag(tagname, param_color) {
    if (tagname && !document.getElementById(tagname.trim().toLowerCase())) {
        var tagList = document.getElementById("tagList");

        var newTag = document.createElement("div");
        newTag.id = tagname.trim().toLowerCase();
        newTag.classList.add("tag", "badge", "badge-" + param_color, "mt-2", "mr-1", "d-flex", "justify-content-between");

        var divText = document.createElement("div");
        divText.classList.add("my-auto", "mr-1");
        divText.innerText = tagname.toLowerCase();

        var auxDiv = document.createElement("div");
        var btn = document.createElement("button");
        btn.classList.add("btn", "btn-" + param_color, "p-0");
        btn.type = "button";
        btn.innerHTML = '<i class="far fa-times-circle"></i>'
        btn.addEventListener("click", function (e) {
            var deletetag = this.parentNode.parentNode.id;
            document.fProblems.tags.value = document.fProblems.tags.value.replace(deletetag + ',', '')
            this.parentNode.parentNode.remove();
        });

        auxDiv.appendChild(btn);

        newTag.appendChild(divText);
        newTag.appendChild(auxDiv);

        tagList.appendChild(newTag);
        document.fProblems.tags.value = document.fProblems.tags.value + tagname.trim().toLowerCase() + ",";
    }
}



