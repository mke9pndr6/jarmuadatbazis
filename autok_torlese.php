

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
			Autók törlése
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
						<a href="hozzaszolasok_admin.php">Összes jármű</a>
						<div>
							<?php
								class Vehicles extends Controller{}
								
								
								echo '<a href = "autok_osszes_admin.php">Autók</a>';
								
								echo '<a href = "motorok_osszes_admin.php">Motorok</a>';
							
							?>
						</div>
					</li>
					<li><a href="adminpage.php">Nyitólap</a>
						<div align = "center">
							
							<a href = "autok_hozzaadasa.php">Autók felvétele</a>
							<a href = "autok_modositasa.php">Autók módosítása</a>
							<a href = "autok_torlese.php">Autók törlése</a>
							<a href = "motorok_hozzaadasa.php">Motorok felvétele</a>
							<a href = "motorok_modositasa.php">Motorok módosítása</a>
							<a href = "motorok_torlese.php">Motorok törlése</a>
							<a href = "hozzaszolasok_admin.php">Hozzászólások</a>
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
			</br>
			</br>
			
			
			
			<div align = "center">
			<form method = "POST" action = "autok_torlese.php" enctype = "multipart/form-data" name = "car_delete">
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td height = "33px" id = "styleofwords2a"><font id = "styleofwords2a">Autók törlése</font></td>
					</tr>
				</table>
			</div>
			
			<div>
				<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td height = "33px" id = "styleofwords7" width = "30%">Autó azonosítója<font id = "styleofwords8"></font></td>
						<td height = "33px" id = "styleofwords9" width = "70%"><input type = "number" 
							style="height:26px; width: 100%" name = "id" size = "45" placeholder = "Adja meg az autó azonosítóját..." required /></td>
					</tr>
				</table>
			</div>
			
			<?php
				if(isset($_POST['autotorles'])){
					
					$id = $_POST['id'];
					
					$deleteCar = "DELETE FROM auto WHERE id = '".$id."'";
					mysqli_query($conn, $deleteCar);
				}
			?>
			
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
					<tr>
						<td width = "100%"><input type = "submit" class = "input" value = "Autó törlése" name = "autotorles" /></td>
					</tr>
			</table>
			</form>
			
			
			</br>
			</br>
			</br></br>
			</br>
				
			<?php
				
				$sql = "SELECT * FROM auto";
				$result = mysqli_query($conn, $sql);
				
				echo '
						<div align = "center">
							<table align = "center" width = "78.2%" id = "tableborders2" border = "0px" cellpadding = "0" cellspacing = "0">
								<tr>
									<td width = "12.5%" id = "tableborders3">Azonosító</td>
									<td width = "12.5%" id = "tableborders3">Márka</td>
									<td width = "12.5%" id = "tableborders3">Márka típusa</td>
									<td width = "12.5%" id = "tableborders3">Évjárat</td>
									<td width = "12.5%" id = "tableborders3">Állapot</td>
									<td width = "12.5%" id = "tableborders3">Hengerűrtartalom</td>
									<td width = "12.5%" id = "tableborders3">Teljesítmény (LE)</td>
									<td width = "14.2%" id = "tableborders3">Végsebesség</td>
								</tr>
							</table>
					</div>';		
				
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
					echo '
							<div align = "center">
								<table align = "center" width = "78.2%" id = "tableborders2" border = "0px" cellpadding = "0" cellspacing = "0">
									<tr>
										<td width = "12.5%" id = "tableborders2"> '.$row["id"].'</td>
										<td width = "12.5%" id = "tableborders2"> '.$row["automarka_id"].'</td>
										<td width = "12.5%" id = "tableborders2"> '.$row["marka_tipus"].' </td>
										<td width = "12.5%" id = "tableborders2"> '.$row["evjarat"].'</td>
										<td width = "12.5%" id = "tableborders2"> '.$row["allapot"].'</td>
										<td width = "12.5%" id = "tableborders2"> '.$row["hengerurtartalom"].' cm<sup>3</sup></td>
										<td width = "12.5%" id = "tableborders2"> '.$row["teljesitmeny"].' LE</td>
										<td width = "12.5%"> '.$row["vegsebesseg"].' km/h</td>
									</tr>
								</table>
							</div>';		
					}
				}
				
				
				
			?>
		
		</body>
	</table>
</html>