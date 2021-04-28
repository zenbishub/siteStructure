<?php 
/**/ require_once "controller/startseite.php";
$o=new startseite();
$arr=$o->getValues();
$array = $o->getPictures(); 
echo "<div class=\"container mb-4 mt-4\">";
echo $o->publicEditIcon($arr[0]["id"]."-zb_startseite-startseitea");
echo "<h2>".$arr[0]["ueberschrift"]."</h2><hr>";
if(count($array)>0){
	$o->mainCaroussel("startseite",$array); 
	 }
echo "<p>".$arr[0]["textinhalt"]."</p>";
echo "</div>";
 
