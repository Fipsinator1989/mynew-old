<!-- Start Script --><head>
<style type="text/css">
.style4 {
	font-family: Lucida Grande, Lucida, Candara, Verdana, Geneva, Arial, Swiss, SunSans-Regular;
	font-size: 5.10277e+017;
	color: #82786f;
}
.style6 {
	font-size: small;
}
.style7 {
	font-family: Lucida Grande, Lucida, Candara, Verdana, Geneva, Arial, Swiss, SunSans-Regular;
	font-size: small;
	color: #82786f;
}


</style>

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>	

</head>

<?php
// Einstellungen


# Ihre E-Mailadresse
$sys_webmaster = 'pg@be-magazine.de';  

# Absender || Muster(From: NAME <EMAIL>) // Beispiel: 'From: Max Mustermann <max@musterdomain.tld>'
$sys_absender = 'From: Kontaktformular <system@domain.tld>'; 

# Betreff
$sys_betreff = 'Kontaktformular-Anfrage';

// Nachrichten
# Nicht alle Felder ausgefüllt
$err[0] = 'Fehler, Sie haben nicht alle Felder ausgefüllt:';

# Kein Name eingegeben
$err[1] = '<br />- Ungültiger Name';

# Ungültige E-Mailadresse eingegeben
$err[2] = '<br />- Ungültiger E-Mailadresse';

# Kein Betreff eingegeben
$err[3] = '<br />- Ungültiger Betreff';

# Keine Nachricht eingegeben
$err[4] = '<br />- Ungültige Nachricht';

# Ungültiger Sicherheitscode
$err[5] = '<br />- Ungültiger Sicherheitscode';

# Alle Felder sind OK
$ok = '';


?>


<form name="kontaktformular" action="<? echo $_SERVER['PHP_SELF']; ?>" method="post"> 
<table width="500" align="center"> 
<tr><td colspan="2" class="style6">
<?php 
function PAS_CRYPT($data=NULL){
$key = md5($_SERVER["DOCUMENT_ROOT"].$_SERVER['SELF_PHP']);
$td = mcrypt_module_open(MCRYPT_GOST, '', MCRYPT_MODE_ECB, '');
$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size ($td), MCRYPT_RAND);
mcrypt_generic_init($td, $key, $iv);
if ($data==NULL) {
$data = mcrypt_generic($td, substr(md5 (uniqid (rand())), 0, 6));
$data = base64_encode($data);
$data = strtr($data, '+/', '-_');
}else{
$data = mdecrypt_generic($td, base64_decode($data));
preg_match_all("/[.a-z0-9_-]+/i", $data, $heurix);
$data = $heurix[0][0];
}
mcrypt_generic_deinit($td);
mcrypt_module_close($td);
return $data;
}
$pas = PAS_CRYPT();
$name = trim(strip_tags($_POST['name']));
$email = trim(strip_tags($_POST['email']));
$betreff = trim(strip_tags($_POST['betreff']));
$homepage = trim(strip_tags($_POST['homepage']));
$nachricht = trim(strip_tags($_POST['nachricht']));
if(isset($_POST['submit'])){
$timestamp = time ();
$datum = date ("d.m.Y",$timestamp);
$uhrzeit = date ("H:i:s",$timestamp);
$msg = '<span style="color:red">'.$err[0];
if($name == ''){
$msg .= $err[1];
$error = true;
}
if(!ereg("^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$", $email)){
$msg .= $err[2];
$error = true;
}
if($nachricht == ''){
$msg .= $err[4];
$error = true;
}
if(PAS_CRYPT($_POST['xpas']) != strip_tags($_POST['code'])){
$msg .= $err[5];
$error = true;
} 
$msg .= '</span><br /><br />';
if($error != true){
$sys_nachricht = "-- Kontakformularanfrage --\n\nBetreff: $betreff\nName: $name\nE-Mail: $email\nHomepage: $homepage\n\nNachricht:\n$nachricht\n\nGesendet am $datum um $uhrzeit.";
mail($sys_webmaster, $sys_betreff, $sys_nachricht, $sys_absender);
$name = NULL;
$betreff = NULL;
$homepage = NULL;
$email = NULL;
$nachricht = NULL;
echo $ok;
}else{
echo $msg;
}
}
?></td>
</tr>
<tr>
<td width="150" class="style7">NAME:</td>
<td><input name="name" type="text" value="<? echo $name; ?>" size="40" maxlength="100"></td></tr> 
<tr>
<td width="150" class="style6"><p class="style4"><span class="style7">E-MAIL:</span><br class="style6"></td>
<td><input name="email" type="text" id="email" value="<? echo $email; ?>" size="40" maxlength="100"></td></tr>
<tr>
<td width="150" class="style7" valign="top">NACHRICHT:</td>
<td>
<textarea name="nachricht" rows="10" wrap="VIRTUAL" id="nachricht" style="width: 261px"><? echo $nachricht; ?></textarea></td></tr>
<tr>
<td width="150" class="style6">&nbsp;</td>
<td>&nbsp;</td>
</tr>
    <tr>
      <td width="150" class="style7"><span class="style7">SICHERHEITSCODE</span><strong><span class="style6">:</span></strong></td>
      <td><img src="captcha_form.php?pa_s=<? echo $pas; ?>" alt="Captcha" border="1" /></td>
    </tr>
    <tr>
      <td width="150" class="style7"><span class="style7">SICHERHEITSCODE </span> 
	  <br class="style7">
      <span class="style6">WIEDERHOLEN</span><span class="style7">: </span></td>
      <td><input name="code" type="text" id="code" size="20" maxlength="50" /></td>
    </tr>
    <tr>
      <td width="150" class="style6">&nbsp;</td>
    </tr> 
<tr>
<td width="150" class="style6">&nbsp;</td>
<td><input type="submit" value="Abschicken" name="submit">
<input name="xpas" type="hidden" id="xpas" value="<? echo $pas; ?>" />
<br><br>
</td></tr>
</table>
</form>

<!-- Ende Script -->