<?php
include 'defaultLayout.php';
include 'ConnectDB.php';

$referer = $_SERVER['HTTP_REFERER'];

$query1 = "SELECT * FROM customer_login WHERE email= '".$_SESSION['email']."' AND password= '".$_SESSION['password']."'";
$result1 = mysqli_query($conn, $query1);

$row1 = mysqli_fetch_assoc($result1);

if(isset($_POST['sfirstname']) && isset($_POST['slastname']) && isset($_POST['spassword']) && isset($_POST['srpassword']) && isset($_POST['sage']) && isset($_POST['semail']) && isset($_POST['scontact'])){
	$efirstname = $_POST['efirstname'];
	$elastname = $_POST['elastname'];
	$epassword = $_POST['epassword'];
	$erpassword = $_POST['erpassword'];
	$eage = $_POST['eage'];
	$econtact = $_POST['econtact'];
	$eemail = $_POST['eemail'];
	if(!empty($efirstname) && !empty($elastname) && !empty($epassword) && !empty($erpassword) && !empty($eage) && !empty($econtact) && !empty($eemail)){				
		if($epassword == $erpassword){
			$query = "UPDATE TABLE customer_login VALUES('','".$epassword."','".$efirstname."','".$elastname."','".$eage."','".$eemail."','".$econtact."')";
			$result = mysqli_query($conn, $query);
			header("Location: $referer");
		}else{
			echo "<script>alert('Password mismatched');</script>";
		}		
	}else{
		echo "<script>alert('Please fill all the fields');</script>";		
	}
}

?>

<html>
<head>
	<title>User Signup</title>
	<link rel="stylesheet" href="EditProfile.css">
</head>
<body>
	<div class="mainBody">
	<?php
		if(isLogin()){
			$query = "SELECT firstname FROM customer_login WHERE user_id = ".$_SESSION['userId'];
			$result = mysqli_query($conn, $query);
			$row = mysqli_fetch_assoc($result);
			echo 'Welcome <strong>'.$row['firstname'].'</strong>';
		}
	?>
		<div class="w3-card-12 w3-yellow loginBox">
		<?php
		if(isLogin()){									// Problem related to concatenation in echo Line nos: 52,56 and so on
			echo '
			<form action="" method="POST">
				<div class="w3-container">
					<h3>Update your details</h3>
					<table class="w3-table table">
						<tr>
							<td>Firstname:</td>
							<td><input type="text" placeholder="Enter your firstname" name="efirstname" class="w3-input" value="<?php echo $row1['firstname']); ?>" maxlength=20 required></td>
						</tr>
						<tr>
							<td>Lastname:</td>
							<td><input type="text" placeholder="Enter your lastname" name="elastname" class="w3-input" value="<?php echo $row1['lastname']; ?>" maxlength=20 required></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" placeholder="Enter a password" name="epassword" class="w3-input" value="" maxlength=30 required></td>
						</tr>
						<tr>
							<td>Re-enter Password:</td>
							<td><input type="password" placeholder="Re-enter the password" name="erpassword" class="w3-input" value="" maxlength=30 required></td>
						</tr>
						<tr>
							<td>Age:</td>
							<td><input type="text" placeholder="Enter your age" name="eage" class="w3-input" value="<?php echo $row1['age']; ?>" maxlength=2 required></td>
						</tr>
						<tr>
							<td>Email:</td>
							<td><input type="text" placeholder="Enter your email" name="eemail" class="w3-input w3-email" value="<?php echo $row1['email']; ?>" maxlength=40 disabled></td>
						</tr>
						<tr>
							<td>Contact No:</td>
							<td><input type="text" placeholder="Enter your cobtact no" name="econtact" class="w3-input" value="<?php echo $row1['contact_no'] ?>" maxlength=12 required></td>
						</tr>
						<tr>
							<td colspan=2><input type="submit" value="Update" class="w3-btn w3-green"></td>
						</tr>
					</table>
				</div>
			</form>';
		}else{
			echo '<p style="color: red;">*You are not logged in.(s)</p>';
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