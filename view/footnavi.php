<?php
$o = new publicController();
$pagesFoot = $o->getFootPages();
echo "<div class='container'>";
echo "<div class='row m-0'>";
echo "<div class='col-2'></div>";
  echo '<ul class="col-sm-12 col-md-3 pl-5">';
     foreach($pagesFoot[0] as $page){
	echo "<li class='nav-item text-light'>";
	echo $o->asset->linkto(self::$base."".$page['page'],$o->asset->icon("fa-music small")." ".ucfirst($page['page']),"","nav-link text-light p-0 m-0 small");
	echo "</li>";
} 
echo'</ul>';

echo '<ul class="col-sm-12 col-md-3 pl-5">';
     foreach($pagesFoot[1] as $page){
	echo "<li class='nav-item text-light '>";
	echo $o->asset->linkto(self::$base."".$page['page'],$o->asset->icon("fa-music small")." ".ucfirst($page['page']),"","nav-link text-light p-0 m-0 small");
	echo "</li>";
} 
echo'</ul>';
echo '<ul class="col-sm-12 col-md-3 pl-5">';
     foreach($pagesFoot[2] as $page){
	echo "<li class='nav-item text-light '>";
	echo $o->asset->linkto(self::$base."".$page['page'],$o->asset->icon("fa-music small")." ".ucfirst($page['page']),"","nav-link text-light p-0 m-0 small");
	echo "</li>";
} 
echo "<li class='nav-item text-light '>";
echo $o->asset->linkto(self::$base."links-sponsoren",$o->asset->icon("fa-music small")." Links & Sponsoren","","nav-link text-light p-0 m-0 small");

echo "</li>";
echo'</ul>';

echo "</div>";
echo "</div>";
echo "<div class='row m-0'>
		<div class='container text-center p-0'>
		<div class='copyright text-light small'>@alle Rechte vorbehalten AOW, created by <a href='http://www.zenbis.de' class='text-light'>ZENBIS Webdesign</a></div>
		</div>;
		</div>";
