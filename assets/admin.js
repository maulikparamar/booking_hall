function admin_emp() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "admin_emp" },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        var t = "";
        var m = "";
        for (var i = 0; i < data.rows.length; i++) {
          if (data.rows[i].status_log == 0) {
            t = "block";
            m = "none";
          } else if (data.rows[i].status_log == 1) {
            t = "none";
            m = "block";
          }
          row +=
            "<tr><td>" +
            data.rows[i].id_login +
            "</td>" +
            "<td>" +
            data.rows[i].role +
            "</td>" +
            "<td>" +
            data.rows[i].username +
            "</td>" +
            "<td>" +
            data.rows[i].password +
            "</td>" +
            "<td>" +
            data.rows[i].number +
            "</td>" +
            "<td>" +
            data.rows[i].email +
            "</td>" +
            "<td><button type='button' class='btn btn-danger' onclick='delete_emp(" +
            data.rows[i].id_login +
            ")'>Delete</button></td>" +
            "<td><a href='javaScript:void(0)' title='Active' style='display:" +
            t +
            "'id='activeBtn'" +
            data.rows[i].id_login +
            "'' onclick='activeInactive(" +
            data.rows[i].id_login +
            ",1);' class='btn btn-success btn-sm'> <i class='fa fa-thumbs-up'></i></a><a href='javaScript:void(0)' title='In active'  style='display:" +
            m +
            "'id='inactiveBtn'" +
            data.rows[i].id_login +
            "' onclick='activeInactive(" +
            data.rows[i].id_login +
            ",0);' class='btn btn-danger btn-sm'> <i class='fa fa-thumbs-down'></i></a></td></tr>";
        }

        $("#admin_emp").html(row);
      }
    },
  });
}

function delete_emp(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "delete_emp" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        window.location.href = "admin_home.php?p=admin_employee";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function deletealert(id) {
  Swal.fire({
    title: "Successfully delete!",
    text: "Thank You :)",
    icon: "success",
    timer: 1500,
    confirmButtonColor: "#3d8ef8",
  });
}

function admin_sub_emp() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "admin_sub_emp" },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        var t = "";
        var m = "";
        for (var i = 0; i < data.rows.length; i++) {
          if (data.rows[i].admin_status == 2) {
            t = "block";
            m = "none";
          } else if (data.rows[i].admin_status == 1) {
            t = "none";
            m = "block";
          }
          row +=
            "<tr><td>" +
            data.rows[i].id_admin +
            "</td>" +
            "<td>" +
            data.rows[i].admin_username +
            "</td>" +
            "<td>" +
            data.rows[i].admin_password +
            "</td>" +
            "<td><button type='button' class='btn btn-danger' onclick='delete_sub_emp(" +
            data.rows[i].id_admin +
            ")'>Delete</button></td>" +
            "<td><a href='javaScript:void(0)' title='Active' style='display:" +
            t +
            "'id='activeBtn'" +
            data.rows[i].id_admin +
            "'' onclick='activeInactive(" +
            data.rows[i].id_admin +
            ",2);' class='btn btn-success btn-sm'> <i class='fa fa-thumbs-up'></i></a><a href='javaScript:void(0)' title='In active'  style='display:" +
            m +
            "'id='inactiveBtn'" +
            data.rows[i].id_admin +
            "' onclick='activeInactive(" +
            data.rows[i].id_admin +
            ",0);' class='btn btn-danger btn-sm'> <i class='fa fa-thumbs-down'></i></a></td></tr>";
        }

        $("#admin_subemp").html(row);
      }
    },
  });
}

function delete_sub_emp(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "delete_sub_emp" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        window.location.href = "admin_home.php?p=admin_sub_employee";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function categoryview() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "category_view" },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "<tr><td>" +
            data.rows[i].id_category +
            "</td>" +
            "<td>" +
            data.rows[i].category +
            "</td>" +
            "<td><button type='button' class='btn btn-danger' onclick='category_delete(" +
            data.rows[i].id_category +
            ")'>Delete</button></td>" +
            "<td><button type='button'  class='btn btn-warning' onclick='category_update(" +
            data.rows[i].id_category +
            ")'>Update</button></td>" +
            "</tr>";
        }

        $("#categorybody").html(row);
      }
    },
  });
}

