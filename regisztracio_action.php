
<?php

	include('connection.php');
	
	if(isset($_POST['regisztracio'])){
		
		session_start();
		
		$felhasznalo = $_POST['felh_nev'];
		$jelszo1 = $_POST['jelszo_egy'];
		$jelszo2 = $_POST['jelszo_ketto'];
		
		$v_nev = $_POST['vezeteknev'];
		$k_nev = $_POST['keresztnev'];
		$szig = $_POST['szig'];
		$anyja_v = $_POST['anyjavezetek'];
		$anyja_k = $_POST['anyjakereszt'];
		$email = $_POST['emailcim'];
		$telszam = $_POST['tel'];
		
		$ir = $_POST['iranyitoszam'];
		$varos = $_POST['varos'];
		$utca = $_POST['utca'];
		$hazszam = $_POST['hazszam'];
		
		$szulhely = $_POST['szuletesi_hely'];
		$szulido = $_POST['szuletesi_ido'];
		
		//felhasználónév ellenőrzése
		
		$query_user = mysqli_query($conn, "SELECT felhasznalo_nev FROM Felhasznalo WHERE felhasznalo_nev = '$felhasznalo'");
		$count_user = mysqli_num_rows($query_user);
		
		if($count_user > 0){
			header("refresh:15; url = regisztracio.php");
			die("A megadott felhasználónév már használatban van, válasszon másikat!</br>");
		}
		
		
		//szig.szám ellenőrzése
		
		$query_idnumber = mysqli_query($conn, "SELECT * FROM Felhasznalo WHERE szemelyig_szam = '$szig'");
		$count_idnumber = mysqli_num_rows($query_idnumber);
		
		if($count_idnumber > 0){
			die("A megadott személyi igazolvány szám már használatban van!</br>");
			header("refresh:15; url = regisztracio.php");
		}
		
		
		$query_email = mysqli_query($conn, "SELECT * FROM Felhasznalo WHERE email = '$email'");
		$count_email = mysqli_num_rows($query_email);
			
		if($count_email > 0){
			die("Az email-cím használatban van!</br>");
			header("refresh:15; url = regisztracio.php");
		}
		
		
		if($jelszo1 != $jelszo2){
			die("A megadott két jelszó nem egyezik meg!</br>");
			header("refresh:15; url = regisztracio.php");
		}
		

		if($jelszo1 == $jelszo2){
			
			
			//regisztracio ha megegyeznek a megadott jelszavak
			
			$sql = "INSERT INTO felhasznalo
					(felhasznalo_nev, jelszo, vezetek_nev, kereszt_nev,
					szemelyig_szam, anyja_vnev, anyja_knev, email, telszam, ir_szam,
					varos, utca, hazszam, szuletesi_hely, szuletesi_ido) 
					VALUES('$felhasznalo','$jelszo1','$v_nev'
					,'$k_nev','$szig','$anyja_v','$anyja_k','$email','$telszam','$ir',
					'$varos','$utca','$hazszam','$szulhely','$szulido');";
			
			mysqli_query($conn, $sql);
			echo 'Sikeres regisztráció, néhány másodperc múlva visszatérhet a kezdőoldalra, '. $felhasznalo .'!';
			//header("refresh:6; url = index.php");
			}
		else{
			echo "Hiba történt";
			
		}
	}
	
	echo '</br></br></br></br></br></br></br></br></br>';
	