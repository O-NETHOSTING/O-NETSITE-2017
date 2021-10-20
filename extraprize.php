<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="http://static1.squarespace.com/static/53d3eaa0e4b04e06965fa8d3/53d3ecade4b0d2c0c0ed2c48/55ae59bfe4b051d73ba62bb8/1437490384892/?format=1000w" >
          </div>
         
		  </div>
      
       
      </div>
	  
	  <section  class="primary extra-space bottom">
	<div class="container">
		
		<div class="row pricing-view">
			<div class="col-sm-12 reduce-gutter">
				
					<p class="lead text-center">The best prices for the best year! Celebrate with us our 5th birthday!</p>
				
				<div class="table-responsive"><center></center> <br />
				<div class="card card-container ">

				<center>
<?php
if(isset($_POST['naruci'])) {
$ime = $_POST['name'];
$grad = $_POST['grad'];
$email = $_POST['email'];
$drzava = $_POST['drzava'];
$slot = $_POST['slot'];
$mod = $_POST['mod'];
$imeservera = $_POST['imeservera'];
$igra = $_POST['igra'];


$to = "your@email.com"; /// ovde pisete vas mejl.
$subject = "New by www.your@email.com";
$message = "$name je narucio server:

Ime servera: $imeservera
Mod na serveru: $mod
Slotovi: $slot
Igra: $igra



Informacije korisnika:

Ime i Prezime: $ime
Grad: $grad
Email: $email
Drzava: $drzava


-----Kraj poruke";
$from = $email;
$headers = "From: $from";
$mail = mail($to,$subject,$message,$headers);
if ($_POST['name'] == ""){echo "<title>Greska</title><b>Error - Full name.</b>";}
else if ($_POST['grad'] == ""){echo "<title>Greska</title><b>Error - Country.</b>";}
else if($_POST['email'] == ""){echo "<title>Greska</title><b>Error - E-mail.</b>";}
else if($_POST['drzava'] == ""){echo "<title>Greska</title><b>Error - Country.</b>";}
else if($_POST['message'] == ""){echo "<div class='uspesno'>Success! Check your e-mail: <b>$email</b></div> <br />";
mail($na,$naziv,$msg,$od);
}

else if ($mail) {
echo "<title>Uspesno</title><div class='uspesno'>Success! Check your e-mail: <b>$email</b></div> <br />";
	
$na = "$email";
$naziv = "From: www.your@email.com | Auto replay";
$msg = "This is the announce!,\n\nYour order has been successfully received and we will answer you as soon as possible.\n\nYour administration team.";
$od = "From: ONET | www.your@email.com" . "\r\n";
mail($na,$naziv,$msg,$od);
}else {
echo "<title>Neuspesno</title><div class='greska'>FAIL!! Check your e-mail: <b>$email</b></div> <br />";
}
}
?> 

