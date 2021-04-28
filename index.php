<?php
include "model/class_require.php";
$o = new publicController();


if(isset($_REQUEST["table"])){
	connect::$reqtable = $_REQUEST["table"];
}
if(isset($_REQUEST["id"])){
	connect::$reqid = $_REQUEST["id"];
}
$termineaow = new termine_aow();
$o->checkSwitcher();
$o->siteHead();
$o->adminLeiste();


$o->updateData(connect::$reqtable, $_POST,"id=".connect::$reqid."","");


echo "<div class='container-fluid p-0 m-0 wrapper'>";
echo "<div class='container-fluid p-0 m-0'>";
$o->topNavigation();
echo "<div class='container-fluid p-0 m-0 mainslider'>";
echo "<div class='mainslider-box container '>";
echo '<section class="jumbotron vertical-center" style="background-image:url('.connect::$base.'adm/pic/'.$o->getTitelPicture()[0]['bilddatei'].')">';
echo $o->publicEditIcon($o->getTitelPicture()[0]['id']."-zb_hauptbild-hauptbilda");
echo '<div class="row">
    <div class="logo-of-page col-sm-12 col-lg-9 "> 
<a class="navbar-brand" href="'.connect::$base.'">';
echo $o->asset->image(connect::$base."img/aow_logo.png", "", "Logo Akkordeonorchester Wiesbaden", "", "Logo Akkordeonorchester Wiesbaden");
echo '</a>
</div>
<div class="col-sm-12 col-lg-3">
 <div class="btn-group-lg btn-group-vertical">';
 echo $o->asset->linkto(connect::$base."akkordeonunterricht", "Akkordeon-Unterricht", "" ,"btn btn-primary btn-lg m-1");
 echo $o->asset->linkto(connect::$base."kontakt", "Mitglied werden", "" ,"btn btn-primary btn-lg m-1");
echo '</div>
</div>
</div>
<div class="col-12 pl-2">';
echo $o->helper->tag("h1","Akkordeon-Orchester Wiesbaden","text-white");
echo $o->helper->tag("h2","Dietmar Walther e.V.","text-white"); 
echo '</div>
</section>';
echo "</div>";
echo "<div class='container-fluid p-0 m-0 mainnavigation-bar' >";
	$o->navigation();
echo "</div>";
echo "</div>";
echo "<div class='container'>";
echo "<div class='row page-content'>"; 
echo "<div class='col-lg-9 col-md-8 col-sm-12 leftbar'>";
$load->loadPage();
echo "</div>"; 
echo "<div class='col-lg-3 col-md-4 col-sm-12 bg-faded rightbar pl-2 pr-2'>";
$termineaow->getClass();
$termineaow->getValues();
echo "</div>";
echo "</div>";
echo "</div>";
echo "</div>";
echo "<footer class='pb-0 pt-3 mb-0'>";
	$o->footerNavigation();
echo "</footer>";
$o->siteFoot();
$o->modalLichtbox();  
?>