function category_update(id) {
  $.ajax({
    url: "controlupdate.php",
    method: "POST",
    data: { countt: id, action: "category_update" },
    dataType: "JSON",
    success: function (trd) {
      $("#category_id").val(trd.list.id_category);
      $("#category").val(trd.list.category);
      $("#model").modal("show");
    },
  });
}

function category_deletee(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "category_delete" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        window.location.href = "admin_home.php?p=admin_add_category";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function category_delete(id) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    confirmButtonClass: "btn btn-success mt-2",
    cancelButtonClass: "btn btn-danger ml-2 mt-2",
    buttonsStyling: !1,
  }).then(function (t) {
    t.value
      ? category_deletee(id)
      : t.dismiss === Swal.DismissReason.cancel &&
        Swal.fire({ title: "Cancelled", text: "No No No NO", icon: "error" });
  });
}

function booking_view_employee_sub() {
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
            data.rows[i].id_login +
            " - " +
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
            "<td><button type='button' class='btn btn-success' onclick='insert_report(" +
            data.rows[i].booking_add_id +
            ")'>confirm</button></td>" +
            "<td>" +
            "<input type='button' onclick='update_sub_report(" +
            data.rows[i].booking_add_id +
            ")' value='Cancel' class='btn btn-danger'data-toggle='modal' data-target='.bs-example-modal-lg'></input></td>" +
            "</tr>";
        }

        $("#booking_hall").html(row);
      }
    },
  });
}

function update_sub_report(id) {
  $.ajax({
    url: "controlupdate.php",
    method: "POST",
    data: { countt: id, action: "sub_update" },
    dataType: "JSON",
    success: function (trd) {
      $("#booking_add_id").val(trd.list.booking_add_id);
      $("#model").modal("show");
    },
  });
}

function booking_add_cancel() {
  view_sub_report_cansel();
  var id = document.getElementById("booking_add_id").value;
  booking_add_confirm(id);
}

function view_sub_report_cansel() {
  var report = document.getElementById("report").value;
  var id = document.getElementById("booking_add_id").value;
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "booking_view_confirm_employee", countt: id },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "action=cansel_sub_report" +
            "&employee_id=" +
            data.rows[i].employee_id +
            "&category=" +
            data.rows[i].category +
            "&booking=" +
            data.rows[i].booking +
            "&booking_info=" +
            data.rows[i].booking_info +
            "&start_time=" +
            data.rows[i].start_time +
            "&end_time=" +
            data.rows[i].end_time +
            "&report=" +
            report;
        }
        insert_sub_cansel_report(row);
      }
    },
  });
}

function insert_sub_cansel_report(sub) {
  var form = sub;
  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        // window.location.href = "sub_admin_home.php?p=sub_admin_booking_hall";
      } else {
        alert(data.message);
      }
    },
  });
}

function booking_add_confirm(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "booking_sub_confirm_delete" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        window.location.href = "admin_home.php?p=admin_booking_hall";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function cat() {
  var form = $("#cate").serialize();
  console.log(form);
  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#cate")[0].reset();
        window.location.href = "admin_home.php?p=admin_add_category";
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

function bookingview() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "booking_view" },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "<tr><td>" +
            data.rows[i].booking_info_id +
            "</td>" +
            "<td>" +
            data.rows[i].category +
            "</td>" +
            "<td>" +
            data.rows[i].booking_info +
            "</td>" +
            "<td>" +
            data.rows[i].status +
            "</td>" +
            "<td><button type='button' class='btn btn-danger' onclick='booking_delete(" +
            data.rows[i].booking_info_id +
            ")'>Delete</button></td>" +
            "<td><button type='button'  class='btn btn-warning' onclick='booking_update(" +
            data.rows[i].booking_info_id +
            ")'>Update</button></td>" +
            "</tr>";
        }

        $("#bookingbody").html(row);
      }
    },
  });
}

function booking_update(id) {
  $.ajax({
    url: "controlupdate.php",
    method: "POST",
    data: { countt: id, action: "booking_update" },
    dataType: "JSON",
    success: function (trd) {
      $("#booking_id").val(trd.list.booking_info_id);
      $("#id_category").val(trd.list.category_id);
      $("#bookingname").val(trd.list.booking_info);
      $("#status").val(trd.list.status);
      $("#model").modal("show");
    },
  });
}

