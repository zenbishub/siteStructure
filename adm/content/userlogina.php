<?php 
 require_once "../controller/".$_REQUEST["p"].".php";
$o=new $_REQUEST["p"]();
$o->updateData(substr("zb_".$_REQUEST["p"],0,-1), $_POST,"id=".$_REQUEST["id"]."");
$o->insertData(substr("zb_".$_REQUEST["p"],0,-1),$_POST);
echo $o->getClass();
echo "<div class=\"card m-2\"><h5 class=\"card-header\">Datensatz erstellen / bearbeiten</h5><div class=\"card-body\">";

	echo "<div class=\"container p-4 ml-0 mb-4 mt-4\">";

	$o->getClassForm();

	echo "</div></div>";

	$arr=$o->getTable($_REQUEST["p"]);
$o->showEntries($arr);
echo "</div>";