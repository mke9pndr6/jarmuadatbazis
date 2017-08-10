
<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->


<?php

class Controller{
	
	public function ListCars() {
		
		include('connection.php');		
		$result = mysqli_query( $conn,"SELECT automarka.id from automarka order by automarka.id ASC;");
		mysqli_close($conn);
		return $result;
		echo $result;
	}
	
	
	public function ListMotors() {
		
		include('connection.php');		
		$result = mysqli_query( $conn,"SELECT motormarka.id from motormarka order by motormarka.id ASC;");
		mysqli_close($conn);
		return $result;
		echo $result;
	}
	
	/*public function ListVehicles() {
		
		include('connection.php');		
		$resultcar = mysqli_query( $conn,"SELECT motormarka.id, automarka.id from automarka, motormarka");
		$resultmotor =
		mysqli_close($conn);
		return $resultcar;
		return $resultmotor;
		echo $result;
	}*/
}


?>