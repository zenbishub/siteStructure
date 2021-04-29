<?php 
require_once "model/class_public.php";
class startgalerie extends publicController{
public function getClass(){
echo $_REQUEST["controller"];}

public function getPictures(){
	return self::select("SELECT * FROM zb_startgalerie WHERE active=1 ORDER BY sort");
} 
}