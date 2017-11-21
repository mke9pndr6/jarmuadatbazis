

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
				<div align = "center">
					<table align = "center" width = "50%" id = "cars" id = "tableborders2"cellpadding = "0" cellspacing = "0" style = "border-style: solid; border-width: 0px;
						margin: 0 0px 0 0 ;border-color: #000;background: #E1E1E1; font-family: Electrolize; color: #ffffff; font-size: 14px; border-radius: 0 0" >
						<form method = "get" action = "hozzaszolasok_admin.php" enctype = "multipart/form-data" name = "comment">
						<tr>
							<td style = "background: linear-gradient(#0E0F15, #0B3861);font-size: 24px; font-family: Electrolize;
							text-align: center; padding: 10 0 10 0">Írja meg véleményét!</td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords11" style = "padding:0;"><input  type = "text" 
							style="height:26px; width: 100%; font-size: 14px; font-family: Electrolize;" name = "felhasznalo_nev" size = "45" placeholder = "Adja meg felhasználónevét... (Nem kötelező!)" /></td>
						</tr>
						<tr>
							<td><textarea cols = "93" rows = "4" placeholder = "Írja le véleményét az autókról, motorokról, vagy fejtse ki gondolatait más témában...Sortörésre használja a '</br' tag-et, pl.: Kedves xy! </br> - ennek javítása folyamatban van." 
							style="font-family: Electrolize; font-size: 14px; padding: 2 2 2 2;" cols = "93" rows = "4" name = "hozzaszolas" required></textarea></td>
						</tr>
						
						<tr>
							<td style = "padding: 2 2 2 4;"><input type="checkbox" name="vehicle1" value="kategoria_auto"><font color = "black"> Vélemény írása autóról (nem működik még) - Ezért a default érték az "Autó"</font></input></td>
						</tr>
						<tr>
							<td style = "padding: 2 2 2 4;"><input type="checkbox" name="vehicle2" value="kategoria_motor"><font color = "black"> Vélemény írása motorról (nem működik még)</font></input></td>
						</tr>
						<tr>
							<td style = "padding: 2 2 2 4;"><input type="checkbox" name="vehicle2" value="kategoria_egyeb"><font color = "black"> Egyéb (nem működik még)</font></input></td>
						</tr>
						<tr>
							<td colspan = "2"width = "50%">
							<input style = "padding: 0; border-radius: 0;" type = "submit" class = "input" value = "Hozzászólás írása" name = "comment_write" /></td>
						</tr>
						

						<?php
						
							if(isset($_GET['comment_write'])){
								
								$felhasznalo_nev = $_GET['felhasznalo_nev'];
								$hozzaszolas = $_GET['hozzaszolas'];
								$currentDateTime = date('Y-m-d H:i:s');
								
								$breaks = array("</br>","<br>","<br/>","\r\n");  
								$text = str_ireplace($breaks, "</br>", $hozzaszolas);  
								
								$emptyname = "Anonymous";
								
								if($felhasznalo_nev != ""){
									
									$writecomment = "INSERT INTO hozzaszolasok
											(felhasznalo_nev, hozzaszolas, kategoria, datum) 
											VALUES('".$felhasznalo_nev."','".$hozzaszolas."','Autó','".$currentDateTime."');";
								mysqli_query($conn, $writecomment);
								}
								else{
								$writecomment = "INSERT INTO hozzaszolasok
											(felhasznalo_nev, hozzaszolas, kategoria, datum) 
											VALUES('Anonymous','".$hozzaszolas."','Autó','".$currentDateTime."');";
								mysqli_query($conn, $writecomment);
								}
								
							}
							
							?>
							<?php
								$comments = "SELECT * FROM hozzaszolasok ORDER BY datum DESC";
								$getComments = mysqli_query($conn, $comments);
								
								$allcomments = "SELECT * from hozzaszolasok";
								$commResult = mysqli_query($conn, $allcomments);
								$count_comments = mysqli_num_rows($commResult);
								
								echo '<tr>
										<td height = "35px" style = "padding: 2 2 2 4;"><font color = "black" size = "4.4" >
										<b>Összes hozzászólás ('.$count_comments.')</b></font></td>
									</tr>';
								
								if (mysqli_num_rows($getComments) > 0){
									while($row = mysqli_fetch_assoc($getComments)){
										echo '
											<tr>
												<td height = "20px" bgcolor = "white" style = "padding: 2 2 2 4;">
												<font color = "black">'.$row["felhasznalo_nev"].'  -  '.$row["datum"].'  -  '.$row["kategoria"].'</font></td>
											</tr>
											<tr>
												<td style = "padding: 8 2 8 4; height: auto; width: 100%;"><font color = "black" style = "font-size: 15.5px;">'.$row["hozzaszolas"].'</font></td>
											</tr>
											
									
									';
									}
								}
							
								
				
						?>
						
						</form>
					</table>	
				</div>
				</br>
				</br>
	
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			
	</body>
</html>