<?php
session_start();
include_once ("connect_db.php");
include_once ("common.php");
date_default_timezone_set('Europe/Belgrade');




$time = date("d.m.Y - h:m:i");
if (isset($_GET['task']) && $_GET['task'] == "registracija") {
	

	
	
	$username = htmlspecialchars(mysqli_real_escape_string($con,$_POST['username']));
	$password = htmlspecialchars(mysqli_real_escape_string($con,$_POST['password']));
	$email = htmlspecialchars(mysqli_real_escape_string($con,$_POST['email']));
	$ime = htmlspecialchars(mysqli_real_escape_string($con,$_POST['ime']));
	$prezime = htmlspecialchars(mysqli_real_escape_string($con,$_POST['prezime']));	
	
	$datum = date('d.m.Y');
	
	$time1 = time();
	$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	
        if(strlen($username) > 20 || strlen($username) < 4){
        $_SESSION['error'] = "Username is too short! You need to have at least 4  letters or numbers";
		header("location:/singup");
        die();
        }
		
		if($ime == ""){
		  $_SESSION['error'] = "All fields must be filled out";
		  header("location:/singup");
		  die();
		}
 
	$kveri = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
	if (mysqli_num_rows($kveri)>0) {
	    $_SESSION['error'] = "Username is already taken";
		header("Location:/singup");
		die();
	}
	$kveri = mysqli_query($con,"SELECT * FROM users WHERE email='$email'");
	if (mysqli_num_rows($kveri)>0) {
		$_SESSION['error'] = "E-mail is already used";
		header("Location:/singup");
		die();
	}
	if ($password){
		$cpass = md5($password);
		$sql = "INSERT INTO users (username,ime,prezime,datum,password,email,register_time,user_ip) VALUES ('$username','$ime','$prezime','$datum','$cpass','$email','$time1','$user_ip')";
		//echo $sql;
		mysqli_query($con,$sql);
		$_SESSION['ok'] = "You have successfully registred, now you can log in. Enjoy!";
		header("Location:/login");
	} else {
		$_SESSION['error'] = "Password incorrect!";
		header("Location:/singup");
		die();
	}
} else if (isset($_GET['task']) && $_GET['task'] == "login") {
	$username = addslashes($_POST['username']);
	$password = addslashes($_POST['password']);
	$cpass = md5($password);
	$kveri = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$cpass'");


	if (mysqli_num_rows($kveri)) {
		$user = mysqli_fetch_array($kveri);
		$_SESSION['userid'] = $user['userid'];
		$_SESSION['username'] = $user['username'];
		$mesec = 24*60*60*31; // mesec dana
		$user_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		
		
		$time = time();
		
		$sesija = md5($user['username'] . $cpass);


		
		
		
		
		setcookie("userid", $_SESSION['userid'], time()+ $mesec);
		setcookie("username", $_SESSION['username'], time()+ $mesec);
		setcookie("sesija", $sesija, time() + $mesec);
		mysqli_query("UPDATE users SET user_ip='$user_ip' WHERE userid='$_SESSION[userid]'");
			
			$session=session_id();
			$time=time();
			$time_check=$time-60; //SET TIME 10 Minute
			$sql="SELECT * FROM user_online WHERE session='$session'";
			$result=mysqli_query($con,$sql);

			$count=mysqli_num_rows($result);
			if($count== "0"){

			$sql1="INSERT INTO user_online(session,time)VALUES('$session', '$time')";
			$result1=mysqli_query($con,$sql1);
			}

			else {
			"$sql2=UPDATE user_online SET time='$time' WHERE session = '$session'";
			$result2=mysqli_query($con,$sql2);
			}
		
        $_SESSION['ok'] = "You have successfully logged in";
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		$datum = date('d.m.Y');
		$vreme = time();
		$log = "INSERT into logovi(`ip`,`datum`,`vreme`,`userid`) VALUES('$ip','$datum','$vreme','$_SESSION[userid]')";
		mysqli_query($con,$log);
		header("Location:/welcome");
		
		
		

		
		
		
		} else {
	    $_SESSION['error'] = "Loggin error";
		header("location:index.php");
		die();

	}
	$datum = date('d.m.Y');
	$provera = mysqli_num_rows(mysqli_query($con,"SELECT userid FROM posetioci WHERE userid='$_SESSION[userid]' AND datum='$datum'"));
	if($provera < 1) {
		
		mysqli_query($con,"INSERT into posetioci(userid,datum) VALUES('$_SESSION[userid]','$datum')"); 
		
	}
	
	mysqli_query($con,"UPDATE `users` SET `poslednja_aktivnost` = '' WHERE `userid` = '$_SESSION[userid]'"); 
		
	
		
	
} 


 else if (isset($_GET['task']) && $_GET['task'] == "otvori_tiket") {
	 
	if($_SESSION['userid'] == "") {
		
		$_SESSION['error'] = "You have no access here. Sorry";
		header('Location:/index.php');
		
	} else {
		

	
	if(isset($_POST['otvori'])) {



	



	
	$naslov = htmlspecialchars(mysqli_real_escape_string($con,$_POST['naslov']));		
	$sadrzaj = htmlspecialchars(mysqli_real_escape_string($con,$_POST['sadrzaj']));	

	$datum = date('d.m.Y');
	$vreme = time();
	$userid = $_SESSION['userid'];		
		
		$sql = "INSERT into tiketi(`naslov`,`sadrzaj`,`datum`,`vreme`,`userid`,`status`,`odgovor`) VALUES('$naslov','$sadrzaj','$datum','$vreme','$userid','0','$_SESSION[username]')";
		$kveri = mysqli_query($con,$sql);
		
		if(!$kveri) {
			
			$_SESSION['error'] = "Error";
			header('Location:/otvori_tiket');
			
		} else {
			
			$_SESSION['ok'] = "You have successfully opened support ticket";
			header('Location:/support');
			
		}
		
	}
	
		
	}
	 
	 
 }

  

?>

