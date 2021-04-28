<?php
 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
echo "<div class=\"container mb-4 mt-4\">
<h1>".ucfirst($_REQUEST["controller"])."</h1>";
echo "</div>";

echo "<form method=\"post\"><div class=\"form-group\">
		<label for=\"Benutzername\">Benutzername</label><input type=\"text\" name=\"Benutzername\" class=\"form-control col-4\" id=\"Benutzername\" value=\"\" placeholder=\"Benutzername\">
		</div><div class=\"form-group\">
		<label for=\"Passwort\">Passwort</label><input type=\"text\" name=\"Passwort\" class=\"form-control col-4\" id=\"Passwort\" value=\"\" placeholder=\"Passwort\">
		</div><button class=\"btn btn-info m-2\">ok</button></form> ";