

<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->




<?php 
	include('connection.php');
	include('controller.php');
	//include('style.css');
?>

<html>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
		<link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet'/>
		
	<head>
		<title>
			Kezdőlap
		</title>
		
		<script type = "text/javascript">
			$(document).ready(function(){
				$("ul#menu div").click(function(){
					$(this).parent().find("ul").slideDown("slow");
				});
			});
		</script>
		
		<script>
				function loginMessage() {
					alert("Kérjük jelentkezzen be a kölcsönzéshez!");
				}
				
				function loginComment() {
					alert("Kérjük jelentkezzen be, hogy tudjon hozzászólást írni!");
				}
		</script>
		
		
	</head>
	
		<body id = "bgStyle">
			
				<div id = "container">
				<ul id = "menu">
					<li>
						<a href="autok.php">Autók</a>
						<div>
							<?php
								class Cars extends Controller{}
								
								$AllCars = new Cars();
								$AllCars->ListCars();
								$listCars = $AllCars->ListCars();
								
								//$i = 1;
								
								while($getCars = mysqli_fetch_assoc($listCars)){
						
										echo '<a href = "">'. $getCars['id']. '</a>';
								}
								mysqli_free_result($listCars);
							?>
						</div>
					</li>	
					<li>
						<a href="motorok.php">Motorok</a>
						<div>
							<?php
								class Motors extends Controller{}
								
								$AllMotors = new Motors();
								$AllMotors->ListMotors();
								$listMotors = $AllCars->ListMotors();
								
								while($getCars = mysqli_fetch_assoc($listMotors)){
									echo '<a href = "">'. $getCars['id']. '</a>';
								}
								mysqli_free_result($listMotors);
							?>
						</div>
					</li>
					<li>
						<a href="jarmuvek.php">Összes jármű</a>
						<div>
							<?php
								class Vehicles extends Controller{}
								
								$AllCars = new Cars();
								$AllCars->ListCars();
								$listCars = $AllCars->ListCars();
								
								//$i = 1;
								echo '<a href = "autok.php">AUTÓK</a>';
								while($getCars = mysqli_fetch_assoc($listCars)){
						
										echo '<a href = "">'. $getCars['id']. '</a>';
								}
								
								
								$AllMotors = new Motors();
								$AllMotors->ListMotors();
								$listMotors = $AllCars->ListMotors();
								echo '<a href = "motorok.php">MOTOROK</a>';
								while($getMotors = mysqli_fetch_assoc($listMotors)){
									echo '<a href = "">'. $getMotors['id']. '</a>';
								}
								
								
								mysqli_free_result($listCars);
								mysqli_free_result($listMotors);
							?>
						</div>
					</li>
					<li><a href="index.php">Kezdőlap</a></li>
					<li><a href="kereses.php">Keresés</a></li>
					<li><a href="regisztracio.php">Regisztráció</a></li>
					<li>
						<a href="belepes.php">Belépés</a>
							<form method = "POST" action = "index.php" enctype = "multipart/form-data" name = "login_index">
								<div align = "center">
									<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
										<tr>
											<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
										</tr>
										<tr>
											<td height = "33px" id = "styleofwords2"><font id = "styleofwords2">Felhasználónév</font></td>
										</tr>
										<tr>
											<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px; width: 100%;" name = "login_felh" size = "45" required /></td>
										</tr>
										<tr>
											<td height = "33px" id = "styleofwords2"><font id = "styleofwords2">Jelszó</font></td>
										</tr>
										<tr>
											<td height = "33px" id = "styleofwords9"><input type = "password" style="height:26px; width: 100%;" name = "login_jelszo" size = "45" required /></td>
										</tr>
										<tr>
											<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="regisztracio.php";'>Még nem regisztrált?</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="regisztracio.php";'>Elfelejtette jelszavát?</td></button>
										</tr>
										<tr>
											<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
										</tr>
										
										<?php
								
											if(isset($_POST['bejelentkezes_dropdown'])){
										
												$login_felh_nev = $_POST['login_felh'];
												$login_jelszo = $_POST['login_jelszo'];
												
												$adminf = "admin";
												$adminj = "admin";
												
												$login_sql = "SELECT Felhasznalo.felhasznalo_nev, Felhasznalo.jelszo FROM Felhasznalo
												WHERE Felhasznalo.felhasznalo_nev = '".$login_felh_nev."' AND Felhasznalo.jelszo = '".$login_jelszo."' LIMIT 1";
												
												$login_user = mysqli_query($conn, $login_sql);
												$count_loggedinuser = mysqli_num_rows($login_user);
												
												if(mysqli_num_rows($login_user) == 0){
													
													echo '<tr>
														<td height = "33px" id = "styleofwords7a">Hibás felhasználónév/jelszó!</td>
													</tr>';
												}
													
												
												if(mysqli_num_rows($login_user) == 1){
													
													$sql = "INSERT INTO belepes
													(felhasznalo_nev, jelszo) 
													VALUES('".$login_felh_nev."','".$login_jelszo."');";
													
													mysqli_query($conn, $sql);
													
													if($login_felh_nev == $adminf && $login_jelszo == $adminj){
														echo '<tr>
																<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "index.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">tovább a kínálathoz!</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
															</tr>';				
													}
													
													else{
														
														echo '<tr>
																<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "index.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">tovább a kínálathoz!</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
															</tr>';										
													}
												}
													
											}
									
										?>
										
										</table>
										<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
											<tr>
												<td width = "100%"><input type = "submit" class = "inputlog" value = "Bejelentkezés" name = "bejelentkezes_dropdown" /></td>
											</tr>
										</table>
									</div>
						</form>
					</li>
						
					</li>
				</ul>
				<div style = "clear:both"></div>
			</div>
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
			
			
			<div align = "center">
				<table align = "center" width = "100%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = " border-color: #ff0000; font-family: Electrolize; color: #fff; font-size: 40px;">
					<tr>
						<td width = "17.5%"></td>
						<td width = "65%">Tíz legújabb autónk</td>
						<td width = "17.5%"></td>
						
					</tr>
				</table>
			</div>
			
			</br>
			
			
		
			
			
			<?php
			
			
			/*$sql = "SELECT * FROM `auto` ORDER BY evjarat LIMIT 10";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)) {*/
				
			$newestCarsIndex = "SELECT * FROM `auto` ORDER BY evjarat DESC LIMIT 10";
			$cars = mysqli_query($conn, $newestCarsIndex);
			if (mysqli_num_rows($cars) > 0){
				while($row = mysqli_fetch_assoc($cars)){
				echo '
						<div align = "center" id = "cars">
				<table align = "center" width = "70%" id = "cars" id = "tableborders2 border = "1px" "cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0.5px;
					margin: 1 0.5px 1 0; border-color: #000;background: rgb(38 ,98, 133); font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 22 22 0 0" >
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right"> </td>
						<td width = "10%" height = "20px"> </td>
						<td width = "100%" height = "330px" rowspan = "17" "padding: 10% 0% 0% 3%;" align = "center"><img src = "pictures/cla220.jpg" class="pop-out" style = "width: 100%; height: 90%;" align = "center"></td>
					</tr>
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Márka </td>
						<td width = "10%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["marka_tipus"].'</td>
						
					</tr>
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Ár naponta (1-6 nap) </td>
						<td width = "24%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["ar_1"].' HUF</td>
						
					</tr>
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Ár naponta (7-30 nap)</td>
						<td width = "10%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["ar_2"].' HUF</td>
					</tr>
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Ár naponta (31-365 nap)</td>
						<td width = "10%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["ar_3"].' HUF</td>
					</tr>
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Évjárat </td>
						<td width = "10%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["evjarat"].'</td>
					</tr>
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Állapot </td>
						<td width = "10%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["allapot"].'</td>
					</tr>
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Km/h állása </td>
						<td width = "10%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["km_ora_allasa"].' km</td>
					</tr>
					<tr>
						<td width = "10%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Szállítható személyek</td>
						<td width = "10%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["szallithato_szemelyek"].' fő</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Üzemanyag </td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["uzemanyag"].'</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Hengerűrtartalom</td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["hengerurtartalom"].' cm3</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Teljesítmény </td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["teljesitmeny"].' LE</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Saját tömeg </td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["sajat_tomeg"].' kg</td>
						
					</tr>
					
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Maximális tömeg </td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["maximalis_tomeg"].' kg</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Tankméret </td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["tank_meret"].' L</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Átlagfogyasztás </td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["atlagfogyasztas"].' L/100km</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Végsebesség </td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["vegsebesseg"].' km/h</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Gyorsulás (1-100)</td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["gyorsulas"].' mp</td>
					</tr>
					<tr>
						<td width = "24%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right"></td>
						<td width = "4%" height = "20px" style = "padding: 0% 0% 0% 3%;"></td>
					</tr>
				</table>
			</div>
			<div align = "center">
				<table align = "center" width = "70%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td width = "50%"><input type = "submit" onclick = "loginMessage()" class = "input" value = "Kölcsönzés" name = "kolcsonzes" /></td>
						<td width = "50%"><input type = "submit" onclick = "loginComment()" class = "input" value = "Hozzászólás írása" name = "hozzaszolas" /></td>
					</tr>
				</table>
			</div>
			
			</br>
			</br>
			</br>
			</br>
			</br>
			</br>
	
			
					';
				}
			}
			
			?>
			
			
		
		</body>
	</table>
</html>