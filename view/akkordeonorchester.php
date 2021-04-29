<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
echo "<div class=\"container mb-4 mt-4\">
<h1>".ucfirst($_REQUEST["controller"])."</h1>";
echo '</div>';