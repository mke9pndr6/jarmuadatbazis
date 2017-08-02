
<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->





<?php

class Controller{
	
	public function ListCars() {
		
		include('connection.php');		
		$result = mysqli_query( $conn,"SELECT marka.megnevezes from marka, jarmutipus
		where marka.jarmutipus_id = jarmutipus.id and jarmutipus.id = 1 order by marka.megnevezes ASC;");
		mysqli_close($conn);
		return $result;
		echo $result;
	}
	
	
	public function ListMotors() {
		
		include('connection.php');		
		$result = mysqli_query( $conn,"SELECT marka.megnevezes from marka, jarmutipus
		where marka.jarmutipus_id = jarmutipus.id and jarmutipus.id = 2 order by marka.megnevezes ASC;");
		mysqli_close($conn);
		return $result;
		echo $result;
	}
	
	public function ListVehicles() {
		
		include('connection.php');		
		$result = mysqli_query( $conn,"SELECT marka.megnevezes from marka, jarmutipus
		where marka.jarmutipus_id = jarmutipus.id order by marka.megnevezes ASC;");
		mysqli_close($conn);
		return $result;
		echo $result;
	}
}

?>