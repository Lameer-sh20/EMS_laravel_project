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

function bookinghandler() {
    $("#booking_modal").modal("show");

    // modal variables
    const ticket_count = document.getElementById("ticket_count");
    const total_price = document.getElementById("total_price");
    const ticket_price = document.getElementById("ticket_price");
    const final_price = document.getElementById("final_price");

    //get the ticket price value
    const pricePerTicket = ticket_price.textContent;

    //update total_price when based on ticket_count
    ticket_count.addEventListener("input", function () {
        let ticketCount = this.value;

        // validate input
        if (isNaN(ticketCount) || ticketCount < 0) {
            ticketCount = 0;
        } else if (ticketCount > 5) {
            ticketCount = 5;
        }
        this.value = ticketCount;

        //calculate total_price
        const totalPrice = ticketCount * pricePerTicket;
        total_price.textContent = totalPrice.toFixed(2);
        final_price.value = totalPrice.toFixed(2); //update hidden final_price
    });
}

function bookingSubmit() {
    //modal variables
    const ticket_count = document.getElementById("ticket_count").value;
    const total_price = document.getElementById("total_price").textContent;
    const event_id = document.getElementById("event_id").value;
    //check 
    if (ticket_count <= 0) {
        alert("Please select at least one ticket.");
        return;
    }

    //send booking info
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "/bookEvent",
        data: {
            id: event_id,
            ticket_count: ticket_count,
            total_price: total_price,
        },
        method: "post", 
        success: function (response) {
            if (response.success) {
                // go to hom epage
                window.location.href = "/"; 
            }
        },
    });
}
