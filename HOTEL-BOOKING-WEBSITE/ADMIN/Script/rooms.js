// adding the room to the database
let add_room_form = document.getElementById("addRoomForm");
add_room_form.addEventListener("submit", function (e) {
  e.preventDefault();
  add_room();
});

function add_room() {
  let data = new FormData();
  data.append("addRoom", ""); // Corrected the key to match the PHP handler 'addRoom'
  data.append("name", add_room_form.elements["name"].value);
  data.append("area", add_room_form.elements["area"].value);
  data.append("adults", add_room_form.elements["adults"].value);
  data.append("children", add_room_form.elements["children"].value);
  data.append("price", add_room_form.elements["price"].value);
  data.append("quantity", add_room_form.elements["quantity"].value);
  data.append("description", add_room_form.elements["description"].value);

  // Collecting Features
  let features = [];
  document.querySelectorAll('input[name="features"]:checked').forEach((el) => {
    features.push(el.value);
  });

  // Collecting Facilities
  let facilities = [];
  document
    .querySelectorAll('input[name="facilities"]:checked')
    .forEach((el) => {
      facilities.push(el.value);
    });

  // Append to FormData
  data.append("features", JSON.stringify(features));
  data.append("facilities", JSON.stringify(facilities));

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);

  xhr.onload = function () {
    var myModal = document.getElementById("addRoom");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 1) {
      // Compare to the status key in the response
      alert("success", "Room added!");
      add_room_form.reset();
      get_all_rooms();
    } else {
      alert("error", "server down error !!!! ");
    }
  };
  xhr.send(data);
}

// fetching the room from the database
function get_all_rooms() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("room-data").innerHTML = this.responseText;
  };

  xhr.send("get_all_rooms");
}

// calling get_all_rooms() function
window.onload = function () {
  get_all_rooms();
};
// function for status toggle
function toggle_status(id, val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Status toggled !");
      get_all_rooms();
    } else {
      alert("error", "Status not toggled ! ");
    }
  };
  xhr.send("toggle_status=" + id + "&value=" + val);
}

// edit room

let editRoomForm = document.getElementById("editRoomForm");

function edit_details(id) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    let data = JSON.parse(this.responseText);
    editRoomForm.elements["name"].value = data.roomdata.name;
    editRoomForm.elements["area"].value = data.roomdata.area;
    editRoomForm.elements["adults"].value = data.roomdata.adults;
    editRoomForm.elements["children"].value = data.roomdata.children;
    editRoomForm.elements["price"].value = data.roomdata.price;
    editRoomForm.elements["quantity"].value = data.roomdata.quantity;
    editRoomForm.elements["description"].value = data.roomdata.description;
    editRoomForm.elements["room_id"].value = data.roomdata.id;

    editRoomForm.elements["facilities"].forEach((el) => {
      if (data.facilities.includes(Number(el.value))) {
        el.checked = true;
      }
    });

    editRoomForm.elements["features"].forEach((el) => {
      if (data.features.includes(Number(el.value))) {
        el.checked = true;
      }
    });
  };
  xhr.send("get_room=" + id);
}
// submit_edit_

editRoomForm = document.getElementById("editRoomForm");
editRoomForm.addEventListener("submit", function (e) {
  e.preventDefault();
  submit_edit_room();
});

