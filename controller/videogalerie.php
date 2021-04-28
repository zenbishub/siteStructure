<?php 
require_once "model/class_public.php";
class videogalerie extends publicController{
public function getClass(){
return "Videogalerie";
}
public function getValues(){
	$q="SELECT * FROM zb_".$_REQUEST["controller"]." WHERE active=1 ORDER BY sort ASC";
	return self::select($q);
}
public function getVideoId($videouri){
	$expl = explode("=",$videouri);
	return $expl[1];

}
public function getPictures(){

	return self::select("SELECT * FROM zb_".$_REQUEST["controller"]."galerie WHERE active=1 ORDER BY sort");

}
}