<?php
require 'connections/connect.inc.php';
include 'connections/core.inc.php';
$msg = "";
if(!loggedin()) {
  if( isset($_POST['Username']) && isset($_POST['Password']) && isset($_POST['Password_again']) && isset($_POST['Firstname']) && isset($_POST['Surname'])){
   $Username = test_input($_POST['Username']);
   $Password = test_input($_POST['Password']);
   $Pass_again = test_input($_POST['Password_again']);
   $Firstname = test_input($_POST['Firstname']);
   $Surname = test_input($_POST['Surname']);
   if(!empty($Username) && !empty($Password) && !empty($Pass_again) && !empty($Firstname) && !empty($Surname)){
     if($Password != $Pass_again)
     $msg = "Password's do not match!";
     else{
     $query = "SELECT `username` FROM `user` WHERE `username` = '$Username'";
     $query_run = mysql_query($query);
     $query_num_rows = mysql_num_rows($query_run);
     if($query_num_rows > 0)
     $msg= "*The UserName already Exists. Please Choose a different Username*";
     else {
       $pass_hash = md5($Password);
       $query = "INSERT INTO `user` VALUES ('', '".mysql_real_escape_string($Username)."', '".mysql_real_escape_string($pass_hash)."' ,'".mysql_real_escape_string($Firstname)."', '".mysql_real_escape_string($Surname)."')";
       if(mysql_query($query)){
       $msg =  "You have been sucessfully registered.Move on to Login Page";
       }
       else
       $msg = "*We could not Register you at this time.Please Try again later*";
     }
     }
   }
else
    $msg = "*Enter all the required Credentials*";
  }
?>
<!DOCTYPE HTML>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
   	 <link rel="stylesheet" href="css/demo.css">
     <link rel="stylesheet" href="css/sky-forms.css">
    <!--[if lt IE 7]>
            <link href="css/fontello-ie7.css" type="text/css" rel="stylesheet">
        <![endif]-->
    <!-- Google Web fonts -->
    <link href='http://fonts.googleapis.com/css?family=Quattrocento:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Patua+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <style>
    body {
        padding-top: 60px;
    }
    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    </head>
    <body>
    <!--******************** NAVBAR ********************-->
        <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
            <h1 class="brand"><a href="index.php#top"  style="text-decoration: none">Crazy Ganith</a></h1>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <nav class="pull-right nav-collapse collapse">
              <ul id="menu-main" class="nav">
               <li><a title="Rules" href="index.php#Rules">Rules</a></li>
                <li><a title="Prizes" href="index.php#Prizes">Prizes</a></li>
                <li><a title="contact" href="index.php#contact">Contact</a></li>
                 <li><a title="Login" href="index.php#top">Login</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </div>
        <div id="headerwrap">
      <header class="clearfix">

            <div class="rest">
            <div class="body body-s" >
              		<form action="register.php" class="sky-form" method = "POST">
				<header><b>Register Here</b></header>


				<fieldset>
                                          <section id = "error" style="color:red" align = "center">
                                               <?php echo $msg;?>
                                     </section>
				<section>
						<label class="input">

							<input type="textbox" placeholder="Email address" name = "Username"
							>
						</label>
					</section>

					<section>
						<label class="input">
							<input type="password" placeholder="Password" name = "Password"			>
						</label>
					</section>

					<section>
						<label class="input">
							<input type="password" placeholder="Confirm password" name = "Password_again" 						>
						</label>
					</section>
				</fieldset>

				<fieldset>
					<div class="row">
						<section class="col col-6">
							<label class="input">
								<input type="textbox" placeholder="First name" name = "Firstname"
       							>
                                                        </label>
						</section>
						<section class="col col-6">
							<label class="input">
								<input type="textbox" placeholder="Last name" name = "Surname"
								>
							</label>
						</section>
					</div>
                                                 <section>
					<label class="input">

							<input type="textbox" placeholder="Mobile Number" name = "Phone Number"
							>
						</label>
                                                          </section>
				</fieldset>
				<footer>
					<button type="submit" class="button">Register</button>
				</footer>
			</form>
            </div>
            </div>
            <!-- ./span12 -->

      </header>
    </div>

    </body>
    </html>
<?php

}else
  echo 'You\'re already logged in.';

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>