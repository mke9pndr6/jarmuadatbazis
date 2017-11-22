

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
							<td height = "33px" id = "styleofwords11" style = "padding:0;">Hozzászólás írása a következő felhasználónévvel: <?php echo "<b><i>".$login_session."</i></b>"; ?></td>
						</tr>
						<tr>
							<td><textarea cols = "93" rows = "4" placeholder = "Írja meg véleményét az autókról, motorokról, vagy fejtse ki gondolatait más témában." 
							style="font-family: Electrolize; font-size: 14px; padding: 2 2 2 2;" cols = "93" rows = "4" name = "hozzaszolas" required></textarea></td>
						</tr>
						
						
						<tr>
							<td colspan = "2"width = "50%">
							<input style = "padding: 0; border-radius: 0;" type = "submit" class = "input" value = "Hozzászólás írása" name = "comment_write" required/></td>
						</tr>
						</form>

						<?php
						
							if(isset($_GET['comment_write'])){
								
								
								$hozzaszolas = $_GET['hozzaszolas'];
								$currentDateTime = date('Y-m-d H:i:s');
								
								$breaks = array("</br>","<br>","<br/>","\r\n");  
								$text = str_ireplace($breaks, "</br>", $hozzaszolas);  
								$writecomment = "INSERT INTO hozzaszolasok
											(felhasznalo_nev, hozzaszolas, kategoria, datum) 
											VALUES('".$login_session."','".$hozzaszolas."','Autó','".$currentDateTime."');";
								mysqli_query($conn, $writecomment);
								
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
												<font color = "black">'.$row["felhasznalo_nev"].'  -  '.$row["datum"].'  -  '.$row["kategoria"].' - <b>'.$row["id"].'</b></font>
												';
												?>
													<form method = "get" action = "hozzaszolasok_admin_action.php" enctype = "multipart/form-data" name = "deletecomment">
													<?php echo '<input type = "submit"  value = "Törlés" name = "'.$row["id"].'"
													style = "background: #0040FF; color: white; border: 1px solid black; cursor: pointer; padding: 2px; border-radius: 4px;" >';?>
													
												<?php
												
												echo'
												
												</td>
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