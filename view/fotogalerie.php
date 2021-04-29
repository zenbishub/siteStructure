<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$arr=$o->getValues();
$array = $o->getPictures();
echo "<div class=\"container mb-4 mt-4\">
<h2>Forogalerie</h2><hr>";
echo '
<div class="container">
	<div class="row">';
		foreach($array as $item){
          echo $o->lichtboxImage($item,"fotogalerie");
		}
echo '</div>';
echo "</div>";
echo "</div>"; 
?>
