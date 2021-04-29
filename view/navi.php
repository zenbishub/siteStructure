<?php
 $o = new publicController();
 $active="";
 if(isset($_REQUEST['controller']) && $_REQUEST['controller']=="startseite"){
		$active = "active";
	}
echo "<div class='container' id='navcnt'>";
echo "<nav id='mainnavigation' class='navbar navbar-expand-md navbar-dark bg-dark' style='z-index: 10;'>";
 echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <span class="openspan" data-toggle="collapse" data-target="#navbarNavDropdown">öffnen</span>';
echo '<div class="collapse navbar-collapse" id="navbarNavDropdown">';
echo "<ul class='nav navbar-nav navbar-right'>";
echo "<li class='nav-item $active'>";
echo $o->asset->linkto(self::$base."startseite", $o->asset->icon("fa-home small")." Startseite", "" ,"nav-link");
echo "</li>";
echo '<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-music fa-fw small"></i> Orchester / Ensembles</a>
<div class="dropdown-menu ml-4" aria-labelledby="navbarDropdownMenuLink">';
echo $o->asset->linkto(self::$base."konzertorchester", $o->asset->icon("fa-angle-right small")." Konzertorchester", "" ,"dropdown-item pl-2");
echo $o->asset->linkto(self::$base."accento", $o->asset->icon("fa-angle-right small")." Accento", "" ,"dropdown-item pl-2");
echo $o->asset->linkto(self::$base."akkordissimo", $o->asset->icon("fa-angle-right small")." Akkordissimo", "" ,"dropdown-item pl-2");
echo $o->asset->linkto(self::$base."tonakkrobaten", $o->asset->icon("fa-angle-right small")." Ton-AKK.robaten", "" ,"dropdown-item pl-2");
    echo '</div>
      </li>';	
 foreach($o->getPages() as $page){
	 $active="";
	 if(isset($_REQUEST['controller']) && $_REQUEST['controller']==$page['page']){
		$active = "active";
		}
echo "<li class='nav-item $active'>
	<a href='".self::$base."".$page['route']."' class='nav-link'>".
	$o->asset->icon("fa-music small")." ".ucfirst($page['route'])."</a>
	</li>";
} 
if(isset($_SESSION['member'])){
	echo '<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLinkTwo" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-music fa-fw small"></i> Interner Bereich</a>
        <div class="dropdown-menu ml-4" aria-labelledby="navbarDropdownMenuLinkTwo">';
          echo "<a class='dropdown-item pl-2' href='".self::$base."nonpublic' class='nav-link'>".
		  $o->asset->icon("fa-eye small")." ".ucfirst("nonpublic")."</a>";
          echo "<a class='dropdown-item pl-2' href='".self::$base."mitglieder' class='nav-link'>".
		  $o->asset->icon("fa-eye small")." ".ucfirst("mitglieder")."</a>";
       echo '</div>
      </li>';	
}
echo "</ul>";
echo "</div>";
echo "</nav>"; 
echo "</div>";