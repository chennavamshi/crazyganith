<?php
$msg = "";
if(isset($_POST['username']) && isset($_POST['pass'])) {
  $username = test_input($_POST['username']);;
  $pass = test_input($_POST['pass']);
  if((!empty($username) && !empty($pass))) {
    $pass = md5($pass);
    $query = "SELECT `id` FROM `user` WHERE `username` = '".mysql_real_escape_string($username)."' AND `password` = '".mysql_real_escape_string($pass)."'";
    if( $query_run = mysql_query($query)){
     // echo $query;
      $query_num_rows = mysql_num_rows($query_run);
      if ($query_num_rows == 0){
      $msg =  'Invalid Username/Password combination.';
      }
      else if($query_num_rows == 1){
      $user_id = mysql_result($query_run,0,'id');
      $_SESSION['user_id'] = $user_id;
      $_SESSION['mode'] = 0;
      $_SESSION['username'] = $username;
      //$msg = "Sorry the event has been started.You cannot login Now!";
      //header('Location:index.php');
      }
    }
  }
  else
      {
      $msg =  'You must supply a username and password';
      }
  }

?>
?>
<!DOCTYPE HTML>
    <html lang="en">
    <head>
    <meta charset="utf-8">
    <title>Crazy Ganith 2014</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/style3.css" rel="stylesheet">
   	 <link rel="stylesheet" href="css/demo.css">
     <link rel="stylesheet" href="css/sky-forms.css">
   <link href="css/common.css" rel="stylesheet">

    <link href="css/fontello.css" type="text/css" rel="stylesheet">
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

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Load ScrollTo -->
    <script type="text/javascript" src="js/jquery.scrollTo-1.4.2-min.js"></script>
    <!-- Load LocalScroll -->
    <script type="text/javascript" src="js/jquery.localscroll-1.2.7-min.js"></script>
    <!-- prettyPhoto Initialization -->
    <script type="text/javascript" charset="utf-8">
          $(document).ready(function(){
            $("a[rel^='prettyPhoto']").prettyPhoto();
          });
        </script>
    </head>
    <body>
    <!--******************** NAVBAR ********************-->
        <div class="navbar-wrapper">
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
            <h1 class="brand"><a href="#top"  style="text-decoration: none">Crazy Ganith</a></h1>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
               <nav class="pull-right nav-collapse collapse">
              <ul id="menu-main" class="nav">
               <li><a title="Rules" href="#Rules">Rules</a></li>
                <li><a title="Prizes" href="#Prizes">Prizes</a></li>

                <li><a title="contact" href="#contact">Contact</a></li>
                 <li><a title="Login" href="#top">Login</a></li>
              </ul>
            </nav>
          </div>
          <!-- /.container -->
        </div>
        <!-- /.navbar-inner -->
      </div>
      <!-- /.navbar -->
    </div>
	 <div id="top"></div>
        <div id="headerwrap">
      <header class="clearfix">

            <div class="rest">
            <div class="bg-cyan">
		<div class="body body-s">

			<form action = "<?php echo $current_file; ?>" method = "POST"  class="sky-form">
				<header><center><b>Sign In </b><br>
                                </center>
                                </header>
                                	<fieldset>
                                        <div id = "error" style="color:red" align = "center">
                                         <?php echo $msg;?>
                                         </div>
					<section>
						<label class="input">
							<input type="textbox" placeholder="Email address" name = "username">
						</label>
					</section>

					<section>
						<label class="input">
							<input type="password" placeholder="Password" name = "pass" >
						</label>
					</section>
    </fieldset>
    <footer>
					<button type="submit" class="button">Log in</button>
					<a href="register.php" class="button">  Register  </button> </a>

                                        <br>
                                               <div align="right">
             <a href="<?php echo $openid->authUrl() ?>" class = "button">Login with Google</a>
             </div>
    </form>
    </footer>
    </div>
	</div>
            </div>
            <!-- ./span12 -->

      </header>
    </div>

    <hr>
    <!--******************** Portfolio Section ********************-->
   <section id="Rules" class="single-page scrollblock">
      <div class="container">


                   <div class="row">
				   <br>
                <div class="span7" id="ruler" style = "padding-left:50;">
                    <h2>Contest Rules </h2><br>
                    <b> Primary Round </b><br>
                    <p class="lead" style="font-size:16px; line-height:1.5em">
                    30 questions<br >
                    Max Time :1 Hour<br >
                    Your question will be skipped if you have not selected any option.<br >
                    +3 points for every CORRECT answer                                     <br >
                    -2 points for every INCORRECT answer                                        <br >
                    0 points for skipping a question                                                 <br >
                    Participants can not go back to any previous questions. <br>                              <br >
                    <b>Final round</b>                                                                               <br >
                    The top 100 participants only enter the Final Round                                             <br >
                    30 questions                                                                                         <br >
                    Max Time :1 Hour                                                                                          <br >
                    +6 points for every CORRECT answer                                                                             <br >
                    -3 points for every INCORRECT answer                                                                                <br >
                    Participants can not go back to any previous questions.                                                                  <br >
                    </p>
					</div>
			    <div class="span4">
                <div class="col-lg-5 col-lg-offset-2 col-sm-10">
				     <br>
					 <br>
                    <img float="left"  style="border-radius:8px;"src="img/rules2.jpg" alt="Image">
					<br>
					<h2 style="width:370px; height: 180px; border-radius: 10px; background-color:#ffffcc; padding-top:60px; text-align:center;"> <span style="text-decoration:underline;">Event Details </span> <br>
					  <br>
                                          <p style="font-size:18px"> First Round: 24th Feb 8:00 - 9:00 P.M<br>
					     Second Round: 26th Feb 8:00 - 9:00 P.M<br>
						 </p></h2>

                </div>
             </div>

      </div>
      <!-- /.container -->
    </section>
    <hr>
    <!--******************** Services Section ********************-->
    <section id="Prizes" class="single-page scrollblock">

      <div class="container" id="ruler2">



    <h1 align='center'> Awards</h1>

				   <h3 style="margin-top:325px; margin-left:140px;">1st Prize Worth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 2nd Prize Worth &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 3rd Prize Worth<br> <span style="margin-top:325px; margin-left:40px;">Rs 2000</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs 1200 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs 800</h3>






      </div>
    </section>
    <hr>
    <hr>
    <!--******************** Testimonials Section ********************-->


    <section id="contact" class="single-page scrollblock">
      <div class="container">
        <div class="align"><i class="icon-group-circled"></i></div>
        <h1>Meet the team</h1>
        <section class="main">

				<ul class="ch-grid">
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<h3 style="font-size:15px;">Vamshi C <br> 7359477417</h3>
								<p><a href="https://www.facebook.com/vamCKsna">View on FB</a></p>
							</div>
							<div class="ch-thumb ch-img-1"></div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<h3 style="font-size:15px;">Vinodh V <br> 9998932355</h3>
								<p><a href="https://www.facebook.com/vinodh.velimineti">View on FB</a></p>
							</div>
							<div class="ch-thumb ch-img-2"></div>
						</div>
					</li>
					<li>
						<div class="ch-item">
							<div class="ch-info">
								<h3 style="font-size:15px;">Vyshaal N<br> 9898353128</h3>
								<p style="padding-left:1px;"> <a href="https://www.facebook.com/vyshaalnarayanam">View on FB</a></p>
							</div>
							<div class="ch-thumb ch-img-3"></div>
						</div>
					</li>
						<li>
						<div class="ch-item">
							<div class="ch-info">
								<h3 style="font-size:15px;">Kranthi K <br> 9408043121</h3>
								<p><a href="https://www.facebook.com/kranthi957">View on FB</a></p>
							</div>
							<div class="ch-thumb ch-img-4"></div>
						</div>
					</li>
						<li>
						<div class="ch-item">
							<div class="ch-info">
								<h3 style="font-size:15px;">Akshay M</h3>
								<p><a href="https://www.facebook.com/akshay.mallipeddi">View on FB</a></p>
							</div>
							<div class="ch-thumb ch-img-5"></div>
						</div>
					</li>
				</ul>

			</section>
			<br><br><br><br>
        
      </div>
    </section>
    <!--******************** Contact Section ********************-->
        <hr>
    <div class="bnner" style ="align:right">
    <div class = "span2" style = "margin-left:60%; margin-top:-100px">
                  <div class="synapse">
                    <a class="btn btn-default btn-lg" href="http://synapse.daiict.ac.in/2014/" style="text-decoration:none;">Synapse</a>   </div></div>
    <div class = "span2"  style = "margin-left:80%; margin-top:-160px">
                 <div class="facebook">
                        <a class="btn btn-default btn-lg" href="https://www.facebook.com/crazyganith14" style="text-decoration:none;">Facebook</a>
                        </div>
    </div>
        <!-- /.container -->
    </div>
    <hr>
    <div class="footer-wrapper">
      <div class="container">
        <footer>
          <small>&copy; 2014 Crazy Ganith - Synapse. All rights reserved.</small>
        </footer>
      </div>
      <!-- ./container -->
    </div>
	<!-- Loading the javaScript at the end of the page -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/site.js"></script>
    
    <!--ANALYTICS CODE-->
	<script type="text/javascript">
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-29231762-1']);
	  _gaq.push(['_setDomainName', 'dzyngiri.com']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	</script>
    </body>
    </html>
<?php
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>