function category_view_sub_admin() {
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
            "</tr>";
        }

        $("#categorybody").html(row);
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

function booking_view_sub_admin() {
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
            "</tr>";
        }

        $("#bookingbody").html(row);
      }
    },
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
function changealert(id) {
  Swal.fire({
    title: "Successfully  Add Data!",
    text: "Thank You :)",
    icon: "success",
    timer: 1500,
    confirmButtonColor: "#3d8ef8",
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

function format(date) {
  let arr = date.split(" ");
  arr[1] = arr[1].substring(0, 3);
  return moment(arr.join(" "), "DD MMM YYYY - hh:mm A");
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
        window.location.href = "sub_admin_home.php?p=sub_admin_booking_hall";
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

function report_subadmin_cancel(id) {
  $.ajax({
    url: "delete.php",
    method: "POST",
    data: { countt: id, action: "report_subadmin_cancel" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        window.location.href = "sub_admin_home.php?p=sub_admin_report";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function sub_changepassword() {
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
        window.location.href = "sub_admin_home.php?p=sub_changepass";
      } else {
        alert(data.message);
      }
    },
  });
}
