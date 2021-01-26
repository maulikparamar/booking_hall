<script type="text/javascript" src="assets/admin.js"></script>
 <script>
 $(document).ready(function () {
  report_view_sub_admin();
});

function report_vieww(){
var search =  document.getElementById('search').value;
   $.ajax({
    url: "control.php",
    method: "POST",
    data: { action: "view_report",id:search },
    // dataType:"JSON",
    success: function (data) {
        var date = moment().format("DD MMM YYYY - hh:mm a");
      var data = JSON.parse(data);
      if (data.status) {
        var row = "";
        for (var i = 0; i < data.rows.length; i++) {
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
            data.rows[i].report +
            "</td>" +
            "</tr>";
          // print(row);
        }
        $("#report_hall_admin").html(row);
      }
     
    },
    
  });
}
 </script>
 <div class="main-content">

     <div class="page-content" style="margin-top:-3%;">
         <div class="container-fluid">

<div class="row">
                 <div class="col-lg-20" style="width: 100%;">
                     <div class="card">
                         <div class="card-body">

                             <h4 class="header-title">Booking info</h4><button class="btn btn-primary waves-effect waves-light mr-1" style="position:reletive; width:10%; float :right;"><a href="excel.php" style="color:white">Excel</a></button>
                             <div class="app-search d-none d-lg-block" style="float:left; width:60%;">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." id="search" onkeyup="report_vieww(this.value);">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </div> 
                             <div class="table-responsive">
                                 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                     <thead>
                                         <tr>
                                             <th>id</th>
                                             <th>employee</th>
                                             <th>Category</th>
                                             <th>booking</th>
                                             <th>booking info</th>
                                             <th>start_time</th>
                                             <th>end_time</th>
                                            <th>status</th>
                                            <th>report</th>
                                            <!-- <th>Delete</th> -->
                                         </tr>
                                     </thead>
                                     <tbody id="report_hall_admin">
                                        
                                     </tbody>
                                 </table>

                                 

                            
                         </div>
                     </div>

                      <div id="aaa"></div>
                 </div>
             </div>
         </div>
     </div>
               
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>

 <script src="./js/moment.js"> </script>