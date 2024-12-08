// fetching the room from the database
function get_bookings(search='') {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/refund_bookings.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("table-data").innerHTML = this.responseText;
  };

  xhr.send("get_bookings&search="+search);
}


// Cancel booking
function refund_bookings(id) {
  if (confirm("Refund money for  this booking : ")) {
    let data = new FormData();
    data.append("booking_id", id);
    data.append("refund_booking", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "AJAX/refund_bookings.php", true);

    xhr.onload = function () {
      console.log(this.responseText);
      if (this.responseText == 1) {
        alert("success", "Money refunded");
        get_bookings();
      } else {
        alert("error", "Server Down!");
      }
    };
    xhr.send(data);
  }
}

// window load
window.onload = function () {
  get_bookings();
};
