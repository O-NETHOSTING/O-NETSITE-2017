 <?php
  defined("access") or die("$lang[nemate_pristup]");
  
  if($_SESSION['userid'] == ""){
  ?>
  
	<br /> <br /> <br /><br />
  
    <h2>Login error!</h2> <br />
	
	
	
  <?php } else { 
  ?>
 	<br /> <br /> <br /><br /> 
    <h3>Welcome</h3> <br />
	
	Hello, <strong><?php echo $_SESSION['username']; ?> </strong> enjoy your stay! 
	
	  <?php header("Refresh: 5; /profil"); }; ?>
	
