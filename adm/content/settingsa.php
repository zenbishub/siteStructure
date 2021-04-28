<?php
$o = new admController();

$o->updateData("zb_admin",$_POST, "id=1");
$o->updateData("zb_websitetitle",$_POST, "id=1");
//$o->updateData("zb_switcher",$_POST, "id=1");
$arr = $o->getTableData("zb_admin");
$title = $o->getTableData("zb_websitetitle");

$o->switcher();
echo "<h1 class='display-5'>Einstellungen</h1>";

echo "<ul class='nav nav-tabs bg-light' id='myTab' role='tablist'>
  <li class='nav-item'>
    <a class='nav-link active' id='schalter-tab' data-toggle='tab' href='#schalter' role='tab' aria-controls='schalter' aria-selected='true'>Webseite on/offline schalten</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' id='admindaten-tab' data-toggle='tab' href='#admindaten' role='tab' aria-controls='admindaten' aria-selected='false'>Admin Daten</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' id='webtitel-tab' data-toggle='tab' href='#webtitel' role='tab' aria-controls='webtitel' aria-selected='false'>Webseiten Titel</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' id='member-tab' data-toggle='tab' href='#memberpass' role='tab' aria-controls='member' aria-selected='false'>Mitglieder Passwort</a>
  </li>
</ul>
<div class='tab-content' id='tabContent'>
  <div class='tab-pane fade show active' id='schalter' role='tabpanel' aria-labelledby='schalter-tab'>";
  echo "<div class='card m-0 bg-light'>
  <h5 class='card-header'>Webseite on/offline schalten</h5>
  <div class='card-body'>";
		echo "<div class='container m-2 p-4'>";
		echo "<form method='post'>";
		echo $o->getPageSwitcher();
		echo "<div class='row '>";
		echo "<div class='col col-2 mb-1'>";
		echo "<select name='onoffswitcher' class='adm-select custom-select'>";
		echo "<option value=''>auswählen</option>";
		echo "<option value='1'>online</option>";
		echo "<option value='0'>offline</option>";
		echo "<select>";
		echo "</div></div>";
		echo "<div class='row '>";
		echo "<div class='col col-2 mb-1'>";
		echo "<input type='hidden' name='switch' value='onoff'>";
		echo "<button class='adm-button btn-info'>ok</button>";
		echo "</div>";
		echo "</div>";
		echo "</form>";
		echo "</div>";
		echo "</div></div>";
  echo"</div>";
  
  
  echo "<div class='tab-pane fade' id='admindaten' role='tabpanel' aria-labelledby='admindaten-tab'>";
  	echo "<div class='card m-0'>
  <h5 class='card-header'>Admin Daten</h5>
  <div class='card-body'>";
			echo "<div class='container m-2 p-4'>";
			echo "<div class='row col-12'>";
			echo "<form method='post'>
				<div class='form-group'>
					<label for='adminEmail'>Email address</label>
					<input type='email' name='admin_email' class='form-control' id='adminEmail' placeholder='Enter email' value='".$arr[0]['admin_email']."'>
				</div>
				<div class='form-group'>
					<label for='adminName'>Benutzernik</label>
					<input type='search' name='user' class='form-control' id='adminName' placeholder='Username' value='".$arr[0]['user']."'>
				</div>
				<div class='form-group'>
					<label for='adminPass'>Passwort</label>
					<input type='password' name='pass' class='form-control' id='adminPass' placeholder='Passwort' value='".$arr[0]['pass']."'>
				</div>
				
				<button class='adm-button btn-info'>ändern</button>
				<input type='hidden' name='update' value='zb_admin'>
			</form>";
			echo "</div>";
			echo "</div>";
			echo "</div></div>";
  echo "</div>";
  
  
  echo "<div class='tab-pane fade' id='webtitel' role='tabpanel' aria-labelledby='webtitel-tab'>";
  	
		echo "<div class='card m-0'>
		  <h5 class='card-header'>Webseiten Titel</h5>
		  <div class='card-body'>";
			echo "<div class='container m-2 p-4'>";
			echo "<div class='row col-12'>";
			echo "<form method='post'>
			<div class='form-group'>
			  <label for='wtitle'>Webseiten Titel</label>
		   <input type='search' name='title' class='form-control' id='wtitle' placeholder='Webseitentitel' value='".$title[0]['title']."'>
			</div>
			<button class='adm-button btn-info'>ändern</button>
			<input type='hidden' name='update' value='zb_websitetitle'>
		</form>";
			echo "</div>";
			echo "</div>";
			echo "</div></div>";

  echo "</div>";
  
    echo "<div class='tab-pane fade' id='memberpass' role='tabpanel' aria-labelledby='member-tab'>";
  	
		echo "<div class='card m-0'>
		  <h5 class='card-header'>Mitglieder-Zugang</h5> 
		  <div class='card-body'>";
			echo "<div class='container m-2 p-4'>";
			echo "<div class='row col-12'>";
			echo "<form method='post'>
			<div class='form-group'>
			  <label for='nik'>Login-Name für Internen Bereich</label>
		   <input type='search' name='membernik' class='form-control' id='nik' placeholder='Benutzername für Mitglieder' value='".$arr[0]['membernik']."'>
			</div>
			<div class='form-group'>
			  <label for='mpass'>Login-Passwort für Internen Bereich</label>
		   <input type='search' name='memberpass' class='form-control' id='mpass' placeholder='Passwort für Mitglieder' value='".$arr[0]['memberpass']."'>
			</div>
			<button class='adm-button btn-info'>ändern</button>
			<input type='hidden' name='update' value='zb_admin'>
		</form>";
			echo "</div>";
			echo "</div>";
			echo "</div></div>";

  echo "</div>
  
</div>";




/* 


 */



