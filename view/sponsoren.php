<?php 
 require_once "controller/sponsoren.php";
$sponsor=new sponsoren();
$arrSponsor=$sponsor->getValues();
echo "<div class=\"container mb-4 mt-4\">
<h2>".$sponsor->getClass()."</h2><hr>";
echo "<div class='ml-4'>";
foreach($arrSponsor as $sp){
echo "<div class='row mb-2 p-2 bg-light border-bottom' style='position:relative'>";
echo $sponsor->publicEditIcon($sp["id"]."-zb_sponsoren-sponsorena");
echo "<div class='col-sm-12 col-lg-2'>
<img src='".$sponsor->base."adm/pic/TN".$sp["bilddatei"]."' class='img-thumbnail'>
</div>
<div class='col-sm-12 col-lg-8'>
<a href='".$sp["webadresse"]."'>".$sp["sponsorname"]."</a><br>".$sp["textinhalt"]."
</div>
</div>";
}
echo "</div>";
echo "</div>"; /**/