<?php 
 require_once "controller/links.php";
$links=new links();
$arrLinks=$links->getValues();

echo "<div class=\"container mb-4 mt-4\">
<h2>".$links->getClass()."</h2><hr>";
echo "<ul class='list-group ml-4'>";
foreach($arrLinks as $li){

echo "<li class='row' style='position:relative'>";
echo $links->publicEditIcon($li["id"]."-zb_links-linksa");
echo "<div class='col-sm-12 col-lg-2' >";

echo $li["textinhalt"];
echo "</div>
</li>";
}
echo "</ul>";
echo "</div>"; /**/