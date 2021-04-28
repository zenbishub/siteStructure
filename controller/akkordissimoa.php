<?php 
require_once "../model/class_admin.php";
class akkordissimoa extends admController{
public function __construct(){
parent::__construct();
}
public function getClass(){
$arr=$this->getTableData("zb_".$_REQUEST["p"]);
return "<h1>".ucfirst(substr($_REQUEST["p"],0,-1))." / <span class=\"smaller\">".$arr[1]."</span></h1>";
}
public function getTable($page){
$tb=substr($page,0,-1);
$q="SELECT * FROM zb_$tb ORDER BY sort ASC";
return $arr=$this->select($q);
}
public function getClassForm(){
$arr=$this->getTableData("zb_".$_REQUEST["p"]);

$form=$this->select("SELECT form FROM  zb_pages WHERE page='".substr($_REQUEST["p"],0,-1)."'");

$usform=unserialize($form[0]["form"]);
			
switch($arr[1]){
case "blog":
$this->form("blog","insert","",$usform);
break;
case "statisch":
$vars=$this->getValues("zb_".$_REQUEST["p"]); 
$this->form("statisch","update",$vars,$usform);
break;
}
}

public function form($prop,$action,$vars,$usform){
	
echo "<form method=\"post\" enctype=\"multipart/form-data\">";

	foreach($usform as $colname=>$elem){

		echo $this->formElement($prop,$colname,$elem, $vars[0][$colname],$selectArray);
	
	}

	if($prop=="statisch"){echo "<input type=\"hidden\" name=\"id\" value=\"1\">";}

	echo "<input type=\"hidden\" name=\"$action\" value=\"1\">
    <button type=\"submit\" class=\"btn btn-info ml-0 mt-4\">speichern</button>
	</div>
</form>";


}
}