	<?php
if ($_POST['submit'] == TRUE) {
    $receiverMail = "info@your@email.com";
	$subject ="O-NET Hosting | info@your@email.com";
    $name        = stripslashes(strip_tags($_POST['name']));
    $email        = stripslashes(strip_tags($_POST['email']));
    $subject2    = stripslashes(strip_tags($_POST['subject']));
	$game  = stripslashes(strip_tags($_POST['game']));
	$paket  = stripslashes(strip_tags($_POST['paket']));
	$gift = stripslashes(strip_tags($_POST['gift']));
	$slot = stripslashes(strip_tags($_POST['slot']));
    $mobile   = stripslashes(strip_tags($_POST['mobile']));
    $message        = stripslashes(strip_tags($_POST['message']));
    $ip2            = $_SERVER['REMOTE_ADDR'];
	$ip            = $_SERVER['HTTP_X_FORWARDED_FOR'];
    $msgformat    = "From: $name ($ip)\n\n\nIme i prezime:$name\nEmail: $email\nTelefon:$mobile\nIgra:$game\nGift:$gift\nLokacija:EU\nPaket:$slot\nNapomena:\n$message";
    $msgformat2   = "Dear $name ($ip) \n\n\nService:$game\nPacket:$slot\n ";
	if(empty($name) || empty($email) || empty($subject) || empty($mobile)) {
        echo "<h2>ERROR</h2><p>Please try again!</p><FORM> 
<INPUT type='button' value='BACK' onClick='history.back()'></form>";
    }
    elseif(!ereg("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)) {
        echo "<h2>ERROR</h2><p>Wrong E-Mail address.</p><FORM> 
<INPUT type='button' value='BACK' onClick='history.back()'></form>";
    }
    elseif
	(mail($receiverMail, $subject, $msgformat, "From: O-NET Narudzba Ts3 $name <$email>")) 
	{	   echo "<h2>Success!</h2><p>Check your E-Mail.<FORM> 
<INPUT type='button' value='BACK' onClick='history.back()'></form></p>";
   mail($email, $subject, $msgformat2, "From: O-NET Narudzba Ts3 $name <$email>");
   }
    
    else {
        echo "<h2>ERROR</h2><p>Server DOWN!<FORM> 
<INPUT type='button' value='BACK' onClick='history.back()'></form></p>";
    }
}
else { ?>
<div class="container">
<div class="col-md-5">
    <div class="form-area">  

       <form method="post" action="">
        <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">TS3 | Balcan!</h3>
    				<div class="form-group">
						<input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile Number" required>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" id="game" name="game" value="TeamSpeak 3" readonly>
					</div>
					<div class="form-group">
						<select   name="slot"  required="required" class="form-control"  >
	    <option value="">Please Choice Packet</option>
		<option value="Micro"> Micro  </option>
		<option value="Mini"> Mini </option>
		<option value="Medium"> Medium </option>
		<option value="Lagre"> Lagre </option>
			<option value="Ultra"> Ultra </option>
				<option value="Special"> Special </option>
					<option value="Mega"> Mega </option>
						<option value="Premium"> Premium </option>
		
		</select>
					</div>
					
                    <textarea class="form-control" type="textarea" name="message" id="message" placeholder="Note" maxlength="250" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                    </div>
            
        <button id="submit" class="button" type="submit" name="submit" value="Done">Submit Form</button>

        </form>
		<?php }?>
    </div>

</div>
</div>

<script type="text/javascript">
$(document).ready(function(){ 
    $('#characterLeft').text('250 characters left');
    $('#message').keydown(function () {
        var max = 250;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');            
        } 
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');            
        }
    });    
});
</script>

</center>