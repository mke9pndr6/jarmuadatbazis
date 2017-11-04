

<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->

<?php 
	ob_start();
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
			<?php echo $login_session; ?> kölcsönzései 
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
						
										echo '<form method = "GET" action = "autok.php" enctype = "multipart/form-data" name = "click_on_car">
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
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kolcsonzeseim_auto.php";'>Autós kölcsönzéseim</td></button>
										</tr>
										<tr>
											<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="kolcsonzeseim_motor.php";'>Motoros kölcsönzéseim</td></button>
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
			
			$rents = "SELECT * FROM motor, motorkolcsonzes, felhasznalo 
			WHERE motor.id = motorkolcsonzes.motor_id AND motorkolcsonzes.felhasznalo_nev = '".$login_session."' AND felhasznalo.felhasznalo_nev = '".$login_session."'";
			$rentmotors = mysqli_query($conn, $rents);
			$number_of_rents = mysqli_num_rows($rentmotors);
			
			echo '
				<div align = "center" id = "cars">
					<table align = "center" width = "55%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
					margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #0B3861); display: inline-block; font-family: Electrolize; color: #ffffff; font-size: 32px; border-radius: 19 19 0 0" >
						<tr>
							<td width = "100%" align = "center" style = "padding:5px 0px 5px 0px ;">'.$login_session.' kölcsönzései'?><?php 
							echo ' <font color = "yellow"> - összesen '. $number_of_rents.' db'; ?><?php echo '</font></td>
						</tr>
					</table>
				</div>';
			
			$rowindex = 1;
			if (mysqli_num_rows($rentmotors) > 0){
				
				while($row = mysqli_fetch_assoc($rentmotors)){
					
						echo '
							<div align = "center" id = "cars">
								<table align = "center" width = "55%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
								margin: 0 0px 0 0; border-color: #000;background: linear-gradient(#0E0F15, #084B8A); font-family: Electrolize; color: #ffffff; font-size: 14.5px;" >
									<tr>
										<td colspan = "2" width = "20%" height = "30px" style = "padding: 3% 2% 3% 2%; font-size: 40px; " align = "center">
										'.$rowindex++.'. kölcsönzés</td>
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
										'.$row["vezetek_nev"].' '.$row["kereszt_nev"].'</td>
									</tr>
									<tr>
										<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
										Email-cím</td>
										<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
										'.$row["email"].' </td>
									</tr>
									<tr>
										<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
										Személyigazolvány száma </td>
										<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
										'.$row["szemelyig_szam"].' </td>
									</tr>
									<tr>
										<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
										Lakcím </td>
										<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
										'.$row["ir_szam"].' '.$row["varos"].', '.$row["utca"].' utca '.$row["hazszam"].'.</td>
									</tr>
									<tr>
										<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
										Kölcsönzés kezdete</td>
										<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
										'.$row["mettol"].' </td>
									</tr>
									
									<tr>
										<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
										Kölcsönzés vége</td>
										<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
										'.$row["meddig"].' </td>
									</tr>
									<tr>
										<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
										Kölcsönzés ára naponta </td>
										<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
										'.$row["ar_naponta"].' HUF</td>
									</tr>
									
									<tr>
										<td width = "20%" height = "33px" style = "padding: 0% 4% 0% 0%; font-size: 20px; " align = "right">
										Kölcsönzés ára összesen</td>
										<td width = "20%" height = "33px" style = "padding: 0% 0% 0% 2%; font-size: 20px; " align = "left">
										'.$row["ar_osszesen"].' HUF</td>
									</tr>
									<div align = "center">
										<div style="text-align: center;height: 15px; background-color: #E6E6E6; width:55%;"></div>
									</div>
							</table>
								 
						</div>';
					
				}
					echo '<div align = "center">
								<div style="text-align: center;height: 15px; background-color: #E6E6E6; width:55%;"></div>
							</div>';
			}
		?>
		</br></br>
				
	</body>
</html>
			