<!-- function to redirect -->
<?php
function redirect_to($NewLocation){
    header("Location:".$NewLocation);
   	exit;
}
?>
<!-- function to execute signup -->
<?php
 $Connection = mysqli_connect('localhost', 'root', '');
 $Selected = mysqli_select_db($Connection, 'health');

if(isset($_POST["Signup"])){
if(!empty($_POST["userid"])&&!empty($_POST["password"])){
$Userid=$_POST["userid"];
$Password=$_POST["password"];
$Type=$_POST["type"];
$Sex=$_POST["sex"];
$Query="INSERT INTO login(userid, password, user_type, sex)
        VALUES('$Userid', '$Password', '$Type', '$Sex')";
    $Execute=mysqli_query($Connection, $Query);
if($Execute){
	   
    if($Type=="Doctor")
     			redirect_to("DoctorDb.php");
     	    else
     	    	redirect_to("PatientDb.php");
}
}
else{
    echo '<span>Please fill all fields</span>';
}
} 
?>

<!-- function to execute login -->

<?php
 $Connection = mysqli_connect('localhost', 'root', '');
 $Selected = mysqli_select_db($Connection, 'health');

if(isset($_POST["login"])){

	if(!empty($_POST["userid"])&&!empty($_POST["password"])){
		session_start();
		$Userid=$_POST["userid"];
		$Password=$_POST["password"];
		$Type=$_POST["type"];

		$user_check_query = "SELECT id FROM login WHERE userid='$Userid' AND password='$Password' AND user_type='$Type' LIMIT 1";
		$Execute=mysqli_query($Connection, $user_check_query);
		$Id = 0;
		while($DataRows=mysqli_fetch_array($Execute)){
        $Id=$DataRows['id'];
        }
		$x= $Id;
		$_SESSION['id'] = $x;
        $result = mysqli_query($Connection, $user_check_query);
        $user = mysqli_fetch_assoc($result);
  
        if ($user) { // if user exists
        	
        	if($Type=="Doctor")
     			redirect_to("DoctorDb.php");
     	    else
     	    	redirect_to("PatientDb.php");
        }
        else{
        	
     		 echo '<span>incorrect id or password</span>';

        }
	}
}	 
?>






<!DOCTYPE html>
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Medical</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/jquery-ui.css">				
			<link rel="stylesheet" href="css/nice-select.css">							
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">			
			<link rel="stylesheet" href="css/jquery-ui.css">			
			<link rel="stylesheet" href="css/login.css">
		</head>
<body>

	<header id="header">
	  		
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="index.html"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			          <li><a href="index.php">Home</a></li>
			          
			          <li><a href="doctors.php">Doctors</a></li>
			          <li class="menu-has-children"><a href="">Blog</a>
			            <ul>
			              <li><a href="blog-home.php">Blog Home</a></li>
			              <li><a href="blog-single.php">Blog Single</a></li>
			            </ul>
			          </li>	
			          <li class="menu-has-children"><a href="">Features</a>
			            <ul>
			            	  <li><a href="gapi.php">Hospitals Near You</a></li>
			            	  <li><a href="bmi.php">BMI Calculator</a></li>
			            	  <li><a href="https://www.eraktkosh.in/BLDAHIMS/bloodbank/transactions/bbpublicindex.html" target = "_blank">Blood Banks Near You</a></li>
					          <li class="menu-has-children"><a href="">Know About Your Disease</a>
					            <ul>
					              <li><a href="https://symptomchecker.isabelhealthcare.com/suggest_diagnoses_advanced/landing_page" target = "_blank">Symptom Checker</a></li>
					              <li><a href="treatment.php">Treatment</a></li>
					            </ul>
					          </li>					                		
			            </ul>
			          </li>					          					          		          
			          <li><a href="contact.html">Contact</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->
			  
			<!-- start banner Area -->
			<section class="banner-area relative about-banner" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">				
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Log	In			
							</h1>	 
							
						</div>	
					</div>
				</div>
			</section>


			<section class="">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 loginclass" style="width: 30%;">

							<div class="card text-center">
  							<div class="card-header">
    							Log In
  							</div>
  							<div class="card-body">
    						
    						<div style="margin: 0 auto;">

    							<form action="login.php", method="post" style="margin: 0 auto;">

								<div class="form-group">
    							<label for="inputEmail3" class="col-sm-4 col-form-label">User Id</label>
   								
      							<input type="text" class="form-control" id="inputEmail3" placeholder="userid" name="userid">
    							
  								</div>

  								<div class="form-group">
    							<label for="inputPassword3" class="col-sm-4 col-form-label">Password</label>
    							
      							<input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
    							
  								</div>
								
								<div class="form-group">
								<label class="my-1 mr-2 col-sm-4 col-form-label" for="inlineFormCustomSelectPref">Type Of User</label>
  								
  								<select class="form-control form-control-sm" id="inlineFormCustomSelectPref" name="type">
    								       <option selected disabled>User type</option>
    								       <option>Doctor</option>  
    									   <option>Patient</option>
    							</select>
    							
 								</div>

								<div class="form-group">
								
								<button type="Submit" name="login" value="Login" class="btn btn-success">Log In</button>
								
								</div>
							</form>



    						</div>	
    						
  							</div>
  							</div>
						</div>
					</di>
				</div>	
			</section>

