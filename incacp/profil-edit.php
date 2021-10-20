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
              <h3 class="panel-title">Edit Profile</h3>
            </div>
            <div class="panel-body">
              <div class="row">
			  
			  
			  
			  
                <div class="col-md-3 col-lg-3 " align="center"> 
				
				
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
    
     
    
				
				<img alt="User Pic" src="img/avatar/<?php echo $info['avatar']; ?> " class="img-circle img-responsive">  </div>
                
			   
                <div class=" col-md-9 col-lg-9 "> 
				
               <form action="sacuvaj.php?task=sacuvaj" method="post" enctype="multipart/form-data">               
				 <table class="table table-user-information">
                    <tbody>
					 <tr>
                        <td>Name:</td>
                        <td><input type="text" name="ime" class="form-control" placeholder="<?php echo $info['ime']; ?>" value="<?php echo $user_data['ime']; ?>"></input> </td>
                      </tr>
                      <tr>
                        <td>Last name:</td>
                        <td><input type="text" name="prezime" class="form-control" placeholder="<?php echo $info['prezime']; ?>" value="<?php echo $user_data['prezime']; ?>"></input> </td>
                      </tr>
                      <tr>
                        <td>Date of birth:</td>
                        <td><input type="text" name="bday" class="form-control" placeholder="<?php echo $info['bday']; ?>" value="<?php echo $user_data['bday']; ?>"></input> </td>
                      </tr>
                      <tr>
                        <td>Avatar:</td>
                        <td><input type="text" name="avatar" class="form-control" placeholder="image link" value="<?php echo $user_data['avatar']; ?>"></td>
                      </tr>
                  <tr>
                        <td>Phone number:</td>
                        <td><input type="text" name="phone"  class="form-control" placeholder="<?php echo $info['phone']; ?>" value="<?php echo $user_data['phone']; ?>">
                        </td>
                            </tr>
                             <tr>
                        <td>E-mail:</td>
                        <td><input type="text" name="bday" class="form-control" placeholder="<?php echo $info['email']; ?>" disabled ></td>
                      </tr>
                        <tr>
                        <td>Username:</td>
                        <td><input type="text" name="bday" class="form-control" placeholder="<?php echo $info['username']; ?>" disabled ></td>
                      </tr>
                      
                     
                     
                    </tbody>
					
                  </table>
                 	<input type="submit" name="podesavanje" class="btn btn-lg btn-primary btn-block btn-signin" value="Save"></input>
				 </form>
				 
                </div>
              </div>
            </div>
                
            
         
       
      
  
	
	

  

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
