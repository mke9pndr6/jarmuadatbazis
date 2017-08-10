

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
			Autók módosítása
		</title>
		
		<script type = "text/javascript">
			$(document).ready(function(){
				$("ul#menu div").click(function(){
					$(this).parent().find("ul").slideDown("slow");
				});
			});
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
						
										echo '<a href = "">'. $getCars['megnevezes']. '</a>';
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
									echo '<a href = "">'. $getCars['megnevezes']. '</a>';
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
								
								$AllVehicles = new Vehicles();
								$AllVehicles->ListVehicles();
								$listVehicles = $AllVehicles->ListVehicles();
								
								while($getCars = mysqli_fetch_assoc($listVehicles)){
									echo '<a href = "">'. $getCars['megnevezes']. '</a>';
								}
								mysqli_free_result($listVehicles);
							?>
						</div>
					</li>
					<li>
						<a href="adminpage.php">Kezdőlap</a>
						<div align = "center">
							<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="autok_hozzaadasa.php";'>Autók hozzáadása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="autok_modositasa.php";'>Autók módosítása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="autok_torlese.php";'>Autók törlése</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="motorok_hozzaadasa.php";'>Motorok hozzáadása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="motorok_modositasa.php";'>Motorok módosítása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="motorok_torlese.php";'>Motorok törlése</td></button>
								</tr>
							</table>
						</div>
					</li>
					
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
			</br>
			</br>
			</br>
			</br>
			
			
			<div align = "center">
				<form method = "POST" action = "motorok_modositasa_action.php" enctype = "multipart/form-data" name = "motor_update">
					<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
						<tr>
							<td height = "0px"  width = "90%" id = "styleofwords2a"><font id = "styleofwords2a">Autók módosítása</font></td>
							<td height = "0px"  width = "10%" id = "styleofwords2a"><font id = "styleofwords2a"></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Motor azonosítója (id)<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" 
							style="height:26px;" name = "id" size = "45" placeholder = "Adja meg az autó azonosítóját..." required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords10" >Márka<font id = "styleofwords12"></font></td>
							<td height = "33px" id = "styleofwords11"><input  type = "number"  
							style="height:26px;" name = "marka_id" size = "45" placeholder = "pl.: 1 = Mercedes" required/>
						
							</td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Jármű típusa<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "text" 
							style="height:26px;" name = "jarmutipus_id" size = "45" placeholder = "Autó/Motor" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords10" >Ár (1-6 napig)<font id = "styleofwords12"></font></td>
							<td height = "33px" id = "styleofwords11"><input type = "number" 
							style="height:26px;" name = "ar_1" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Ár (7-30 napig)<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px;" name = "ar_2" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords10" >Ár (31-365 napig)<font id = "styleofwords12"></font></td>
							<td height = "33px" id = "styleofwords11"><input type = "number" style="height:26px;" name = "ar_3" size = "45" height = "20" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Márka típusa<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "marka_tipus" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords10" >Évjárat<font id = "styleofwords12"></font></td>
							<td height = "33px" id = "styleofwords11"><input type = "number" style="height:26px;" name = "evjarat" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Autó állapota<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "allapot" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Km/h állása<font id = "styleofwords8"/></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px;" name = "km_ora_allasa" size = "45" required/></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Üzemanyag fajtája<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px; width: 100%;" name = "uzemanyag" size = "45" placeholder = "Benzin/Dízel" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Hengerűrtartalom<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px;" name = "hengerurtartalom" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Teljesítmény<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px;" name = "teljesitmeny" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Saját tömeg<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:25px; width: 100%;" name = "sajat_tomeg" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Maximális tömeg<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px;" name = "maximalis_tomeg" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Üzemanyagtank mérete<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px; width: 100%;" name = "tank_meret" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Átlagfogyasztás<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" step = "0.01" style="height:26px; width: 100%;" name = "atlagfogyasztas" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Végsebesség<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px; width: 100%;" name = "vegsebesseg" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Gyorsulás (1-100)<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" step = "0.01" style="height:26px; width: 100%;" name = "gyorsulas" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Munkaütem<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "number" style="height:26px; width: 100%;" name = "munkautem" size = "45" placeholder = "" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" ><font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords7" ><font id = "styleofwords8"></font></td>
						</tr>
						</table>
						<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
							<tr>
								<td width = "100%"><input type = "submit" class = "input" value = "Motor módosítása" name = "motormodositasa" /></td>
							</tr>
					</table>	
				</form>
			</div>
		</body>
	</table>
</html>