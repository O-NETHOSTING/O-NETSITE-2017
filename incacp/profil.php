<?php 
defined("access") or die("Nedozvoljen pristup");
	if($_SESSION['userid'] == "") {
		
		$_SESSION['error'] = "Nemate pristup";
		header('Location:/index.php');
	
	}
	
	else {
		
		$sql = "SELECT * FROM users WHERE userid='$_SESSION[userid]'";
		$info = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$br_tiketa = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tiketi WHERE userid='$info[userid]'"));
		$otvoreni = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tiketi WHERE status='0' AND userid='$_SESSION[userid]'"));
		$zatvoreni = mysqli_num_rows(mysqli_query($con,"SELECT * FROM tiketi WHERE status='1' AND userid='$_SESSION[userid]'"));
	
?>
	
<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $info['username']; ?> </h3>
            </div>
            <div class="panel-body">
              <div class="row">
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				
				<img alt="User Pic" src="img/avatar/<?php echo $info['avatar']; ?> " class="img-circle img-responsive">  </div>
                
			   
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Name:</td>
                        <td><?php echo $info['ime']; ?> </td>
                      </tr>
					  <tr>
                        <td>Last name:</td>
                        <td><?php echo $info['prezime']; ?> </td>
                      </tr>
                      <tr>
                        <td>Date of birth:</td>
                        <td><?php echo $info['bday']; ?></td>
                      </tr>
                 
                        <tr>
                        <td>All Tickets:</td>
                        <td><?php echo $br_tiketa; ?></td>
                      </tr>
                      <tr>
                        <td>E-mail:</td>
                        <td><a href="mailto:<?php echo $info['email']; ?>"><?php echo $info['email']; ?></a></td>
                      </tr>
					  <tr>
                        <td>Phone number:</td>
                        <td><?php echo $info['phone']; ?></a></td>
                        </tr>
                           
                     
                     
                    </tbody>
                  </table>
                 
                </div>
              </div>
            </div>
                
            
         
       
      
  
	
	

  <div class="panel-heading">
   <h3 class="panel-title">LOG</h3>
  </div>
  <table class="table" cellspacing="0">
	  <tr>
	  <th>ID</th>	  
	  <th>IP</th>
	  <th>Date</th>
	  <th>Last seen</th>
	  </tr>
<?php

/*$kveri = mysqli_query($con,"SELECT * FROM logovi WHERE userid='$_SESSION[userid]'");*/

$kveri2 = mysqli_query($con,"SELECT * FROM logovi WHERE userid='$_SESSION[userid]' ORDER BY id DESC LIMIT 10");

 while($k = mysqli_fetch_array($kveri2)){
	      
		  
		  $vreme = time_ago($k['vreme']);
		  $id = $k['id'];

	    echo " <tr>
			<td>#$id</td>
			<td>$k[ip]</td>
			<td>$k[datum]</td>
			<td>$vreme</td>

			</tr> ";
	  }
	  
      $br = mysqli_num_rows($kveri2);
	  if($br == ""){
	        die("<script> alert('Nema rezultata za ovu pretragu'); document.location.href='/profil'; </script>");
	  }
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




<script type="text/javascript">
$(document).ready(function() {
    var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="glyphicon glyphicon-chevron-down text-muted"></i>');
            }
        })
    });


    $('[data-toggle="tooltip"]').tooltip();

    $('button').click(function(e) {
        e.preventDefault();
        alert("This is a demo.\n :-)");
    });
});
</script>
