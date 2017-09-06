

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
						
										echo '<form method = "GET" action = "autok.php" enctype = "multipart/form-data" name = "login_index">
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
									echo '<form method = "GET" action = "motorok.php" enctype = "multipart/form-data" name = "login_index">
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
								
								
								echo '<a href = "autok_osszes.php">Autók</a>';
								
								echo '<a href = "motorok_osszes.php">Motorok</a>';
							
							?>
						</div>
					</li>
					<li><a href="fooldal.php">Nyitólap</a><div align = "center"><a href = "hozzaszolasok.php">Hozzászólások</a></div></li>
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
			</br>
			</br>
		
			<?php
			
			if(isset($_GET['click_on_motor'])){
			/*$sql = "SELECT * FROM `auto` ORDER BY evjarat LIMIT 10";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result)){}*/
			$getMotorName = $_GET['click_on_motor'];
			$ChooseMotors = "SELECT * FROM `motor` WHERE motormarka_id = '".$getMotorName."'";
			$cars = mysqli_query($conn, $ChooseMotors);
			
			//echo $newestCarsIndex;
			
			$rowindex = 1;
			if (mysqli_num_rows($cars) > 0){
				while($row = mysqli_fetch_assoc($cars)){
					
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
											
											<input type = "button" onclick = "location.href='hozzaszolasok.php';" class = "comment" value = "Vélemény írása"/></td>
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
			?>
				
			
			
	</body>
</html>