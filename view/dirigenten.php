<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$arr=$o->getValues();
$array = $o->getPictures();

foreach($arr as $post){
echo "<div class=\"container mb-4 mt-4\">";
echo $o->publicEditIcon($post["id"]."-zb_dirigenten-dirigentena");
echo "<h2>".$post["ueberschrift"]."</h2>";
echo "<hr>"; 
echo "<img src='adm/pic/".$post["bilddatei"]."' class='img-fluid' alt='".$post["beschreibung"]."'>";  
echo "<p>".$post["textinhalt"]."</p>";
echo "</div>";
} 