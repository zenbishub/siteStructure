<?php
require_once '../model/class_admin.php';
$o = new admController();
$o->checkSession();
$o->deletePage();

echo "<!doctype html>
<html>
<head>";
echo $o->helper->meta("","","charset='utf-8'");
echo $o->helper->meta("name='viewport'","content='width=device-width, initial-scale=1'","");
echo $o->helper->tag("title",$o->websiteTitle());
echo $o->helper->addJs("jquery/jquery.js","");
echo $o->helper->addJs("jquery/form.min.js","");
echo $o->helper->addJs("jquery/jquery-ui.js","");
echo $o->helper->addJs("jquery/jte/jquery-te-1.4.0.min.js","");
echo $o->helper->addJs("bootstrap/js/bootstrap.js","");
echo $o->helper->addJs("script/jquery.Jcrop.min.js","");
echo $o->helper->addJs("script/adm.js","");



echo $o->helper->addCss("jquery/jquery-ui.css","");
echo $o->helper->addCss("jquery/jte/jquery-te.css","");
echo $o->helper->addCss("bootstrap/css/bootstrap.css","");
echo $o->helper->addCss("icon-font/font-awesome.min.css","");
echo $o->helper->addCss("css/crop.css");
echo $o->helper->addCss("css/adm.css");
echo "</head>
<body>";
 echo '<nav class="navbar navbar-light bg-secondary fixed-top">
<button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon topmenu"></span>
  </button>
  <a class="navbar-brand" href="#">';
  	echo $o->helper->image("img/aow_logo.png", "d-inline-block  align-top", "width='30' height='30'", "aow_logo.png");
   echo '<span class="h3 text-light ml-2">Dashboard</span>
  </a>'; 
  echo '<div class="collapse navbar-collapse" id="navbarNav">';
  $o->adminLeiste();
  echo '</div>';
echo '</nav>'; /* */
echo "<div class='row m-0'>";

 echo "<div class='col-12 col-md-3 leftside p-0 pb-1'>";  
$o->navigation();
echo "</div>"; 

 echo "<div class='col-12 col-md-9 rightside mt-4'>";

$o->loadPage();
$o->modalWindowGallery();
echo "</div>";
echo "</div>";
echo $o->helper->addJs("script/bootstrap-lightbox.js");

echo "</body>
</html>";