<?php 
 require_once "../controller/".$_REQUEST["p"].".php";
$o=new $_REQUEST["p"]();
$o->updateData(substr("zb_".$_REQUEST["p"],0,-1), $_POST,"id=".$_REQUEST["id"]."");
$o->insertData(substr("zb_".$_REQUEST["p"],0,-1),$_POST);
echo $o->getClass();
echo "<div id='accordion'>
  <div class='card'>
    <div class='card-header' id='headingOne'>
      <h5 class='mb-0'>
        <button class='btn btn-link' data-toggle='collapse' data-target='#collapseOne' aria-expanded='false' aria-controls='collapseOne'>
           <i class='fa fa-plus-circle fa-fw'></i> Datensatz erstellen
        </button>
      </h5> 
    </div>
	<div id='collapseOne' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>
      <div class='card-body'>";echo "<div class=\"container p-4 ml-0 mb-4 mt-4\">";
	$o->getClassForm();
	echo "</div></div></div>";$arr=$o->getTable($_REQUEST["p"]);
	$o->showEntries($arr);
	echo "</div>";