	
</html>
	<head>
		<title>
			Kölcsönzési adatok megadása
		</title>
	</head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
		<link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet'/>
	<body id = "bgStyle">
		</br></br></br></br></br></br>
			
			<?php
		
			include('connection.php');
			
			$newestCarsIndex = "SELECT * FROM `auto` ORDER BY evjarat DESC";
			$cars = mysqli_query($conn, $newestCarsIndex);
					
			$rowindex = 1;
			if (mysqli_num_rows($cars) > 0){
				while($row = mysqli_fetch_assoc($cars)){
					if(isset($_GET[$row["id"]])){
					?>
								
								<div align = "center">
								<table align = "center" width = "40%" id = "styleofwords" border = "0px" cellpadding = "0"
								cellspacing = "0" style = "background: linear-gradient(#0E0F15, #084B8A); border-radius: 19 19 0 0 ">
								<form method = "get" action = "auto_kolcsonzes_action.php" enctype = "multipart/form-data" name = "rent_a_car">
									<tr>
										<td align = "center"height = "60px" colspan = "2" style = "padding: 2% 1% 2% 1%;"><font color = "white" style = "font-family: Electrolize;" size = "6">Véglegesítse kölcsönzését</td>
									</tr>
									<tr>
										<td colspan = "2" style = "padding: 0% 0% 2% 0%;">
										<div align = "center">
											<div style="text-align: center;height: 1px; background-color: #E6E6E6; width:100%;"></div>
										</div>
										</td>
									</tr>
									
									</tr>
									<tr>
										<td height = "33px" ><font color = "white" style = "padding: 1% 1% 1% 3%; font-family: Electrolize;" size = "4">Autó márkája</td>
										<td height = "33px" ><font color = "white" style = "padding: 1%;" size = "4"><?php echo $row['automarka_id']; ?></td>
									</tr>
									
									<tr>
										<td height = "33px" ><font color = "white" style = "padding: 1% 1% 1% 3%;" size = "4">Márka típusa</td>
										<td height = "33px" ><font color = "white" style = "padding: 1%;" size = "4"><?php echo $row['marka_tipus']; ?></td>
									</tr>
									<tr>
										<td height = "33px" width = "50%"><font color = "white" style = "padding: 1% 1% 1% 3%;" size = "4">Ár naponta (1-6 nap)</td>
										<td height = "33px" ><font color = "white" style = "padding: 1%;" size = "4">
										<input type = "number" style="height:22px; width: 90%; opacity: 30;" name = "ar_1" size = "45" placeholder = "" value = "<?php echo $row['ar_1']; ?>" />
										 </td>
									</tr>
									<tr>
										<td height = "33px" width = "50%"><font color = "white" style = "padding: 1% 1% 1% 3%;" size = "4">Ár naponta (7-30 nap)</td>
										<td height = "33px" ><font color = "white" style = "padding: 1%;" size = "4">
										<input type = "number" style="height:22px; width: 90%;" name = "ar_2" size = "45" placeholder = "" value = "<?php echo $row['ar_2']; ?>" />
										 </td>
									</tr>
									<tr>
										<td height = "33px" width = "50%"><font color = "white" style = "padding: 1% 1% 1% 3%;" size = "4">Ár naponta (31- 365 nap)</td>
										<td height = "33px" ><font color = "white" style = "padding: 1%;" size = "4">
										<input type = "number" style="height:22px; width: 90%;" name = "ar_3" size = "45" placeholder = "" value = "<?php echo $row['ar_3']; ?>" />
										 </td>
									</tr>
									<tr>
										<td height = "33px" ><font color = "white" size = "4" style = "padding: 1% 1% 1% 3%;">Felhasználónév</td>
										<td height = "33px" ><font color = "white" style = "padding: 1%;" size = "4"><?php echo $login_session ?> </td>
									</tr>
									
									<tr>
										<td height = "33px" ><font color = "white" size = "4" style = "padding: 1% 1% 1% 3%;">Kölcsönzés kezdete</td>
										<td height = "33px" style = "padding: 1%;" ><input type = "date" style="height:22px; width: 93%;" name = "kolcsonzes_kezdet" size = "45" placeholder = "" required /></td>
									</tr>
									<tr>
										<td height = "33px" ><font color = "white" style = "padding: 1% 1% 1% 3%;" size = "4">Kölcsönzés vége</td>
										<td height = "33px" style = "padding: 1%;" ><input type = "date" style="height:22px; width: 93%;" name = "kolcsonzes_veg" size = "45" placeholder = "" required /></td>
									</tr>
									<tr>
										<td height = "33px" ><font color = "white" style = "padding: 1% 1% 1% 3%;" size = "4"></td>
										<td height = "33px" ><font color = "white" style = "padding: 1% 1% 1% 3%;" size = "4"></td>
									</tr>
								</table>
								<div align = "center">
									<div style="text-align: center;height: 1px; background-color: #E6E6E6; width:40%;"></div>
								</div>
								<div align = "center">
								<table align = "center" width = "40%" id = "styleofwords" border = "0px" cellpadding = "0"
								cellspacing = "0" style = "background: linear-gradient(#0E0F15, #084B8A);">
									<tr>
										<td>
										<?php
										echo '
											<input type = "submit" class = "input" style = "border-radius: 0 0 0 0; font-size: 28px; " value = "Kölcsönzés" name = "'.$row["id"].'"/></td>
										</td>';
										?>
									</tr>
								</table>
								</div>
						<?php
					}
				}
			}
		?>
		
		
	</body>
</html>