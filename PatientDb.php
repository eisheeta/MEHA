<?php
session_start();
 $a= $_SESSION['id'];
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
                 <li><a href="index.php">Log Out</a></li>
              </ul>
            </nav><!-- #nav-menu-container -->            
          </div>
        </div>
      </header><!-- #header -->

<section class="banner-area relative about-banner" id="home"> 
        <div class="overlay overlay-bg"></div>
        <div class="container">       
          <div class="row d-flex align-items-center justify-content-center">
            <div class="about-content col-lg-12">
              <h1 class="text-white">
                Medical History And Prescription     
              </h1> 
              
            </div>  
          </div>
        </div>
      </section>

      <div style="padding: 3%; margin: 0 auto;" class="container">

  <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
              <div class="title text-center">
                <h1 class="mb-10">See your medical records</h1>
                <p>You can grant access to the doctors to allow them to see your reports.</p>
              </div>
            </div>
          </div>


<?php
$Connection = mysqli_connect('localhost', 'root', '');
$Selected = mysqli_select_db($Connection, 'health');

if(isset($_POST["grant"])){
  

  $Query="UPDATE login SET access = 1 WHERE id = '$a'";
    $Execute=mysqli_query($Connection, $Query);
}  
else if(isset($_POST["deny"])){
  

  $Query2="UPDATE login SET access = 0 WHERE id = '$a'";
    $Execute=mysqli_query($Connection, $Query2);
}   
?>

<center>
<form method="post" action="PatientDb.php">

<input id="but1" type="submit" class="btn btn-success" name="grant" value="Grant Access">
<input id="but2"  type="submit"  class="btn btn-success" name="deny" value="Deny Access">
</form>
</center>

<?php
$Connection = mysqli_connect('localhost', 'root', '');
$Selected = mysqli_select_db($Connection, 'health');

$ViewQuery="SELECT * From record WHERE p_id='$a'";
$Execute=mysqli_query($Connection, $ViewQuery);
while($DataRows=mysqli_fetch_array($Execute)){
    $Name=$DataRows['name'];
    $Age=$DataRows['age'];
    $Sex=$DataRows['sex'];
    $Test1=$DataRows['test1'];
    $Test2=$DataRows['test2'];
    $Test3=$DataRows['test3'];
    $Report1=$DataRows['report1'];
    $Report2=$DataRows['report2'];
    $Report3=$DataRows['report3'];
    $TDate1=$DataRows['tdate1'];
    $TDate2=$DataRows['tdate2'];
    $TDate3=$DataRows['tdate3'];
 
?>
<!-- put css and styling to display record -->
<div style="margin: 3% auto;">
  <div class="card text-center">
  <div class="card-header">
<h1>Medical History</h1>
</div>

<div class="card-body">
<div class="card-text">
<center>Name : <?php echo $Name;?></center>
 <center>Sex : <?php echo $Sex;?></center>
</div>
</div>
 

 <?php
  if(!empty($Test1)){
    echo "Test : ".$Test1;
    if(!empty($Report1)){
      echo "Result : ".$Report1;
    }
  }
 ?>
 <?php
  if(!empty($Test2)){
    echo "Test : ".$Test2;
    if(!empty($Report2)){
      echo "Result : ".$Report2;
    }
  }
 ?>
 <?php
  if(!empty($Test3)){
    echo "Test : ".$Test1;
    if(!empty($Report3)){
      echo "Result : ".$Report3;
    }
  }
 ?>
 
</div>

<?php } ?>

 <div class="card text-center">
  <div class="card-header">
<h1>Past Prescriptions</h1>
</div>
<div class="card-body">


<?php
$Connection = mysqli_connect('localhost', 'root', '');
$Selected = mysqli_select_db($Connection, 'health');

$ViewQuery="SELECT * From prescription WHERE p_id='$a'";
$Execute=mysqli_query($Connection, $ViewQuery);
while($DataRows=mysqli_fetch_array($Execute)){
    $Name=$DataRows['name'];
    $Age=$DataRows['age'];
    $Sex=$DataRows['sex'];
    $Doctor_name=$DataRows['doctor_name'];
    $Specialty=$DataRows['specialty'];
    $Med1=$DataRows['med1'];
    $Med2=$DataRows['med2'];
    $Med3=$DataRows['med3'];
    $TestP=$DataRows['test_prescribed'];
    $Comment=$DataRows['comment'];
    $Date= $DataRows['ddate'];
 
?>
<!-- put css and styling to display record -->


<div class="card-text"> Name : <?php echo $Name;?></div>
<div class="card-text"> Age : <?php echo $Age;?></div>
 <div class="card-text">Sex : <?php echo $Sex;?></div>
<div class="card-text"> Date : <?php echo $Date;?></div>
<div class="card-text"> Doctor Name : <?php echo $Doctor_name;?></div>
<div class="card-text"> Specialty : <?php echo $Specialty;?></div>

<div class="card-text"> <?php
 if(!empty($Med1)){
  echo "Salt Name: ".$Med1;
 }?>
 </div>

 <div class="card-text">
  <?php
 if(!empty($Med2)){
  echo "Salt Name: ".$Med2;
 }?>
</div>

<div class="card-text"><?php
  if(!empty($Med3)){
  echo "Salt Name: ".$Med3;
 }?></div>

 <div class="card-text"><?php
  if(!empty($TestP)){
  echo "Test Prescribed: ".$TestP;
 }?></div>

 <div class="card-text">
 <?php
 if(!empty($Comment)){
  echo "Test Prescribed: ".$Comment;
 }

?>
<hr style="width: 100%;">
</div>


<?php } ?>

</div>

</div>
</div>
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
