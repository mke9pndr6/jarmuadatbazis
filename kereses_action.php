
<?php
	
	include('connection.php');
	
	if(isset($_POST['autokeres'])){
		
		$autokeres = $_POST['carsearch'];
		$carSearchSql = "SELECT * FROM  auto WHERE marka_tipus LIKE '%$autokeres%';";
		$carResult = mysqli_query($conn, $carSearchSql);
		if (mysqli_num_rows($carResult) > 0) {
		
		while($row = mysqli_fetch_assoc($carResult)) {
			
				echo '
					<div align = "center">
						<table align = "center" width = "73.2%" id = "tableborders2" border = "0px" cellpadding = "0" cellspacing = "0">
							<tr>
								<td width = "14.2%" id = "tableborders2"> '.$row["id"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["marka_tipus"].' </td>
								<td width = "14.2%" id = "tableborders2"> '.$row["evjarat"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["allapot"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["hengerurtartalom"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["teljesitmeny"].'</td>
								<td width = "14.2%"> '.$row["vegsebesseg"].'</td>
							</tr>
						</table>
				</div>';		
		}
		}
	}
	
	
	if(isset($_POST['motorkeres'])){
			
		$motorkeres = $_POST['motorsearch'];
		$motorSearchSql = "SELECT * FROM motor WHERE marka_tipus LIKE '%$motorkeres%';";
		$motorResult = mysqli_query($conn, $motorSearchSql);
		
		while($row = mysqli_fetch_assoc($motorResult)) {
			
				echo '
					<div align = "center">
						<table align = "center" width = "73.2%" id = "tableborders2" border = "0px" cellpadding = "0" cellspacing = "0">
							<tr>
								<td width = "14.2%" id = "tableborders2"> '.$row["id"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["marka_tipus"].' </td>
								<td width = "14.2%" id = "tableborders2"> '.$row["jarmutipus_id"].' </td>
								<td width = "14.2%" id = "tableborders2"> '.$row["evjarat"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["allapot"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["hengerurtartalom"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["teljesitmeny"].'</td>
								<td width = "14.2%"> '.$row["vegsebesseg"].'</td>
							</tr>
						</table>
				</div>';		
				header('url: kereses.php');
		}
		header('url: "kereses.php"');
	}
	
	if(isset($_POST['jarmukeres'])){
			
		$jarmukeres = $_POST['vehiclesearch'];
		$vehicleSearchSql = "SELECT * FROM motor,auto WHERE auto.marka_tipus LIKE '%$jarmukeres%' OR motor.marka_tipus LIKE '%$jarmukeres%';";
		$vehicleResult = mysqli_query($conn, $vehicleSearchSql);
		
		while($row = mysqli_fetch_assoc($vehicleResult)) {
			
				echo '
					<div align = "center">
						<table align = "center" width = "73.2%" id = "tableborders2" border = "0px" cellpadding = "0" cellspacing = "0">
							<tr>
								<td width = "14.2%" id = "tableborders2"> '.$row["id"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["marka_tipus"].' </td>
								<td width = "14.2%" id = "tableborders2"> '.$row["jarmutipus_id"].' </td>
								<td width = "14.2%" id = "tableborders2"> '.$row["evjarat"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["allapot"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["hengerurtartalom"].'</td>
								<td width = "14.2%" id = "tableborders2"> '.$row["teljesitmeny"].'</td>
								<td width = "14.2%"> '.$row["vegsebesseg"].'</td>
							</tr>
						</table>
				</div>';		
				header('Location: kereses.php');
		}
	}
	
?>
	
	
	
	