<?php
include 'defaultLayout.php';
include 'ConnectDB.php';

$referer = $_SERVER['HTTP_REFERER'];


?>

<html>
<head>
	<title>User Login</title>
	<link rel="stylesheet" href="LoginPage.css">
</head>
<body>
	<div class="mainBody">
		<div class="w3-card-12 w3-yellow loginBox">
		<?php
			if(isLogin()){
				echo "<p style='color: red;'>*You've successfully logged in</p>";
			}
		?>
			<form action="" method="POST" onsubmit="return validate()">
				<div class="w3-container">
					<h3>Enter your details</h3>
					<table class="w3-table table">
						<tr>
							<td>Email:</td>
							<td><input type="text" placeholder="Enter your email" name="email" class="w3-input" maxlength=40 required <?php if(isLogin()){echo 'disabled';} ?>></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" placeholder="Enter your password" name="password" class="w3-input" maxlength=30 required <?php if(isLogin()){echo 'disabled';} ?>></td>
						</tr>
						<tr>
							<td colspan=2><input type="submit" value="Login" class="w3-btn w3-green" <?php if(isLogin()){echo 'disabled';} ?>></td>
						</tr>
					</table>
				</div>
			</form>
			<?php
			if(isset($_POST['email']) && isset($_POST['password'])){
				$email = $_POST['email'];
				$password = $_POST['password'];
				if(!empty($email) && !empty($password)){		
					$query = "SELECT user_id FROM customer_login WHERE email='".$email."' AND password='".$password."'";
					$result = mysqli_query($conn, $query);
					$userId = mysqli_fetch_assoc($result);
		
					if(@mysqli_num_rows($result) == 1){
						$_SESSION['email'] = $email;
						$_SESSION['password'] = $password;
						$_SESSION['userId'] = $userId['user_id'];
						header("Location: $referer");
					}else{
						echo "<p style='color: red;'>*Invalid Username or Password</p>";		
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