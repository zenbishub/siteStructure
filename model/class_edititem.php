<?php
require_once 'connect.php';

class editing extends connect{

public function __construct(){
	parent::__construct();
	
}
public function getTableData($tb){
		$q = "SELECT * FROM zb_pages";
		$arr = $this->select($q);
		//print_r($arr);
	
		foreach($arr as $page){
			
				if($tb == "zb_".$page['page']){
				$behavior = $page['behavior'];
			}
		}
		if(!empty($behavior)){
			$q ="SELECT * FROM ".substr($tb,0,-1)." ORDER by sort ASC";
			return array($this->select($q),$behavior);
		}
		if(empty($behavior)){
			$q="SELECT * FROM ".$tb."";
			return $this->select($q);
		}
		
}
public function getClassForm($tb,$id,$selectArray){
	
	
$arr=$this->getTableData($tb);

$form=$this->select("SELECT form FROM  zb_pages WHERE page='".substr($tb,3)."'");

$usform=unserialize($form[0]["form"]);
			

$vars=$this->getValues($tb,$id); 
$this->form("statisch","update",$vars,$usform,$selectArray);

}

public function form($prop,$action,$vars,$usform,$selectArray){
	
echo "<form method=\"post\" enctype=\"multipart/form-data\" >";

	foreach($usform as $colname=>$elem){

		echo $this->formElement($prop,$colname,$elem, $vars[0][$colname],$selectArray);
	
	}

	echo "<input type=\"hidden\" name=\"id\" value=\"".$_REQUEST['id']."\">
	<input type=\"hidden\" name=\"$action\" value=\"1\">
    <button type=\"submit\" class=\"btn btn-info ml-0 mt-4 mb-4 upd\">speichern</button>
	</div>
</form>";


}
public function formElement($prop,$colname,$elem, $value,$selectArray){
	
	$image="";
	$types = array("image/jpeg","image/png","image/gif");
	 switch($elem){
		 /* case "select":
		 return "<div class=\"form-group\">
		 <label for=\"$colname\">".ucfirst($colname)."</label><br><select name=\"$colname\" class=\"custom-select col-4\"><option value=\"\">bitte wählen</option></select></div>";

		 break; */
		case "input":
		case "text":
		return "<div class=\"form-group\">
		<label for=\"$colname\">".ucfirst($colname)."</label><input type=\"text\" name=\"$colname\" class=\"form-control col col-lg-4 $colname\"  value=\"$value\" placeholder=\"".ucfirst($colname)."\">
		</div>";
		break;
		case "password":
		return "<div class=\"form-group\">
		<label for=\"$colname\">".ucfirst($colname)."</label><input type=\"password\" name=\"$colname\" class=\"form-control col col-lg-4\" id=\"$colname\" value=\"$value\" placeholder=\"".ucfirst($colname)."\">
		</div>";
		break;
		case "email":
		return "<div class=\"form-group\">
		<label for=\"$colname\">".ucfirst($colname)."</label><input type=\"email\" name=\"$colname\" class=\"form-control col col-lg-4 \" id=\"$colname\" value=\"$value\" placeholder=\"".ucfirst($colname)."\">
		</div>";
		break;
		case "file":
		$type = mime_content_type("../pic/".$value);
		list($width,$height)=getimagesize("../pic/".$value);
		if(in_array($type,$types) && $prop == "statisch"){
			$image = "<div class='row'>
			<div class='col-6 col-md-2 mt-2 mb-2'><img src='pic/TN$value' width='100%' class='img-thumbnail'></div>
			<div class='col col-md-1 mt-2 mb-2 pl-0'>
			<span class='remove-file' alt='".$_REQUEST['tb']."-$colname-$value'><i class='fa fa-trash fa-fw'></i></span>
			<span class='crop-file' alt='".$value."' data-size='".$width.'x'.$height."'><i class='fa fa-crop fa-fw'></i></span>
			</div>
			</div>";
		}
		return "<div class=\"form-group\">
		<label for=\"".ucfirst($colname)."\">Datei: ".$value."</label><br>
		$image
		
		<div class=\"custom-file col col-lg-5\"> 
		<input type=\"file\" name=\"$colname\" class=\"custom-file-input \" id=\"$colname\" placeholder=\"".ucfirst($colname)."\" >
    <label class=\"custom-file-label\" for=\"$colname\">Datei wählen</label>
  </div></div>";
  		break;
		case "textarea":
		return "<div class=\"form-group\"><label for=\"$colname\">".ucfirst($colname)."</label><textarea class=\"editor form-control col-10\" name=\"$colname\" id=\"$colname\" rows=\"3\" placeholder=\"".ucfirst($colname)."\" >".$value."</textarea></div>";
		break;
		case "button":
		return "<button class=\"btn btn-info m-2 \">ok</button>"; 
		break;
		case "select":
		
		$select =  "<div class=\"form-group\"><label for=\"$colname\">".ucfirst($colname)."</label><select class=\"form-control col-3\" name=\"$colname\">";
		if(!empty($value)){
			$select .= "<option value=\"$value\">$value</option>";
		}else{
			$select .= "<option value=\"\">bitte wählen</option>";
		}
		foreach($selectArray as $item){
		 $select .= "<option value='".$item[2]."'>".$item[2]."</option>";
		}
		$select .="</select></div>";
		return $select;
		break;
		case "unvisible":
		return "<input type='hidden' name='$colname' class='$colname' value='$value' >";
		break; 
	}
	
}
public function getValues($tb,$id){
	return $arr = $this->select("SELECT * FROM ".$tb." WHERE id=$id"); 
}
public function getForm($id){
	
	$arr = $this->select("SELECT * FROM zb_forms WHERE id=$id");
	echo "<h5>".$arr[0]['formname']."</h5>";
	$form = unserialize($arr[0]['elemente']);
	
	if(isset($_REQUEST['viewform'])){
		
	foreach($form as $formname){
		foreach($formname as $colname=>$element){
			echo $this->formElement("",$colname,$element,"","");
			}
	}
	}
	if(isset($_REQUEST['editform'])){
		
		
		$tbexist = $this->select("SELECT table_name FROM information_schema.tables WHERE table_name = 'zb_".$arr[0]['formname']."'");
		
		if(empty($tbexist[0]['table_name'])){
		echo "benötigt Tabelle <strong>".$tbexist[0]['table_name']."</strong>";
		echo "<form method='post'><div class=\"form-group\">
		<label for=\"sql\">SQL-Tabelle</label>
		<input type='hidden' name='createtable' value='1'>
		<input type='hidden' name='formid' value='".$arr[0]['id']."'>
		<button class='btn btn-info m-2'>Tabelle erstellen</button>
		</div></form>";
		}else{
		echo " Tabelle <strong>".$tbexist[0]['table_name']."</strong> wurde erstellt";
		}
		echo "<form method='post'>";
		echo "<input type='hidden' name='update' value='zb_forms'>";
		echo "<input type='hidden' name='id' value='".$arr[0]['id']."'>";
		echo "<input type='submit' class='btn btn-info m-2' value='ändern'>";
		echo "<div class=\"form-group\"><label for=\"$colname\">$colname</label><textarea class=\"form-control col-10\" name=\"html\" id=\"html\" rows=\"10\" >".$arr[0]['html']."</textarea>";
		
		echo "</form>";
	}
}
public function getColumnForm(){
	if(isset($_REQUEST['lastcolname'])){
		$last = $_REQUEST['lastcolname'];
		$tb = $_REQUEST['totable'];
		echo "<div class='col col-'>";
		echo "<form method='post' onSubmit='return changeEntry(this)'>";
		echo "<div class='form-group'>
		<label for='newcolname'>Spaltenname (wird immer am Ende hinzugefügt)</label>
		<input type='text' name='newcolname' class='form-control col-4 ' id='newcolname' >
		<input type='hidden' value='$last' name='addlastcolname'>
		<input type='hidden' value='$tb' name='totable'>
		<button class='btn btn-info mt-2'>ok</button>
		</div>";
		echo "</form>";
		echo "</div>";
	}	

}


}