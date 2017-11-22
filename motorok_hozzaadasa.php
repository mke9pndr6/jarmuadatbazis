

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
			Motorok hozzáadása
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
						<a href="autok_osszes_admin.php">Autók</a>
						<div>
							<?php
								class Cars extends Controller{}
								
								$AllCars = new Cars();
								$AllCars->ListCars();
								$listCars = $AllCars->ListCars();
								
								//$i = 1;
								
								while($getCars = mysqli_fetch_assoc($listCars)){
						
										echo '<form method = "POST" action = "autok_admin.php" enctype = "multipart/form-data" name = "login_index">
											<input type = "submit" value = "'.$getCars['id'].'" name = "click_on_car" />
										</form>';
								}
								mysqli_free_result($listCars);
							?>
						</div>
					</li>	
					<li>
						<a href="motorok_osszes_admin.php">Motorok</a>
						<div>
							<?php
								class Motors extends Controller{}
								
								$AllMotors = new Motors();
								$AllMotors->ListMotors();
								$listMotors = $AllCars->ListMotors();
								
								while($getMotors = mysqli_fetch_assoc($listMotors)){
									echo '<form method = "POST" action = "motorok_admin.php" enctype = "multipart/form-data" name = "login_index">
											<input type = "submit" value = "'.$getMotors['id'].'" name = "click_on_motor" />
										</form>';
								}
								mysqli_free_result($listMotors);
							?>
						</div>
					</li>
					<li>
						<a href="hozzaszolasok_admin.php">Vélemények</a>
					</li>
					<li><a href="adminpage.php">Nyitólap</a>
						<div align = "center">
							
							<a href = "autok_hozzaadasa.php">Autók felvétele</a>
							<a href = "autok_modositasa.php">Autók módosítása</a>
							<a href = "autok_torlese.php">Autók törlése</a>
							<a href = "motorok_hozzaadasa.php">Motorok felvétele</a>
							<a href = "motorok_modositasa.php">Motorok módosítása</a>
							<a href = "motorok_torlese.php">Motorok törlése</a>
						</div>
					</li>
					<li><a href="kereses_admin.php">Keresés</a></li>
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
											<td width = "100%" align = "center"><button class = "buttonlog" align = "left" onclick = 'location.href="online_felhasznalok.php";'>Online tagok</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="reg_felhasznalok.php";'>Regisztrált tagok</td></button>
										</tr>
										<tr>
											<td width = "100%" align = "center"><button class = "buttonlog" align = "left" onclick = 'location.href="kolcsonzeseim_auto_admin.php";'>Autós kölcsönzések</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kolcsonzeseim_motor_admin.php";'>Motoros kölcsönzések</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="felhasznalo_torlese.php";'>Fiók törlése</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kijelentkezes.php";'>Kijelentkezés</td></button>
										</tr>
										
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
		
			
			<div align = "center">
				<form method = "POST" action = "motorok_hozzaadasa.php" enctype = "multipart/form-data" name = "motor_upload">
					<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
						<tr>
							<td height = "0px"  width = "90%" id = "styleofwords2a"><font id = "styleofwords2a">Motorok hozzáadása az adatbázishoz</font></td>
							<td height = "0px"  width = "10%" id = "styleofwords2a"><font id = "styleofwords2a"></font></td>
						</tr>
					
						<tr>
							<td height = "33px" id = "styleofwords10" >Márka<font id = "styleofwords12"></font></td>
							<td height = "33px" id = "styleofwords11"><input type = "text"  
							style="height:26px;" name = "motormarka_id" size = "45" placeholder = "pl.: Aprilia" required/>
							</td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Márka típusa<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "marka_tipus" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Kategória<font id = "styleofwords8"></font></td>
							<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px;" name = "kategoria" size = "45" required /></td>
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
							<td height = "33px" id = "styleofwords7" >Kép feltöltése<font id = "styleofwords8"></font></td>
							
							<td height = "33px" id = "styleofwords9">
							</label><input type="file" name="image" style="height:26px;" size = "29"/></td>
							
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords10" >Évjárat<font id = "styleofwords12"></font></td>
							<td height = "33px" id = "styleofwords11"><input type = "number" style="height:26px;" name = "evjarat" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords7" >Motor állapota<font id = "styleofwords8"></font></td>
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
						
						
						<?php
						
							if(isset($_POST['motorfelvetel'])){
								
								$motormarka_id = $_POST['motormarka_id'];
								$marka_tipus = $_POST['marka_tipus'];
								$ar_1 = $_POST['ar_1'];
								$ar_2 = $_POST['ar_2'];
								$ar_3 = $_POST['ar_3'];
								$kategoria= $_POST['kategoria'];
								
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
								
								$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
								$image_name = addslashes($_FILES['image']['name']);
	
								$sql = "INSERT INTO motor
											(fenykep, kategoria, motormarka_id, ar_1, ar_2, ar_3, marka_tipus,
											evjarat, allapot, km_ora_allasa, uzemanyag,
											hengerurtartalom, teljesitmeny, sajat_tomeg, maximalis_tomeg,
											tank_meret, atlagfogyasztas, vegsebesseg, gyorsulas, munkautem) 
											VALUES('pictures/jarmuadatbazis_kepek/".$image_name."','".$kategoria."','".$motormarka_id."','".$ar_1."','".$ar_2."',
											'".$ar_3."','".$marka_tipus."','".$evjarat."','".$allapot."',
											'".$km_ora_allasa."','".$uzemanyag."','".$hengerurtartalom."',
											'".$teljesitmeny."','".$sajat_tomeg."','".$maximalis_tomeg."','".$tank_meret."',
											'".$atlagfogyasztas."','".$vegsebesseg."','".$gyorsulas."','".$munkautem."');";
							
											
								mysqli_query($conn, $sql);
								echo '<div align = "center">
											<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
												<tr>
													<td height = "33px" id = "styleofwords7a2">Hozzáadtuk az adatbázishoz a következő autót: '.$motormarka_id.' '.$marka_tipus.'</td>
													<td height = "33px" id = "styleofwords7a2"></td>
												</tr>
											</table>
										</div>';
							
							}
				
						?>
						<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
							<tr>
								<td width = "100%"><input type = "submit" class = "input" value = "Motor felvétele" name = "motorfelvetel" /></td>
							</tr>
					</table>
				</form>
			</div>
			
			</br></br>
		</body>
	</table>
</html>