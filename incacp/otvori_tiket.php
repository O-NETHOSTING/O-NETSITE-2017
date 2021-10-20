 <?php
  defined("access") or die("$lang[nemate_pristup]");
  
  if($_SESSION['userid'] == ""){
  ?>
  
	<br /> <br /> <br /><br />
  
    <h3>Greska!</h3> <br />
	
	Morate se ulogovati!
	
  <?php } else { 
  
		$sql = "SELECT * FROM users WHERE userid='$_SESSION[userid]'";
		$info = mysqli_fetch_array(mysqli_query($con,$sql));  
  
  
		$br_tiketa = mysqli_num_rows(mysqli_query($con,"SELECT id FROM tiketi WHERE userid='$_SESSION[userid]'"));
		$br_otvorenih_tiketa = mysqli_num_rows(mysqli_query($con,"SELECT id FROM tiketi WHERE userid='$_SESSION[userid]' AND status='0'"));		
		$br_zatvorenih_tiketa = mysqli_num_rows(mysqli_query($con,"SELECT id FROM tiketi WHERE userid='$_SESSION[userid]' AND status='1'"));		
		  
  
  ?>
	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Stats</h3>
            </div>
            <div class="panel-body">
              <div class="row">
			 
	 <input type="text"  class="form-control" disabled value="Tickets: <?php echo $br_tiketa; ?>" />
	 <input type="text"  class="form-control" disabled value="Pending Tickets: <?php echo $br_otvorenih_tiketa; ?>" />
	 <input type="text"  class="form-control" disabled value="All Tickets: <?php echo $br_zatvorenih_tiketa; ?>" />
	</div>
	</div>
	
	
	
	<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">New Ticket</h3>
            </div> 
              
                  <a href="/support" class="btn btn-primary">Pending Tickets</a>
                  <a href="/arhiva" class="btn btn-primary">All Tickets</a>
	<form action="/process.php?task=otvori_tiket" method="POST">
	
	<input type="text" name="ime" required="required" class="form-control" placeholder="Name & Lastname" value="<?php echo $info['ime']; ?> <?php echo $info['prezime']; ?>" /> 

	<input type="text" name="naslov" required="required" class="form-control" placeholder="Ticket for?..."></input> 
	
	<textarea type="text" name="sadrzaj" required="required" class="form-control" placeholder="Message for?..." style="width:600px; height:150px;"></textarea> 
	
	<input type="submit" name="otvori" class="btn btn-primary" value="Open Ticket" /> 
	</form>
	

	
<br />
	
	
	
  <?php  }; ?>