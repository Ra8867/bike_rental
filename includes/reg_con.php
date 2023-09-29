<?php 
session_start();

include('config.php');
//error_reporting(0);
if(isset($_POST['signup']))
{

if ($_POST["password"] !== $_POST["confirmpassword"]) {
  die("Passwords do not match!");
}
$fname=$_POST['fullname'];
$email=$_POST['emailid'];
$_SESSION['emailid']=$email; 
$mobile=$_POST['mobileno'];
$password=md5($_POST['password']); 
$license_type=$_POST['ltype'];

// $target_dir = "/bike_rental/includes/uploads/";
// $target_file = $target_dir . basename($_FILES["file"]["name"]);
// move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

move_uploaded_file($_FILES["file"]["tmp_name"], "./uploads/" . $_FILES["file"]["name"]);

$license=$_FILES['file']['name'];


$Otp_verify=0;

$sql="INSERT INTO  tblusers(FullName,EmailId,ContactNo,Password,license_type,license,Otp_verify) VALUES(:fname,:email,:mobile,:password,:license_type,:license,:Otp_verify)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':license_type',$license_type,PDO::PARAM_STR);
$query->bindParam(':license',$license,PDO::PARAM_STR);
$query->bindParam(':Otp_verify',$Otp_verify,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
    $otp=rand(1000,9999);
    $ss="INSERT INTO tblotp(otp) VALUES(:otp)";
    $query1 = $dbh->prepare($ss);
    $query1->bindParam(':otp',$otp,PDO::PARAM_STR);
    $query1->execute();

$msg="Your OTP-".$otp;
$to_email = $email;
$subject = "ONE TIME PASSWORD";
$body = $msg;
$headers = "From: rahul.appugol.ra@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    echo "Email successfully sent to $to_email...";
    header("Location: http://localhost/bike_rental/otp.php");

  ?>
  <script>
    alert("Otp has sent your Email Id");
    document.location="/bike_rental/otp.php";
  </script>
  <?php

} else {
    ?>
      <script>
    alert("Please Check your Email Id");
    document.location="/bike_rental/";
  </script>
    <?php
}

//echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>