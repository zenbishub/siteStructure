<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$arr=$o->getValues();$array = $o->getPictures();echo "<div class=\"container mb-4 mt-4\"><h2>".$arr[0]["ueberschrift"]."</h2>"if(count($array)>0){$o->mainCaroussel(".$_REQUEST["controller"],$array);  }
echo "<p>".$arr[0]["textinhalt"]."</p>";
echo "</div>";
 $i=1;
do{
echo "<div class=\"container mb-4 mt-4\">
<h2>".$arr[$i]["ueberschrift"]."</h2>";
echo "<p>".$arr[$i]["textinhalt"]."</p>";
echo "</div>";
$i++;
}while($i<count($arr)); 