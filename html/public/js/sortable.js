window.addEventListener("load", sortable);

function sortable() {
    var updatedList = false;
    var updatedCheckBox = false;

    //Sortable update handler
    var initialPos;
    var numProblems = $('#sortable li').length;
    var indexArray = Array.from(Array(numProblems).keys());
    var initialState = Array.from(Array(numProblems).keys());
    $('#index').val(indexArray);

    $('#sortable').sortable({
        start: function (event, ui) {
            initialPos = ui.item.index();
        },
        update: function (event, ui) {
            var finalPos = ui.item.index();
            insertAndShift(indexArray, initialPos, finalPos);
            $('#index').val(indexArray);
            if (!updatedCheckBox) {
                if (!updatedList) {
                    updatedList = true;
                    $('#save').removeClass("btn-no-pointer");
                    $('#save').removeClass("disabled");
                    $('#save').prop("disabled", false);
                } else if (JSON.stringify(initialState) == JSON.stringify(indexArray)) {
                    updatedList = false;
                    $('#save').addClass("btn-no-pointer");
                    $('#save').addClass("disabled");
                    $('#save').prop("disabled", true);
                }
            }

            //Finally we need to rename the value when we delete
            $('#sortable li').each(function (index) {
                $(this).attr("id", index);
                $(this).find("button").val("delete" + index);
            });
        }
    });

    //Checkbox handler
    $('input[type=checkbox]').each(function () {
        $(this).change(function () {
            updatedCheckBox = true;
            $('#save').removeClass("btn-no-pointer");
            $('#save').removeClass("disabled");
            $('#save').prop("disabled", false);
        })
    });



}

function insertAndShift(arr, from, to) {
    let cutOut = arr.splice(from, 1)[0]; // cut the element at index 'from'
    arr.splice(to, 0, cutOut);            // insert it at index 'to'
}