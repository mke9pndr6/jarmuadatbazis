

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
			Autók kölcsönzések
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
			
			<?php
				$sql = "SELECT * FROM motorkolcsonzes, felhasznalo, motor 
						WHERE motorkolcsonzes.felhasznalo_nev = felhasznalo.felhasznalo_nev AND motorkolcsonzes.motor_id = motor.id ORDER BY felhasznalo.felhasznalo_nev;";
				$result = mysqli_query($conn, $sql);
				$count_carrents = mysqli_num_rows($result);
				
				
				$sqlsum = "SELECT SUM(ar_osszesen) FROM motorkolcsonzes;";
				$resultsum = mysqli_query($conn, $sqlsum);
				
				while($row1 = mysqli_fetch_assoc($resultsum)){
				
			?>
			
			
			<div align = "center">
						
						<div align = "center" id = "cars">
							<table align = "center" width = "80%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
							margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #0B3861); display: inline-block; font-family: Electrolize; color: #ffffff; font-size: 32px; border-radius: 19 19 0 0;padding-bottom: 30px;" >
							<tr>
								<td width = "15%"></td>
								<td width = "70%" align = "center" style = "padding: 10px;">Motoros kölcsönzések (összesen: <?php echo $count_carrents; ?>)</td>
								<td width = "15%"></td>
							</tr>
							<tr>
								<td colspan = "3">Összbevétel: <font color ="yellow"> <?php echo $row1["SUM(ar_osszesen)"]; } ?> HUF </font></td>
							</tr>
						</table>
					</div>
			
				
			<?php
				
				$sql = "SELECT * FROM motorkolcsonzes, felhasznalo, motor
						WHERE motorkolcsonzes.felhasznalo_nev = felhasznalo.felhasznalo_nev AND motorkolcsonzes.motor_id = motor.id ORDER BY felhasznalo.felhasznalo_nev;";
				$result = mysqli_query($conn, $sql);
				
				echo '
						<div align = "center">
							<table align = "center" width = "80%" id = "tableborders2" border = "0px" cellpadding = "0" cellspacing = "0">
								<tr>
									<td width = "12.5%" id = "tableborders3">Vezetéknév</td>
									<td width = "12.5%" id = "tableborders3">Keresztnév</td>
									<td width = "21.5%" id = "tableborders3">Email</td>	
									<td width = "9%" id = "tableborders3">Motor márkája</td>
									<td width = "12.5%" id = "tableborders3">Márka típusa</td>
									<td width = "9%" id = "tableborders3">Kölcsönzés kezdete</td>
									<td width = "9%" id = "tableborders3">Kölcsönzés vége</td>
									<td width = "12%" id = "tableborders3">Végösszeg</td>
								</tr>
							</table>
					</div>';		
				
				if (mysqli_num_rows($result) > 0) {
					// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
					echo '
							<div align = "center">
								<table align = "center" width = "80%" id = "tableborders2" border = "0px" cellpadding = "0" cellspacing = "0">
									<tr>
										<td width = "12.5%" id = "tableborders2"> '.$row["vezetek_nev"].'</td>
										<td width = "12.5%" id = "tableborders2"> '.$row["kereszt_nev"].'</td>
										<td width = "21.5%" id = "tableborders2"> '.$row["email"].' </td>
										<td width = "9%" id = "tableborders2"> '.$row["motormarka_id"].'</td>
										<td width = "12.5%" id = "tableborders2"> '.$row["marka_tipus"].'</td>
										<td width = "9%" id = "tableborders2"> '.$row["mettol"].'</td>
										<td width = "9%" id = "tableborders2"> '.$row["meddig"].'</td>
										<td width = "12%"> '.$row["ar_osszesen"].' HUF</td>
									</tr>
								</table>
							</div>';		
					}
				}
				
				
				
			?>
		
		</body>
	</table>
</html>