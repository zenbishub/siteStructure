<?php 
require_once "model/class_public.php";
class nonpublic extends publicController{
public function getClass(){
echo $_REQUEST["controller"];
}
public function getValues(){
	$q="SELECT * FROM zb_".$_REQUEST["controller"]." ORDER BY sort ASC";
	return self::select($q);
}

public function getPictures(){

	return self::select("SELECT * FROM zb_".$_REQUEST["controller"]."galerie ORDER BY sort");

}
public function searchFile($file){
	
	$dirs = array("media/","pic/","docs/");
	
	$path ="adm/";
	foreach($dirs as $dir){
		
		$scanned_directory = array_diff(scandir($path.$dir), array('..', '.'));
	
		foreach($scanned_directory as $sfile){
			if($sfile == $file){
			$filetype = mime_content_type($path.$dir.$file);
			$type = explode("/",$filetype);
				
						switch($type[0]){
						case "image":
						return  array("pic/","image");
						break;
						case "audio":
						return array("media/","audio");
						break;
						default:
						return array("docs/","doc");
					}
				
		}
		
	}
	
}

}
}