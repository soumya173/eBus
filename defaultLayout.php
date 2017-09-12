<?php
ob_start();
session_start();

function isLogin(){
	if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['userId'])){
		return true;
	}else{
		return false;
	}
}
?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
    <link href="w3.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="animate.css">
    <link href="defaultLayout.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="header w3-container w3-light-blue">
    	<div class="w3-image headImage"><a href="index.php"><img src="photos\pageLogo.png" /></a></div>
        <div class="login">			
			<a href="Support.php"><p class="w3-btn w3-lime" style="height:60px;width:150px;padding-top: 20px;">24*7 Support</p></a>			
			<?php
			if(isLogin()==0){
			echo '
				<div class="w3-dropdown-hover"><p class="w3-btn w3-lime" style="height:60px;width:150px;padding-top:20px;">Login / Sign Up</p>
					<div class="w3-dropdown-content w3-border">
						<a href="LoginPage.php" class="w3-label">Log In</a>
						<a href="SignupPage.php" class="w3-label">Sign Up</a>
					</div>
				</div>';

			}else{
			echo '
				<div class="w3-dropdown-hover"><p class="w3-btn w3-lime" style="height:60px;width:150px;padding-top: 20px;">Options</p>
					<div class="w3-dropdown-content w3-border">
						<a href="EditProfile.php" class="w3-label">Edit Profile</a>
						<a href="BookingDetails.php" class="w3-label">Booking Details</a>
						<a href="LogoutPage.php" class="w3-label">Log Out</a>					
					</div>
				</div>';
			}
			?>

        </div>     
    </div>
</body>
</html>
