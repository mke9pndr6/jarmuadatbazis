

<html>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta HTTP-EQUIV="Content-Language" Content="hu">
	<link rel = "stylesheet" href = "style.css"/>
	<link href="https://fonts.googleapis.com/css?family=Electrolize" rel="stylesheet"/>
	<head>
		<title>
			Autó módosítása
		</title>
	</head>
	<body id = "bgStyle">
	</body>
</html>

<?php

	include('connection.php');
	//include('controller.php');
	//include('adminpage.php');
	
	if(isset($_POST['motormodositasa'])){
		
		//session_start();
		
		$id = $_POST['id'];
		$motormarka_id = $_POST['motormarka_id'];
		$marka_tipus = $_POST['marka_tipus'];
		$ar_1 = $_POST['ar_1'];
		$ar_2 = $_POST['ar_2'];
		$ar_3 = $_POST['ar_3'];
		
		$evjarat = $_POST['evjarat'];
		$allapot = $_POST['allapot'];
		$km_ora_allasa = $_POST['km_ora_allasa'];
		$uzemanyag = $_POST['uzemanyag'];
		$hengerurtartalom = $_POST['hengerurtartalom'];
		$teljesitmeny = $_POST['teljesitmeny'];
		$sajat_tomeg = $_POST['sajat_tomeg'];
		$maximalis_tomeg = $_POST['maximalis_tomeg'];
		$tank_meret = $_POST['tank_meret'];
		$atlagfogyasztas = $_POST['atlagfogyasztas'];
		$vegsebesseg = $_POST['vegsebesseg'];
		$gyorsulas = $_POST['gyorsulas'];
		$munkautem = $_POST['munkautem'];
		
		$motorexist = "SELECT * FROM motor WHERE id = '".$id."'";
		$motor_conn = mysqli_query($conn, $motorexist);
		$countMotors = mysqli_num_rows($motor_conn);
		
		if($countMotors == 1){
			   
		   // mysql query to Update data
		   $sql = "UPDATE motor SET marka_id ='".$motormarka_id."', marka_tipus ='".$marka_tipus."', ar_1 ='".$ar_1."',
		   ar_2 ='".$ar_2."', ar_3 ='".$ar_3."', evjarat ='".$evjarat."', allapot ='".$allapot."', km_ora_allasa ='".$km_ora_allasa."',
		   uzemanyag ='".$uzemanyag."', hengerurtartalom ='".$hengerurtartalom."', teljesitmeny ='".$teljesitmeny."', 
		   sajat_tomeg ='".$sajat_tomeg."', maximalis_tomeg ='".$maximalis_tomeg."', tank_meret ='".$tank_meret."', atlagfogyasztas ='".$atlagfogyasztas."', 
		   vegsebesseg ='".$vegsebesseg."', gyorsulas ='".$gyorsulas."', munkautem ='".$munkautem."' WHERE id = '".$id."'";
		   
		   mysqli_query($conn, $sql);
		   
		   echo '
		   
		   </br>
		   </br>
		   </br></br>
		   </br>
		   </br></br>
		   </br>
		  
		   
			<div align = "center">
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td height = "33px"  width = "30%" id = "styleofwords2a"><font id = "styleofwords2a">A módosítás megtörtént, a motor adatai:</font></td>
						<td height = "33px"  width = "70%" id = "styleofwords2a"><font id = "styleofwords2a"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "30%" id = "styleofwords2"><font id = "styleofwords2">Azonosító (id): '.$id.'</font></td>
						<td height = "33px"  width = "70%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "30%" id = "styleofwords2"><font id = "styleofwords2">Motor márkája: '.$motormarka_id.'</font></td>
						<td height = "33px"  width = "70%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "30%" id = "styleofwords2"><font id = "styleofwords2">Márka típusa: '.$marka_tipus.'</font></td>
						<td height = "33px"  width = "70%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "30%" id = "styleofwords2"><font id = "styleofwords2">Teljesítmény: '.$teljesitmeny.' LE</font></td>
						<td height = "33px"  width = "70%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "30%" id = "styleofwords2"><font id = "styleofwords2">Végsebesség: '.$vegsebesseg.' km/h</font></td>
						<td height = "33px"  width = "70%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "30%" id = "styleofwords2"><font id = "styleofwords2">Átlagfogyasztás '.$atlagfogyasztas.' l/100 km</font></td>
						<td height = "33px"  width = "70%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "30%" id = "styleofwords2"><font id = "styleofwords2">Gyorsulás: '.$gyorsulas.' mp</font></td>
						<td height = "33px"  width = "70%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "70%" id = "styleofwords2a"><font id = "styleofwords2a">
						<a href = "autok_modositasa.php" style = "text-decoration: none; text-color: white;" id = "styleofwords2a">Vissza a módosításhoz...</a></font></td>
					</tr>
				</table>
			</div>';
			
			header('refresh:15; url = adminpage.php');
		}
	
		else{
			echo '
			</br></br></br></br></br></br></br></br>
			<div align = "center">
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td height = "33px"  width = "100%" id = "styleofwords2a"><font id = "styleofwords2a">Nincs ilyen motor az adatbázisban!</font></td>
					</tr>
					<tr>
					<td height = "33px"  width = "0%" id = "styleofwords2a"><font id = "styleofwords2a">
					<a href = "motorok_modositasa.php" style = "text-decoration: none; text-color: white;" id = "styleofwords2a">Vissza a módosításhoz...</a></font></td>
					</tr>
				</table>
				</div>';
			header('refresh:7; url = autok_modositasa.php');
		}
	}
				  	   
?>

	</body>
</html>
