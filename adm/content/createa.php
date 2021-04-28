<?php

$o = new admController();
$o->createnewsite();
$o->createnewform();
$o->addNewColumn();
$o->insertData($_REQUEST['insert'], $_POST);
$checkPlugin = $o->checkPlugins();
echo "<div class='row m-0 p-0'>";
echo "<h1 class='display-5'>Erstellen</h1>";
echo "</div>";

echo "<ul class='nav nav-tabs bg-light' id='myTab' role='tablist'>
  <li class='nav-item'>
    <a class='nav-link active' id='seiten-tab' data-toggle='tab' href='#seiten' role='tab' aria-controls='seiten' aria-selected='true'>Seiten</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' id='addseite-tab' data-toggle='tab' href='#addseite' role='tab' aria-controls='addseite' aria-selected='false'>Seite erstellen</a>
  </li>
  <li class='nav-item'>
    <a class='nav-link' id='formgenerate-tab' data-toggle='tab' href='#formgenerate' role='tab' aria-controls='formgenerate' aria-selected='false'>Form Generator</a>
  </li>";
  foreach($checkPlugin as $plugin){
	  
	if(!empty($plugin)){
	echo "<li class='nav-item'>
    <a class='nav-link' id='$plugin-tab' data-toggle='tab' href='#$plugin' role='tab' aria-controls='$plugin' aria-selected='false'>".ucfirst($plugin)."</a>
  </li>";
	}
	
	}
