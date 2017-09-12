<?php
include 'defaultLayout.php';
include 'connectDB.php';
//global $link1;
/*
if(isset($_POST['from1']) && isset($_POST['to'])){
	if(!empty($_POST['from1']) && !empty($_POST['to'])){	
		echo $_POST['from1'];
		echo "<script>alert('Please fill all the fields');</script>";				
	}else{
		echo "<script>location.href='BusDetails.php'</script>";
		//header("Location: BusDetails.php");
	}
}
			// Edit: Set form action Dynamic.	(index.php OR BusDetails.php)
			

			
if((isset($_POST['from1']) && !empty($_POST['from1'])) && ((isset($_POST['to']) && !empty($_POST['to'])))){
	//header("Location: BusDetails.php");
}else{
	
	echo "<script>alert('Select values');</script>";
	//header("Location: index.php");
}

*/

?>
<html>
<head>
	<title>Home Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="w3.css">
    <link rel="stylesheet" href="index.css">
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
	<div style="position:relative;" class="w3-half">
        <div class="w3-card-12 inputBox"></div>
        <div class="inputs" style="padding:20px;">
            <h3 class="inputText">Choose origin and destination</h3>
            <form method="POST" action="BusDetails.php">  
                 <table class="w3-table table">
                    <tr>
                        <td class="tableText">From</td>
                        <td>
                            <select name="from1" class="option" id="from1" >
								<option disabled selected>Select City</option>
                                <option value="Durgapur">Durgapur</option>
                                <option value="Siuri">Siuri</option>
                                <option value="Burdwan">Burdwan</option>
                                <option value="Karunamoyee">Karunamoyee</option>
                                <option value="Esplanade">Esplanade</option>
								<option value="Haldia">Haldia</option>
                            </select>
                        </td>
                        <td class="tableText">To</td>
                        <td>
                            <select name="to" class="option" id="to" >
								<option disabled selected>Select City</option>
                                <option value="Durgapur">Durgapur</option>
                                <option value="Siuri">Siuri</option>
                                <option value="Burdwan">Burdwan</option>
                                <option value="Karunamoyee">Karunamoyee</option>
                                <option value="Esplanade">Esplanade</option>
								<option value="Haldia">Haldia</option>
                            </select>
                        </td>
                    </tr>
                </table>    
                <div class="searchButton"><input type="submit" value="Search" class="w3-btn w3-deep-orange"></div>
            </form>
        </div>
    </div>
    <div class="w3-half w3-animate-zoom" style="position:relative;"> 
    	<div class="w3-card-12 offersBox"></div>
        <div class="offers">
			<p style="font-size:20px; text-align:center; font-family:'Comic Sans MS', cursive, sans-serif;">Offers</p>
        	<li>Get Rs. 100 <strong>CASHBACK</strong> on booking</li>
			<li><p>Greatest sale on <u>Sunday</u></p>
				<p style="margin-left: 10px;">-> Get <strong>70% off + Rs. 100</strong> cashback</p>
			</li>
        </div>
	</div>        
</div>
<div class="footer">
	<p>Copyright by &copy; eBus.com</p
</div>    
</body>
</html>