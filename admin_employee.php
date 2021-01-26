<script type="text/javascript" src="assets/admin.js"></script>
 <script>
 $(document).ready(function () {
  admin_emp();
});
 </script>
 <div class="main-content">

     <div class="page-content" style="margin-top:-3%;">
         <div class="container-fluid">

<div class="row">
                 <div class="col-lg-20" style="width: 100%;">
                     <div class="card">
                         <div class="card-body">

                             <h4 class="header-title">Booking info</h4>
                             
                             <div class="table-responsive">
                                 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                     <thead>
                                         <tr>
                                             <th>Id</th>
                                             <th>Position</th>
                                             <th>Username</th>
                                             <th>Password</th>
                                             <th>Phone number</th>
                                             <th>Email</th>
                                            <th>Delete</th>
                                            <th>Status log</th>
                                         </tr>
                                     </thead>
                                     <tbody id="admin_emp">
                                        
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


 <script>
  function  activeInactive(recordId,status) {
     console.log(recordId,status);
    var message = ((status == 0?" inactive ":" Active "));
    if (confirm("Are you sure to"+ message+ "the user")){
        $.ajax({
            url: "control.php",
    method: "post",
    data: { action: "activeInactive" ,status:status,id:recordId},
    success:async function (data) {
        var data = JSON.parse(data);
      if (data.status) {
       await update_emp_status(data.rows[0].id_login,data.rows[0].status_log);
    }
    }
        });
    }
}


function update_emp_status(recordId,status){
    $.ajax({
            url: "control.php",
    method: "post",
    data: { action: "activeInactiveupdate" ,status:status,id:recordId},
    success: function (data) {
        var data = JSON.parse(data);
      if (data.status) {
        window.location.href = "admin_home.php?p=admin_employee";
                }
                else{
                    alert('error');
                }
        }
        });
}
 </script>