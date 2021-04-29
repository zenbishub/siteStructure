<?php 
require_once "model/class_public.php";
class kontakt extends publicController{

public function getClass(){
echo $_REQUEST["controller"];}
public function getValues(){
	$q="SELECT * FROM zb_".$_REQUEST["controller"]." ORDER BY sort ASC";
	return self::select($q);
}
public function getPictures(){
	return self::select("SELECT * FROM zb_".$_REQUEST["controller"]."galerie ORDER BY sort");

}
public function getForm(){
	return self::select("SELECT * FROM zb_forms WHERE formname='".$_REQUEST["controller"]."'");

}
 public function kontktSended() {
	 
	 if($_REQUEST['param'] == "send" && $_REQUEST['param2']=="success"){
	 return '<div class="alert alert-success" role="alert">Ihre Nachricht wurde erfolgreich versendet</div>';
	}/**/
	if($_REQUEST['param'] == "send" && $_REQUEST['param2']=="failed"){
	 return '<div class="alert alert-danger" role="alert">Fehler: Ihre Nachricht wurde nicht versendet</div>';
	} 
} 
}