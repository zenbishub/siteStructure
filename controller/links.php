<?php 
require_once "model/class_public.php";
class links extends publicController{
public function getClass(){
return "Links";}
public function getValues(){
	$q="SELECT * FROM zb_links ORDER BY sort ASC";
	return self::select($q);
}

public function getPictures(){

	return self::select("SELECT * FROM zb_links galerie ORDER BY sort");

}
}