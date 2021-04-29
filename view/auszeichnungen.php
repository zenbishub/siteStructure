<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$arr=$o->getValues();
$array = $o->getPictures();
echo "<div class=\"container mb-4 mt-4\">";
echo $o->publicEditIcon($arr[0]["id"]."-zb_auszeichnungen-auszeichnungena");
echo "<h2>".$arr[0]["ueberschrift"]."</h2>";
echo "<hr>"; 
if(count($array)>0){
	$o->mainCaroussel($_REQUEST["controller"],$array);
	}
	
echo "<img src='adm/pic/".$arr[0]["bilddatei"]."' class='img-fluid' alt='".$arr[0]["beschreibung"]."'>"; 
echo "<p>".$arr[0]["textinhalt"]."</p>";
echo "</div>";
 $i=1;
 if(count($arr)>1){
	do{
	echo "<div class=\"container mb-4 mt-4\">";
	echo $o->publicEditIcon($arr[$i]["id"]."-zb_auszeichnungen-auszeichnungena");
	echo "<h2>".$arr[$i]["ueberschrift"]."</h2>";
	echo "<p>".$arr[$i]["textinhalt"]."</p>";
	echo "</div>";
	$i++;
	}while($i<count($arr));   
}
