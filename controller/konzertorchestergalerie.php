<?php 
require_once "model/class_public.php";
class konzertorchestergalerie extends publicController{
public function getClass(){
echo $_REQUEST["controller"];}
}