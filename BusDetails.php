<?php
include 'defaultLayout.php';
include 'ConnectDB.php';

//if(isset($_POST['from1']) && isset($_POST['to'])){
if((isset($_POST['from1']) && !empty($_POST['from1'])) && ((isset($_POST['to']) && !empty($_POST['to'])))){
		$from = $_POST['from1'];
		$to = $_POST['to'];
		
		$query = "SELECT bus_no,bus_from,bus_to,time,seat_left,fare FROM bus_details WHERE bus_from='".$from."'AND bus_to='".$to."' ORDER BY time";

		$result1 = mysqli_query($conn, $query);
		$result2 = mysqli_query($conn, $query);
}else{	
	header("Location: index.php");
}
		
?>

<html>
<head>
	<title>Bus Details</title>
	<link rel="stylesheet" href="BusDetails.css">	
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
		<div class="w3-card-12 w3-yellow busDetailsBox">
			<form action="Payment.php" method="POST">
				<h5>Select the bus you want to travel</h5>
				<select class="options" name="busNo">
					<option selected disabled>Select Bus No</option>
					<?php
						if(mysqli_num_rows($result1) > 0){
							while($rows = mysqli_fetch_assoc($result1)){
								echo "<option>".$rows['bus_no']."</option>";
							}
						}
					?>				
				</select><br/>
				<input type="Submit" value="Book the seat" class="w3-btn w3-green" style="margin-bottom:20px">
			</form>
			<table class="w3-table w3-card-2 w3-light-blue table">
				<tr><th colspan=6 style="text-align:center;border-bottom:1px solid blue;">Bus Details</th></tr>
				<tr>
					<th>Bus no</th>
					<th>From</th>
					<th>To</th>
					<th>Time</th>
					<th>Seat left</th>
					<th>Fare</th>
				</tr>
				<?php					
					if(mysqli_num_rows($result2) <= 0){
						echo "<tr><td colspan=6>No bus available</td></tr>";
					}else{
						while($row = mysqli_fetch_assoc($result2)){
							echo "<tr><td>".$row['bus_no']."</td><td>".$row['bus_from']."</td><td>".$row['bus_to']."</td><td>".$row['time']."</td><td>".$row['seat_left']."</td><td>".$row['fare']."</td></tr>";
						}
					}
				?>
			</table>				
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