	<?php
session_start();
$a=$_SESSION['id'];
$b= $_SESSION['pid'];
$abc = $_SESSION['utype'];
$user = $_SESSION['usern'];

function redirect_to($NewLocation){
    header("Location:".$NewLocation);
   	exit;
}
?>

<?php
 $Connection = mysqli_connect('localhost', 'root', '');
 $Selected = mysqli_select_db($Connection, 'health');

if(isset($_POST["submit"])){
if(!empty($_POST["name"])&&!empty($_POST["age"])){
 	$Name=$_POST['name'];
    $Age=$_POST['age'];
    $Sex=$_POST['sex'];
    $Doctor_name=$_POST['dname'];
    $Specialty=$_POST['specialty'];
    $Med1=$_POST['med1'];
    $Med2=$_POST['med2'];
    $Med3=$_POST['med3'];
    $TestP=$_POST['testp'];
    $Comment=$_POST['comment'];
    $Date= $_POST['date'];

$Query="INSERT INTO prescription( name, age, sex, p_id, d_id, doctor_name, specialty, med1, med2, med3, test_prescribed, comment, ddate)
        VALUES('$Name', '$Age', '$Sex', '$b', '$a', '$Doctor_name', '$Specialty', '$Med1', '$Med2','$Med3', '$TestP', '$Comment', '$Date' )";
    $Execute=mysqli_query($Connection, $Query);





         $user_check_query = "SELECT tflag1, tflag2, tflag3 FROM record WHERE p_id='$b' LIMIT 1";
		 $Execute1=mysqli_query($Connection, $user_check_query);
		 $Tflag1 = 0;
		 $Tflag2 = 0;
		 $Tflag3 = 0;
		 

        $DataRows=mysqli_fetch_array($Execute1);
        $Tflag1 = $DataRows['tflag1'];
		 $Tflag2 = $DataRows['tflag2'];
		 $Tflag3 = $DataRows['tflag3'];
		  


         if($Tflag1==0){
         	//echo 0;
         	$Query1="UPDATE record SET test1 = '$TestP', tflag1 = 1, tdate1 = date('m/d/Y h:i:s a', time()) WHERE p_id = '$b'";
     		$Execute1=mysqli_query($Connection, $Query1);
         }
         else if($Tflag2==0){
         	//echo 4;
         	$Query2="UPDATE record SET test2 = '$TestP', tflag2 = 1, tdate2 = date('m/d/Y h:i:s a', time()) WHERE p_id = '$b'";
     		$Execute1=mysqli_query($Connection, $Query2);
         }
         else if($Tflag3==0){
         	$Query3="UPDATE record SET test3 = '$TestP', tflag3 = 1, tdate3 = date('m/d/Y h:i:s a', time()) WHERE p_id = '$b'";
     		$Execute1=mysqli_query($Connection, $Query3);
         }

      // $Query2="UPDATE record SET test2 = '$TestP', tflag2=1 WHERE p_id = '$b'";
     	// 	$Execute1=mysqli_query($Connection, $Query2);
     	// 	if($Execute1){
     	// 		echo "done";
     	// 	}


if($Execute){
	   
     redirect_to("PatientRecord.php");

    echo '<span>Welcome '.$Userid;
}
}
else{
    echo '<span>Please fill all fields</span>';
}
} 
?>

