<?php 
require_once "controller/".$_REQUEST["controller"].".php";

$o=new $_REQUEST["controller"]();
$arr=$o->getValues();
$array = $o->getPictures();

echo "<div class=\"container mb-4 mt-4\">";
echo $o->publicEditIcon($arr[0]["id"]."-zb_tonakkrobaten-tonakkrobatena");
echo "<h2>".$arr[0]['ueberschrift']."</h2>";
echo "<hr>"; 
$o->mainCaroussel($_REQUEST["controller"],$array);
echo "<div class='row'>";
if(!empty($arr[0]['bilddatei'])){
	$width = "col-9";
echo "<div class='col-3'>";
echo '<a class="gallery-item" href="#" data-image-id="" data-toggle="modal" data-title="'.$arr[0]["ueberschrift"].'" data-image="'.$this->base.'adm/pic/'.$arr[0]["bilddatei"].'" data-target="#image-gallery">
 <img class="img-thumbnail" src="'.$this->base.'adm/pic/TN'.$arr[0]["bilddatei"].'" alt=""></a>
 </div>';
}else{
	$width = "col-12";
}
	echo "<div class='$width'>";
		echo $arr[0]['textinhalt'];
	echo "</div>";
echo "</div>";
echo '</div>';
 $i=1; 
 if(count($arr)>$i){
	do{
		echo "<div class=\"container mb-4 mt-4\">";
		echo "<hr>";
		echo "<h2>".$arr[$i]['ueberschrift']."</h2>";
		echo "<div class='row'>";
		echo $o->publicEditIcon($arr[$i]["id"]."-zb_tonakkrobaten-tonakkrobatena");
		if(!empty($arr[$i]['bilddatei'])){
			$width = "col-9";
		echo "<div class='col-3'>";
		echo '<a class="gallery-item" href="#" data-image-id="" data-toggle="modal" data-title="'.$arr[$i]["ueberschrift"].'" data-image="'.$this->base.'adm/pic/'.$arr[$i]["bilddatei"].'" data-target="#image-gallery">
		 <img class="img-thumbnail" src="'.$this->base.'adm/pic/TN'.$arr[$i]["bilddatei"].'" alt=""></a>
		 </div>';
		}else{
		$width = "col-12";
		}
		echo "<div class='$width'>";
		echo $arr[$i]['textinhalt'];
		echo "</div>";
	echo '</div>';
	echo '</div>';
	$i++;
}while($i<count($arr)); 
}