<?php 
require_once "model/class_public.php";
class akkordeonorchester extends publicController{
public function getClass(){
echo $_REQUEST["controller"];}
}