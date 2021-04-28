<?php 
require_once "model/class_public.php";
class startseite extends publicController{
public function getClass(){
echo $_REQUEST["controller"];
}
public function getValues(){
	$q="SELECT * FROM zb_startseite WHERE active=1 ORDER BY sort ASC";
	return self::select($q);
}

public function getPictures(){
	
	return self::select("SELECT * FROM zb_startgalerie WHERE active=1 ORDER BY sort");

}
}