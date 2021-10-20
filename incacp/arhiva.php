<?php 
defined("access") or die("Nedozvoljen pristup");
	if($_SESSION['userid'] == "") {
		
		$_SESSION['error'] = "Nemate pristup";
		header('Location:/index.php');
	
	}
	
	else {
		
		$sql = "SELECT * FROM tiketi WHERE userid='$_SESSION[userid]'";
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
              <h3 class="panel-title">All Tickets</h3>
            </div> 
              
                  <a href="/otvori_tiket" class="btn btn-primary">New Ticket</a>
                  <a href="/support" class="btn btn-primary">Pending Tickets</a>

   <table class="table" cellspacing="0">
	  <tr>
	  <th>ID</th>	  
	  <th>Subject</th>
	  <th>Date</th>
	  <th>Time</th>
	  <th>Tip</th>
	  <th>Status</th>
	  
	  </tr>
<?php

    $kveri = mysqli_query($con,"SELECT * FROM tiketi WHERE userid='$_SESSION[userid]'");
	$broj_artikala = mysqli_num_rows($kveri);
	if(isset($_GET['stranica'])){
		$page = preg_replace('#[^0-9]#i', '', $_GET['stranica']);
	} else {
		$page = 1;
	}
	//Podataka po stranici * kps *
	$kps = 5; //Broj podataka po stranici
	$zadnja = ceil($broj_artikala/$kps);

	if ($page < 1){
		$page = 1;	
	} elseif ($page > $zadnja){
		$page = $zadnja;	
	}

	$centar = "";
	$sub1 = $page - 1;
	$sub2 = $page - 2;
	$add1 = $page + 1;
	$add2 = $page + 2;
	

	

	

	
    if ($page == 1) {
	    $centar .= '<div class="pagination"><ul>';
		$centar .= '<li class="active"><a href="/arhiva/&stranica=' . $page . '">' . $page . '</a></li>';
		$centar .= '<li><a href="/arhiva/&stranica=' . $add1 . '">' . $add1 . '</a></li> ';
	} else if ($page == $zadnja) {
		$centar .= '<a href="/arhiva/&stranica=' . $sub1 . '">' . $sub1 . '</a> ';
		$centar .= '<li><span style="color:#999999;">' . $page . '</span></li>';
	} else if ($page > 2 && $page < ($zadnja - 1)) {
		$centar .= '<a href="/arhiva/&stranica=' . $sub2 . '">' . $sub2 . '</a> ';
		$centar .= '<a href="/arhiva/&stranica=' . $sub1 . '">' . $sub1 . '</a> ';
		$centar .= '<span style="color:#999999;">' . $page . '</span>';
		$centar .= '<a href="/arhiva/&stranica=' . $add1 . '">' . $add1 . '</a> ';
		$centar .= '<a href="/arhiva/&stranica=' . $add2 . '">' . $add2 . '</a> ';
	} else if ($page > 1 && $page < $zadnja) {
		$centar .= '<a href="/arhiva/&stranica=' . $sub1 . '">' . $sub1 . '</a> ';
		$centar .= '<span style="color:#999999;">' . $page . '</span>';
		$centar .= '<a href="/arhiva/&stranica=' . $add1 . '">' . $add1 . '</a> ';
	}	
	
	

	
	$prvi = (($page-1)*$kps);
	$drugi = $kps;


$kveri2 = mysqli_query($con,"SELECT * FROM tiketi WHERE userid='$_SESSION[userid]'  ORDER BY id DESC LIMIT $prvi,$drugi");

	
	$prikazi = "";





		

	if($br_tiketa < 1) {
		
		echo " <tr>
			<td>You don't have any support tickets at this time</td>
		
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			</tr> ";
	  }
	
	
	  while($k = mysqli_fetch_array($kveri2)){
	      
		  
		  
		  $vreme = time_ago($k['vreme']);
		  $id = $k['id'];
		  $tip = $k['status'];
		  
		  if($tip == "0") {
			  
			  $tip = "Open";
			  
		  } else {
			  
			  $tip = 'Close';
			  
		  }
			
		  $status = $k['odgovor'];
		  
		  if($status == "0") {
			  
			  $status = "Pending...";
			  
		  } else {
			  
			  $status = "Solved";
			  
		  }		  
		  
	    echo " <tr>
			<td>#$id</td>
			<td><a href='/tiket/$id'>$k[naslov]</a></td>
			<td>$k[datum]</td>
			<td>$vreme</td>
			<td>$tip</td>
			<td>$status</td>
			</tr> ";
	  }
	  
      $br = mysqli_num_rows($kveri2);
	
?>
</table>

<center>
<?php
if(isset($prikazi) && !empty($prikazi)) {
?>
<div class="pagination"><?php echo $prikazi; ?></div>
<?php
}
?>
</center>
</div>
</div>
</div>
<br />
	
	
	
	
<?php };?>
