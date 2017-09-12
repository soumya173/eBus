<?php
include 'defaultLayout.php';
include 'ConnectDB.php';

$referer = $_SERVER['HTTP_REFERER'];



?>

<html>
<head>
	<title>User Signup</title>
	<link rel="stylesheet" href="SignupPage.css">
</head>
<body>
	<div class="mainBody">
		<div class="w3-card-12 w3-yellow loginBox">
		<?php
		if(!isLogin()){
			echo '
			<form action="" method="POST">
				<div class="w3-container">
					<h3>Enter your details</h3>
					<table class="w3-table table">
						<tr>
							<td>Firstname:</td>
							<td><input type="text" placeholder="Enter your firstname" name="sfirstname" class="w3-input" maxlength=20 required></td>
						</tr>
						<tr>
							<td>Lastname:</td>
							<td><input type="text" placeholder="Enter your lastname" name="slastname" class="w3-input" maxlength=20 required></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" placeholder="Enter a password" name="spassword" class="w3-input" maxlength=30 required></td>
						</tr>
						<tr>
							<td>Re-enter Password:</td>
							<td><input type="password" placeholder="Re-enter the password" name="srpassword" class="w3-input" maxlength=30 required></td>
						</tr>
						<tr>
							<td>Age:</td>
							<td><input type="text" placeholder="Enter your age" name="sage" class="w3-input" maxlength=2 required></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" placeholder="Enter your email" name="semail" class="w3-input w3-email" maxlength=40 required></td>
						</tr>
						<tr>
							<td>Contact No:</td>
							<td><input type="text" placeholder="Enter your cobtact no" name="scontact" class="w3-input" maxlength=12 required></td>
						</tr>
						<tr>
							<td colspan=2><input type="submit" value="Signup" class="w3-btn w3-green"></td>
						</tr>
					</table>
				</div>
			</form>';
		}else{
			echo '<p style="color: red;">*You are already logged in.</p>';
		}
		?>
			<?php
				if(isset($_POST['sfirstname']) && isset($_POST['slastname']) && isset($_POST['spassword']) && isset($_POST['srpassword']) && isset($_POST['sage']) && isset($_POST['semail']) && isset($_POST['scontact'])){
					$sfirstname = $_POST['sfirstname'];
					$slastname = $_POST['slastname'];
					$spassword = $_POST['spassword'];
					$srpassword = $_POST['srpassword'];
					$sage = $_POST['sage'];
					$scontact = $_POST['scontact'];
					$semail = $_POST['semail'];
					if(!empty($sfirstname) && !empty($slastname) && !empty($spassword) && !empty($srpassword) && !empty($sage) && !empty($scontact) && !empty($semail)){				
						if($password == $rpassword){
							$query = "INSERT INTO customer_login VALUES('','".$spassword."','".$sfirstname."','".$slastname."','".$sage."','".$semail."','".$scontact."')";
							$result = mysqli_query($conn, $query);
							header("Location: $referer");
						}else{
							echo "<p style='color: red;'>*Password mismatched</p>";
						}		
					}else{
						echo "<p style='color: red;'>*Please fill all the fields</p>";		
					}
				}
			?>
		</div>
	</div>
	<div class="footer">
		<p>Copyright by &copy; eBus.com</p
	</div>
</body>
</html>

<?php
	mysqli_close($conn);
?>