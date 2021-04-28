<?php
require_once 'class_public.php';

 class actions{
	private $o;
	
public function __construct(){
	$this->o = new publicController;
	$this->getLogin();
	$this->getLogout();
	$this->sendAdminMail();
	$this->setPageToNavi();
	$this->setInputForm($_POST);
	$this->o->deleteEntry();
	$this->savePageOrder();
	$this->saveItemOrder();
	$this->doDeleteColumn();
	$this->removeTypeFile();
	$this->getFormData();
	$this->getMemberLogin();
	$this->getMemberLogout();
	$this->getDgsvoConfirm();
	$this->getCheckCaptsha();
	$this->getChooseKategoprie();
	$this->getActiveEntry();
	$this->getModifyColumns();
	$this->getEntryView();
	if(isset($_REQUEST['file'])){
		$this->getDownloadFile($_REQUEST['file'],$_REQUEST['type']);
	}
	
}

private function getLogin(){
	$this->o->loginToSite();
}
private function getLogout(){
	$this->o->logoutFromSite();
}
private function sendAdminMail(){
	$this->o->getAdminMail();
}
private function setPageToNavi(){
	$this->o->setToNavi();
}
private function setInputForm($post){
	$this->o->inputForm($post);
}
private function doDeleteEntry(){
	$this->o->deleteEntry();
}
private function savePageOrder(){
	$this->o->pageOrder();
}
private function saveItemOrder(){
	$this->o->itemOrder();
}
private function doDeleteColumn(){
	$this->o->deleteColumn();
}
private function removeTypeFile(){
	$this->o->removeType();
}
private function getFormData(){
	$this->o->insertFormData();
}
private function getMemberLogin(){
	$this->o->memberLogin();
}
private function getMemberLogout(){
	$this->o->memberLogout();
}
private function getDgsvoConfirm(){
	$this->o->dgsvoConfirm();
}
private function getCheckCaptsha(){
	$this->o->checkCaptsha();
}
private function getChooseKategoprie(){
	$this->o->chooseKategorie();
}
private function getActiveEntry(){
	$this->o->activeEntry();
}
private function getModifyColumns(){
	$this->o->modifyColumns();
}
private function getEntryView(){
	$this->o->entryView();
}
private function getDownloadFile($filename,$type){
	$this->o->downloadFile($filename,$type);
}
} 
$action = new actions();
/*
interface Actionable{

	public function loginToSite();
		
	public function logoutFromSite();
		
	public function getAdminMail();
		
	public function setToNavi();
		
	public function inputForm($post);
		
	public function deleteEntry();
	
	public function pageOrder();
		
	public function itemOrder();
	

}
$action = new publicController();*/