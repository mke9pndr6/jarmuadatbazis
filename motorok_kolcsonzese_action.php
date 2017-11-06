	
</html>
	<head>
		<title>
			Autókölcsönzés
		</title>
	</head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
		<link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet'/>
		
		
		<script>
			function goBack() {
				window.history.back();
			}
		</script>
		
		
	<body id = "bgStyle">
		</br></br></br>
			
			<?php
		
			include('connection.php');
			
			$newestCarsIndex = "SELECT * FROM `motor` ORDER BY evjarat DESC";
			$cars = mysqli_query($conn, $newestCarsIndex);
					
			$rowindex = 1;
			if (mysqli_num_rows($cars) > 0){
				while($row = mysqli_fetch_assoc($cars)){
					if(isset($_GET[$row["id"]])){
									
									$rent_start = $_GET['kolcsonzes_kezdet'];
									$rent_end = $_GET['kolcsonzes_veg'];
									$ar_1 = $_GET['ar_1'];
									$ar_2 = $_GET['ar_2'];
									$ar_3 = $_GET['ar_3'];
									
									$today = date("Y-m-d");									
									
									$rent_takeback = date('Y-m-d', strtotime($rent_end .' +1 day'));
									
									$date1=date_create($rent_start);
									$date2=date_create($rent_end);
									$diff=date_diff($date1,$date2);
									
									$date1 = new DateTime($rent_start);
									$date2 = new DateTime($rent_end);
									$interval = $date1->diff($date2);
									$interval->d = $interval->d + 1;
									
									if($today >= $rent_start || $rent_start > $rent_end){
										echo '</br></br></br><div align = "center" id = "cars">
											<table align = "center" width = "55%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
											margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #084B8A); font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 21 21 19 19" >
												<tr>
													<td colspan = "2" width = "20%" height = "35px" style = "padding: 3% 2% 3% 2%; font-size: 40px; " align = "center">
													Sikertelen kölcsönzés!</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 5%; font-size: 20px; " align = "left">
													A probléma okai a következők lehetnek:</br>
													<ul>
														</br>
														<li> A mai dátum: <font color = "yellow">'.$today.' </font> - A megadott kezdeti dátum: <font color = "yellow">'.$rent_start.'. </font></li>
														<li> A kezdeti dátum: <font color = "yellow">'.$rent_start.' </font> - A kölcsönzés végének a dátuma: <font color = "yellow">'.$rent_end.'</font>.</li>														
														</br>
														<li> A kölcsönzés kezdetének a mai (<font color = "yellow">'.$today.'</font>) dátumnál későbbi időpontot kell megadni!</li>
														<li> A kölcsönzés végének a mai (<font color = "yellow">'.$today.'</font>) dátumnál későbbi időpontot kell megadni!</li>
														<li> A kölcsönzés végének a kezdeti dátumnál későbbi időpontot kell megadni!</li>
													</td>
												</tr>
												<tr>
													<td style="padding-top: 40px;">
														<button type = "submit" class = "input" onclick="goBack()">Vissza a kölcsönzéshez.</button>
													</td>
												</tr>
											</table>
										</div>';
									}
							
									
									else if($interval->d <= 6 && $interval->d >= 0 && $interval->m == 0 && $interval->y == 0){
										$whole_price = $ar_1 * $interval->d;
									
										$sql = "INSERT INTO `motorkolcsonzes` ( `felhasznalo_nev`, `motor_id`, `mettol`, `meddig`, `ar_naponta`, `ar_osszesen`) 
										VALUES ( '".$login_session."', '".$row['id']."', '".$rent_start."', '".$rent_end."', '".$ar_1."', '".$whole_price."');";
										mysqli_query($conn, $sql);
											
										$last_id = mysqli_insert_id($conn);
										$getName = "SELECT * FROM felhasznalo, motorkolcsonzes
										WHERE felhasznalo.felhasznalo_nev = motorkolcsonzes.felhasznalo_nev AND motorkolcsonzes.id  = '".$last_id."'" ;
										$getID = mysqli_query($conn, $getName);
										while($name_of_person = mysqli_fetch_assoc($getID)){
										
										echo '
										<div align = "center" id = "cars">
											<table align = "center" width = "55%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
											margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #084B8A); font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 21 21 19 19" >
												<tr>
													<td colspan = "2" width = "20%" height = "35px" style = "padding: 3% 2% 3% 2%; font-size: 40px; " align = "center">
													Sikeres kölcsönzés</td>
												</tr>
												<tr>
													<td colspan = "2" style = "padding: 0% 0% 1% 0%;>
														<div align = "center">
															<div style="text-align: center;height: 1px; background-color: #E6E6E6; width:100%;"></div>
														</div>
													</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Autó márkája</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$row["motormarka_id"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Márka típusa</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$row["marka_tipus"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Felhasználónév</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$login_session.' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönző fél neve</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["vezetek_nev"].' '.$name_of_person["kereszt_nev"].'</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Email-cím</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["email"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Személyigazolvány száma </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["szemelyig_szam"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Lakcím </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["ir_szam"].' '.$name_of_person["varos"].', '.$name_of_person["utca"].' utca '.$name_of_person["hazszam"].'.</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés kezdete</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_start.' </td>
												</tr>
												
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés vége</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_end.' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés időtartama </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$interval->y.' év, '.$interval->m.' hónap, '.$interval->d.' nap</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Autó visszahozatalának a dátuma </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_takeback.' 12:00-ig</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés ára naponta</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													<font color = "yellow">
													'.$ar_1.' HUF </font> </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 3% 0%; font-size: 20px; " align = "right">
													Teljes ár</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 3% 2%; font-size: 20px; " align = "left">
													<font color = "yellow">
													'.$whole_price.' HUF  </font></td>
												</tr>
												<tr>
													<td colspan = "2">';
													?>
														<button type = "submit" class = "input" style = "border-radius: 0 0 19 19; font-size: 28px;" onclick = "location.href='fooldal.php';" >Vissza a nyitóoldalra </<td>
													<?php
													echo '
													</td>
												</tr>
										</table>
											 
									</div>';
									}
									}
									
									else if($interval->d > 6 && $interval->d <= 30 && $interval->m == 0 && $interval->y == 0){
										
										$whole_price = $ar_2 * $interval->d;
											
										$sql = "INSERT INTO `motorkolcsonzes` ( `felhasznalo_nev`, `motor_id`, `mettol`, `meddig`, `ar_naponta`, `ar_osszesen`) 
										VALUES ( '".$login_session."', '".$row['id']."', '".$rent_start."', '".$rent_end."', '".$ar_2."', '".$whole_price."');";
										mysqli_query($conn, $sql);
										$last_id = mysqli_insert_id($conn);
										$getName = "SELECT * FROM felhasznalo, motorkolcsonzes
										WHERE felhasznalo.felhasznalo_nev = motorkolcsonzes.felhasznalo_nev AND motorkolcsonzes.id  = '".$last_id."'" ;
										$getID = mysqli_query($conn, $getName);
										while($name_of_person = mysqli_fetch_assoc($getID)){
										
										echo '
										<div align = "center" id = "cars">
											<table align = "center" width = "55%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
											margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #084B8A); font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 21 21 19 19" >
												<tr>
													<td colspan = "2" width = "20%" height = "35px" style = "padding: 3% 2% 3% 2%; font-size: 40px; " align = "center">
													Sikeres kölcsönzés</td>
												</tr>
												<tr>
													<td colspan = "2" style = "padding: 0% 0% 1% 0%;>
														<div align = "center">
															<div style="text-align: center;height: 1px; background-color: #E6E6E6; width:100%;"></div>
														</div>
													</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Autó márkája</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$row["motormarka_id"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Márka típusa</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$row["marka_tipus"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Felhasználónév</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$login_session.' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönző fél neve</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["vezetek_nev"].' '.$name_of_person["kereszt_nev"].'</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Email-cím</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["email"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Személyigazolvány száma </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["szemelyig_szam"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Lakcím </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["ir_szam"].' '.$name_of_person["varos"].', '.$name_of_person["utca"].' utca '.$name_of_person["hazszam"].'.</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés kezdete</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_start.' </td>
												</tr>
												
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés vége</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_end.' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés időtartama </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$interval->y.' év, '.$interval->m.' hónap, '.$interval->d.' nap</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Autó visszahozatalának a dátuma </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_takeback.' 12:00-ig</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés ára naponta</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													<font color = "yellow">
													'.$ar_2.' HUF </font> </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 3% 0%; font-size: 20px; " align = "right">
													Teljes ár</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 3% 2%; font-size: 20px; " align = "left">
													<font color = "yellow">
													'.$whole_price.' HUF  </font></td>
												</tr>
												<tr>
													<td colspan = "2">';
													?>
														<button type = "submit" class = "input" style = "border-radius: 0 0 19 19; font-size: 28px;" onclick = "location.href='fooldal.php';" >Vissza a nyitóoldalra </<td>
													<?php
													echo '
													</td>
												</tr>
										</table>
											 
									</div>';
									}
										
									}
									
									else if($interval->m >= 1 && $interval->m <= 12 && $interval->y < 1){
										$whole_price = $ar_3 * $interval->m * 30 * $interval->d;
										
										$sql = "INSERT INTO `motorkolcsonzes` ( `felhasznalo_nev`, `motor_id`, `mettol`, `meddig`, `ar_naponta`, `ar_osszesen`) 
										VALUES ( '".$login_session."', '".$row['id']."', '".$rent_start."', '".$rent_end."', '".$ar_3."', '".$whole_price."');";
										mysqli_query($conn, $sql);
										$last_id = mysqli_insert_id($conn);
										$getName = "SELECT * FROM felhasznalo, motorkolcsonzes
										WHERE felhasznalo.felhasznalo_nev = motorkolcsonzes.felhasznalo_nev AND motorkolcsonzes.id  = '".$last_id."'" ;
										$getID = mysqli_query($conn, $getName);
										while($name_of_person = mysqli_fetch_assoc($getID)){
										
										echo '
										<div align = "center" id = "cars">
											<table align = "center" width = "55%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
											margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #084B8A); font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 21 21 19 19" >
												<tr>
													<td colspan = "2" width = "20%" height = "35px" style = "padding: 3% 2% 3% 2%; font-size: 40px; " align = "center">
													Sikeres kölcsönzés</td>
												</tr>
												<tr>
													<td colspan = "2" style = "padding: 0% 0% 1% 0%;>
														<div align = "center">
															<div style="text-align: center;height: 1px; background-color: #E6E6E6; width:100%;"></div>
														</div>
													</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Autó márkája</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$row["motormarka_id"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Márka típusa</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$row["marka_tipus"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Felhasználónév</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$login_session.' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönző fél neve</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["vezetek_nev"].' '.$name_of_person["kereszt_nev"].'</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Email-cím</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["email"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Személyigazolvány száma </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["szemelyig_szam"].' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Lakcím </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$name_of_person["ir_szam"].' '.$name_of_person["varos"].', '.$name_of_person["utca"].' utca '.$name_of_person["hazszam"].'.</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés kezdete</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_start.' </td>
												</tr>
												
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés vége</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_end.' </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés időtartama </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$interval->y.' év, '.$interval->m.' hónap, '.$interval->d.' nap</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Autó visszahozatalának a dátuma </td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$rent_takeback.' 12:00-ig</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés ára naponta</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													<font color = "yellow">
													'.$ar_3.' HUF </font> </td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 3% 0%; font-size: 20px; " align = "right">
													Teljes ár</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 3% 2%; font-size: 20px; " align = "left">
													<font color = "yellow">
													'.$whole_price.' HUF  </font></td>
												</tr>
												<tr>
													<td colspan = "2">';
													?>
														<button type = "submit" class = "input" style = "border-radius: 0 0 19 19; font-size: 28px;" onclick = "location.href='fooldal.php';" >Vissza a nyitóoldalra </<td>
													<?php
													echo '
													</td>
												</tr>
										</table>
											 
									</div>';
									}
								}
								else{
									echo '</br></br></br></br><div align = "center" id = "cars">
											<table align = "center" width = "55%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
											margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #084B8A); font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 21 21 19 19" >
												<tr>
													<td colspan = "2" width = "20%" height = "35px" style = "padding: 3% 2% 3% 2%; font-size: 40px; " align = "center">
													Sikertelen kölcsönzés!		</td>	
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 0%; font-size: 30px; " align = "center">
													<font color = "#FE2E2E">Nem kölcsönözhet motort egy évnél hosszabb időtartamra!</font></br></td>
												</tr>
												</br>
												<tr>
													<td style="padding-top: 40px;">
														<button type = "submit" class = "input" onclick="goBack()">Vissza a kölcsönzéshez.</button>
													</td>
												</tr>
											</table>
									</div>';
								}
							}
						}
					}
		?>
	</body>
</html>