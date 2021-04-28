<?php
require_once  '../../model/class_edititem.php';
$o=new editing();
echo "<div class='container'>";
echo "<h3>Spalte hinzufügen</h3>";
$o->getColumnForm();
echo "</div>";