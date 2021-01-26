<script type="text/javascript" src="./assets/employee_online.js"></script>
 <script>
 $(document).ready(function () {
  report_view_employee();
});

function report_vieww(){
var search =  document.getElementById('search').value;
   $.ajax({
    url: "./online/control_online.php",
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
            data.rows[i].status_it +
            "</td>" +
            "<td>" +
            data.rows[i].report +
            "</td>" +
            "</tr>";
          // print(row);
        }
        $("#report_hall").html(row);
      }
     
    },
    
  });
}



 </script>
 <div style="width:100%;">

     <div class="page-content" style="margin-top:-3%;">
         <div class="container-fluid">

<div class="row">
                 <div class="col-lg-20" style="width: 100%;">
                     <div class="card">
                         <div class="card-body">

                             <h4 class="header-title">Booking info</h4>
                             <div class="app-search d-none d-lg-block">
                            <div class="position-relative">
                                <input type="text" class="form-control" placeholder="Search..." id="search" onkeyup="report_vieww(this.value);">
                                <span class="mdi mdi-magnify"></span>
                            </div>
                        </div>  
                             
                             <div class="table-responsive">
                                 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                     <thead>
                                         <tr>
                                             <th>Id</th>
                                             <th>Employee</th>
                                             <th>Category</th>
                                             <th>Booking</th>
                                             <th>Booking info</th>
                                             <th>Start time</th>
                                             <th>End time</th>
                                            <th>Status</th>
                                            <th>Status it</th>
                                            <th>Report</th>
                                         </tr>
                                     </thead>
                                     <tbody id="report_hall">
                                        
                                     </tbody>
                                 </table>
                           <!--  Modal content for the above example -->
                           <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="model">
                                                     <div class="modal-dialog modal-lg">
                                                         <div class="modal-content">
                                                             <div class="modal-header">
                                                                 <h5 class="modal-title mt-0" id="myLargeModalLabel">Report</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                             </div>
                                                             <div class="modal-body">

                             <form class="custom-validation" >
                                <div id="report_msg"></div>
                             </form>  
                                  </div>
                                                         </div><!-- /.modal-content -->
                                                     </div><!-- /.modal-dialog -->
                                                 </div><!-- /.modal -->
                                 

                            
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