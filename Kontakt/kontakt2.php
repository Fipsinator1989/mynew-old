<!-- Start Script --><head>
<style type="text/css">
.style1 {
	font-family: Arial, Helvetica, Sans-Serif;
	color: #82786F;
}
.style4 {
	font-size: x-small;
	
}
.style5 {
	font-family: Arial, Helvetica, Sans-Serif;
	font-size: x-small;
	color: #82786F;
}
.style6 {
	color: #82786F;
}
.style8 {
	color: #82786F;
	font-size: x-small;
}
.style9 {
	font-family: Arial, Helvetica, Sans-Serif;
}
</style>

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>	
</head>



<form name="kontaktformular" action="/Kontakt/kontakt.php" method="post"> 
<table width="500" align="center"> 
<tr><td colspan="2">
</td>
</tr>
<tr>
<td width="150" class="style5">NAME:</td>
<td><input name="name" type="text" value="" size="40" maxlength="100"></td></tr> 
<tr>
<td width="150" class="style8"><p class="style4"><span class="style1">E-MAIL:</span><br class="style6"></td>
<td><input name="email" type="text" id="email" value="" size="40" maxlength="100"></td></tr>
<tr>
<td width="150" class="style5" valign="top">NACHRICHT:</td>
<td>
<textarea name="nachricht" rows="10" wrap="VIRTUAL" id="nachricht" style="width: 261px"></textarea></td></tr>
<tr>
<td width="150" class="style8">&nbsp;</td>
<td>&nbsp;</td>
</tr>
    <tr>
      <td width="150" class="style8"><span class="style1">SICHERHEITSCODE</span><span class="style6"><strong>:</strong></span></td>
      <td>
	  <img src="http://www.logopaedie-wesseling.de/Kontakt/captcha_form.php?pa_s=G7z2ZZk994s=" alt="Captcha" border="1" /></td>
    </tr>
    <tr>
      <td width="150" class="style8"><span class="style1">SICHERHEITSCODE </span> 
	  <br class="style1">
      <span class="style9">WIEDERHOLEN</span><span class="style1">: </span></td>
      <td><input name="code" type="text" id="code" size="20" maxlength="50" /></td>
    </tr>
    <tr>
      <td width="150" class="style8">&nbsp;</td>
    </tr> 
<tr>
<td width="150" class="style8">&nbsp;</td>
<td><input type="submit" value="Abschicken" name="submit">
<input name="xpas" type="hidden" id="xpas" value="G7z2ZZk994s=" />
<br><br>
</td></tr>
</table>
</form>

<!-- Ende Script -->