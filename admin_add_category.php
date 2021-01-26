<script type="text/javascript" src="assets/admin.js"></script>
 
 <div class="main-content">

     <div class="page-content">
         <div class="container-fluid">

<div class="row">
                 <div class="col-lg-20" style="width: 100%;">
                     <div class="card">
                         <div class="card-body">

                             <h4 class="header-title">Add Category</h4>
                             
                             <div class="table-responsive">
                                 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                     <thead>
                                         <tr>
                                             <th>Category_id</th>
                                             <th>Category Name</th>
                                             <th>delete</th>
                                             <th>update</th>
                                         </tr>
                                     </thead>
                                     <tbody id="categorybody">
                                        
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

                             <form class="custom-validation" id="cate" enctype="multipart/form-data">
                                   <input type="hidden" name="action" value="category">
                                  <input type="hidden" name="category_id" value="0"  id="category_id">
                                 <div class="form-group">
                                     <label>Category Name</label><br>
                                     <input type="text" class="form-control" required placeholder="Enter Category Name" id="category" name="category" />
                                 </div><br><br>
                                      <input type="button" name="submit" value="submit" class="btn btn-primary waves-effect waves-light mr-1" onclick="cat()">
                                             

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

 <script>
 $(document).ready(function () {
  categoryview();
});
 </script>