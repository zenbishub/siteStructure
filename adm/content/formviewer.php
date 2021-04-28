<?php
require_once  '../../model/class_edititem.php';
$o=new editing();
echo "<div class='card m-2'><h5 class='card-header'>Formular Schablone</h5><div class='card-body'>";
$o->getForm($_REQUEST['formid']);
echo "</div>";
echo "</div>";
