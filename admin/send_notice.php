<?php 
$id=$_GET['id'];
$rdate=$_GET['rdate'];
$email=$_GET['email'];

$msg="Your Time Period is Expired on-".$rdate."and we will apply an extra charges if you failed return on date";
$to_email = $email;
$subject = "Bike Rental Expiry";
$body = $msg;
$headers = "From: truptisoumya9@gmail.com";

if (mail($to_email, $subject, $body, $headers)) {
    //echo "Email successfully sent to $to_email...";
    //header("Location: http://localhost/bike_rental/otp.php");

  ?>
  <script>
    alert("Notification has been sent successfully");
    document.location="/bike_rental/admin/manage-bookings.php";
  </script>
  <?php

} else {
    ?>
      <script>
    alert("Sorry..! Failed to send an email notification");
    document.location="/bike_rental/admin/manage-bookings.php";
  </script>
    <?php
}

?>