

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
						<a href="hozzaszolasok.php">Vélemények</a>
					</li>
					<li><a href="fooldal.php">Nyitólap</a>
					</li>
					<li><a href="kereses.php">Keresés</a>
					</li>
					<li>
			
				<a href="felhasznalo_profil.php">Profilom</a>
						<div align = "center">
							<table align = "center" width = "100%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="adatok_modositasa.php";'>Adatok módosítása</td></button>
								</tr>
								<tr>
									<td width = "100%"><button class = "buttonlog" align = "left" onclick = 'location.href="jelszo_modosit.php";'>Jelszó megváltoztatása</td></button>
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
	
			
	<div align = "center">
	<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
		<tr>
			<td height = "33px" id = "styleofwords2a" style = "width: 100%;"><font id = "styleofwords2a">
			
			 <?php echo $login_session ?> adatai
			</font></td>
		</tr>
		
	</table>
			
			
			<?php
				$profile_of_user = "SELECT * FROM felhasznalo WHERE felhasznalo.felhasznalo_nev = '".$login_session."'";
				$query_user = mysqli_query($conn, $profile_of_user);
				
				while($row = mysqli_fetch_assoc($query_user)){
				
			?>
			
			<div align = "center">
			<table align = "center" width = "43.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
			
			<!--felhasználói fiók adatai-->
				
					<tr>
						<td width = "100%" height = "33px" id = "styleofwords2" >
						<font id = "styleofwords2">Felhasználói fiók adatai</font></td>
						<td width = "40%" height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords10" >Felhasználónév</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"> <?php echo $row["felhasznalo_nev"]; ?></td>
					</tr>
					
				<!--személyes adatok-->
					<tr>
						<td height = "33px" id = "styleofwords2" >
						<font id = "styleofwords2">Személyes adatok</font></td>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Vezetéknév</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["vezetek_nev"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords10" >Keresztnév</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["kereszt_nev"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Személyi igazolvány száma</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["szemelyig_szam"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords10" >Anyja vezetékneve</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["anyja_vnev"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Anyja keresztneve</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["anyja_knev"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords10" >Email</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["email"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Telefonszám</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;">+36<?php echo $row["telszam"]; ?></td>
					</tr>
					
					<!-- lakcím adatok -->
					
					<tr>
						<td height = "33px" id = "styleofwords2" >
						<font id = "styleofwords2">Lakcím adatok</font></td>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Irányítószám</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["ir_szam"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Város</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["varos"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Utca</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["utca"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Házszám</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["hazszam"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords2" ><font id = "styleofwords2">Születési adatok</font></td>
						<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
					</tr>
					
					<!-- születési adatok -->
					
					<tr>
						<td height = "33px" id = "styleofwords7" >Születési hely</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["szuletesi_hely"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7" >Születési idő</td>
						<td height = "33px" id = "styleofwords10" style = "text-align: left;"><?php echo $row["szuletesi_ido"]; ?></td>
					</tr>
					<tr>
						<td height = "33px" id = "styleofwords7"></td>
						<td height = "33px" id = "styleofwords7"></td>
					</tr>
				</table>
			</div>
			
				<?php } ?>
				
			</br>
			</br>
			</br>
			</br>
			</div>
		</div>
	</body>
</html>