function booking_deletee(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "booking_delete" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);

        window.location.href = "admin_home.php?p=admin_category_info";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function booking_delete(id) {
  Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: !0,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel!",
    confirmButtonClass: "btn btn-success mt-2",
    cancelButtonClass: "btn btn-danger ml-2 mt-2",
    buttonsStyling: !1,
  }).then(function (t) {
    t.value
      ? booking_deletee(id)
      : t.dismiss === Swal.DismissReason.cancel &&
        Swal.fire({ title: "Cancelled", text: "No No No NO", icon: "error" });
  });
}

function booking() {
  var form = $("#booking_info").serialize();

  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#booking_info")[0].reset();
        window.location.href = "admin_home.php?p=admin_category_info";
      } else {
        alert(data.message);
      }
    },
  });
}
function changealert(id) {
  Swal.fire({
    title: "Successfully  Add Data!",
    text: "Thank You :)",
    icon: "success",
    timer: 1500,
    confirmButtonColor: "#3d8ef8",
  });
}
function issues_view() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "issues_view" },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "<tr><td>" +
            data.rows[i].id_feedback +
            "</td>" +
            "<td>" +
            data.rows[i].username +
            "</td>" +
            "<td>" +
            data.rows[i].feedback +
            "</td>" +
            "<td><button type='button' class='btn btn-danger' onclick='feedback_delete(" +
            data.rows[i].id_feedback +
            ")'>Delete</button></td>" +
            "</tr>";
        }

        $("#issuesbody").html(row);
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
            "<tr><td>" +
            data.rows[i].id_msg +
            "</td>" +
            "<td>" +
            data.rows[i].msg +
            "</td>" +
            "<td><button type='button' class='btn btn-danger' onclick='msg_delete(" +
            data.rows[i].id_msg +
            ")'>Delete</button></td>" +
            "</tr>";
        }

        $("#msgbody").html(row);
      }
    },
  });
}

function msg_delete(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "msg_delete" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        location.reload();
        // window.location.href = "sub_admin_home.php?p=check_problem";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function feedback_delete(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "feedback_delete" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        location.reload();
        // window.location.href = "sub_admin_home.php?p=check_problem";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function report_view_sub_admin() {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "report_view_employee" },
    success: function (data) {
      var date = moment().format("DD MMM YYYY - hh:mm a");
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
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
            data.rows[i].id_login +
            " - " +
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
            data.rows[i].report +
            "</td>" +
            // "<td><button type='button' class='btn btn-danger' onclick='report_subadmin_cancel(" +
            // data.rows[i].report_id +
            // ")'>Delete</button></td>" +
            "</tr>";
        }

        $("#report_hall_admin").html(row);
      }
    },
  });
}

function report_subadmin_cancel(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "report_subadmin_cancel" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);

        window.location.href = "admin_home.php?p=admin_report";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}
function insert_report(id) {
  view_sub_report(id);
  booking_add_confirm(id);
}

function view_sub_report(id) {
  $.ajax({
    url: "control.php",
    method: "post",
    data: { action: "booking_view_confirm_employee", countt: id },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          row +=
            "action=insert_sub_report" +
            "&employee_id=" +
            data.rows[i].employee_id +
            "&category=" +
            data.rows[i].category +
            "&booking=" +
            data.rows[i].booking +
            "&booking_info=" +
            data.rows[i].booking_info +
            "&start_time=" +
            data.rows[i].start_time +
            "&end_time=" +
            data.rows[i].end_time;
        }
        insert_sub_report(row);
      }
    },
  });
}

function insert_sub_report(sub) {
  var form = sub;
  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        // window.location.href = "sub_admin_home.php?p=sub_admin_booking_hall";
      } else {
        alert(data.message);
      }
    },
  });
}

function admin_changepassword() {
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
        window.location.href = "admin_home.php?p=admin_changepass";
      } else {
        alert(data.message);
      }
    },
  });
}

function massage() {
  // alert("hello");
  var form = $("#msg").serialize();
  $.ajax({
    url: "control.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#msg")[0].reset();
        window.location.href = "admin_home.php?p=admin_nontice";
      } else {
        alert(data.message);
      }
    },
  });
}