<?php 
	
	$igra = $_POST['igra'];
	if(!$igra) {

?>

<div id="odaberi_igru_box">
	 <center> 
<img src="http://relationshipthings.com.au/wordpress/wp-content/uploads/2015/05/Choose.gif" width="300px">
</center>
</div>

	
	<form class="col-md-6 col-md-offset-3" action=""  method="post">
	 
		<select type="text"  class="form-control " name="igra" >
			<option value="cs">Counter Strike 1.6</option>
			<option value="samp">SanAndreas MultiPlayer</option>
			<option value="ts3">TeamSpeak 3</option>
			<option value="webhost">WebHosting</option>
			
		</select>
		
		<input type="submit" name="odaberi" class="order_btn2" value="NEXT"></input>
		
	</form>



<?php } else if($igra == "cs") { ?>
	
<div id="odaberi_igru_box">
	 <center> 
<img src="http://www.2047servers.co.uk/support/images/a/ad/Cs16.png" width="300px"> 
</center>
</div>

	 
	<form class="col-md-6 col-md-offset-3" action="" method="post">
	
		<input type="text" name="name" required="required" class="form-control" placeholder="Full name"></input> 
		<input type="text" name="grad"  required="required" class="form-control" placeholder="Country"></input> 	
		<input type="email" name="email"  required="required" class="form-control" placeholder="E-mail"></input> 
		<input type="text" name="imeservera"  required="required" class="form-control" placeholder="Server name"></input> 
		<select type="text" name="igra"  required="required" class="form-control" placeholder="Service">
			<option value="Counter Strike 1.6">Counter Strike 1.6</option>
		</select> 
		<select type="text" name="drzava"  required="required" class="form-control" placeholder="Country">
			<option value="Panel">CS Panel</option>
		</select> 
		<select type="text" name="mod"  required="required" class="form-control" placeholder="Mod">
			<option value="Public">Public</option>
			<option value="ClanWar">ClanWar</option>	
			<option value="DeathMatch">DeathMatch</option>	
			<option value="DeathRun">DeathRun</option>	
			<option value="Zombie">Zombie</option>	
	        <option value="Deafult">Deafult</option>
			<option value="Other">Other</option>
		</select> 	
		<select type="text" name="slot"  required="required" class="form-control" placeholder="Packet">
			<option value="12 slotova">5y Micro - €3/mo</option>
			<option value="22 slotova">5y Medium - €4/mo</option>
			<option value="26 slotova">5y Special - €5/mo</option>
			<option value="32 slotova">5y Premium - €6/mo</option>
		</select> 			
		
		<input type="submit" name="naruci" class="order_btn2" value="Send"></input>
		
	</form>








<?php } else if($igra == "samp") { ?>
	
<div id="odaberi_igru_box">
	 <center> 
<img src="https://warrenramales.files.wordpress.com/2014/06/samp.png" width="300px">
</center>
</div>

	
	<form class="col-md-6 col-md-offset-3" action="" method="post">
	
		<input type="text" name="name" required="required" class="form-control" placeholder="Full name"></input> 
		<input type="text" name="grad"  required="required" class="form-control" placeholder="Country"></input> 
		<input type="email" name="email"  required="required" class="form-control" placeholder="E-mail"></input> 
		
		<input type="text" name="imeservera"  required="required" class="form-control" placeholder="Server name"></input>
		<select type="text" name="igra"  required="required" class="form-control" placeholder="Service">
			<option value="San Andreas MultiPlayer">San Andreas MultiPlayer</option>
		</select> 	
		<select type="text" name="drzava"  required="required" class="form-control" placeholder="Gpanel">
			<option value="GtaPanel">Gta Panel</option>
		</select> 
		<select type="text" name="mod"  required="required"class="form-control" placeholder="Mod...">
			<option value="samp 0.3x Defaulth">Samp 0.3.x Default</option>
		</select> 
		<select type="text" name="slot"  required="required"  class="form-control" placeholder="Slotovi...">
			<option value="50 slotova">5y Micro - €3/mo</option>
			<option value="100 slotova">5y Medium - €4/mo</option>
			<option value="150 slotova">5y Special - €5/mo</option>	
			<option value="200 slotova">5y Premium - €6/mo</option>
		</select> <br /> <br />			
		
		<input type="submit" name="naruci" class="order_btn2" value="Send"></input>
		
	</form>








<?php } else if($igra == "webhost") { ?>
	
<div id="odaberi_igru_box">
	 <center> 
<img src="https://www.estart.co.za/wp-content/uploads/2013/07/website-hosting-slider.png" width="300px">
</center>
</div>

	
	<form class="col-md-6 col-md-offset-3" action="" method="post">
	
		<input type="text" name="name" required="required" class="form-control" placeholder="Full name"></input>
		<input type="text" name="grad"  required="required" class="form-control" placeholder="Country"></input> 	
		<input type="email" name="email"  required="required" class="form-control" placeholder="E-mail"></input> 
		<input type="text" name="imeservera"   class="form-control" placeholder="Domain name"></input> 
		<select type="text" name="igra"  required="required" class="form-control" placeholder="Service">
			<option value="WebHosting">WebHosting</option>
		</select> 	
		<select type="text" name="mod"  required="required" class="form-control" placeholder="Service">
			<option value="All Service">All Service</option>
		</select> 	
		<select type="text" name="drzava"  required="required" class="form-control" placeholder="AntiDDOS">
			<option value="AntiDDOS">AntiDDOS</option>
		</select>
		<select type="text" name="slot"  required="required" class="form-control" placeholder="Slotovi...">
			<option value="2GB-300GB-3-10-PRO">5y Micro - €3/mo</option>
			<option value="4GB-500GB-6-20-PRO">5y Medium - €4/mo</option>
			<option value="6GB-700GB-39-30-PRO">5y Special - €5/mo</option>
			<option value="10GB-1000GB-U-U-PRO">5y Premium - €6/mo</option>
			
		</select> 		
		
		<input type="submit" name="naruci" class="order_btn2" value="Send"></input>
		
	</form>








<?php } else if($igra == "mc") { ?>
	
<div id="odaberi_igru_box">
	<h3> Narucivanje MineCraft servera: </h3>
</div>
<div style="width:60%;">
	
	<form class="col-md-6 col-md-offset-3" action="" method="post">
	
		<input type="text" name="name" required="required" class="input" placeholder="Vase ime i prezime..."></input> <br /> <br />
		<input type="text" name="grad"  required="required" class="input" placeholder="Grad..."></input> <br /> <br />	
		<input type="email" name="email"  required="required" class="input" placeholder="E-mail..."></input> <br /> <br />
		<select type="text" name="drzava"  required="required" class="select" placeholder="Drzava...">
			<option value="Srbija">Srbija</option>
		</select> <br /> <br />
		<input type="text" name="imeservera"  required="required" class="input" placeholder="Ime servera..."></input> <br /> <br />
		<select type="text" name="igra"  required="required" class="select" placeholder="Igra...">
			<option value="MineCraft">MineCraft</option>
		</select> <br /> <br />		
		<select type="text" name="mod"  required="required" class="select" placeholder="Mod...">
			<option value="Defaulth">Defaulth</option>
		</select> <br /> <br />		
		<select type="text" name="slot"  required="required" class="select" placeholder="Slotovi...">
			<option value="50 slotova">50 slotova - cena</option>
			<option value="100 slotova">100 slotova - cena</option>
			<option value="200 slotova">200 slotova - cena</option>	
			<option value="300 slotova">300 slotova - cena</option>
		</select> <br /> <br />			
		
		<input type="submit" name="naruci" class="order_btn2" value="Naruci"></input>
		
	</form>








<?php } else if($igra == "ts3") { ?>
	
<div id="odaberi_igru_box">
	 <center> 
<img src="https://www.teamspeak.com/assets/images/logos/teamspeak_small.png" width="300px">
</center>

</div>
<div style="width:60%;">
	
	<form class="col-md-6 col-md-offset-3" action="" method="post">
	
		<input type="text" name="name" required="required" class="form-control" placeholder="Full name"></input> 
		<input type="text" name="grad"  required="required" class="form-control" placeholder="Country"></input> 	
		<input type="email" name="email"  required="required" class="form-control" placeholder="E-mail"></input> 
		<input type="text" name="imeservera"  required="required" class="form-control" placeholder="Server name"></input> 
		<select type="text" name="igra"  required="required" class="form-control" placeholder="Service">
			<option value="TeamSpeak 3">TeamSpeak 3</option>
		</select> 		
		<select type="text" name="mod"  required="required" class="form-control" placeholder="Mod...">
			<option value="AllService">AllService</option>
		</select> 	
			<select type="text" name="drzava"  required="required" class="form-control" placeholder="AntiDDOS">
			<option value="ANTIDDOS">AntiDDOS</option>
		</select> 
		<select type="text" name="slot"  required="required" class="form-control" placeholder="Slotovi...">
			<option value="50 slotova">5y Micro - €3/mo</option>
			<option value="100 slotova">5y Medium - €4/mo</option>
			<option value="150 slotova">5y Special - €5/mo</option>	
			<option value="200 slotova">5y Premium - €6/mo</option>
			<option value="400 slotova">5y ONET - €8/mo</option>
			<option value="500 slotova">5y MYONET - €10/mo</option>
		</select> 		
		
		<input type="submit" name="naruci" class="order_btn2" value="Naruci"></input>
		
	</form>







<?php }; ?>

				
				</div>
				
			</div>
		</div>
		</div> 
		
		
	</section>



<section id="faq" class="neutral extra-space">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
		
				   <p class="small text-center"> Still don't understand how to do payment? <a href="/contact">Ask us!</a> We're on your service 24/7!</p>
			</div>
		</div>

	</div>
</section>