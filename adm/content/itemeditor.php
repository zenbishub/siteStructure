<?php
require_once  '../../model/class_edititem.php';
if(isset($_REQUEST['pub'])){
	$pub = "adm/";
}
$o=new editing();
switch($_REQUEST['classname']){
	case "termine_aowa";
	$selectArray=$o->select("SELECT * FROM zb_ensembles ORDER BY ensembel_id ASC");
	break;
	case "hauptbilda":
	$selectArray[0][2]="aktiv";
	$selectArray[1][2]="nicht aktiv";
	
	break;
}

echo "<div class='container'>";
echo "<h3>Datensatz bearbeiten</h3>";
$o->getClassForm($_REQUEST['tb'],$_REQUEST['id'],$selectArray,$pub);
echo "</div>";
