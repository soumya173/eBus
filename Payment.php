<?php
include 'defaultLayout.php';
include 'ConnectDB.php';
global $busNo;
$busNo = $_POST['busNo'];
if(!isset($_POST['busNo']) && empty($busNo)){
	header("Location: BusDetails.php");
}

?>

<html>
<head>
	<title>Make Payment</title>
	<link rel="stylesheet" href="Payment.css">
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
		if(isLogin()){
			echo '
			<form action="" method="POST">
				<div class="w3-container">
					<h3>Enter your details</h3>
					<table class="w3-table table">
						<tr>
							<td>Journey Date:</td>
							<td><input type="text" placeholder="YYYY/MM/DD" name="journeyDate" class="w3-input" maxlength=10 required></td>
						</tr>
						<tr>
							<td>No of seats:</td>
							<td><input type="text" placeholder="Enter no of seats" name="noSeat" class="w3-input" maxlength=2 required></td>
						</tr>
						<tr>
							<td>Card No:</td>
							<td><input type="text" placeholder="Enter your card no" name="cardNo" class="w3-input" maxlength=16 required></td>
						</tr>
						<tr>
							<td>Valid till:</td>
							<td><input type="text" placeholder="MM/YYYY" name="validDate" class="w3-input" maxlength=7 required></td>
						</tr>
						<tr>
							<td>Pin no:</td>
							<td><input type="password" placeholder="Enter you PIN" name="pinNo" class="w3-input" maxlength=4 required></td>
						</tr>											
						<tr>
							<td colspan=2><input type="submit" value="Pay" class="w3-btn w3-green"></td>
						</tr>
					</table>
				</div>
			</form>';
		}else{
			echo "<p style='color: red;'>You must Log In/Sign Up before continue</p>
					<a href='LoginPage.php' class='w3-btn w3-teal' style='margin:5px;'>Log In</a> OR
					<a href='SignupPage.php' class='w3-btn w3-teal' style='margin:5px;'>Sign Up</a>
			";
		}
		?>
			<?php			
				if(isset($_POST['journeyDate']) && isset($_POST['noSeat']) && isset($_POST['cardNo']) && isset($_POST['validDate']) && isset($_POST['pinNo'])){
					$journeyDate = $_POST['journeyDate'];
					$noSeat = $_POST['noSeat'];
					$cardNo = $_POST['cardNo'];
					$validDate = $_POST['validDate'];
					$pinNo = $_POST['pinNo'];
					if(!empty($journeyDate) && !empty($noSeat) && !empty($cardNo) && !empty($validDate) && !empty($pinNo)){
						//$query = "INSERT INTO customer_bookings(booking_id,bus_no,user_id,no_of_seats,journey_date) VALUES('".$busNo."','1','".$noSeat."','".$journeyDate."')";
						$query = "INSERT INTO customer_bookings(booking_id,bus_no,user_id,no_of_seats,journey_date) VALUES('','".$busNo."','".$_SESSION['userId']."','".$noSeat."','".$journeyDate."')";
						$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
						echo mysqli_error($result);						// Error: mysqli_error() expects parameter 1 to be mysqli, boolean given
					}else{
						echo '<p style="color: red;">*Please enter proper value(s)</p>';
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