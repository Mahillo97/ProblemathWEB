window.addEventListener("load", formSolutions);

function formSolutions() {
    var numSolutions = 1;

    //We add the event for adding a new solution
    var buttonAdd = document.getElementById('addSolution');
    buttonAdd.addEventListener("click", function (event) {
        numSolutions = numSolutions + 1;
        var form = document.getElementById('fProblems');
        var buttonsRow = document.getElementById('buttonsRow');
        var solutionId = `solution${numSolutions}`;
        var newTitleDiv = createTitleDiv(numSolutions);
        var newSeparator = createSeparator();
        var newSolverDiv = createSolverDiv(numSolutions);
        var newFileDiv = createFileDiv(numSolutions);

        form.insertBefore(newTitleDiv,buttonsRow);
        form.insertBefore(newSeparator,buttonsRow);
        form.insertBefore(newSolverDiv,buttonsRow);
        form.insertBefore(newFileDiv,buttonsRow);

        showFilename(solutionId);

        if (numSolutions-1 == 1) {
            document.getElementById("removeSolution").classList.remove("disabled");
        }  
    });

    //We add the event for removing last solution
    var buttonRemove = document.getElementById('removeSolution');
    buttonRemove.addEventListener("click", function (event) {
        var buttonsRow = document.getElementById('buttonsRow');
        var  FileDiv= buttonsRow.previousSibling;
        FileDiv.parentNode.removeChild(FileDiv);
        var  SolverDiv= buttonsRow.previousSibling;
        SolverDiv.parentNode.removeChild(SolverDiv);
        var  Separator= buttonsRow.previousSibling;
        Separator.parentNode.removeChild(Separator);
        var  TitleDiv= buttonsRow.previousSibling;
        TitleDiv.parentNode.removeChild(TitleDiv);
        numSolutions = numSolutions - 1;
        if (numSolutions == 1) {
            document.getElementById("removeSolution").classList.add("disabled");
        }
    });

}

function createTitleDiv(numberSolution) {
    //Create the div
    var divTitle = document.createElement("div");
    divTitle.classList.add("row", "mt-4");

    //Create the h2
    var h2Title = document.createElement("h2");
    h2Title.classList.add("h3", "px-3", "text-gray-800");
    h2Title.innerText = `Solución ${numberSolution}`;

    divTitle.appendChild(h2Title);
    return divTitle;
}

function createSeparator() {
    //Create the hr
    var hr = document.createElement("hr");
    hr.classList.add("mt-0", "mb-3");
    return hr;
}

function createSolverDiv(numberSolution) {
    //Create the div
    var divSolver = document.createElement("div");
    divSolver.classList.add("form-group", "row");

    //Create the label
    var label = document.createElement("label");
    label.classList.add("col-sm-2", "col-form-label");
    label.htmlFor = `solver${numberSolution}`;
    label.innerText = "Resolutor";
    divSolver.appendChild(label);

    //Create the inner div and input tag
    var divInner = document.createElement("div");
    divInner.classList.add("col-sm-10");

    var input = document.createElement("input");
    input.classList.add("form-control");
    input.id=`solver${numberSolution}`;
    input.name=`solver${numberSolution}`;
    input.type="text";

    divInner.appendChild(input);
    divSolver.appendChild(divInner);

    return divSolver;
}

function createFileDiv(numberSolution) {
    //Create the div
    var divFile = document.createElement("div");
    divFile.classList.add("form-group", "row", "mt-4");

    //Create the label
    var label = document.createElement("label");
    label.classList.add("col-sm-2", "col-form-label");
    label.htmlFor = `solution${numberSolution}`;
    label.innerText = "Solución";
    divFile.appendChild(label);

    //Create the inner div1 and inner div2
    var divInner1 = document.createElement("div");
    divInner1.classList.add("col-sm-10");

    var divInner2 = document.createElement("div");
    divInner2.classList.add("custom-file");

    //Create the input and inner label
    var input = document.createElement("input");
    input.classList.add("custom-file-input");
    input.id=`solution${numberSolution}`;
    input.name=`solution${numberSolution}`;
    input.type="file";
    input.accept=".tex,.zip";
    input.required=true;
    divInner2.appendChild(input);

    var labelInner = document.createElement("label");
    labelInner.classList.add("custom-file-label");
    labelInner.id = `label_solution${numberSolution}`;
    labelInner.htmlFor = `solution${numberSolution}`;
    labelInner.innerText = "Elija un documento deberá ser .tex o .zip";
    divInner2.appendChild(labelInner);

    divInner1.appendChild(divInner2);
    divFile.appendChild(divInner1);

    return divFile;
}