<?php 
defined("access") or die("You have no access here. Sorry.");
	if($_SESSION['userid'] == "") {
		
		$_SESSION['error'] = "You have no access here.";
		header('Location:/index.php');
	
	}
	
	
	
	else {
		$id = $_GET['id'];
		$sql = "SELECT * FROM tiketi WHERE id='$id'";
		$info = mysqli_fetch_array(mysqli_query($con,$sql));

	if($info == "") {
		
		$_SESSION['error'] = "Ticket does not exist";
		header('Location:/index.php');
	
	}
	
	if(!$info) {
		
		$_SESSION['error'] = "Ticket does not exist.";
		header('Location:/index.php');
	
	}
		

		
		$tip = $info['status'];
		  
		  if($tip == "0") {
			  
			  $tip = "Open";
			  
		  } else {
			  
			  $tip = "Close";
			  
		  }	

		$status = $info['odgovor'];
		  
		  if($status == "0") {
			  
			  $status = "Pending...";
			  
		  } else {
			  
			  $status = "Solved";
			  
		  }			  
		
?>
		<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Stats</h3>
            </div>
              <div class="panel-body">
              <div class="row">
			 
	 <input type="text"  class="form-control" disabled value="All Tickets: <?php echo $br_tiketa; ?>" />
	 <input type="text"  class="form-control" disabled value="Pending Tickets: <?php echo $br_otvorenih_tiketa; ?>" />
	 <input type="text"  class="form-control" disabled value="All Tickets: <?php echo $br_zatvorenih_tiketa; ?>" />
	</div>
	</div>
	<a href="/arhiva" class="btn btn-primary">Tickets</a>
	<a href="/otvori_tiket" class="btn btn-primary">New Ticket</a>
                  <a href="/support" class="btn btn-primary">Pending Tickets</a>

	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">My Ticket</h3>
            </div> 
	
	<?php echo nl2br($info['sadrzaj']); ?>

	
</div>
	
	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">RE:</h3>
            </div> 
	
	
	<?php 
		
		$sql = "SELECT * FROM tiketi_odgovori WHERE tiketid='$id'";
		$kveri = mysqli_query($con,$sql);

		$br_odg = mysqli_num_rows(mysqli_query($con,"SELECT id FROM tiketi_odgovori WHERE tiketid='$id'"));
		
	if($br_odg < 1) {
		
		echo "Pending...";
	  }

		
		while($red = mysqli_fetch_array($kveri)) {
	
		$redni++;
		
	?>
		
		<div id="odgovor"><font style ="font-size:15px;font-weight:bold; border:1px solid #d0d0d0; background:#eee; padding:5px; color:#1f1f1f;">#<?php echo $redni; ?> | <?php echo $red['username']; ?></font> <br /><br /><?php echo nl2br($red['odgovor']); ?> </div> <br /> 
		
		
	<?php }; ?>
	
	<?php if($info['status'] == "1") { ?>
	<p>Locked!</p>
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
					
					$ubaci2 = mysqli_query($con,"UPDATE tiketi SET odgovor='0' WHERE id='$id'");

					
					header("Location:/tiket/$id");
					
				}
			}
		
		?>
		
		
		<div class="panel panel-info form-group">
            <div class="panel-heading">
              <h3 class="panel-title">Ostavi odgovor</h3>
            </div> 
		
		<form action="" method="POST">
		
		<textarea type="text" name="odgovor" required="required" class="form-group" style="width:600px; height:150px;" placeholder="Odgovori..."></textarea>
		
		<br /> <br />
		
		<input type="submit" name="odgovori" value="ODGOVORI" class="btn btn-primary" />
		
		</form>
		
	<?php };?>
	
	
	
<?php };?>
