<?php
require_once 'class_admin.php';

 class actions{
	private $o;
	
public function __construct(){
	$this->o = new admController;
	$this->getSearchMethod();
	
}

private function getSearchMethod(){
	$this->o->searchMethod();
}


} 
$action = new actions();