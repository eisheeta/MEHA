<?php
session_start();
$x= $_SESSION['id'];
$abc = $_SESSION['utype'];
$user = $_SESSION['usern'];
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
			<link rel="stylesheet" href="css/main.css">
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
			          <li><a href="index.php">Log out</a></li>
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
								Welcome to your dashboard				
							</h1>	
							
						</div>	
					</div>
				</div>
			</section>

	

<!-- content -->
<div style="padding: 3%" class="container">

	<div class="row d-flex justify-content-center">
						<div class="menu-content pb-70 col-lg-8">
							<div class="title text-center">
								<h1 class="mb-10">Search your patients medical records</h1>
								<p>Fill patient's id and click the search button. The data will appear if the access is granted.</p>
							</div>
						</div>
					</div>

<section style="padding: 3%" class="info-area">
				<div class="container">
					<center>
					<div class="row align-items-center">
						<div style="margin:0 auto;">

						<form action="DoctorDb.php" method="GET">
   						
   						<input type="text" class="form-control" name="Search" value="" placeholder="Search by Patient ID" required >
        				<div style="padding: 10px 0;">
        				<input class="btn btn-primary" type="submit" name="SearchButton" value="Search">
        				</div>
   					
        				</form>

						</div>
						
    				
					</div>
					</center>
				</div>	
</section>

<?php
 $Connection = mysqli_connect('localhost', 'root', '');
 $Selected = mysqli_select_db($Connection, 'health');
if(isset($_GET['SearchButton'])){
    $Search=$_GET['Search'];
    $SearchQuery="SELECT * FROM login WHERE id='$Search' AND user_type='Patient' AND access=1";
    $Execute=mysqli_query($Connection, $SearchQuery);
     
    while($DataRows=mysqli_fetch_array($Execute)){
          $Id=$DataRows['id'];
          $Name=$DataRows['userid']; 
          $_SESSION['pid'] = $Id;
        ?>
        <div style="padding: 0 30%;">
        <table class="table" width="100%" border="1" align="center">
            <thead class="thead-dark">
            <tr>
                <th><center>ID</center></th>
                <th><center>Patient Name</center></th>
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><center><?php echo $Id;?></center></td>
                <td><center><?php echo $Name;?></center></td>
             </tr>
        </tbody>     
        </table>
    </div>
        <div class="container" style="margin: 0 auto; padding: 0% 30% 5%">
        <center>
        	<a type="submit" role="button" class="btn btn-primary" href="PatientRecord.php">View Record</a> 
        </center>
        </div>      
        
<?php        
}   
     
}
?>  

</div>



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
			<script src="js/main.js"></script>	
		</body>
	</html>