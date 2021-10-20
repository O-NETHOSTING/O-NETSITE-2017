<?php
session_start();
include_once ("connect_db.php");

?>

	<style>
  .error {
	
	background:#cd0000;
	padding:5px;
	color:#fff;
	border-bottom:0px solid #000;
	box-shadow: 0px 2px 15px #000;	
	-webkit-transition: width 8s; 
    transition: width 8s;
	top:0;

}

.succ {
	
	background:#00cd05;
	padding:5px;
	color:#fff;
	border-bottom:0px solid #000;
	box-shadow: 0px 2px 15px #000;	
	-webkit-transition: width 8s; 
    transition: width 8s;

}
		</style>
	
<html>
	
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/img/logosamo.png">
	<link href="/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
	<link href="/css/home.css" rel="stylesheet">
	<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
	<script src="/js/ie-emulation-modes-warning.js"></script>	
	<script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <title>O-Net Hosting</title>

 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/js/jquery.min.js"><\/script>')</script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/js/ie10-viewport-bug-workaround.js"></script>
    <script src="/js/tooltip-viewport.js"></script>	

	
	<script>
	
	$(function() {  
	   var window_height = $(window).height(),
	   content_height = window_height - 200;
	   $('.mygrid-wrapper-div').height(content_height);
	});

	$( window ).resize(function() {
	   var window_height = $(window).height(),
	   content_height = window_height - 200;
	   $('.mygrid-wrapper-div').height(content_height);
	});
	
	
	</script>
	
	 <script>
        paypal.Button.render({

            env: 'production', // Or 'sandbox',

            commit: true, // Show a 'Pay Now' button

            payment: function() {
                // Set up the payment here
            },

            onAuthorize: function(data, actions) {
                // Execute the payment here
           }

        }, '#paypal-button');
    </script>
	
	</head>
  
	<body class="no-subnav" >
		<header>
		<?php
     if(isset($_SESSION['ok'])){
	 $ok = $_SESSION['ok'];
	 echo "<div class='succ'><br /><p><center><font color='white'>$ok !</font></center></p></div></div>";
	 unset($_SESSION['ok']);
     } else {}
     if(isset($_SESSION['error'])){
  	 $greske = $_SESSION['error'];
	 echo "
          <div class='error'><p><center><br /><font color='white'>$greske !</font></center></p></div></div>";
	 unset($_SESSION['error']);
     } else {}
     ?>
		<nav id="main-nav" class="navbar navbar-default" role="navigation">
				<div class="container">
	

					<div class="navbar-header">
						<button type="button" class="toggle navbar-toggle" data-toggle="collapse" data-target=".navbar-top-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="/"><img id="navbar-logo" src="img/logo.png"></a>
					</div>

					
						<div class="collapse navbar-collapse navbar-top-collapse">
							<ul class="nav navbar-nav navbar-right">
                                 <li class=""><a href="/bday">>>EXTRA PRIZE<<</a></li>
								<li class=""><a href="/"><span class='nav-home'></span></a></li> 
							
                                 <li class=""><a href="#Domain" onclick="alert('Incoming!');">Domain</a></li>  
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hosting<span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-main-nav dropdown-mega">
										<li class="dropdown-third">
											<ul >
											  
												<li><a href="/cs16">Counter-Strike 1.6</a></li>
												<li><a href="/csgo">Counter-Strike GO</a></li>
												<li><a href="/gtasa">GTA SA:MP</a></li>
												<li><a href="#SOON" onclick="alert('In process');">Minecraft</a></li>
												<li class="divider"></li>
											<li><a href="/ts3">TeamSpeak3</a></li>
												<li class="divider visible-xs"></li>
											</ul>
										</li>
										<li class="dropdown-third middle">
											<ul >
												<li><a href="/web">WebHosting</a></li>
												<li><a href="#/SOON">VPS Hosting</a></li>
												<li><a href="#/SOON">Cloud Hosting</a></li>
												<li><a href="#/SOON">Dedicated Hosting</a></li>

												<li class="divider"></li>

												<li><a href="/support">Live </a></li>
												
												<li class="divider visible-xs"></li>
											</ul>
										</li>
										<li class="dropdown-third">
											<ul >
												<li></li>
												<li><a href="#/sysstat">System Status</a></li>
												<li><a href="https://speedtest.net">Speed Test</a></li>
												<li><a href="#/about">About Us</a></li>
											    <li><a href="mailto:info@your@email.com">Mail Us</a></li>
												<li class="divider"></li>
												<li><a href="/contact">Contact</a></li>
											</ul>
										</li>
									</ul>
									   
								</li>
                              <li class=""><a href="/contact">Contact</a></li>      
								<li role="presentation" class="divider-vertical"><span>|</span></li>

								         
										 <?php if($_SESSION['userid'] == "") { ?>
			<li class=""><a href="/login">Log in <span class="login-caret"></span></a></li>
									<li class="visible-xs"><a href="/singup">Sign up</a></li>
			<li class="hidden-xs"><div><a id="btn-signup-top" class="btn btn-white btn-sm navbar-btn hidden-xs" href="/singup">Sign up</a></div></li>	
		<?php } else {
				
			$user = mysqli_fetch_array(mysqli_query($con,"SELECT * FROM users WHERE userid='$_SESSION[userid]'"));
			$rank = $user['rank'];
		?>
		 <li class="dropdown">
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Client<span class="caret"></span></a>
									<ul class="dropdown-menu dropdown-main-nav dropdown-mega">
										<li class="dropdown-third">
											<ul >
											  
												<li><a href="/service">Service</a></li>
												
											  
												
											</ul>
										</li>
										<li class="dropdown-third middle">
											<ul >
											
												
												<li><a href="/support">Support</a></li>
											</ul>
										</li>
										<li class="dropdown-third">
											<ul >
												<li></li>
												
								
												<li><a href="/profil">Profile</a></li>
											 
											</ul>
										</li>
									</ul>
									   
								</li>
		                   <li class="hidden-xs"><div><a id="btn-signup-top" class="btn btn-white btn-sm navbar-btn hidden-xs" href="/logout.php">LogOUT</a></div></li>
		
		
		 <?php if($rank == "1") { ?>
		<li class=""><a href="/admin_support">Admin<span class="login-caret"></span></a>	</li>	
		<?php }};?>	 
								 
									</ul>
						</div>
					


				</div>
			
			</nav>

	
	</header>
		<main>
		

	<div class="container">

		<div class="row-content home-hero">
  
