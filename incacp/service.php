<?php 
defined("access") or die("You have no access here. Sorry");
	if($_SESSION['userid'] == "") {
		
		$_SESSION['error'] = "You have no access here";
		header('Location:/index.php');
	
	}
	
	else {
		
		$sql = "SELECT * FROM service WHERE userid='$_SESSION[userid]'";
		$info = mysqli_fetch_array(mysqli_query($con,$sql));
		
		$aktivni = mysqli_num_rows(mysqli_query($con,"SELECT id FROM service WHERE userid='$_SESSION[userid]'"));
		$br_aktivnih = mysqli_num_rows(mysqli_query($con,"SELECT id FROM service WHERE userid='$_SESSION[userid]' AND status='0'"));		
		$br_zatvorenih = mysqli_num_rows(mysqli_query($con,"SELECT id FROM service WHERE userid='$_SESSION[userid]' AND status='1'"));		
				
?>
<div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Service</h3>
            </div>
            <div class="panel-body">
              <div class="row">

			  
			  
			  
             
				
				
	<script type="text/javascript">			
    $('#fileUpload').on('change',function(){
  $('.avatar').removeClass('open');
});
$('.avatar').on('click',function(){
  $(this).addClass('open');
});
// added code to close the modal if you click outside
$('html').click(function() {
 $('.avatar').removeClass('open');
});

$('.avatar').click(function(event){
    event.stopPropagation();
});

</script>
    
     
    
		
         
       
      
  
	


  <table class="table" cellspacing="0">
	  <tr>
	  <th>#</th>
	  <th>Service</th>	  
	  <th>IP</th>
	  <th>Pay</th>
	  <th>Exp</th>
	  <th>Status</th>
	  </tr>
 

			  <?php
			  
    $kveri2 = mysqli_query($con,"SELECT * FROM service WHERE userid='$_SESSION[userid]'");

 while($k = mysqli_fetch_array($kveri2)){
	      
		  
		  $vreme = time_ago($k['vreme']);
		  $id = $k['id'];

	    echo " <tr>
			<td>$id</td>
			<td>$k[sname]</td>
			<td>$k[sip]</td>
			<td>$k[spay]</td>
			<td>$k[sexp]</td>
			<td>$k[status]</td>

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
