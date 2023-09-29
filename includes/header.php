
<style>
    /* Style the dropdown button */
    .dropdown {
      position: relative;
      display: inline-block;
    }

    /* Style the dropdown content (hidden by default) */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
      z-index: 1;
    }

    /* Style the dropdown links */
    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    /* Change the background color of the dropdown links on hover */
    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logg2.png" alt="image"/></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
           
         
   <?php   if(strlen($_SESSION['login'])==0)
	{
?>
 <div class="login_btn"> <a href="#loginform" class="btn btn-xs uppercase" data-toggle="modal" data-dismiss="modal">Login / Register</a> </div>
<?php }
else{

echo "Welcome To Vehicle rental portal";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      
      <div class="header_wrap">
        <div class="user_login">
        <div class="dropdown">
    <button class="dropbtn">
    <i class="fa fa-user-circle" aria-hidden="true"></i>
<?php
$email=$_SESSION['login'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?>
   <i class="fa fa-angle-down" aria-hidden="true"></i>
    </button>
    <div class="dropdown-content" style="z-index:999">
    <?php if($_SESSION['login']){?>
            <a href="profile.php">Profile Settings</a>
              <a href="update-password.php">Update Password</a>
            <a href="my-booking.php">My Booking</a>
            <a href="post-testimonial.php">Post a Testimonial</a>
          <a href="my-testimonials.php">My Testimonial</a>
            <a href="logout.php">Sign Out</a>
            <?php } else { ?>
            <a href="#loginform"  data-toggle="modal" data-dismiss="modal">Profile Settings</a>
              <a href="#loginform"  data-toggle="modal" data-dismiss="modal">Update Password</a>
            <a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Booking</a>
            <a href="#loginform"  data-toggle="modal" data-dismiss="modal">Post a Testimonial</a>
          <a href="#loginform"  data-toggle="modal" data-dismiss="modal">My Testimonial</a>
            <a href="#loginform"  data-toggle="modal" data-dismiss="modal">Sign Out</a>
            <?php } ?>
    </div>
  </div>
        </div>
        <div class="header_search">
          <div id="search_toggle"><i class="fa fa-search" aria-hidden="true"></i></div>
          
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="index.php">Home</a>    </li>

          <li><a href="page.php?type=aboutus">About Us</a></li>
          
          <li><a href="page.php?type=faqs">FAQs</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end -->

</header>