<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
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
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>	
		  <header id="header">
		    	
		    <div class="container main-menu">
		    	<div class="row align-items-center justify-content-between d-flex">
			      <div id="logo">
			        <a href="index.php"><img src="img/logo.png" alt="" title="" /></a>
			      </div>
			      <nav id="nav-menu-container">
			        <ul class="nav-menu">
			           <li><a href="#"><span><i class="fa fa-user" aria-hidden="true"></i><?php echo $user;?><span></a><li>

			           <?php if($abc=="Doctor"){ ?>
			  		  <li><a href="DoctorDb.php">Dashboard</a></li>
			  		  <?php } 
			  		   else{ ?>
			  		  <li><a href="PatientDb.php">Dashboard</a></li>
			  		  <?php } ?>
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
			          <li><a href="contact.php">Contact</a></li>
			           <li><a href="index.php">Log Out</a></li>
			        </ul>
			      </nav><!-- #nav-menu-container -->		    		
		    	</div>
		    </div>
		  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-center">
						<div class="banner-content col-lg-8 col-md-12">
							<h1>
								Prescription
							</h1>
							
						</div>										
					</div>
				</div>					
			</section>
			<!-- End banner Area -->
			
			<section class="appointment-area">			
				<div class="container">
					
						<div class="col-lg-6 col-md-6 appointment-right pt-60 pb-60">
							<form class="form-wrap" action="Prescription.php" method="post">
										
								<input type="text" class="form-control" name="name" placeholder="Patient Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patient Name'"  required>
								<input type="text" class="form-control" name="age" placeholder="age " onfocus="this.placeholder = ''" onblur="this.placeholder = 'age'" required>
								<input type="text" class="form-control" name="sex" placeholder="sex" onfocus="this.placeholder = ''" onblur="this.placeholder = 'sex'" required>
								<input id="datepicker1" name="date" class="dates form-control"  placeholder="Date" type="text" required>   
								<input type="text" class="form-control" name="dname" placeholder="Doctor's name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Doctor's name'" required>
								<input type="text" class="form-control" name="specialty" placeholder="speciality" onfocus="this.placeholder = ''" onblur="this.placeholder = 'speciality'" required>
								<input type="text" class="form-control" name="med1" placeholder="Medicine 1" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Medicine 1'" >
								<input type="text" class="form-control" name="med2" placeholder="Medicine 2" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Medicine 2'" >
								<input type="text" class="form-control" name="med3" placeholder="Medicine 3" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Medicine 3'" >
								<input type="text" class="form-control" name="testp" placeholder="Test prescribed" onfocus="this.placeholder = ''" onblur="this.placeholder = 'c'" >
								
									
								
								<textarea name="comment" class="" rows="5" placeholder="comment" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Test prescribed'"></textarea> 
								<button class="primary-btn text-uppercase" name="submit" >Add Presciption</button>
							</form>
						</div>
					</div>
				</div>	
			</section>

					

			<!-- Start facilities Area -->
			<section class="facilities-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-70 col-lg-7">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Our Latest Facilities</h1>
		                        <p>Look into our features and learn more about what all you can achieve with our tool</p>
		                    </div>
		                </div>
		            </div>
					<div class="row">
						<div class="col-lg-3 col-md-6">
							<div class="single-facilities">
								<span class="lnr lnr-rocket"></span>
								<a href="#"><h4>Find Hospitals</h4></a>
								<p>
									With our api find hospitals near you.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-facilities">
								<span class="lnr lnr-heart"></span>
								<a href="#"><h4>Nearest Blood Bank</h4></a>
								<p>
									Look for nearest blood banks and check available units of blood.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-facilities">
								<span class="lnr lnr-bug"></span>
								<a href="#"><h4>BMI Calculator</h4></a>
								<p>
									Calculate your BMI and know about your health status.
								</p>
							</div>
						</div>
						<div class="col-lg-3 col-md-6">
							<div class="single-facilities">
								<span class="lnr lnr-users"></span>
								<a href="#"><h4>Treatment</h4></a>
								<p>
									Search your symptoms and look for the treatment plans related to your diseases.
								</p>
							</div>
						</div>																		
					</div>
				</div>	
			</section>
			<!-- End facilities Area -->
			

			
		
	
			
			<!-- start footer Area -->		
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-2  col-md-6">
							<div class="single-footer-widget">
								<h6>Top Products</h6>
								<ul class="footer-nav">
									<li><a href="#">Managed Website</a></li>
									<li><a href="#">Manage Reputation</a></li>
									<li><a href="#">Power Tools</a></li>
									<li><a href="#">Marketing Service</a></li>
								</ul>
							</div>
						</div>
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
			<script src="js/main.js"></script>	
		</body>
	</html>