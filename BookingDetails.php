<?php
include 'defaultLayout.php';
include 'ConnectDB.php';
		
?>

<html>
<head>
	<title>Booking Details</title>
	<link rel="stylesheet" href="BookingDetails.css">
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
			<table class="w3-table w3-card-2 w3-light-blue table">
				<tr><th colspan=8 style="text-align:center;border-bottom:1px solid blue;">Bus Details</th></tr>
				<tr>
					<th>Booking ID</th>
					<th>Bus no</th>
					<th>From</th>
					<th>To</th>
					<th>Date</th>
					<th>Time</th>					
					<th>Fare</th>
					<th>No of Seats</th>
				</tr>
				<?php					
				// select e.booking_id,e.bus_no,e.no_of_seats,e.journey_date, b.bus_from,b.bus_to, b.time,b.fare from bus_details b JOIN customer_bookings e on b.bus_no=e.bus_no
				
					$query1 = "SELECT e.booking_id,e.bus_no,b.bus_from,b.bus_to,e.journey_date,b.time,b.fare,e.no_of_seats FROM bus_details b JOIN customer_bookings e ON b.bus_no=e.bus_no WHERE e.user_id = ".$_SESSION['userId']." ORDER BY b.time";
					$result1 = mysqli_query($conn, $query1);
					
					if(mysqli_num_rows($result1) <= 0){
						echo "<tr><td colspan=8>No bookings available</td></tr>";
					}else{
						while($row = mysqli_fetch_assoc($result1)){
							echo "<tr><td>".$row['booking_id']."</td><td>".$row['bus_no']."</td><td>".$row['bus_from']."</td><td>".$row['bus_to']."</td><td>".$row['journey_date']."</td><td>".$row['time']."</td><td>".$row['fare']."</td><td>".$row['no_of_seats']."</td></tr>";
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