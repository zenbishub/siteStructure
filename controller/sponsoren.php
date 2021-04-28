<?php 
require_once "model/class_public.php";
class sponsoren extends publicController{
public function getClass(){
return  "Sponsoren";
}
public function getValues(){
	$q="SELECT * FROM zb_sponsoren ORDER BY sort ASC";
	return self::select($q);
}

public function getPictures(){

	return self::select("SELECT * FROM zb_sponsorengalerie ORDER BY sort");

}
}