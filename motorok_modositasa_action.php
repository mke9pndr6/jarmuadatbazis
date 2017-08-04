

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
</html>

<?php

	include('connection.php');
	//include('controller.php');
	//include('adminpage.php');
	
	if(isset($_POST['motormodositasa'])){
		
		//session_start();
		
		$id = $_POST['id'];
		$marka_id = $_POST['marka_id'];
		$jarmutipus_id = $_POST['jarmutipus_id'];
		$ar_1 = $_POST['ar_1'];
		$ar_2 = $_POST['ar_2'];
		$ar_3 = $_POST['ar_3'];
		$marka_tipus = $_POST['marka_tipus'];
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
			   
	   // mysql query to Update data
	   $sql = "UPDATE motor SET marka_id ='".$marka_id."', jarmutipus_id ='".$jarmutipus_id."', ar_1 ='".$ar_1."',
	   ar_2 ='".$ar_2."', ar_3 ='".$ar_3."', marka_tipus ='".$marka_tipus."', evjarat ='".$evjarat."', allapot ='".$allapot."', km_ora_allasa ='".$km_ora_allasa."',
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
	   </br></br>
	   </br>
	   </br>
	   
		<div align = "center">
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
				<tr>
					<td height = "33px"  width = "100%" id = "styleofwords2a"><font id = "styleofwords2a">A módosítás megtörtént, az ID = '.$id.' motor adatai</font></td>
					<td height = "33px"  width = "0%" id = "styleofwords2a"><font id = "styleofwords2a"></font></td>
				</tr>
				<tr>
					<td height = "33px"  width = "100%" id = "styleofwords2"><font id = "styleofwords2">Motor márkája: '.$marka_tipus.'</font></td>
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
			</table>
		</div>';
		
		header('refresh:10; url = adminpage.php');
	}
				
	   
	   	   
?>