<?php

echo "<form method='post' action='model/actions.php' >
<div class='form-group'>
<label for='multilogin'>Login wählen</label>
<select class='form-control col-6' id='multilogin' name='multilogin' required>
<option value=''>Bereich wählen</option>
<option value='ibr'>Interner Bereich</option>
<option value='adm'>Adminbereich</option>
</select>

</div>
<div class='form-group'>

		<label for='Benutzername'>Benutzername</label>
		<input type='text' name='Benutzername' class='form-control col-6 Benutzername'  value='' placeholder='Benutzername' required>
		
</div>
<div class='form-group'>
		<label for='Passwort'>Passwort</label>
		<input type='password' name='Passwort' class='form-control col-6' id='Passwort' value='' placeholder='Passwort' required>
		
</div>
	<input type='hidden' name='action' value='memberlogin'>
	<input type='hidden' name='actiontable' value='zb_userlogin'>
	<button class='btn btn-info'>einloggen</button>
</form> 
";