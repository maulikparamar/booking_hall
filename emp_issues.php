<script type="text/javascript" src="assets/employee.js"></script>
<script>
$(document).ready(function (){
    msg_view();
});

</script>
 <div style="width:100%;">

     <div class="page-content" style="margin-top:-3%;">
         <div class="container-fluid">

<div class="row">
                 <div class="col-lg-20" style="width: 50%; margin: 0 auto;">
                     <div class="card">
                         <div class="card-body">
                         <form class="custom-validation"id="issues_add">
                                            <input type="hidden" name="action" value="issues_insert">
                                            <input type="hidden" name="id" id="id" value=<?= $_SESSION['id']?>>            
                                 <h4 class="header-title">FeedBack</h4>
                                                 
                             <textarea id="feedback" name="feedback" class="form-control" placeholder="FeedBack"></textarea><br>    
                            <input type="button" onclick="issues();"  name="submit" value="submit" class="btn btn-primary waves-effect waves-light mr-1"/>
                            
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-20" style="width: 60%; margin:0 auto;">
                     <div class="card">
                         <div class="card-body">
                         <h2>DashBoard</h2>
                         <div id="msgbody"></div>
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
     </div>
 </div>