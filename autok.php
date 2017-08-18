

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
						<a href="autok_osszes.php">Autók</a>
						<div>
							<?php
								class Cars extends Controller{}
								
								$AllCars = new Cars();
								$AllCars->ListCars();
								$listCars = $AllCars->ListCars();
								
								//$i = 1;
								
								while($getCars = mysqli_fetch_assoc($listCars)){
						
										echo '<form method = "POST" action = "autok.php" enctype = "multipart/form-data" name = "login_index">
											<input type = "submit" value = "'.$getCars['id'].'" name = "click_on_car" />
										</form>';
								}
								mysqli_free_result($listCars);
							?>
						</div>
					</li>	
					<li>
						<a href="motorok_osszes.php">Motorok</a>
						<div>
							<?php
								class Motors extends Controller{}
								
								$AllMotors = new Motors();
								$AllMotors->ListMotors();
								$listMotors = $AllCars->ListMotors();
								
								while($getMotors = mysqli_fetch_assoc($listMotors)){
									echo '<form method = "POST" action = "motorok.php" enctype = "multipart/form-data" name = "login_index">
											<input type = "submit" value = "'.$getMotors['id'].'" name = "click_on_motor" />
										</form>';
								}
								mysqli_free_result($listMotors);
							?>
						</div>
					</li>
					<li>
						<a href="hozzaszolasok.php">Összes jármű</a>
						<div>
							<?php
								class Vehicles extends Controller{}
								
								
								echo '<a href = "osszes_auto.php">Autók</a>';
								
								echo '<a href = "osszes_jarmu.php">Motorok</a>';
							
							?>
						</div>
					</li>
					<li><a href="fooldal.php">Nyitólap</a></li>
					<li><a href="kereses.php">Keresés</a></li>
					<li>
					
						<a href="felhasznalo_profil.php">Profilom</a>
								<div align = "center">
									<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
										
										<tr>
											<td width = "100%" align = "center"><button class = "buttonlog" align = "left" onclick = 'location.href="adatok_modositasa.php";'>Adatok módosítása</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="jelszo_modosit.php";'>Új jelszó</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kolcsonzeseim.php";'>Kölcsönzéseim</td></button>
										</tr>
					
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="felhasznalo_torlese.php";'>Fiók törlése</td></button>
										</tr>
										
										
										<?php
								
											if(isset($_POST['kijelentkezes_dropdown'])){
										
												$login_felh_nev = $_POST['login_felh'];
												$login_jelszo = $_POST['login_jelszo'];
												
												$adminf = "admin";
												$adminj = "adminho";
												
												$login_sql = "SELECT Felhasznalo.felhasznalo_nev, Felhasznalo.jelszo FROM Felhasznalo
												WHERE Felhasznalo.felhasznalo_nev = '".$login_felh_nev."' AND Felhasznalo.jelszo = '".$login_jelszo."' LIMIT 1";
												
												$login_user = mysqli_query($conn, $login_sql);
												$count_loggedinuser = mysqli_num_rows($login_user);
												
												
												//ha újra megpróbálnánk bejelentkezni
												
												$login_again = "SELECT * from belepes WHERE felhasznalo_nev = '".$login_felh_nev."' AND jelszo = '".$login_jelszo."'";
												$query_user = mysqli_query($conn, $login_again);
												$count_user = mysqli_num_rows($query_user);
												
												
												if(mysqli_num_rows($login_user) == 0){
													
													echo '<tr>
														<td height = "33px" id = "styleofwords7a">Hibás felhasználónév/jelszó!</td>
													</tr>';
												}
													
												
												else if(mysqli_num_rows($login_user) == 1){
													
													$sql = "INSERT INTO belepes
													(felhasznalo_nev, jelszo) 
													VALUES('".$login_felh_nev."','".$login_jelszo."');";
													
													mysqli_query($conn, $sql);
													
													if($login_felh_nev == $adminf && $login_jelszo == $adminj){
														echo '<tr>
																<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "adminpage.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Tovább a kínálathoz!</a></font></td>
															</tr>
															
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Új jelszó</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "adatok_modositasa.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Adatok módosítása</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "felhasznalo_torlese.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;  padding: 2% 0 0 9%"><font size = "3" color = "#ffffff" align = "center">Fiók törlése</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
															</tr>';	
															//header("refresh 2; url = admin_main.php");
													}
													
													else{
														
														echo '<tr>
																<td height = "33px" id = "styleofwords7a3">Sikeres bejelentkezés! Üdvözöljük, '.$login_felh_nev.'!</td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "index.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center; padding: 2% 0 0 9%"><font size = "3" color = "#ffffff" align = "center">Tovább a kínálathoz!</a></font></td>
															</tr>
															
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;  padding: 2% 0 0 9%"><font size = "3" color = "#ffffff" align = "center">Új jelszó!</a></font></td>
															</tr>

															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "jelszo_modosit.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;"><font size = "3" color = "#ffffff" align = "center">Adatok módosítása</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "felhasznalo_torlese.php" id = "styleofword2"
																style = "text-decoration: none; text-color: white; text-align: center;  padding: 2% 0 0 9%"><font size = "3" color = "#ffffff" align = "center">Fiók törlése</a></font></td>
															</tr>
															<tr>
																<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
															</tr>';	
															//header("refresh: 2;url = admin_main.php");
													}
												}
												
											}
									
										?>
										
										</table>
										<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
										<form method = "POST" action = "fooldal.php" enctype = "multipart/form-data" name = "login_index">
											<tr>
												<td width = "100%"><input style = "text-align: left; padding: 4;"type = "submit" class = "inputlog" value = "Kijelentkezés" name = "kijelentkezes_dropdown" /></td>
											</tr>
										</form>
										</table>
									</div>
	
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
		
			<?php
			
			if(isset($_POST['click_on_car'])){
			/*$sql = "SELECT * FROM `auto` ORDER BY evjarat LIMIT 10";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)){}*/
			$getCarName = $_POST['click_on_car'];
			$ChooseCars = "SELECT * FROM `auto` WHERE automarka_id = '".$getCarName."'";
			$cars = mysqli_query($conn, $ChooseCars);
			
			//echo $newestCarsIndex;
			
			$rowindex = 1;
			if (mysqli_num_rows($cars) > 0){
				while($row = mysqli_fetch_assoc($cars)){
					
						echo '
									<div align = "center" id = "cars">
									<table align = "center" width = "71.42%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0.5px;
									margin: 0 0.5px 0 0; border-color: #000;background: rgb(38 ,98, 133); font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 22 22 19 19;" >
									<tr>
										<td width = "25%" height = "20px" style = "padding: 0% 0% 0% 6%;" align = "left"><u>'.$rowindex++.'</u></td>
										<td width = "10%" height = "20px"> </td>
										<td width = "65%" height = "300px" rowspan = "17" ><img id="myImg" src = "pictures/cla220.jpg" id = "effectscale" style = "width: 100%; height: 100%;"></td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Márka </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["automarka_id"].'</td>
										
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Márka típusa </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["marka_tipus"].'</td>
										
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Ár naponta (1-6 nap) </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["ar_1"].' HUF</td>
										
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Ár naponta (7-30 nap)</td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["ar_2"].' HUF</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Ár naponta (31-365 nap)</td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["ar_3"].' HUF</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Évjárat </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["evjarat"].'</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Állapot </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["allapot"].'</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Km/h állása </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["km_ora_allasa"].' km</td>
									</tr>

									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Üzemanyag </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["uzemanyag"].'</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Hengerűrtartalom</td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["hengerurtartalom"].' cm3</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Teljesítmény </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["teljesitmeny"].' LE</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Saját tömeg </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["sajat_tomeg"].' kg</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Maximális tömeg </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["maximalis_tomeg"].' kg</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Tankméret </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["tank_meret"].' L</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Átlagfogyasztás </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["atlagfogyasztas"].' L/100km</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Végsebesség </td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["vegsebesseg"].' km/h</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Gyorsulás (1-100)</td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["gyorsulas"].' mp</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Oktánszám</td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["oktanszam"].'</td>
									</tr>
									<tr>
										<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right"></td>
										<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;"></td>
									</tr>
									<tr>
										<td width = "100%" colspan = "3"><input type = "submit" onclick = "loginMessage()" class = "input" value = "Kölcsönzés" name = "kolcsonzes" /></td>
									</tr>
								</table>
							
							
							</br>
							</br>
							</br>
							</br>
							</br>
							</br>';		
												
						}
					}
				}
			?>
				
				
			<div id="myModal" class="modal">
			  <span class="close">&times;</span>
				<img class="modal-content" id="img01">
				<div id="caption"></div>
			</div>

			<script>
			// Get the modal
			var modal = document.getElementById('myModal');

			// Get the image and insert it inside the modal - use its "alt" text as a caption
			var img = document.getElementById('myImg');
			var modalImg = document.getElementById("img01");
			var captionText = document.getElementById("caption");
			img.onclick = function(){
				modal.style.display = "block";
				modalImg.src = this.src;
				captionText.innerHTML = this.alt;
			}

			// Get the <span> element that closes the modal
			var span = document.getElementsByClassName("close")[0];

			// When the user clicks on <span> (x), close the modal
			span.onclick = function() { 
				modal.style.display = "none";
			}
			</script>	
			
	</body>
</html>