function cat() {
  var form = $("#cate").serialize();
  $.ajax({
    url: "./online/control_online.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#cate")[0].reset();
        window.location.href = "admin_home.php?p=online/admin_add_category";
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

function categoryview() {
  $.ajax({
    url: "./online/control_online.php",
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
    url: "./online/controlupdate_online.php",
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

function category_info_view_category() {
  $.ajax({
    url: "./online/control_online.php",
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
    url: "./online/control_online.php",
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
    url: "./online/controlupdate_online.php",
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

function booking_view_employee_sub() {
  $.ajax({
    url: "./online/control_online.php",
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
            "<td id='status'" +
            i +
            ">" +
            data.rows[i].status +
            "</td>" +
            "<td id='status_it'" +
            i +
            ">" +
            data.rows[i].status_it +
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
    url: "./online/controlupdate_online.php",
    method: "POST",
    data: { countt: id, action: "sub_update" },
    dataType: "JSON",
    success: function (trd) {
      $("#booking_add_id").val(trd.list.booking_add_id);
      $("#model").modal("show");
    },
  });
}

function insert_report(id) {
  view_sub_report(id);
}

function view_sub_report(id) {
  $.ajax({
    url: "./online/control_online.php",
    method: "post",
    data: { action: "booking_view_confirm_employee", countt: id },
    success: function (data) {
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
          if (data.rows[i].status == "pending") {
            row +=
              "action=update_sub_report_confirm" +
              "&employee_id=" +
              data.rows[i].employee_id +
              "&booking_add_id=" +
              data.rows[i].booking_add_id +
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
            update_sub_report_confirm(row);
          } else {
            row +=
              "action=insert_sub_report" +
              "&employee_id=" +
              data.rows[i].employee_id +
              "&booking_add_id=" +
              data.rows[i].booking_add_id +
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
            insert_sub_report(row);
            booking_add_confirm(data.rows[i].booking_add_id);
          }
        }
      }
    },
  });
}

function insert_sub_report(sub) {
  var form = sub;
  $.ajax({
    url: "./online/control_online.php",
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

function update_sub_report_confirm(sub) {
  var form = sub;
  $.ajax({
    url: "./online/control_online.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        window.location.href = "admin_home.php?p=online/admin_booking_hall";
      } else {
        alert(data.message);
      }
    },
  });
}

function booking_add_cancel_admin() {
  view_sub_report_cansel();
  var id = document.getElementById("booking_add_id").value;
  booking_add_confirm(id);
}

function view_sub_report_cansel() {
  var report = document.getElementById("report").value;
  var id = document.getElementById("booking_add_id").value;
  $.ajax({
    url: "./online/control_online.php",
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
            "&status_it=" +
            "Cancel" +
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
    url: "./online/control_online.php",
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
    url: "./online/delete_online.php",
    method: "POST",
    data: { countt: id, action: "booking_sub_confirm_delete" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        window.location.href = "admin_home.php?p=online/admin_report";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function format(date) {
  let arr = date.split(" ");
  arr[1] = arr[1].substring(0, 3);
  return moment(arr.join(" "), "DD MMM YYYY - hh:mm A");
}

function report_view_sub_admin() {
  $.ajax({
    url: "./online/control_online.php",
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
            data.rows[i].status_it +
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
    url: "./online/delete_online.php",
    method: "POST",
    data: { countt: id, action: "report_subadmin_cancel" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);

        window.location.href = "admin_home.php?p=online/admin_report";
      } else {
        $("#aaa").html(data.message);
      }
    },
  });
}

function booking_deletee(id) {
  $.ajax({
    url: "./online/delete_online.php",
    method: "POST",
    data: { countt: id, action: "booking_delete" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);

        window.location.href = "admin_home.php?p=online/admin_category_info";
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

function category_deletee(id) {
  $.ajax({
    url: "./online/delete_online.php",
    method: "POST",
    data: { countt: id, action: "category_delete" },
    dataType: "JSON",
    success: function (data) {
      if (data.status == true) {
        $(deletealert()).html(data.message);
        window.location.href = "admin_home.php?p=online/admin_add_category";
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

function booking() {
  var form = $("#booking_info").serialize();

  $.ajax({
    url: "./online/control_online.php",
    method: "POST",
    data: form,
    dataType: "JSON",
    success: function (data) {
      if (data.status == "1") {
        $(changealert()).html(data.message);
        $("#booking_info")[0].reset();
        window.location.href = "admin_home.php?p=online/admin_category_info";
      } else {
        alert(data.message);
      }
    },
  });
}
