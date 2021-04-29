<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$arr=$o->getValues();

echo "<div class=\"container mb-4 mt-4\">
			<h2>".$arr[0]["title"]."</h2><hr>";
echo "<p>".$arr[0]["information"]."</p>";
echo "</div>";
 $i=1;
do{
	$path = $o->searchFile($arr[$i]["partitur"]);
echo "<div class=\"container mb-1\">";
echo'<li class="list-group-item m-0 p-1">';

if($arr[$i]["title"]){echo"<h5>".$arr[$i]["title"]."</h5>";}
echo "<div class='row'>";
 

if($arr[$i]["partitur"]){
	echo "<div class='col-4'>";
		switch($path[1]){
			case "image":
			echo '<div class="col-6"><a class="gallery-item" href="#" data-image-id="" data-toggle="modal" data-title="'.$termin["ueberschrift"].'" data-image="'.$o->base.'adm/'.$path[0].''.$arr[$i]["partitur"].'" data-target="#image-gallery"><img class="img-thumbnail " src="'.$o->base.'adm/pic/TN'.$arr[$i]["partitur"].'" alt=""></a>
				</div>';
			break;
			case "audio":
			case "doc":
			echo"<a href='".$o->base."adm/".$path[0]."".$arr[$i]["partitur"]."' target='_blanc'>".$arr[$i]["partitur"]."</a>";
			break;
			default:
			echo"<a href='".$o->base."adm/".$path[0]."".$arr[$i]["partitur"]."' target='_blanc'>".$arr[$i]["partitur"]."</a>";
		}
	echo "</div>";
	}
if($arr[$i]["information"]){echo "<div class='col-8'>".$arr[$i]["information"]."</div>";}
echo "</li>";
echo "</div>";
$i++;
}while($i<count($arr)); 
