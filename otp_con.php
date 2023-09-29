<?php 
session_start();
$u=$_SESSION['emailid']; 
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"bikerental");

$otp=$_POST['otp'];

$ss="select * from tblotp where otp='$otp'";
$rs=mysqli_query($con,$ss);
$row=mysqli_fetch_array($rs);

if(empty($row))
{
	?>
     <script>
     	alert("Invalid Otp");
     	document.location="index.php";
     </script>
	<?php
}
else
{
	 $k="update tblusers set Otp_verify='1' where EmailId='$u'";
	 mysqli_query($con,$k);
	?>
	 <script>
     	alert("OTP Verification has been done successfully");
     	document.location="index.php";
     </script>
    <?php 
}
?>