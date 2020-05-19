window.addEventListener("load", sortable);

function sortable() {
    var initialPos;
    var updated = false;
    var numProblems = $('#sortable li').length;
    var indexArray = Array.from(Array(numProblems).keys());

    $('#sortable').sortable({
        start: function(event, ui) {
            console.log(ui.item.index());
            initialPos = ui.item.index();
        },
        update: function(event, ui) {
            var finalPos = ui.item.index();
            insertAndShift(indexArray,initialPos,finalPos);
            console.log(indexArray);
            if(!updated){
                $('#save').removeClass("disabled");
                updated=true;
            }

        }
    });
}

function insertAndShift(arr, from, to) {
    let cutOut = arr.splice(from, 1) [0]; // cut the element at index 'from'
    arr.splice(to, 0, cutOut);            // insert it at index 'to'
}