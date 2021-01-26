<script type="text/javascript" src="./assets/employee_online.js"></script>
            <div  style="width:100%;">

                <div class="page-content" style="margin-top: -3%">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Online Category</h4>    
                                        <select class="form-control" id="id_category" style="width:30%; margin:1% 0;" onchange="category_view_product();">
                                        </select>
                                        <div class="table-responsive">
                                        <div id="category_show" style='display : flex;   flex-wrap:wrap; flex-direction: row; text-align:center;'>
                                                   
                                                   </div>
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
                                            <input type="hidden" name="action" value="booking_hall">
                                            <input type="hidden" name="booking_add_id" id="booking_add_id" value="0">
                                          <input type="hidden" name="id" id="id" value=<?= $_SESSION['id']?>>
                                          <input type="hidden" name="e" id="e">
                                            <div class="form-group">
                                                <div class="form-group"style="float:left;width:49%;">
                                            

                                                <label>Online Category</label><br>
                                                <input type="text" readonly class="form-control" name="category" id="category"style="width: 100%;">
                                                </div>
                                            <div style="float:right; width:50%;" class="form-group">
                                            <label>Booking</label><br>
                                                <input type="text" readonly class="form-control" name="book" id="book"style="width: 100%;">
                                                
                                            </div>
                                            <br>


                                            <div class="form-group">
                                                <label>Duration Time Start</label><br>
                                
                <div class="controls input-append date form_datetime"  data-date-format="dd MM yyyy - HH:ii p" required="" data-link-field="dtp_input1" >
                    <input size="16" type="text" value="" readonly class="form-control" id="start_time" name="datetime_start">
                    <span class="add-on"><i class="icon-remove"></i></span>
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" />
                                            </div>
                                            <label> End Time</label><br>
                                
                <div class="controls input-append date form_datetime"  data-date-format="dd MM yyyy - HH:ii p" required="" data-link-field="dtp_input1">
                    <input size="16" type="text" value="" readonly class="form-control" id="datetime_end" name="datetime_end">
                    <span class="add-on"><i class="icon-remove"></i></span>
					<span class="add-on"><i class="icon-th"></i></span>
                </div>
				<input type="hidden" id="dtp_input1" value="" /><br/>

                                                <label>Booking</label><br>
                                                <input type="text" class="form-control" required="" required placeholder="Enter Booking" id="booking" name="booking" />
                                            </div>

                     
        
                                            <input type="button" name="submit" value="submit" class="btn btn-primary waves-effect waves-light mr-1" onclick="get_data()/*booking_add()*/" style="width: 9%;">
                                                    <button type="reset" class="btn btn-secondary waves-effect" href="home.php?p=edit_profile">
                                                        Cancel
                                                    </button> 
                                         </form>                              
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div><!-- /.modal -->
                                     <!-- Extra Large modal -->
                                                           
                                        </div>
        
                                    </div>
                                </div>
                            </div>

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
        
    <script src="./js/moment.js"> </script>
<script>
$(document).ready(function () {
    category_info_view_category();
    
});

function format(date) {
  let arr = date.split(" ");
  arr[1] = arr[1].substring(0, 3);
  return moment(arr.join(" ") , 'DD MMM YYYY - hh:mm A');
}
// 30 Sep 2020 - 09:05 pm


 function get_data() {
    var start = document.getElementById('start_time').value;
    var end = document.getElementById('datetime_end').value;
    var booking = document.getElementById('booking').value;
   var e =  document.getElementById('e').value;
   if(e == 'close'){
    alert('close');
   }else if(start == ''){
       alert('insert starting date and time');
   }else if(end == ''){
       alert('insert end date and time');
   }else if(booking == ''){
       alert('insert booking');
   }
   else
  $.ajax({
    url: "./online/control_online.php",
    method: "post",
    data: { action: "report_view_employee_check" },
    success: function (data) {
     data = JSON.parse(data);
      if (!data.status) {
       alert('not data');
      }
         const currentStartTime = format(document.getElementById('start_time').value);
         const currentEndTime = format(document.getElementById('datetime_end').value);
        const category = document.getElementById('category').value;
        const booking = document.getElementById('book').value;
       
         const bookedTimes = [];
        data.rows.forEach((d) => {
        bookedTimes.push({
                 category:d.category,
             booking:d.booking,
         start_time: format(d.start_time),
         end_time: format(d.end_time),
         confirm:d.status,
         confirmit:d.status_it
    });
  });
  for(let i = 0; i < bookedTimes.length ; i++){
     
    //console.log(currentStartTime);
    if(bookedTimes[i].start_time.isSameOrAfter(currentStartTime) && bookedTimes[i].end_time.isSameOrBefore(currentEndTime) && bookedTimes[i].category == category && bookedTimes[i].booking == booking && bookedTimes[i].confirm == 'Confirm' && bookedTimes[i].confirmit == 'Confirm'){
            alert('already booked!!!!!!');
           return; 
        }else if(bookedTimes[i].start_time == start_time &&  bookedTimes[i].end_time == end_time && bookedTimes[i].category == category && bookedTimes[i].booking == booking && bookedTimes[i].confirm == 'Confirm' && bookedTimes[i].confirmit == 'Confirm'){
            alert('already booked!!!!!!');
           return;
        }
  }
    booking_add();

    },
  });
}

  

</script>
<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="./js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
    $('.form_time').datetimepicker({
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
    </script>