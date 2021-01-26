<script type="text/javascript" src="assets/employee.js"></script>
            <div style="width:100%;">

                <div class="page-content" style="margin-top:-2%;">
                    <div class="container-fluid">

 <div class="row">
                            <div class="col-lg-20" style="width: 100%;">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="header-title">Edit Your Profile</h4>
                                        <form class="custom-validation"method="post"id="form">
                                               <input type="hidden" name="action" value="profile">

                                            <div class="form-group" style="float: left;width: 50%;">
                                                <label>Username</label><br>
                                                <input type="text" class="form-control" style="width: 100%;"  required placeholder="<?=$_SESSION['name']?>" disabled/>
                                            </div>

                                            <div style="float: right; width: 48%;" class="form-group">
                                                <label>Change username</label><br>
                                                <input type="text" class="form-control" style="width: 100%;" required placeholder="Enter username" name="username" id="username" />
                                            </div><br><br>
        
                                            <div class="form-group">
                                                <label>Number</label><br>
                                                <div>
                                                    <input type="number" class="form-control" required
                                                            placeholder="Number" name="number" id="number" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>E-Mail</label><br>
                                                <div>
                                                    <input type="email" class="form-control" required
                                                            parsley-type="email" placeholder="Enter a valid e-mail" name="email" id="email"/>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div>
                                                     <input type="button" name="submit" value="submit" class="btn btn-primary waves-effect waves-light mr-1" onclick="profile()" style="width: 9%;">
                                                    <button type="reset" class="btn btn-secondary waves-effect" >
                                                        Reset
                                                    </button>
                                                </div>
                                            </div>
                                        </form>                            
                                    </div>
                                </div>
                            </div>
