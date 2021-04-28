<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();

echo "<div class=\"container mb-4 mt-4\">";
echo "<h2>Unsere Termine</h2>"; 
echo "<hr>"; 
$o->getValuesTermineAOW();
echo "</div>"; /* */
 