

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

<?php

	include('connection.php');
	//include('controller.php');
	//include('adminpage.php');
	
	if(isset($_POST['automodositasa'])){
		
		//session_start();
		
		$id = $_POST['id'];
		$automarka_id = $_POST['automarka_id'];
		$marka_tipus= $_POST['marka_tipus'];
		$ar_1 = $_POST['ar_1'];
		$ar_2 = $_POST['ar_2'];
		$ar_3 = $_POST['ar_3'];
		$evjarat = $_POST['evjarat'];
		$allapot = $_POST['allapot'];
		$km_ora_allasa = $_POST['km_ora_allasa'];
		$szallithato_szemelyek = $_POST['szallithato_szemelyek'];
		$uzemanyag = $_POST['uzemanyag'];
		$hengerurtartalom = $_POST['hengerurtartalom'];
		$teljesitmeny = $_POST['teljesitmeny'];
		$sajat_tomeg = $_POST['sajat_tomeg'];
		$maximalis_tomeg = $_POST['maximalis_tomeg'];
		$tank_meret = $_POST['tank_meret'];
		$atlagfogyasztas = $_POST['atlagfogyasztas'];
		$vegsebesseg = $_POST['vegsebesseg'];
		$gyorsulas = $_POST['gyorsulas'];
		$oktanszam = $_POST['oktanszam'];
		
		$carexist = "SELECT * FROM auto WHERE id = '".$id."'";
		$car_conn = mysqli_query($conn, $carexist);
		$countCars = mysqli_num_rows($car_conn);
		
		if($countCars == 1){
			   
		   // mysql query to Update data
		   $sql = "UPDATE auto SET automarka_id ='".$automarka_id."', marka_tipus ='".$marka_tipus."', ar_1 ='".$ar_1."',
		   ar_2 ='".$ar_2."', ar_3 ='".$ar_3."',  evjarat ='".$evjarat."', allapot ='".$allapot."', km_ora_allasa ='".$km_ora_allasa."',
		   szallithato_szemelyek ='".$szallithato_szemelyek."', uzemanyag ='".$uzemanyag."', hengerurtartalom ='".$hengerurtartalom."', teljesitmeny ='".$teljesitmeny."', 
		   sajat_tomeg ='".$sajat_tomeg."', maximalis_tomeg ='".$maximalis_tomeg."', tank_meret ='".$tank_meret."', atlagfogyasztas ='".$atlagfogyasztas."', 
		   vegsebesseg ='".$vegsebesseg."', gyorsulas ='".$gyorsulas."', oktanszam ='".$oktanszam."' WHERE id = '".$id."'";
		   
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
						<td height = "33px"  width = "100%" id = "styleofwords2a"><font id = "styleofwords2a">A módosítás megtörtént, az ID = '.$id.' autó adatai</font></td>
						<td height = "33px"  width = "0%" id = "styleofwords2a"><font id = "styleofwords2a"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "100%" id = "styleofwords2"><font id = "styleofwords2">Autó márkája: '.$automarka_id.'</font></td>
						<td height = "33px"  width = "0%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "100%" id = "styleofwords2"><font id = "styleofwords2">Márka típusa: '.$marka_tipus.'</font></td>
						<td height = "33px"  width = "0%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "100%" id = "styleofwords2"><font id = "styleofwords2">Teljesítmény: '.$teljesitmeny.'</font></td>
						<td height = "33px"  width = "0%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "100%" id = "styleofwords2"><font id = "styleofwords2">Végsebesség: '.$vegsebesseg.'</font></td>
						<td height = "33px"  width = "0%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "100%" id = "styleofwords2"><font id = "styleofwords2">Átlagfogyasztás '.$atlagfogyasztas.'</font></td>
						<td height = "33px"  width = "0%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "100%" id = "styleofwords2"><font id = "styleofwords2">Gyorsulás: '.$gyorsulas.'</font></td>
						<td height = "33px"  width = "0%" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px"  width = "0%" id = "styleofwords2a"><font id = "styleofwords2a">
						<a href = "autok_modositasa.php" style = "text-decoration: none; text-color: white;" id = "styleofwords2a">Vissza a módosításhoz...</a></font></td>
					</tr>
				</table>
			</div>';
			
			header('refresh:7; url = autok_modositasa.php');
		}
		
		else{
			echo '
			</br></br></br></br></br></br></br></br>
			<div align = "center">
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td height = "33px"  width = "100%" id = "styleofwords2a"><font id = "styleofwords2a">Nincs ilyen autó az adatbázisban!</font></td>
					</tr>
					<tr>
					<td height = "33px"  width = "0%" id = "styleofwords2a"><font id = "styleofwords2a">
					<a href = "autok_modositasa.php" style = "text-decoration: none; text-color: white;" id = "styleofwords2a">Vissza a módosításhoz...</a></font></td>
					</tr>
				</table>
				</div>';
			header('refresh:7; url = autok_modositasa.php');
		}
	}	
					   
?>
</body>
</html>