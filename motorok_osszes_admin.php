

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
			Összes motor - admin
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
						<a href="autok_osszes_admin.php">Autók</a>
						<div>
							<?php
								class Cars extends Controller{}
								
								$AllCars = new Cars();
								$AllCars->ListCars();
								$listCars = $AllCars->ListCars();
								
								//$i = 1;
								
								while($getCars = mysqli_fetch_assoc($listCars)){
						
										echo '<form method = "GET" action = "autok_admin.php" enctype = "multipart/form-data" name = "click_on_car">
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
									echo '<form method = "GET" action = "motorok_admin.php" enctype = "multipart/form-data" name = "login_index">
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
			</br>
			<?php
				
				$getCategs = "SELECT * FROM motor GROUP BY kategoria;";
				$getPrices = "SELECT * FROM motor GROUP BY ar_1;";
				$getCars = "SELECT * FROM motor GROUP BY motormarka_id;";
				$getMotorsTypes = "SELECT * FROM motor GROUP BY marka_tipus;";
				$getFuels = "SELECT * FROM motor GROUP BY uzemanyag;";
				$getEngineCapacity = "SELECT * FROM motor GROUP BY hengerurtartalom;";
				
				$getResultof_categs = mysqli_query($conn, $getCategs);
				$getResultof_prices = mysqli_query($conn, $getPrices);
				$getResultof_Motors = mysqli_query($conn, $getCars);
				$getResultof_Motortypes = mysqli_query($conn, $getMotorsTypes);
				$getResultof_fuels = mysqli_query($conn, $getFuels);
				$getResultof_enginecap = mysqli_query($conn, $getEngineCapacity);
				
			?>
			
			
			<div align = "center">
				<table align = "center" width = "65%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" 
					style = "border-style: solid; border-width: 0px; align: center;
					margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #0B3861); display: inline-block; font-family: Electrolize;
					color: #ffffff; font-size: 14.5px; border-radius: 19 19 0 0;" >
					<form method = "GET" action = "motorok_osszes_admin.php" enctype = "multipart/form-data" name = "car_list_on_click">
					<tr style = "padding: 0 0 10 20">
						<td colspan = "1"style = "padding: 10 10 10 20; font-size: 17px; text-align: left; width: 20%;">Részletes keresés</td>
						<td colspan = "3" style = "padding: 10 10 10 0; width: 80%">
						<input type = "submit" class = "input"  style = "padding: 0 20 0 20; border-radius: 0 19 0 0;"value = "Listázás" name = "autok_listazasa" /></td>
					</tr>
					<tr>
						<td style = "padding: 10 10 10 20; font-size: 20px; text-align: left; width: 20%;">Kategória</td>
						<td style = "width: 30%;">
							<select style = "width: 95%;" name = "select_catgs">
								<option value=""></option>
								<?php while($rows = mysqli_fetch_array($getResultof_categs)){ ?>
								<option>
									<?php echo $rows["kategoria"]; }?>
								</option>
							</select>
						</td>
						<td style = "padding: 10 0 10 0; font-size: 20px; text-align: left; width: 18%;">Ár (HUF)</td>
						<td style = "width: 30%;">
							<select style = "width: 95%;" name = "select_prices">
								<option value=""></option>
								<?php while($rows = mysqli_fetch_array($getResultof_prices)){ ?>
								<option>
									<?php echo $rows["ar_1"]; }?>
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style = "padding: 10 10 10 20; font-size: 20px; text-align: left; width: 20%;">Márka</td>
						<td style = "width: 30%;">
							<select style = "width: 95%;" name = "select_cars" bgcolor = "#efed7d">
								<option bgcolor = "#232131" value=""></option>
								<?php while($rows = mysqli_fetch_array($getResultof_Motors)){ ?>
								<option>
									<?php echo $rows["motormarka_id"]; }?>
								</option>
							</select>
						</td>
						<td style = "padding: 10 0 10 0; font-size: 20px; text-align: left; width: 20%;">Márka típusa</td>
						<td style = "width: 30%;">
							<select style = "width: 95%;" name = "select_cartypes">
								<option value=""></option>
								<?php while($rows = mysqli_fetch_array($getResultof_Motortypes)){ ?>
								<option>
									<?php echo $rows["marka_tipus"]; }?>
								</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style = "padding: 10 10 10 20; font-size: 20px; text-align: left; width: 20%;">Üzemanyag</td>
						<td style = "width: 30%;">
							<select style = "width: 95%;" name = "select_fuels">
								<option value=""></option>
								<?php while($rows = mysqli_fetch_array($getResultof_fuels)){ ?>
								<option>
									<?php echo $rows["uzemanyag"]; }?>
								</option>
							</select>
						</td>
						<td style = "padding: 10 0 10 0; font-size: 20px; text-align: left; width: 22%;">Hengerűrtartalom </td>
						<td style = "width: 30%;">
							<select style = "width: 95%;" name = "select_enginecap">
								<option value=""></option>
								<?php while($rows = mysqli_fetch_array($getResultof_enginecap)){ ?>
								<option>
									<?php echo $rows["hengerurtartalom"]; }?>
								</option>
							</select>
						</td>
					</tr>
			
			<?php
				if(isset($_GET['autok_listazasa'])){
					
					$category = $_GET['select_catgs'];
					$price = $_GET['select_prices'];
					$carname = $_GET['select_cars'];
					$cartype = $_GET['select_cartypes'];
					$fueltype = $_GET['select_fuels'];
					$engineCapacity = $_GET['select_enginecap'];
					
					$ListCarsBySelect = "SELECT * FROM motor WHERE kategoria LIKE '%".$category."%'
						AND ar_1  LIKE '%".$price."%' AND motormarka_id LIKE '%".$carname."%' AND marka_tipus  LIKE '%".$cartype."%'
						AND uzemanyag LIKE '%".$fueltype."%' AND hengerurtartalom LIKE '%".$engineCapacity."%' ORDER BY ar_1 ASC";
					
					$printCars = mysqli_query($conn, $ListCarsBySelect);
					$rowindex = 1;
					
					$count_listed_cars = mysqli_num_rows($printCars);
					
					if($count_listed_cars == 0){
						echo '
							
							<div align = "center">
								<table align = "center" width = "65%" id = "cars" id = "tableborders2"cellpadding = "0"
								cellspacing = "0" style = " border-color: #ff0000; font-family: Electrolize; color: #fff; font-size: 40px; background: linear-gradient(#0E0F15, #0B3861);">
									<tr>
										<div align = "center">
											<div style="text-align: center;height: 1px; background-color: #e6e6e6; width:65%;"></div>
										</div>
									</tr>
									<tr>
										<td width = "100%" align = "center">Nincs találat </td>
									</tr>
								</table>
							</div>
							</br>
							</br>
							</br>';
					}
					
					else{
						echo '<tr>
									<td colspan = "4"style = "padding: 10 10 10 20; font-size: 15px; text-align: left; width: 20%;"><i>Találatok száma: '.$count_listed_cars.'</i></td>
								</tr>
									</table>
								<div align = "center">
									<div style="text-align: center;height: 1px; background-color: #e6e6e6; width:65%;"></div>
								</div>';
								
							while($row = mysqli_fetch_assoc($printCars)) {
								echo '
									
									<div align = "center" id = "cars">
										<table align = "center" width = "65%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
										margin: 0 0px 0 0; border-color: #000; background: linear-gradient(#0E0F15, #0B3861); display: inline-block; font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 0 0 19 19" >
										<tr>
											<td width = "25%" height = "20px" style = "padding: 0% 0% 0% 6%;" align = "left"><u>'.$rowindex++.'</u></td>
											<td width = "10%" height = "20px"> </td>
											<td width = "65%" height = "300px" rowspan = "16" >
											<img class = "pop-out" src = "'.$row["fenykep"].'" style = "width: 100%; height: 100%;"></td>
											
										</tr>
										<tr>
											<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Kategória</td>
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["kategoria"].'</td>
											
										</tr>
										
										<tr>
											<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Márka</td>
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["motormarka_id"].'</td>
											
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
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["hengerurtartalom"].' cm<sup>3</sup></td>
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
											<td width = "20%" height = "26px" style = "padding: 0% 2% 0% 0%;" align = "right">Végsebesség </td>
											<td width = "20%" height = "26px" style = "padding: 0% 0% 0% 3%;">'.$row["vegsebesseg"].' km/h</td>

											<td>
											';
											?>
											
											<input type = "button" onclick = "location.href='hozzaszolasok_admin.php';" class = "comment" value = "Vélemény írása"/></td>
											<?php
											echo '
										</tr>
										<tr>
											<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Munkaütem</td>
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["munkautem"].' mp</td>
											
										</tr>
										<tr>
											<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right"></td>
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;"></td>
											
										</tr>
										</form>
										<tr>
									<form method = "get" action = "motorok_kolcsonzese.php" enctype = "multipart/form-data" name = "comment">
									<td width = "50%" colspan = "3">
									<input type = "submit" class = "input" style = "border-radius: 0 0 0 0; " value = "Kölcsönzés" name = "'.$row["id"].'" /></td>
								</tr>
									</table> 
									</div>
									<div align = "center">
										<div style="text-align: center;height: 15px; background-color: #E6E6E6; width:65%;"></div>
									</div>
									</form>
									';			
														
						}
					}
				}
					
				else{
						
					$newestMotorsIndex = "SELECT * FROM `motor` ORDER BY ar_1;";
					$motors = mysqli_query($conn, $newestMotorsIndex);
					
					$rowindex = 1;
					if (mysqli_num_rows($motors) > 0){
						while($row = mysqli_fetch_assoc($motors)){
							
								echo '
									<div align = "center" id = "cars">
										<table align = "center" width = "65%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
										margin: 0 0px 0 0; border-color: #000; background: linear-gradient(#0E0F15, #0B3861); display: inline-block; font-family: Electrolize; color: #ffffff; font-size: 14.5px; border-radius: 0 0 19 19" >
										<tr>
										<div align = "center">
												<div style="text-align: center;height: 1px; background-color: #e6e6e6; width:65%;"></div>
										</div>
										<tr>
											<td width = "25%" height = "20px" style = "padding: 0% 0% 0% 6%;" align = "left"><u>'.$rowindex++.'</u></td>
											<td width = "10%" height = "20px"> </td>
											<td width = "65%" height = "300px" rowspan = "17" >
									<img class = "pop-out" src = "'.$row["fenykep"].'" style = "width: 100%; height: 100%;"></td>
										</tr>
										<tr>
											<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Kategória</td>
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["kategoria"].'</td>
											
										</tr>
										
										<tr>
											<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Márka</td>
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["motormarka_id"].'</td>
											
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
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["hengerurtartalom"].' cm<sup>3</sup></td>
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
											<td>
											';
											?>
											
											<input type = "button" onclick = "location.href='hozzaszolasok_admin.php';" class = "comment" value = "Vélemény írása"/></td>
											<?php
											echo '
										</tr>
										<tr>
											<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right">Munkaütem </td>
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;">'.$row["munkautem"].' </td>
										</tr>
										<tr>
											<td width = "20%" height = "20px" style = "padding: 0% 2% 0% 0%;" align = "right"></td>
											<td width = "20%" height = "20px" style = "padding: 0% 0% 0% 3%;"></td>
										</tr>
										</form>
										<tr>
									<form method = "get" action = "motorok_kolcsonzese.php" enctype = "multipart/form-data" name = "comment">
									<td width = "50%" colspan = "3">
									<input type = "submit" class = "input" style = "border-radius: 0 0 0 0; " value = "Kölcsönzés" name = "'.$row["id"].'" /></td>
								</tr>
									</table> 
									</div>
									<div align = "center">
										<div style="text-align: center;height: 15px; background-color: #E6E6E6; width:65%;"></div>
									</div>
									</form>';			
														
							}
						}
					}
					
			?>
					
		</br></br>
		</form>
	</body>
</html>