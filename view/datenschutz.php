<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$arr=$o->getValues();

echo "<div class=\"container mb-4 mt-4\">";
echo $o->publicEditIcon($arr[0]["id"]."-zb_datenschutz-datenschutza");
echo "<h2>".$arr[0]["titel"]."</h2>";
echo "<p>".$arr[0]["textinhalt"]."</p>";
echo "</div>";