function submit_edit_room() {
  let data = new FormData();
  data.append("editRoom", ""); // Corrected the key to match the PHP handler 'addRoom'
  data.append("room_id", editRoomForm.elements["room_id"].value);
  data.append("name", editRoomForm.elements["name"].value);
  data.append("area", editRoomForm.elements["area"].value);
  data.append("adults", editRoomForm.elements["adults"].value);
  data.append("children", editRoomForm.elements["children"].value);
  data.append("price", editRoomForm.elements["price"].value);
  data.append("quantity", editRoomForm.elements["quantity"].value);
  data.append("description", editRoomForm.elements["description"].value);

  // Collecting Features
  let features = [];
  editRoomForm
    .querySelectorAll('input[name="features"]:checked')
    .forEach((el) => {
      features.push(el.value);
    });

  // Collecting Facilities
  let facilities = [];
  editRoomForm
    .querySelectorAll('input[name="facilities"]:checked')
    .forEach((el) => {
      facilities.push(el.value);
    });

  // Append to FormData
  data.append("features", JSON.stringify(features));
  data.append("facilities", JSON.stringify(facilities));

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);

  xhr.onload = function () {
    var myModal = document.getElementById("editRoom");
    var modal = bootstrap.Modal.getInstance(myModal);
    modal.hide();

    if (this.responseText == 1) {
      // Compare to the status key in the response
      alert("success", "Room data edited!");
      editRoomForm.reset();
      get_all_rooms();
    } else {
      alert("error", "server down error !!!! ");
    }
  };
  xhr.send(data);
}
window.edit_details = edit_details;

// room image management
let add_image_form = document.getElementById("add_image_form");

add_image_form.addEventListener("submit", function (e) {
  e.preventDefault();
  addImage();
});

function addImage() {
  let data = new FormData();
  data.append("image", add_image_form.elements["image"].files[0]);
  data.append("room_id", add_image_form.elements["room_id"].value);
  data.append("addImage", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);

  xhr.onload = function () {
    console.log(this.responseText);
    if (this.responseText === "inv_img") {
      alert("error", "Only jpg, jpeg, webp or png image allowed", "img_alert");
    } else if (this.responseText === "inv_size") {
      alert("error", "Image should be less than 2MB!", "img_alert");
    } else if (this.responseText === "upd_failed") {
      alert("error", "Image upload failed, server down!", "img_alert");
    } else {
      alert("success", "Image upload successfully", "img_alert");
      room_images(
        add_image_form.elements["room_id"].value,
        document.querySelector("#Room-images .modal-title").innerText
      );
      add_image_form.reset();
    }
  };
  xhr.send(data);
}

function room_images(id, rname) {
  document.querySelector("#Room-images .modal-title").innerText = rname;
  add_image_form.elements["room_id"].value = id;
  add_image_form.elements["image"].value = "";

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("room-image-data").innerHTML = this.responseText;
  };
  xhr.send("get_room_images=" + id);
}

// function for remove image
function rem_img(img_id, room_id) {
  let data = new FormData();
  data.append("image_id", img_id);
  data.append("room_id", room_id);
  data.append("rem_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);

  xhr.onload = function () {
    console.log(this.responseText);
    if (this.responseText == 1) {
      alert("success", "Image deleted successfully", "img_alert");
      room_images(
        room_id,
        document.querySelector("#Room-images .modal-title").innerText
      );
    } else {
      alert("error", "Image removal failed !", "img_alert");
    }
  };
  xhr.send(data);
}
// thumb_image
function thumb_img(img_id, room_id) {
  let data = new FormData();
  data.append("image_id", img_id);
  data.append("room_id", room_id);
  data.append("thumb_image", "");

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/rooms.php", true);

  xhr.onload = function () {
    console.log(this.responseText);
    if (this.responseText == 1) {
      alert("success", "Image thumbnail changed successfully", "img_alert");
      room_images(
        room_id,
        document.querySelector("#Room-images .modal-title").innerText
      );
    } else {
      alert("error", "thumbnail  update failed !", "img_alert");
    }
  };
  xhr.send(data);
}
// remove_room
function remove_room(room_id) {
  if (confirm("Are you sure? Want to delete the room : ")) {
    let data = new FormData();
    data.append("room_id", room_id);
    data.append("remove_room", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "AJAX/rooms.php", true);

    xhr.onload = function () {
      console.log(this.responseText);
      if (this.responseText == 1) {
        alert("success", "Room Removed Successfully");
        get_all_rooms();
      } else {
        alert("error", "Room removal failed !");
      }
    };
    xhr.send(data);
  }
}
