<?php 
$o = new admController();
$o->deleteData($_REQUEST['deletedata'],$_REQUEST['id']);
$o->updateData($_REQUEST['update'], array("html"=>$_REQUEST['html']),"id=".$_REQUEST['id']);
$o->createSQLTable($_REQUEST['tablename'],$_REQUEST['formid']);
$o->setFormToPage();
echo "<div class='row ml-4 mb-4 mt-4'>";
echo "<h1 class='display-5'>Formulare</h1>";
echo "</div>";

echo "<div class='card m-2'>
  <h5 class='card-header'>Liste erstellte Formulare</h5>
  <div class='card-body'>";
	echo "<div class='container ml-4 mb-4 p-2'>";
	
	echo "<ul class='list-group-flush '>";
	foreach($o->getForms() as $form){
					$elemente = unserialize($form['elemente']);
					foreach($elemente as $key=>$value){
						$elems ="";
						foreach($value as $k=>$v){
							$elems .= "<li>".$k.":".$v."</li>";
						}
					}
		echo "<li class='list-group-item '>";
		echo "Seite(".$form['page'].") ".$form['formname']. "
		<a href='".$form['id']."' class='editformpattern'>bearbeiten</a>
		<a href='?p=forms&deletedata=zb_forms&id=".$form['id']."'>löschen</a> | 
		<a href='".$form['id']."' class='viewformpattern'>ansehen</a>";
		echo "<div class='row'>";
		echo "<div class='col col-8'>";
		echo "<ul>";
		echo $elems;
		echo "</ul>";
		echo "</div>";
		echo "<div class='col col-4'>";
		
		echo "<form method='post'>";
		echo "<select name='page' class='custom-select col-6'>";
		echo "<option value=''>auswahl</option>";
		foreach($o->getPagesAll() as $page){
			echo "<option value='".$form['id'].":".$page['page'].":".$page['id']."'>".$page['page']."</option>";
		}
		echo "</select>";
		echo "<input type='hidden' name='setformtopage' value='1'>";
		echo "<button class='btn-info'>ok</button>";
		
		echo "</form>";
		echo "</div>";
		echo "</li>";
		}
	
	
	echo "</ul>";
	
	echo "</div>";
		
	echo "</div>";
	echo "</div>";
	echo "</div>";