<hr style="width: 80%;">
			<section class="">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-6 loginclass" style="width: 30%;">

							<div class="card text-center">
  							<div class="card-header">
    							Sign Up
  							</div>
  							<div class="card-body">
    						
    						<div style="margin: 0 auto;">
							
							<form action="login.php", method="post" style="margin: 0 auto;">
								<div class="form-group">
    							<label for="inputEmail" class="col-sm-4 col-form-label">User Id</label>
   								
      							<input type="text" class="form-control" id="inputEmail" placeholder="userid" name="userid">
    							
  								</div>

  								<div class="form-group">
    							<label for="inputPassword" class="col-sm-4 col-form-label">Password</label>
    							
      							<input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
    							
  								</div>
								
								<div class="form-group">
								<label class="my-1 mr-2 col-sm-4 col-form-label" for="inlineFormCustomSelect">Type Of User</label>
  								
  								<select class="form-control form-control-sm" id="inlineFormCustomSelect" name="type">
    								       <option selected disabled>User type</option>
    								       <option>Doctor</option>  
    									   <option>Patient</option>
    							</select>
    							
 								</div>

 								<div class="form-group">
								<label class="my-1 mr-2 col-sm-4 col-form-label" for="tomS">Sex</label>
  								
  								<select class="form-control form-control-sm" id="tomS" name="sex">
    								       <option selected disabled>Select your Sex</option>
    								       <option>Male</option>  
    									   <option>Female</option>
    									   <option>Others</option>
    							</select>
    							
 								</div>

 								<div class="form-group">
								
								<button type="Submit" name="Signup" value="Signup" class="btn btn-success">Sign Up</button>
								</div>
							</form>

    						</div>	
    						
  							</div>
  							</div>
						</div>
					</di>
				</div>	
			</section>



							
					
					

<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-4  col-md-6">
							<div class="single-footer-widget mail-chimp">
								<h6 class="mb-20">Contact Us</h6>
								<p>
									56/8, Santa bullevard, Rocky beach, San fransisco, Los angeles, USA
								</p>
								<h3>012-6532-568-9746</h3>
								<h3>012-6532-568-97468</h3>
							</div>
						</div>							
						<div class="col-lg-6  col-md-12">
							<div class="single-footer-widget newsletter">
								<h6>Newsletter</h6>
								<p>You can trust us. we only send promo offers, not a single spam.</p>
								<div id="mc_embed_signup">
									<form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">

										<div class="form-group row" style="width: 100%">
											<div class="col-lg-8 col-md-12">
												<input name="EMAIL" placeholder="Your Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Your Email Address '" required="" type="email">
											</div> 
										
											<div class="col-lg-4 col-md-12">
												<button class="nw-btn primary-btn circle">Subscribe<span class="lnr lnr-arrow-right"></span></button>
											</div> 
										</div>		
										<div class="info"></div>
									</form>
								</div>		
							</div>
						</div>					
					</div>

					<div class="row footer-bottom d-flex justify-content-between">
						<p class="col-lg-8 col-sm-12 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
						<div class="col-lg-4 col-sm-12 footer-social">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>					
					</div>
				</div>
			</footer>
			<!-- End footer Area -->


			<script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="js/popper.min.js"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
 			<script src="js/jquery-ui.js"></script>					
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
    		<script src="js/jquery.tabs.min.js"></script>						
			<script src="js/jquery.nice-select.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>									
			<script src="js/mail-script.js"></script>	
			<script src="js/login.js"></script>

</body>
</html>