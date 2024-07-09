<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$voter = $_POST['voter'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM voters WHERE voters_id = '$voter'";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find voter with the ID';
		}
		else{
			$row = $query->fetch_assoc();
			if($password==$row['password']){
				$_SESSION['voter'] = $row['id'];
			}
			else{
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input voter credentials first';
	}
	date_default_timezone_set('ASIA/KOLKATA'); // Set your timezone

$hour = (int)date('H');

$minute = (int)date('i');

$openHour = 00; // Set your opening hour
$openMinute = 15; // Set your opening minute

$closeHour = 00; // Set your closing hour

$closeMinute = 20; // Set your closing minute

if (

($hour > $openHour || ($hour === $openHour && $minute >= $openMinute)) &&

($hour < $closeHour || ($hour === $closeHour && $minute < $closeMinute))

) {

	header('location: index.php');

} else {

	header('location: time.html');

}

	

?>