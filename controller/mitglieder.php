<?php 
require_once "model/class_public.php";
class mitglieder extends publicController{
	
public function getClass(){
return "Mitglieder";
}
public function getValues($limit){
	$currentPage = $_REQUEST['param']-1;
	if(!isset($_REQUEST['param'])){
	$currentPage = 0;
	}
	
	$start = $currentPage*$limit;
	$q="SELECT * FROM zb_".$_REQUEST["controller"]." WHERE active=1 ORDER BY sort ASC LIMIT $start, $limit";
	return self::select($q);
}
public function countRows($limit){
	$q="SELECT * FROM zb_".$_REQUEST["controller"]." WHERE active=1 ORDER BY sort ASC";
	return $rows= ceil(self::numRows($q)/$limit);
	
}

public function getPictures(){
	return self::select("SELECT * FROM zb_mitgliedergalerie WHERE active=1 ORDER BY sort");

}
}