


<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->


<?php 
	//include('connection.php');
	include('controller.php');
	//include('style.php');
?>

<?php
	include('index_login_action.php');
	
	
?>

<html>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
		<link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet'>
	<head>
		<title>
			Kezdőlap
		</title>
		
	</head>
	
		<body id = "bgStyle">
			
			</br>
			</br>
			</br>
			</br>
			</br>
			
			<div align = "center">
				<form method = "POST" action = "index.php" enctype = "multipart/form-data" name = "login">
					<table align = "center" width = "38.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0"
					style = "border-radius: 22 22 0 0; background: linear-gradient(#0E0F15, #0B3861);">
						<tr>
							<td height = "50px"><font id = "style_login_header" align = "center">Jelentkezzen be a kölcsönzéshez!</font></td>
						</tr>
						<tr>
							<td>
								<div style="text-align: center;height: 1px; background-color: #E6E6E6; width:100%;"></div>
							</td>
						</tr>
						<tr>
							<td height = "33px" ></td>
						</tr>
						<tr>
							<td height = "33px" ><font id = "style_login">Felhasználónév</font></td>
						</tr>
						<tr>
							<td height = "33px" align = "center"><input type = "text" style="height:26px; width: 98%; 
							padding: 12px 20px; margin: 8px 0; box-sizing: border-box; border: none; border-bottom: 3px solid black; color:#13105C;"
							name = "login_felh" size = "45" required align = "center" placeholder = "Adja meg felhasználónevét a bejelentkezéshez!"/></td>
						</tr>
						<tr>
							<td height = "33px" ><font id = "style_login">Jelszó</font></td>
						</tr>
						<tr>
							<td height = "33px" align = "center"><input type = "password" style="height:26px; width: 98%; 
							padding: 12px 20px; margin: 8px 0; box-sizing: border-box; border: none; border-bottom: 3px solid black; color:#13105C;"
							name = "login_jelszo" size = "45" required align = "center" placeholder = "*****************"/></td>
						</tr>
						<tr>
							<td height = "33px"></td>
						</tr>
						<tr>
							<td height = "33px" ><font id = "style_login"><a href = "regisztracio.php"
							style = "text-decoration: none; text-color: white;"><font size = "4" color = "#ffffff">Még nem regisztrált?</a></font></td>
						</tr>
						<tr>
							<td height = "33px" ><font id = "style_login"><a href = "regisztracio.php"
							style = "text-decoration: none; text-color: white;"><font size = "4" color = "#ffffff">Elfelejtette jelszavát?</a></font></td>
						</tr>
						<tr>
							<td height = "25px" id = "styleofwords7a"><font id = "styleofwords7a" style = "width: 100%;"><?php echo $error; ?></font></td>
						</tr>
						
						

						</table>
						<table align = "center" width = "38.25%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
							
							<tr>
								<td width = "100%"><input type = "submit" class = "input" value = "Bejelentkezés" name = "bejelentkezes" /></td>
							</tr>
						</table>
					</table>
				</form>
			</div>		
	</body>
</html>
