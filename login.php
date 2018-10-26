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

$Query="INSERT INTO login(userid, password, user_type)
        VALUES('$Userid', '$Password', '$Type')";
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
<html>
<head>
	<title>login page</title>
</head>
<body>

<!-- sign up form -->
<form action="login.php", method="post">
	User id <input type="text" name="userid">
	Password <input type="Password" name="password">
	Type <select name="type">
		<option>Doctor</option>
		<option>Patient</option>
	</select>
	<input type="Submit" Name="login" value="Login"><br>
</form>

<!-- login form -->
<form action="login.php", method="post">
	User id <input type="text" name="userid">
	Password <input type="Password" name="password">
	Type <select name="type">
		<option>Doctor</option>
		<option>Patient</option>
	</select>
	<input type="Submit" Name="Signup" value="Signup"><br>
</form>

</body>
</html>