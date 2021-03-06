function login() {
  var form = $("#login").serialize();

  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        window.location.href = "emp_home.php?p=emp_home_choice";
      } else if (data.status == "2") {
        window.location.href = "admin_home.php?p=admin_booking_hall";
      } else if (data.status == "3") {
        window.location.href = "sub_admin_home.php?p=sub_admin_booking_hall";
      } else {
        alert(data.message);
      }
    },
  });
}

function register() {
  var form = $("#login").serialize();
  // var number = document.getElementById("number").value;
  // if (number.length == 10) {
  $.ajax({
    url: "../control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        window.location.href = "../emp_home.php";
      } else {
        alert(data.message);
      }
    },
  });
  // } else {
  //   alert("Phone number length - 10");
  // }
}

// category

function changealert(id) {
  Swal.fire({
    title: "Successfully  Add Data!",
    text: "Thank You :)",
    icon: "success",
    timer: 1500,
    confirmButtonColor: "#3d8ef8",
  });
}

//category employee

function deletealert(id) {
  Swal.fire({
    title: "Successfully delete!",
    text: "Thank You :)",
    icon: "success",
    timer: 1500,
    confirmButtonColor: "#3d8ef8",
  });
}

// booking

function booking_add() {
  var form = $("#booking_add").serialize();

  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#booking_add")[0].reset();
        window.location.href = "emp_home.php?p=emp_booking_hall";
      } else {
        alert(data.message);
      }
    },
  });
}

function issues() {
  var form = $("#issues_add").serialize();

  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#issues_add")[0].reset();
        // window.location.href = "homeemployee.php?p=issues";
      } else {
        alert(data.message);
      }
    },
  });
}

function profile() {
  var form = $("#form").serialize();

  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#form")[0].reset();
        //window.location.href = "homeemployee.php?p=issues";
      } else {
        alert(data.message);
      }
    },
  });
}

function changepassword() {
  var form = $("#changepassword").serialize();

  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#changepassword")[0].reset();
        window.location.href = "emp_home.php?p=emp_changepass";
      } else {
        alert(data.message);
      }
    },
  });
}
function category_info_view_category() {
  $.ajax({
    url: "control.php",
    method: "POST",
    data: { action: "category_view" },
    // dataType:"JSON",
    success: function (data) {
      var data = JSON.parse(data);
      $("#city_id").html("");
      if (data.status) {
        var row = "<option value=''>---select category---</option>";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "<option value=" +
            data.rows[i].id_category +
            ">" +
            data.rows[i].category +
            "</option>";
        }

        $("#id_category").html(row);
      }
    },
  });
}

function booking_view_employee() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "booking_view_employee" },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = data.rows.length - 1; i >= 0; i--) {
          row +=
            "<tr><td>" +
            data.rows[i].booking_add_id +
            "</td>" +
            "<td>" +
            data.rows[i].username +
            "</td>" +
            "<td>" +
            data.rows[i].category +
            "</td>" +
            "<td>" +
            data.rows[i].booking +
            "</td>" +
            "<td>" +
            data.rows[i].booking_info +
            "</td>" +
            "<td>" +
            data.rows[i].start_time +
            "</td>" +
            "<td>" +
            data.rows[i].end_time +
            "</td>" +
            "<td>" +
            data.rows[i].status +
            "</td>" +
            "</tr>";
        }

        $("#booking_hall").html(row);
      }
    },
  });
}

function format(date) {
  let arr = date.split(" ");
  arr[1] = arr[1].substring(0, 3);
  return moment(arr.join(" "), "DD MMM YYYY - hh:mm A");
}

function report_view_employee() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "report_view_employee" },
    success: function (data) {
      var data = JSON.parse(data);
      var date = moment().format("DD MMM YYYY - hh:mm a");
      if (data.status) {
        var row = "";
        var t;
        for (var i = data.rows.length - 1; i > 0; i--) {
          if (data.rows[i].report == 0) {
            t = "none";
          } else {
            t = "blue";
          }
          if (
            moment(data.rows[i].end_time, "DD MMM YYYY - hh:mm a").isAfter(
              moment(date, "DD MMM YYYY - hh:mm a")
            )
          ) {
            color = "red";
          } else {
            color = "";
          }
          row +=
            "<tr style='color:" +
            color +
            "'><td>" +
            data.rows[i].report_id +
            "</td>" +
            "<td>" +
            data.rows[i].username +
            "</td>" +
            "<td>" +
            data.rows[i].category +
            "</td>" +
            "<td>" +
            data.rows[i].booking +
            "</td>" +
            "<td>" +
            data.rows[i].booking_info +
            "</td>" +
            "<td>" +
            data.rows[i].start_time +
            "</td>" +
            "<td>" +
            data.rows[i].end_time +
            "</td>" +
            "<td>" +
            data.rows[i].status +
            "</td>" +
            "<td>" +
            "<button  data-toggle='modal' data-target='.bs-example-modal-lg' class='btn btn-primary btn-sm waves-effect waves-light' style='display:" +
            t +
            "' onclick='report(" +
            data.rows[i].report_id +
            ");'>" +
            "+";
          "</button>" +
            "</td>" +
            // "<td>" +
            // data.rows[i].report +
            // "</td>" +
            "</tr>";
        }

        $("#report_hall").html(row);
      }
    },
  });
}

function report(id) {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "report_view_employee_report", countt: id },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "<tr>" +
            "<td>" +
            "<h5>" +
            data.rows[i].report +
            "</h5>" +
            "</td></tr>";
        }

        $("#report_msg").html(row);
      }
    },
  });
}

function category_view_product(id) {
  var id = document.getElementById("id_category").value;
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "category_view_product", countt: id },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "<div style='width:20%; border:1px solid black ; border-radius: 25px; margin:1%;'>" +
            "<h5>" +
            data.rows[i].booking_info_id +
            "</h5>" +
            "<h5>Booking =</h5><h5 id='book" +
            i +
            "'>" +
            data.rows[i].booking_info +
            "</h5>" +
            "<h5>status =</h5><h5 id='status" +
            i +
            "'> " +
            data.rows[i].status +
            "</h5>" +
            "<input type='button' onclick='add(" +
            i +
            ");' id='booking_order' value='Booking Order' style='margin:2%; border-radius: 25px;' class='btn btn-primary btn-sm waves-effect waves-light' data-toggle='modal' data-target='.bs-example-modal-lg'></input>" +
            "</div>";
        }

        $("#category_show").html(row);
      }
    },
  });
}

function msg_view() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "msg_view" },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "<tr>" +
            "<td>" +
            "<h5 style='color:red;'>" +
            data.rows[i].msg +
            "</h5>" +
            "</td></tr>";
        }

        $("#msgbody").html(row);
      }
    },
  });
}

function add(i) {
  var tx = document.getElementById("id_category");
  var td = document.getElementById("book" + i).innerText;
  var e = document.getElementById("status" + i).innerText;
  $("#e").val(e);
  $("#book").val(td);
  $("#category").val(tx.options[tx.selectedIndex].text);
}
