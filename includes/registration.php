<?php
//error_reporting(0);
// if(isset($_POST['signup']))
// {
// $fname=$_POST['fullname'];
// $email=$_POST['emailid']; 
// $mobile=$_POST['mobileno'];
// $password=md5($_POST['password']); 
// $license_type=$_POST['ltype'];

// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["file"]["name"]);
// move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)
// $license=$_FILES['file']['name'];


?>


<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmpassword").value;
  if (password !== confirmPassword) {
      alert("Passwords do not match!");
      return false;
  }
  return true;
}
</script>
<div class="modal fade" id="signupform">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Sign Up</h3>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="signup_wrap">
            <div class="col-md-12 col-sm-6">
              <form  method="post" onSubmit="return valid();" name="signup" action="/bike_rental/includes/reg_con.php" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="text" class="form-control" name="fullname" placeholder="Full Name" required="required" required pattern="[A-Za-z\s]+" title="enter characters only" >
                </div>
                      <div class="form-group">
                  <input type="tel" max="9999999999" min="999999999" class="form-control" name="mobileno" placeholder="Mobile Number" maxlength="10" required="required" pattern="[0-9]{10}" title="Only Numbers are allowed">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                   <span id="user-availability-status" style="font-size:12px;"></span> 
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required="required" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+])[0-9a-zA-Z!@#$%^&*()_+]{8,}$"
 >
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Confirm Password" required="required">
                </div>

                <div class="form-group">
                  <label>Choose License Type</label>
                  <select class="form-control" name="ltype" required>

                    <option>--select--</option>
                    <option value="with gear">Two wheeler with gear</option>
                    <option value="without gear">Two wheeler without gear</option>
                    <option value="without gear">four wheeler</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>Upload License</label>
                  <input type="File" class="form-control" name="file" placeholder="Upload License" required="required" required >
                </div>

                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
                </div>
                <div class="form-group">
                  <input type="submit" value="Register" name="signup" id="submit" class="btn btn-block">
                </div>
              </form>
            </div>
            
          </div>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p>Already got an account? <a href="#loginform" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
      </div>
    </div>
  </div>
</div>