<script type="text/javascript" src="assets/admin.js"></script>
 <script>
 $(document).ready(function (){
    msg_view();
 });
 </script>
 <div class="main-content">

     <div class="page-content" style="margin-top:-3%;">
         <div class="container-fluid">

<div class="row">
                 <div class="col-lg-20" style="width: 100%;">
                     <div class="card">
                         <div class="card-body">

                             <h4 class="header-title">Imporent Notice</h4>
                             
                             <!-- <div class="table-responsive">
                                 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                     <thead>
                                         <tr>
                                             <th>id</th>
                                             <th>employee</th>
                                             <th>Feedback</th>
                                             <th>Delete</th>
                                         </tr>
                                     </thead>
                                     <tbody id="issuesbody">
                                        
                                     </tbody>
                                 </table> -->
                                 <form class="custom-validation" id="msg">
                                                <input type="hidden" name="action" value="msg_insert">
                                             <!-- <input type="hidden" name="id" value="0"  id="id"> -->
                                            <div class="form-group">
                                                <label>Message</label><br>
                                                <textarea type="text" class="form-control" required placeholder="Enter Message" id="msg" name="msg"></textarea>
                                            </div>    
                                            <div class="form-group mb-0">
                                                <div>
                                                    <input type="button" name="button" value="submit" class="btn btn-primary waves-effect waves-light mr-1" onclick="massage()" style="width: 7%;">

                                                    <button type="reset" class="btn btn-secondary waves-effect" href="home.php?p=edit_profile">
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>  

                                        <div class="table-responsive">
                                 <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" >
                                     <thead>
                                         <tr>
                                             <th>id</th>
                                             <th>Message</th>
                                             <th>Delete</th>
                                         </tr>
                                     </thead>
                                     <tbody id="msgbody">
                                        
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