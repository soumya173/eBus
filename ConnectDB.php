<?php
// Connection to the database "ebus.com"
$conn = mysqli_connect('localhost','root','','ebus.com');
if(!$conn){
	die(mysqli_connect_error());
}
?>