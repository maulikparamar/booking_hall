<script type="text/javascript" src="./assets/sub_admin_online.js"></script>
 <script>
 $(document).ready(function () {
  booking_view_employee_sub();
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
                                             <th>id</th>
                                             <th>employee</th>
                                             <th>Category</th>
                                             <th>booking</th>
                                             <th>booking info</th>
                                             <th>start_time</th>
                                             <th>end_time</th>
                                            <th>status</th>
                                            <th>status it</th>
                                            <th>Confirm</th>
                                            <th>Cancel</th>
                                         </tr>
                                     </thead>
                                     <tbody id="booking_hall">
                                        
                                     </tbody>
                                 </table>

                                    <!--  Modal content for the above example -->
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="model">
                                                                <div class="modal-dialog modal-lg">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Booking</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                 <form class="custom-validation"id="booking_add">
                                            <!-- <input type="hidden" name="action" value="booking_hall"> -->
                                            <input type="hidden" name="booking_add_id" id="booking_add_id" value="0">
                                            <div class="form-group">
                                                <div class="form-group">
                                            

                                                <label>Report</label><br>
                                                <textarea type="text" class="form-control" name="report" id="report"style="width: 100%;"></textarea>
                                                </div>
                                            <div style="float:right; width:50%;" class="form-group">
                                            </div>

                     
        
                                            <input type="button" name="submit" value="submit" class="btn btn-primary waves-effect waves-light mr-1" onclick="booking_add_cancel_admin()" style="width: 9%;">
                                                    <button type="reset" class="btn btn-secondary waves-effect" href="home.php?p=edit_profile">
                                                        Cancel
                                                    </button> 
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