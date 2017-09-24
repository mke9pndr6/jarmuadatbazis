	
</html>
	<head>
		<title>
			Sikeres motorkölcsönzés
		</title>
	</head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
		<link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet'/>
	<body id = "bgStyle">
		</br></br></br>
			
			<?php
		
			include('connection.php');
			
			$newestCarsIndex = "SELECT * FROM `auto` ORDER BY evjarat DESC";
			$cars = mysqli_query($conn, $newestCarsIndex);
					
			$rowindex = 1;
			if (mysqli_num_rows($cars) > 0){
				while($row = mysqli_fetch_assoc($cars)){
					if(isset($_POST[$row["id"]])){
									
									$rent_start = $_POST['kolcsonzes_kezdet'];
									$rent_end = $_POST['kolcsonzes_veg'];
									
									
									$ar_1 = $row["ar_1"];
									$ar_2 = $row["ar_2"];
									$ar_3 = $row["ar_3"];
									
									$date1=date_create($rent_start);
									$date2=date_create($rent_end);
									$diff=date_diff($date1,$date2);
									
									$date1 = new DateTime($rent_start);
									$date2 = new DateTime($rent_end);
									$interval = $date1->diff($date2);
									$interval->d = $interval->d + 1;
									
									if($interval->d <= 6){
										$whole_price = $ar_1 * $interval->d;
										$sql = "INSERT INTO `autokolcsonzes` ( `felhasznalo_nev`, `auto_id`, `mettol`, `meddig`, `ar_naponta`, `ar_osszesen`) 
										VALUES ( '".$login_session."', '".$row['id']."', '".$rent_start."', '".$rent_end."', '".$ar_1."', '".$whole_price."');";
										mysqli_query($conn, $sql);
											
										$last_id = mysqli_insert_id($conn);
										$getName = "SELECT * FROM felhasznalo, autokolcsonzes
										WHERE felhasznalo.felhasznalo_nev = autokolcsonzes.felhasznalo_nev AND autokolcsonzes.id  = '".$last_id."'" ;
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
													'.$row["automarka_id"].' </td>
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
													'.$interval->d.' nap</td>
												</tr>
												
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés ára naponta</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$ar_1.' HUF</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 3% 0%; font-size: 20px; " align = "right">
													Teljes ár</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 3% 2%; font-size: 20px; " align = "left">
													'.$whole_price.' HUF</td>
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
									
									else if($interval->d > 6 && $interval->d <= 30){
										$whole_price = $ar_2 * $interval->d;
										$sql = "INSERT INTO `autokolcsonzes` ( `felhasznalo_nev`, `auto_id`, `mettol`, `meddig`, `ar_naponta`, `ar_osszesen`) 
										VALUES ( '".$felhasznalo_nev."', '".$row['id']."', '".$rent_start."', '".$rent_end."', '".$ar_2."', '".$whole_price."');";
										mysqli_query($conn, $sql);
										$last_id = mysqli_insert_id($conn);
										$getName = "SELECT * FROM felhasznalo, autokolcsonzes
										WHERE felhasznalo.felhasznalo_nev = autokolcsonzes.felhasznalo_nev AND autokolcsonzes.id  = '".$last_id."'" ;
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
													'.$row["automarka_id"].' </td>
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
													'.$felhasznalo_nev.' </td>
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
													'.$interval->d.' nap</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés ára naponta</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$ar_2.' HUF</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 3% 0%; font-size: 20px; " align = "right">
													Teljes ár</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 3% 2%; font-size: 20px; " align = "left">
													'.$whole_price.' HUF</td>
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
									
									else if($interval->d > 30 && $interval->d <= 366){
										$whole_price = $ar_3 * $interval->d;
										$sql = "INSERT INTO `autokolcsonzes` ( `felhasznalo_nev`, `auto_id`, `mettol`, `meddig`, `ar_naponta`, `ar_osszesen`) 
										VALUES ( '".$felhasznalo_nev."', '".$row['id']."', '".$rent_start."', '".$rent_end."', '".$ar_3."', '".$whole_price."');";
										mysqli_query($conn, $sql);
										$last_id = mysqli_insert_id($conn);
										$getName = "SELECT * FROM felhasznalo, autokolcsonzes
										WHERE felhasznalo.felhasznalo_nev = autokolcsonzes.felhasznalo_nev AND autokolcsonzes.id  = '".$last_id."'" ;
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
													'.$row["automarka_id"].' </td>
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
													'.$felhasznalo_nev.' </td>
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
													'.$interval->d.' nap</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
													Kölcsönzés ára naponta</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
													'.$ar_3.' HUF</td>
												</tr>
												<tr>
													<td width = "20%" height = "33px" style = "padding: 0% 4% 3% 0%; font-size: 20px; " align = "right">
													Teljes ár</td>
													<td width = "20%" height = "33px" style = "padding: 0% 0% 3% 2%; font-size: 20px; " align = "left">
													'.$whole_price.' HUF</td>
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
							}
						}
					}
		?>
	</body>
</html>