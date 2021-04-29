<?php
$o = new publicController();
$pg = $o->getTopPages();
echo "<div class='topheader-top'>";
echo "<div class='container'>";
	echo '<nav id="topnavigation" class="navbar navbar-expand-md navbar-dark">';
 	echo '<button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon topmenu"></span>
  </button><span class="openspan" data-toggle="collapse" data-target="#navbarNav">öffnen</span> ';
  	echo '<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">';
      
     foreach($o->getTopPages() as $page){
	echo "<li class='nav-item'>";
	echo $o->asset->linkto(self::$base."".$page['page'], $o->asset->icon("fa-music fa-fw small")." ".ucfirst($page['page']), "" ,"nav-link text-topmenu");
	echo "</li>";
} 
if(!isset($_SESSION['member'])){
	echo "<li class='nav-item'><a href='".self::$base."' class='nav-link userlogin text-topmenu' data-toggle='modal' data-target='#loginModal'><i class='fa fa-user fa-fw small'></i> login</a></li>"; 
}if(isset($_SESSION['member'])){
	echo "<li class='nav-item'><a href='".self::$base."model/actions.php?mlogout=member' class='nav-link text-topmenu'><i class='fa fa-power-off fa-fw small'></i> logout</a></li>";
}
echo'
    </ul>
  </div>
</nav>'; 
echo "</div>";
echo "</div>";
