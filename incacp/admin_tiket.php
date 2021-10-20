<?php 
defined("access") or die("Nedozvoljen pristup");
	if($_SESSION['userid'] == "") {
		
		$_SESSION['error'] = "Nemate pristup";
		header('Location:/index.php');
	
	}
	
	else {
		
	$user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users WHERE userid='$_SESSION[userid]'"));
	$rank = $user['rank'];
	
	if($rank == "1") {		
		
		$id = $_GET['id'];
		$sql = "SELECT * FROM tiketi WHERE id='$id'";
		$info = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$tip = $info['status'];
		  
		  if($tip == "0") {
			  
			  $tip = "Otvoren";
			  
		  } else {
			  
			  $tip = "Zatvoren";
			  
		  }	

		$status = $info['odgovor'];
		  
		  if($status == "0") {
			  
			  $status = "Ceka se odgovor";
			  
		  } else {
			  
			  $status = "Odgovoreno";
			  
		  }		

		
	$kor = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users WHERE userid='$info[userid]'"));
		
?>
	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Informacije o Ticketu</h3>
            </div>
              <div class="panel-body">
              <div class="row">
			 
	 <input type="text"  class="form-control" disabled value="Naslov: <?php echo $info['naslov']; ?>" />
	 <input type="text"  class="form-control" disabled value="Datum: <?php echo $info['datum']; ?>" />
	 <input type="text"  class="form-control" disabled value="Otvoren pre: <?php echo time_ago($info['vreme']); ?>" />
	 <input type="text"  class="form-control" disabled value="Tip: <?php echo $tip; ?>" />
	 <input type="text"  class="form-control" disabled value="Status: <?php echo $status; ?>" />
	 <input type="text"  class="form-control" disabled value="Otvorio: <?php echo $username; ?>" />
	</div>
	</div>
	

	
	<?php 
		
		if(isset($_POST['zatvori'])) {
			
			$update = mysqli_query($con,"UPDATE tiketi SET status = '1' WHERE id='$id'");
			
			if(!$update) {
				
				$_SESSION['error'] = "Greska";
				header("Location:/admin_tiket/$id");
				
			} else {
				
				$_SESSION['ok'] = "Uspesno";
				header("Location:/admin_tiket/$id");
				
			}	
		}
		
		
		if(isset($_POST['otvori'])) {
			
			$update = mysqli_query($con,"UPDATE tiketi SET status = '0' WHERE id='$id'");
			
			if(!$update) {
				
				$_SESSION['error'] = "Greska";
				header("Location:/admin_tiket/$id");
				
			} else {
				
				$_SESSION['ok'] = "Uspesno";
				header("Location:/admin_tiket/$id");
				
			}	
		}		
		
	
	?>
	
	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Sadrzaj</h3>
            </div>  </div> 
	<?php if($info['status'] == "0") { ?>
	<form action="" method="POST"> <input type="submit" class="btn btn-primary" name="zatvori" value="ZATVORI TIKET"/></form>
	<?php } else 
	if($info['status'] == "1") {	
	?>
	<form action="" method="POST"> <input type="submit" class="btn btn-primary" name="otvori" value="OTVORI TIKET"/></form>
	<?php };?>
	</h2>
	
	<?php echo nl2br($info['sadrzaj']); ?>

	
	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Odgovori</h3>
            </div>  </div> 
	
	<?php 
		
		$sql = "SELECT * FROM tiketi_odgovori WHERE tiketid='$id'";
		$kveri = mysqli_query($con,$sql);

		$br_odg = mysqli_num_rows(mysqli_query($con,"SELECT id FROM tiketi_odgovori WHERE tiketid='$id'"));
		
	if($br_odg < 1) {
		
		echo "Nema odgovora za ovaj tiket!";
	  }

		
		while($red = mysqli_fetch_array($kveri)) {
	
		$redni++;
		
	?>
		
		<div id="odgovor"><font style ="font-size:15px;font-weight:bold; border:1px solid #d0d0d0; background:#eee; padding:5px; color:#1f1f1f;">#<?php echo $redni; ?> | <?php echo $red['username']; ?></font> <br /><br /><?php echo nl2br($red['odgovor']); ?> </div> <br /> 
		
		
	<?php }; ?>
	
	<?php if($info['status'] == "1") { ?>
	<p>Tiket je zatvoren, ne mozete odgovoriti na ovaj tiket!</p>
	<?php } else {?>
		
		<?php 
			
			
			if(isset($_POST['odgovori'])) {
				
			
	$sadrzaj = htmlspecialchars(mysqli_real_escape_string($con,$_POST['odgovor']));			

				$ubaci = mysqli_query($con,"INSERT into tiketi_odgovori(`odgovor`,`username`,`tiketid`) VALUES('$sadrzaj','$_SESSION[username]','$id')");
				
				if(!$ubaci) {
					
					$_SESSION['error'] = "Greska";
					header('Location:/index.php');
					
				}else {
					
					$_SESSION['ok'] = "Uspesno";
					
					$ubaci2 = mysqli_query($con,"UPDATE tiketi SET odgovor='1' WHERE id='$id'");

					
					header("Location:/admin_tiket/$id");
					
				}
			}
		
		?>
		
		
		<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Ostavi odgovor</h3>
            </div>  </div> 
		
		<form action="" method="POST">
		
		<textarea type="text" name="odgovor" required="required" class="djoxi_input" style="width:600px; height:150px;" placeholder="Odgovori..."></textarea>
		
		<br /> <br />
		
		<input type="submit" name="odgovori" value="ODGOVORI" class="reg_btn" />
		
		</form>
		
	<?php };?>
	
	
	
	<?php } else 	{	
		
	$_SESSION['error'] = "Nemate pristup!";
	header("Location:/index.php");
	}
	
	}; ?>