echo "</ul>";
// Anfang Nav
echo "<div class='tab-content' id='tabContent'>";
  	echo"<div class='tab-pane fade show active' id='seiten' role='tabpanel' aria-labelledby='seiten-tab'>";
		echo "<div class='card m-0'>
	  <h5 class='card-header'>Seiten</h5>
	  <div class='card-body p-0 pt-4'>";
		echo "<div class='container mb-4'>";
		echo "<div class='row '>";
		echo "<div class='col mb-1 bg-light'>";
		echo "<div class='col text-right p-0'><button class='btn-info mt-2 mb-2 savepageorder'><i class='fa fa-floppy-o fa-fw'></i> speichern</button></div>";
		
		echo $o->successAction($_REQUEST["addtonavi"],"success","Änderung ist eingetragen");
		echo '<div id="accordion">';
		echo "<ul class='list-group orderpages'>";
		$i =1;
		foreach($o->getPagesAll() as $page){
			if($page['page']!="index"){
			$behavior = $page['behavior'];
			
			$kategorie = $o->select("SELECT * FROM zb_kategorie WHERE kat_id = ".$page['kategorie']."");
		echo "<li class='list-group-item mb-2 p-1 itemsintable' alt='".$page['id']."'>";
		
		
		echo '<div class="card ">
    <div class="card-header m-0 p-0" id="heading'.$i.'">
      <div class="mb-0 ">
	  
     <button class="btn btn-link col-9 text-left" data-toggle="collapse" data-target="#collapse'.$i.'" aria-expanded="true" aria-controls="collapse'.$i.'">';
	   echo  ucfirst($page['page']);
       echo ' </button>';
	   echo '<span class="col-2">'.$kategorie[0]['kat_name'].'</span>';
	   echo '<span class="schieber mr-1 fa fa-arrows-v fa-fw col-1 text-center"></span>
      </div>
    </div>

    <div id="collapse'.$i.'" class="collapse" aria-labelledby="heading'.$i.'" data-parent="#accordion">
      <div class="card-body pt-2 pb-2">';
        echo "<div class='card-actions p-2 mb-2 bg-info text-light rounded'>
		<abbr title='bestehender Dokument' class='initialism'>".ucfirst($page['page'])."</abbr> ($behavior) <a href='?p=".$_REQUEST['p']."&delpage=".$page['id']."&pagename=".$page['page']."' class='delete-file'><span class='badge badge-secondary'>löschen</a>";
		echo $o->inMenu($page['id']);
		echo $o->inTopMenu($page['id']);
		echo $o->inFootMenu($page['id']);
		echo $o->inAdminMenu($page['id']);
		echo $o->inKategorie($page['id']); 
		echo "</div>";
		echo "<form method='post' action='../model/actions.php' onSubmit='return changeEntry(this)'>";
		$o->formSwitcher($page['id'],$page['form'],$page['page']);
		echo "</form>";
      echo '</div>
    </div>
  </div>';
		
		echo "</li>";
		$i++;
			}
		}
		echo "</ul>";
		echo "</div>";
		
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
		echo "</div>";
  		echo "</div>";
 
  echo "<div class='tab-pane fade' id='addseite' role='tabpanel' aria-labelledby='addseite-tab'>";
  //
  echo "<div class='card m-0'><h5 class='card-header'>Seite erstellen</h5><div class='card-body'>";
	echo "<div class='container mb-4'>";
	echo "<form method='post' onSubmit='return changeEntry(this)'>";
	echo "<div class='row col-12 col-md-6 pt-2'>";
	echo "<div class='col-12 col-md-5 mb-1'>";
	echo "<select name='menu' class='custom-select'>";
	echo "<option value='1'>Hauptnavi</option>";
	echo "<option value='2'>Toptnavi</option>";
	echo "<option value='3'>Footernavi</option>";
	echo "<option value='0'>kein Navi</option>";
	echo "</select>";
	echo "</div>";
	echo "</div>";
	echo "<div class='row col-12 col-md-6 pt-2'>";
	echo "<div class='col-12 col-md-5 mb-1'>";
	echo "<select name='behavior' class='custom-select'>";
	echo "<option value='blog'>Blog</option>";
	echo "<option value='statisch'>Statisch</option>";
	echo "</select>";
	echo "</div>";
	echo "</div>";	
	echo "<div class='row col-12 col-md-6 pt-2'>";
	echo "<div class='col-12 col-md-5 mb-1'>";
	echo "<input type='search' name='page' class='adm-input form-control' placeholder='Seitenname'>";
	echo "<input type='hidden' name='createnewsite' value='1'>";
	echo "</div>";
	echo "</div>";
	echo "<div class='row text-center col-6'>";
	echo "<div class='col col-4 mb-1'>";
	echo "<button class='adm-button btn-info'>ok</button>";
	echo "</div>";
	echo "</div>";
	echo "</form>";
	echo "</div>";
	echo "</div>";
  	echo "</div>";
	//
  	echo"</div>";
	
	
  	echo"<div class='tab-pane fade' id='formgenerate' role='tabpanel' aria-labelledby='formgenerate-tab'>";
	//
  	echo "<div class='card m-0'><h5 class='card-header'>Form Generator</h5><div class='card-body'>";
	echo "<div class='container mb-4'>";
	echo "<h5>Schablone erstellen</h5>";
	echo "<form method='post' onSubmit='return changeEntry(this)'>";
	echo "<div class='row col-6'>";
	echo "<div class='col col-4 mb-1'>";
	echo "<input type='search' name='formname' class='adm-input form-control' placeholder='Formname'>";
	echo "</div>";
	echo "<div class='col col-4 mb-1'>";
	echo "<select name='behavior' class='custom-select'>";
	echo "<option value='keine'>Keine Datenverarbeitung</option>";
	echo "<option value='insertdata'>Daten eintragen</option>";
	echo "<option value='selectdata'>Daten abfragen</option>";
	
	echo "</select>";
	echo "</div>";
	echo "</div>";
	echo "<div class='row col'>";
	$lf=1;
	foreach($o->formElemente() as $elem){
		echo "<div class='col  m-1 p-0'>";
		echo "<label for='$elem' class='small'>Feld $lf:</label>";
		echo "<input type='search' name='feldname[]' class='adm-input form-control' placeholder='Feldname'>";
		echo "<select name='formelement[]' id='$elem' class='custom-select'>";
		echo "<option value=''>keine</option>";
		foreach($o->formElemente() as $key=>$input){
		echo "<option value='$key'>$input</option>";
		}
		
		echo "</select>";
		echo "</div>";
		$lf++;
	}
	echo "</div>";
	echo "<div class='row col-6'>";
	echo "<div class='col col-4 mb-1 mt-1'>";
	echo "<input type='hidden' name='createnewform' value='1'>";
	echo "</div>";
	echo "</div>";
	echo "<div class='row text-center col-6'>";
	echo "<div class='col col-4 mb-1'>";
	echo "<button class='adm-button btn-info'>ok</button>";
	echo "</div>";
	echo "</div>";
	echo "</form>";
	echo "</div>";
	echo "</div>";
	echo "</div>";
	//
	echo "</div>";
	
	echo "<div class='tab-pane fade ' id='kategorie' role='tabpanel' aria-labelledby='kategorie-tab'>";
	//
	echo "<div class='card m-0'>
	<h5 class='card-header'>Kategorie</h5>
	<div class='card-body'>";
	echo "<div class='container mb-4 p-4'>"; 
	echo "<form method='post' onSubmit='return changeEntry(this)'>";
	
	echo "<div class='row col-4'>";
	echo "<div class='col col-6 mb-2'>";
	echo "<input type='search' name='kat_id' class='adm-input form-control ' placeholder='ID-Kategorie'>";
	echo "</div>";
	echo "</div>";
	echo "<div class='row col-4'>";
	echo "<div class='col mb-2'>";
	echo "<input type='search' name='kat_name' class='adm-input form-control' placeholder='Kategoriename'>";
	echo "</div>";
	echo "</div>";
	
	echo "<input type='hidden' name='insert' value='zb_kategorie'>";
	
	echo "<div class='row text-center col-6'>";
	echo "<div class='col col-4 mb-1'>";
	echo "<button class='adm-button btn-info'>ok</button>";
	echo "</div>";
	echo "</div>";
	
	
	echo "</form>";
	echo "</div>";
	echo"</div>";

	echo "<div class='card'>";
	echo "<div class='card-header'>alle Kategorien</div>";
	echo "<div class='card-body'>";
	echo "<div class='col text-right p-0'><button class='btn-info mt-2 mb-2 savepageorder'><i class='fa fa-floppy-o fa-fw'></i> speichern</button></div>";
	echo "<ul class='list-group orderpages'>";
	
	foreach($o->getAllKategorie() as $kategorie){
		echo "<li class='list-group-item bg-light itemsintable' alt='".$kategorie['id']."' title='zb_kategorie'>
		<div class='row'>
		<div class='col-9'>".$kategorie['kat_name']."</div>
		 <div class='col-2 text-center' ><a href='../model/actions.php?deleteEntry=1&id=".$kategorie['id']."&tb=zb_kategorie' class='nav-link'>löschen</a></div>
		 </div>
		 </li>";
	}
	echo  "</div>";
	echo "</div>";


	echo"</div>";
	//
	echo"</div>";
  	
	
	
	
	//Ende Nav
	echo"</div>";
	
	




	
	