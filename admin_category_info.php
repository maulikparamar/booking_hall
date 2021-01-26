<script type="text/javascript" src="assets/admin.js"></script>
 <script>
 $(document).ready(function () {
  category_info_view_category();
});

$(document).ready(function () {
  bookingview();
});
 </script>
 <div class="main-content">

     <div class="page-content">
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
                                             <th>Booking_info_id</th>
                                             <th>Category Name</th>
                                             <th>booking info</th>
                                             <th>Status</th>
                                             <th>delete</th>
                                             <th>update</th>
                                         </tr>
                                     </thead>
                                     <tbody id="bookingbody">
                                        
                                     </tbody>
                                 </table>

                                   <button type="button" class="btn btn-primary btn-sm waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">+</button>
                                             
                                                 <!--  Modal content for the above example -->
                                                 <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="model">
                                                     <div class="modal-dialog modal-lg">
                                                         <div class="modal-content">
                                                             <div class="modal-header">
                                                                 <h5 class="modal-title mt-0" id="myLargeModalLabel">category</h5>
                                                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                     <span aria-hidden="true">&times;</span>
                                                                 </button>
                                                             </div>
                                                             <div class="modal-body">

                             <form class="custom-validation" id="booking_info" enctype="multipart/form-data">
                                   <input type="hidden" name="action" value="booking">
                                  <input type="hidden" name="booking_id" value="0"  id="booking_id">
                                  <div class="form-group">
                                                <label>Category</label><br>
                                                <select class="form-control" name="id_category" id="id_category" style="width: 100%;">
                                              
                                            </select>
                                            </div><br>
                                 <div class="form-group">
                                     <label>Booking Name</label><br>
                                     <input type="text" class="form-control" required placeholder="Enter Booking Name" id="bookingname" name="bookingname" />
                                 </div><br>
                                 <div class="form-group">
                                     <label>Status</label><br>
                                     <input type="text" class="form-control" required placeholder="Enter Description Name" id="status" name="status" />
                                 </div><br>

                                      <input type="button" name="submit" value="submit" class="btn btn-primary waves-effect waves-light mr-1" onclick="booking()">
                                             

                                         <button type="reset" class="btn btn-secondary waves-effect">
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