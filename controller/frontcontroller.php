<?php 

class frontController{
	
public function loadPage(){
	
	if(isset($_REQUEST['controller'])){
		
		if(file_exists("view/".$_REQUEST['controller'].".php")){
			
		include("view/".$_REQUEST['controller'].".php");	
		}else{
			include("view/404.php");	
		}
	}
	if(!isset($_REQUEST['controller'])){
		include("view/startseite.php");	
		//header("location:".$this->base."../$default");
		
		}
	if(isset($_REQUEST['controller']) && $_REQUEST['controller'] =="lg" ||
	isset($_REQUEST['controller']) && $_REQUEST['controller'] =="adm"){
		
		
		header("location:".self::$base."../index.php");	
		}
	if(isset($_REQUEST['controller']) && $_REQUEST['controller'] =="logout"){
		header("location:".self::$base."../model/actions.php?logout=1");	
		}
	} 
}
$load = new frontController();