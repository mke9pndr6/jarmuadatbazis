

<!--
	version: 0.0.1
	date: 2017.08.01
	author: Hegedűs Viktor
-->


<?php 
	include('connection.php');
	include('controller.php');
	
?>

<?php
	include('index_login_action.php');
	//include('style.php');
?>

<html>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta HTTP-EQUIV="Content-Language" Content="hu">
		<link rel = "stylesheet" href = "style.css"/>
		<link href='https://fonts.googleapis.com/css?family=Electrolize' rel='stylesheet'>
	<head>
		<title>
			Bejelentkezés
		</title>
		
	</head>
	
		<body id = "bgStyle">
			
			</br>
			</br>
			</br>
			</br>
			</br>
			
			<div align = "center">
				<form method = "POST" action = "" enctype = "multipart/form-data" >
					<table align = "center" width = "38.2%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0"
					style = "border-radius: 22 22 0 0; background: linear-gradient(#0E0F15, #0B3861);">
						<tr>
							<td height = "33px" id = "styleofwords2a" style = "background: linear-gradient(#0E0F15, #0B3861);">
							<font id = "styleofwords2a" style = "background: linear-gradient(#0E0F15, #0B3861);">Jelentkezzen be a kölcsönzéshez!</font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2" ><font id = "styleofwords2"></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2">Felhasználónév</font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords9"><input type = "text" style="height:26px; width: 100%;" name = "login_felh" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2">Jelszó</font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords9"><input type = "password" style="height:26px; width: 100%;" name = "login_jelszo" size = "45" required /></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "regisztracio.php" id = "styleofword2"
							style = "text-decoration: none; text-color: white;"><font size = "4" color = "#ffffff">Még nem regisztrált?</a></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"><a href = "regisztracio.php" id = "styleofword2"
							style = "text-decoration: none; text-color: white;"><font size = "4" color = "#ffffff">Elfelejtette jelszavát?</a></font></td>
						</tr>
						<tr>
							<td height = "33px" id = "styleofwords2"><font id = "styleofwords2"></font></td>
						</tr>
						
						
						</table>
						<table align = "center" width = "38.25%" id = "styleofwords" border = "0px" cellpadding = "0" cellspacing = "0">
							<tr>
								<td width = "100%"><?php echo $error; ?></td>
							</tr>
							<tr>
								<td width = "100%"><input type = "submit" class = "input" value = "Bejelentkezés" name = "bejelentkezes" /></td>
							</tr>
						</table>
					</table>
				</form>
			</div>		
	</body>
</html>