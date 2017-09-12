<?php
include 'defaultLayout.php';
include 'ConnectDB.php';
?>
<html>
<head>
	<title>Support</title>
	<style>
		.mainBody{
			background-image: url("photos/bus.jpg");
			background-repeat: no-repeat;
			height: 680px;
			text-align: center;
		}
		.helpBox{
			padding: 20px;
			width: 600px;
			position: relative;
			top: 100px;
			left: 300px;
			text-align: center;
		}
		.helpBox p{
			margin: 10px;
		}
		.footer{
			height: 80px;
			width: 100%;
			background-color: rgb(158, 158, 158);
			padding-top: 20px;
			text-align: center;
		}
	</style>
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
		<div class="w3-card-12 w3-yellow helpBox">
			<h3>24x7 Support & Help</h3>
			<p>Write to us for general queries. Reach us at <strong>ebusdotcom@gmail.com</strong></p>
			<p>Unhappy with our customer care? Complain at <strong>ebus_complain@gmail.com</strong></p>
		</div>
	</div>
	<div class="footer">
		<p>Copyright by &copy; eBus.com</p
	</div>
</body>
</html>