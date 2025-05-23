<div id="div_galerie">
	<h1>G&auml;stebuch</h1>
	<p>&nbsp;</p>
	<p>&nbsp;</p>


	<!-- form method='post' action='wolkenhof/gaestebucheintragung.php' -->
	<form method='post' action='<?php echo $ROOT; ?>index.php?content=gaestebucheintragung'>
		<input type="hidden" name="ROOT" value="<?php echo $ROOT ?>" />
		<table class="gaestebucheintrag">
			<tr align='left'>
			  <td class='latestnews' colspan='2'>&nbsp;Kommentar</td>
			</tr>
			<tr>
			  <td colspan='6' class='autor' height='10'>
				<div align='right'></div>
			  </td>
			</tr>
			<tr>
			  <td class='morelink'>Rubrik:</td>
			  <td>
				<select name='fbetreff' class='contentblack'>
				  <option value='Anregung'>Anregung</option>
				  <option value='Lob'>Lob</option>
				  <option value='Kritik'>Kritik</option>
				  <option value='Allgemein'>Allgemein</option>
				</select>
			  </td>
			</tr>
			<tr>
			  <td class='morelink'>Name: </td>
			  <td>
				<input type='text' name='fname' class='contentblack' size='30' maxlength='50' />
			  </td>
			</tr>
			<tr>
			  <td class='morelink'>E-mail: </td>
			  <td>
				<input type='text' name='femail' class='contentblack' size='30' maxlength='50' />
			  </td>
			</tr>
			<tr>
			  <td class='morelink'>Inhalt: </td>
			  <td>
				<textarea name='finhalt' class='contentblack' cols='30' rows='5'></textarea>
			  </td>
			</tr>
			<tr>
			  <td class='morelink'>Webseite:&nbsp;&nbsp;</td>
			  <td>
				<input type='text' name='fhome' class='contentblack' size='30' maxlength='50' />
			  </td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td class='center'>
				<input type='submit' name='senden' value='senden' class='contentblack' />
				<input type='reset' name='losch' value='l&ouml;schen' class='contentblack' />
			  </td>
			</tr>
			<tr>
			  <td colspan='6' class='autor' height='10'>
				<div align='right'></div>
			  </td>
			</tr>
			<tr>
			  <td colspan='6' class='latestnews'>&nbsp;</td>
			</tr>
		</table>
	</form>
	<p align="center"><a href="<?php echo $ROOT; ?>index.php?content=gaestebuch" class="contentlink">Beitr&auml;ge Lesen</a></p>

</div>