<!--div id="omot"-->


	
	

   
     
<?php
define("access", 1);
	error_reporting(0);
	
	    if($_GET['page'] == "home"){
	    include("inc/home.php");
		} else if($_GET['page'] == "buyweb"){
		include("inc/buyweb.php");
		} else if($_GET['page'] == "buyts3"){
		include("inc/buyts3.php");	
		} else if($_GET['page'] == "buygtasa"){
		include("inc/buygta.php");	
		} else if($_GET['page'] == "buycs16"){
		include("inc/buycs.php");		
		} else if($_GET['page'] == "buycsgo"){
		include("inc/buycsgo.php");
		} else if($_GET['page'] == "buyded"){
		include("inc/buyded.php");	
		} else if($_GET['page'] == "buyvps"){
		include("inc/buyvps.php");	
		} else if($_GET['page'] == "buymc"){
		include("inc/buymc.php");		
		} else if($_GET['page'] == "contact"){
		include("inc/contact.php");		
	
	
	###Narudzba!
	
		} else if($_GET['page'] == "ts3buy"){
		include("inc/ts3buy.php");		
		} else if($_GET['page'] == "webbuy"){
		include("inc/webbuy.php");
		} else if($_GET['page'] == "vpsbuy"){
		include("inc/vpsbuy.php");
		} else if($_GET['page'] == "dedbuy"){
		include("inc/dedbuy.php");
		} else if($_GET['page'] == "cs16buy"){
		include("inc/cs16buy.php");		
		} else if($_GET['page'] == "csgobuy"){
		include("inc/csgobuy.php");
			} else if($_GET['page'] == "gtasabuy"){
		include("inc/gtasabuy.php");
		
		### POTVRDE
		} else if($_GET['page'] == "bday"){
        include("bday.php");
		} else if($_GET['page'] == "extraprize"){
        include("extraprize.php");
		} else if($_GET['page'] == "login"){
        include("inc/login.php");
        }
        else if($_GET['page'] == "welcome"){
        include("incacp/welcome.php");
        } 
         else if($_GET['page'] == "profil-edit"){
         include("incacp/profil-edit.php");
        } 
        else if($_GET['page'] == "profil"){
         include("incacp/profil.php");
        }  
        else if($_GET['page'] == "tiketi"){
        include("incacp/tiketi.php");
        }   
        else if($_GET['page'] == "service"){
        include("incacp/service.php");
        }  
        else if($_GET['page'] == "support"){
        include("incacp/support.php");
        }   
        else if($_GET['page'] == "arhiva"){
        include("incacp/arhiva.php");
        }  
        else if($_GET['page'] == "otvori_tiket"){
        include("incacp/otvori_tiket.php");
        } 
        else if($_GET['page'] == "tiket"){
        include("incacp/tiket.php");
        }  
        else if($_GET['page'] == "registracija"){
        include("registracija.php");
        }     
   // ADMIN
   
        else if($_GET['page'] == "admin_tiketi"){
        include("incacp/admin_tiketi.php");
        }   
        else if($_GET['page'] == "admin_support"){
        include("incacp/admin_support.php");
        }     
 
        else if($_GET['page'] == "admin_tiket"){
        include("incacp/admin_tiket.php");
        } 
        else if($_GET['page'] == "admin_arhiva"){
        include("incacp/admin_arhiva.php");
   
		 
	// DODACI
	
		} else if($_GET['page'] == "cancel"){
		include("inc/cancel.php");
		} else if($_GET['page'] == "success"){
		include("inc/success.php");
		} else if($_GET['page'] == "login"){
		include("inc/login.php");
		} else if($_GET['page'] == "singup"){
		include("inc/singup.php");
		} else if($_GET['page'] == "logout"){
		include("inc/logout.php");
		} else if($_GET['page'] == "wrong"){
		include("inc/wrong.php");
		} else if($_GET['page'] == "wowaddons"){
		include("inc/wowaddons.php");
		
	} else {
	?>

	 
	<?php 
	 include("inc/buyweb.php");
	} ?>
	
	 </main>
	
	
	
	
	
	
		<footer>
			
				<section id="pre-footer">
					<div class="container">
						<div class="row">
							<div class="col-sm-7">
								<span>Get started in the O-NET .</span>
							</div>
							<div class="col-sm-5 pad-xs">
								<a id="btn-signup-bottom" class="btn btn-lg btn-full btn-white" href="/contact">Contact US</a>
							</div>
						</div>
					</div>
				</section>

				<section class="dark">
					<div class="container">

						<div class="row">
							<div class="footer-col">
								<h5><a href="">Cloud</a></h5>
								<ul>
									<li><a href="/web">WebHosting</a></li>
									<li><a href="/vps">VPS</a></li>
									<li><a href="/ded">DED</a></li>
									</ul>
							</div>

							<div class="footer-col">
								<h5><a href="">Game</a></h5>
								<ul>
									<li><a href="/cs16">Counter-Strike 1.6</a></li>
									<li><a href="/csgo">Counter-Strike GO</a></li>
									<li><a href="/gtasa">GTA SA:MP</a></li>
								</ul>
							</div>


							<div class="footer-col">
								<h5><a href="">Voice</a></h5>
								<ul>
									<li><a href="/ts3">TeamSpeak3 </a></li>
									<li><a href="/ts3">TeamSpeak2 </a></li>
									<li><a href="#referrals" onclick="alert('Referral System for FREE Servers | Starting  24/12/2017');">Referral System</a></li>
									
								</ul>
							</div>

							<div class="footer-col">
								<h5><a href="">Info</a></h5>
								<ul>
								     <li><a href="/contact">Contact</a></li>
									 <li><a href="#Live">Live Support</a></li>
									<li><a href="mailto:info@your@email.com">Mail us</a></li>
									
								</ul>
							</div>

						</div>

					</div>
				</section>
			

			<section class="dark-moar">
				<div class="container">
					<div id="footer-copyright" class="row">
						<div class="col text-center">  </div>
						
						<div class="col text-center">  </div>
						
						
							<div class="col text-right">
								Copyright &copy;  2012 - <?php echo date("Y"); ?> 
							</div>

						 <div class="col text-center">  </div>
                         <div class="col text-center"></div>
					
						
					</div>
				</div>
			</section>
		</footer>
	
	
	
	
	
	
	
				

	
	</body>

	
	
	
</html>