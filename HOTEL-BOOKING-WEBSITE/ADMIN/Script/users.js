
// fetching the room from the database
function get_users() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/users.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("users-data").innerHTML = this.responseText;
  };

  xhr.send("get_users");
}



// function for status toggle
function toggle_status(id, val) {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/users.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    if (this.responseText == 1) {
      alert("success", "Status toggled !");
      get_users();
    } else {
      alert("error", "Status not toggled ! ");
    }
  };
  xhr.send("toggle_status=" + id + "&value=" + val);
}


// remove user
function remove_user(user_id) {
  if (confirm("Are you sure? Want to delete this user : ")) {
    let data = new FormData();
    data.append("user_id", user_id);
    data.append("remove_user", "");

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "AJAX/users.php", true);

    xhr.onload = function () {
      console.log(this.responseText);
      if (this.responseText == 1) {
        alert("success", "User Removed Successfully");
        get_users();
      } else {
        alert("error", "User removal failed !");
      }
    }
    xhr.send(data);
  }
}

// search for the user
function search_user(username){
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "AJAX/users.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  xhr.onload = function () {
    document.getElementById("users-data").innerHTML = this.responseText;
  };

  xhr.send('search_user&name='+username);
}

// window load
window.onload = function () {
  get_users();
};