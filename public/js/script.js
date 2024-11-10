function test() {
    alert("hi pop up");
}

var id;
function deleteMsg(i) {
    id = i;
    console.log(i);
    $("#confirm").modal("show");
}

function deleteConfirmation() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/deleteEvent",
        data: {
            id: id,
        },
        method: "get",
        success: function (response) {
            location.reload();
        },
    });
}
