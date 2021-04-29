<?php 
require_once "model/class_public.php";
class accento extends publicController{
public function getClass(){
echo $_REQUEST["controller"];
}
public function getValues(){
	$q="SELECT * FROM zb_".$_REQUEST["controller"]." WHERE active=1 ORDER BY sort ASC";
	return self::select($q);
}
public function getPictures(){
	return self::select("SELECT * FROM zb_".$_REQUEST["controller"]."galerie WHERE active=1 ORDER BY sort");
}
}