<?php 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
$arr=$o->getValues();
$array = $o->getPictures();
echo "<div class=\"container mb-4 mt-4\">";
echo $o->helper->tag("h2",$o->getClass());
echo "<hr>";
(count($array)>0)? $o->mainCaroussel($_REQUEST["controller"],$array):"";
echo "</div>";

foreach($arr as $item):
	echo "<div class=\"container mb-4 mt-4\">";
	echo $o->publicEditIcon($item["id"]."-zb_videogalerie-videogaleriea");
	
	echo $o->helper->ytVideo(
	"https://img.youtube.com/vi/".$o->getVideoId($item["videocode"])."/0.jpg",
	 "img-fluid z-depth-1 rounded",
	  $o->getVideoId($item["videocode"])
	  );
	  
	  echo '<div class="col-lg-8 col-md-12">';
	  echo $o->helper->tag("h4",$item["videotitel"]);
	  echo $item["beschreibung"] ? $o->helper->tag("p",$item["beschreibung"]):"";
	  echo'</div>
				</div>';
	  echo "</div>";
endforeach; 

/* https://img.youtube.com/vi/A3PDXmYoF5U/0.jpg
https://img.youtube.com/vi/A3PDXmYoF5U/1.jpg
https://img.youtube.com/vi/A3PDXmYoF5U/2.jpg
https://img.youtube.com/vi/A3PDXmYoF5U/3.jpg */

 ?> 
 
	<script>
	$(function(){
	$(".openvideo").click(function(){
		var vID = $(this).attr("alt");
		var target = $("#targetframe");
		target.attr("src","https://www.youtube.com/embed/"+vID);
	});	
	
	});
</script>
