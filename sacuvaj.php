<?php
		if(isset($_GET['task']) && $_GET['task'] == "sacuvaj") {
		
		if(isset($_POST['podesavanje'])) {
			$ime = htmlspecialchars(mysql_real_escape_string(addslashes($_POST['ime'])));
			$prezime = htmlspecialchars(mysql_real_escape_string(addslashes($_POST['prezime'])));
			$email = htmlspecialchars(mysql_real_escape_string(addslashes($_POST['email'])));
			$phone = htmlspecialchars(mysql_real_escape_string(addslashes($_POST['phone'])));
			$bday = htmlspecialchars(mysql_real_escape_string(addslashes($_POST['bday'])));
			$avatar = htmlspecialchars(mysql_real_escape_string(addslashes($_POST['avatar'])));
			$sacuvaj = "UPDATE `users` SET `ime`='$ime', `prezime`='$prezime', `phone`='$phone', `avatar`='$avatar', `email`='$email',`bday`='$bday' WHERE userid='$_SESSION[userid]' ";
			$kveri = mysql_query($sacuvaj);
		}
		
		if(!$sacuvaj) 
		
		die("<script> alert('Dogodila se greska!'); document.location.href='/profil-edit'; </script>");
		
		else 
		
		die("<script> alert('Uspesno ste sacuvali izmene!'); document.location.href='/profil-edit'; </script>");
		
	}
?>