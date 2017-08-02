

<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->




<?php 
	include('connection.php');
	include('controller.php');
	//include('style.php');
?>

<html>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
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
					<li><a href="index.php">Kezdőlap</a></li>
					<li><a href="kereses.php">Keresés</a></li>
					<li><a href="regisztracio.php">Regisztráció</a></li>
					<li><a href="belepes.php">Belépés</a></li>
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
			
		<form method = "POST" action = "belepes.php" enctype = "multipart/form-data" name = "register">
			<div align = "center">
			<table align = "center" width = "26.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
				<tr>
					<td height = "33px" id = "styleofwords2a"><font id = "styleofwords2a">Bejelentkezés</font></td>
				</tr>
				<tr>
					<td height = "10px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
				</tr>
				<tr>
					<td height = "33px" id = "styleofwords2"><font id = "styleofwords2">Felhasználónév</font></td>
				</tr>
				<tr>
					<td height = "33px" id = "styleofwords9"><input type = "text" style="height:25px; width: 100%;" name = "bejelent_felh" size = "45" placeholder = "Adja meg felhasználónevét..." required /></td>
				</tr>
				<tr>
					<td height = "33px" id = "styleofwords2"><font id = "styleofwords2">Jelszó</font></td>
				</tr>
				<tr>
					<td height = "33px" id = "styleofwords9"><input type = "text" style="height:25px; width: 100%; padding: 0 0 0 0;" name = "bejelent_jel" size = "45" placeholder = "Adja meg jelszavát..." required /></td>
				</tr>
				
				<tr>
					<td width = "50%"><input type = "submit" class = "input" value = "Bejelentkezés" name = "belepes"/></td>
				</tr>
			</table>
			</div>
		</form>
			
			
			
			
		
		</body>
	</table>
</html>