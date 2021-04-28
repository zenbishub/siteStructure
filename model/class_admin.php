<?php
require_once 'connect.php';

class admController extends connect{
	
public function __construct(){
	parent::__construct();
}
public function uConvert($string){
	
	$search = str_replace("ue","ü", $string);
	$search2 = str_replace("ae","ä", $search);
	$search3 = str_replace("oe","ö", $search2);
	return $search3;
}
public function getPageSwitcher(){
	$q="SELECT  onoff FROM zb_switcher";
	$arr = $this->select($q);
	switch($arr[0]['onoff']){
		case 1:
		return  "<span class='page-online'>online</span>";
		break;
		case 0:
		return  "<span class='page-offline'>offline</span>";
		break;	
	}
}
public function checkSession(){
	if(!isset($_SESSION['admin']) && !isset($_SESSION['webmaster'])){
		header("location: ".$this->base."../../");
	}
}
public function websiteTitle(){
	$arr = $this->select("SELECT title FROM zb_websitetitle");
	return $arr[0]['title'];
}
public function switcher(){
	if(isset($_REQUEST['switch'])){
		$switcher = $_REQUEST['onoffswitcher'];
		 $done = $this->update("zb_switcher",array("onoff"=>$switcher),"id=1");
		 if(!empty($done)){
			echo "<div class='action-success'>$done</div>";	 
		}
	}
}
public function getPages($kategorie){
		return $this->select("SELECT * FROM zb_pages WHERE kategorie=$kategorie AND admmenu=1 ORDER BY sort ASC");
}
public function getPagesAll(){
		return $this->select("SELECT * FROM zb_pages ORDER BY sort ASC");
}
public function getAllKategorie(){ 
		return $this->select("SELECT * FROM zb_kategorie ORDER BY sort ASC");
}
public function deletePage(){
	if(isset($_REQUEST['delpage'])){
		$done = $this->delete("zb_pages","id",$_REQUEST['delpage']);
		$this->query("DROP TABLE zb_".$_REQUEST['pagename']."");
		if(!empty($done)){
			unlink("content/".$_REQUEST['pagename'].".php");
			unlink("../view/".$_REQUEST['pagename'].".php");
			unlink("../controller/".$_REQUEST['pagename'].".php");
			unlink("content/".$_REQUEST['pagename']."a.php");
			unlink("../controller/".$_REQUEST['pagename']."a.php");
			echo "<div class='action-success'>$done</div>";	 
		}
	}
}
public function deleteData($tb,$id){
	if(isset($_REQUEST['deletedata'])){
		$tb = $_REQUEST['deletedata'];
		$id=$_REQUEST['id'];
		$done=$this->delete($tb, "id", $id);
		$arr = $this->select("SELECT formname FROM $tb WHERE id=$id");
		$this->query("DROP TABLE zb_".strtolower($arr[0]['formname'])); 
		if(!empty($done)){
		echo "<div class='action-success'>$done</div>";
		}
	}
}
public function loadPage(){
	if(isset($_REQUEST['p'])){
		include("content/".$_REQUEST['p'].".php");	
	}else{
		include("content/settingsa.php");	
	}
}
public function navigation(){
	include 'content/navi.php';
}
public function adminLeiste(){
		echo "<nav class='adminleiste nav nav-bar bg-light rounded'>";
		echo "<li class='nav-item'><a href='".$this->base."' class='nav-link text-secondary'><i class='fa fa-home fa-fw'></i> Webseite</a></li>";
		echo "<li class='nav-item'><a href='".$this->base."/model/actions.php?logout=1' class='nav-link text-secondary'> <i class='fa fa-power-off fa-fw'></i>logout</a></li>";
		echo "</nav>";	
	
} 
public function createNewSiteTable($tb){
	$q="CREATE TABLE `zb_$tb`(`id` INT  (11) NOT NULL AUTO_INCREMENT  ,
	`column1` TEXT  NULL ,
	`active` INT(1) DEFAULT 1,
	`sort` INT(3) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB";
	$this->query($q);
	$this->insert("zb_$tb",array("column1"=>"Text Column 1"));
}
public function siteCodeAdmin(){

	$string ="<?php ".PHP_EOL."";
	$string .=' require_once "../controller/".$_REQUEST["p"].".php";'.PHP_EOL.'';
	$string .='$o=new $_REQUEST["p"]();'.PHP_EOL.'';
	$string .= '$o->updateData(substr("zb_".$_REQUEST["p"],0,-1), $_POST,"id=".$_REQUEST["id"]."",900);'.PHP_EOL.'';
	$string .= '$o->insertData(substr("zb_".$_REQUEST["p"],0,-1),$_POST,900);'.PHP_EOL.'';
	$string .='echo $o->getClass();'.PHP_EOL.'';
	$string .="echo \"<div id='accordion'>
  <div class='card'>
    <div class='card-header' id='headingOne'>
      <h5 class='mb-0'>
        <button class='btn btn-link' data-toggle='collapse' data-target='#collapseOne' aria-expanded='false' aria-controls='collapseOne'>
          <i class='fa fa-plus-circle fa-fw'></i> Datensatz erstellen / bearbeiten
        </button>
      </h5> 
    </div>
	<div id='collapseOne' class='collapse' aria-labelledby='headingOne' data-parent='#accordion'>
      <div class='card-body'>\";";
$string .= 'echo "<div class=\"container p-1 p-lg-4 ml-0 mb-4 mt-4\">";
	$o->getClassForm();
	echo "</div></div></div>";';
$string .= '$arr=$o->getTable($_REQUEST["p"]);
	$o->showEntries($arr);
	echo "</div>";';
	return $string;
}
public function controlCodeAdmin(){
			$string = "<?php ".PHP_EOL."";
			$string .= 'require_once "../model/class_admin.php";'.PHP_EOL.'';
			$string .= 'class classname extends admController{'.PHP_EOL.'public function __construct(){'.PHP_EOL.'parent::__construct();'.PHP_EOL.'}'.PHP_EOL.'public function getClass(){'.PHP_EOL.'$arr=$this->getTableData("zb_".$_REQUEST["p"]);'.PHP_EOL.'return "<h1>".ucfirst(substr($_REQUEST["p"],0,-1))." / <span class=\"smaller\">".$arr[1]."</span></h1>";'.PHP_EOL.'}'.PHP_EOL.'public function getTable($page){'.PHP_EOL.'$tb=substr($page,0,-1);'.PHP_EOL.'$q="SELECT * FROM zb_$tb WHERE active=1 ORDER BY sort ASC";'.PHP_EOL.'return $arr=$this->select($q);'.PHP_EOL.'}'.PHP_EOL.'public function getClassForm(){'.PHP_EOL.'$arr=$this->getTableData("zb_".$_REQUEST["p"]);'.PHP_EOL.'
$form=$this->select("SELECT form FROM  zb_pages WHERE page=\'".substr($_REQUEST["p"],0,-1)."\'");'.PHP_EOL.'
$usform=unserialize($form[0]["form"]);'.PHP_EOL.'			
switch($arr[1]){'.PHP_EOL.'case "blog":'.PHP_EOL.'$this->form("blog","insert","",$usform);'.PHP_EOL.'break;'.PHP_EOL.'case "statisch":'.PHP_EOL.'$vars=$this->getValues("zb_".$_REQUEST["p"]); '.PHP_EOL.'$this->form("statisch","update",$vars,$usform);'.PHP_EOL.'break;'.PHP_EOL.'}'.PHP_EOL.'}'.PHP_EOL.'
public function form($prop,$action,$vars,$usform){
	'.PHP_EOL.'echo "<form method=\"post\" enctype=\"multipart/form-data\">";'.PHP_EOL.'
	foreach($usform as $colname=>$elem){'.PHP_EOL.'
		echo $this->formElement($prop,$colname,$elem, $vars[0][$colname],$selectArray);'.PHP_EOL.'	
	}'.PHP_EOL.'
	if($prop=="statisch"){echo "<input type=\"hidden\" name=\"id\" value=\"1\">";}'.PHP_EOL.'
	echo "<input type=\"hidden\" name=\"$action\" value=\"1\">
    <button type=\"submit\" class=\"btn btn-info ml-0 mt-4\">speichern</button>
	</div>
</form>";'.PHP_EOL.'

}'.PHP_EOL.'}';
			return $string;	
}
public function createnewsite(){
	if(isset($_REQUEST['createnewsite'])){
		
		switch($_REQUEST['menu']){
				case 0:
				case 1:
				$menu = "menu";
				break;
				case 2:
				$menu = "topmenu";
				break;
				case 3:
				$menu = "footmenu";
				break;
		}
		 $done = $this->insert("zb_pages",array(
		"page"=>$_REQUEST['page'],
		"route"=>$_REQUEST['page'],
		$menu=>$_REQUEST['menu'],
		"behavior"=>$_REQUEST['behavior']
		));
		if(!empty($done)){
			
			$pathAdm= "content/".$_REQUEST['page']."a.php";
			$pathPublic= "../view/".$_REQUEST['page'].".php";
			$pathPublicController = "../controller/".$_REQUEST['page'].".php";
			$pathAdmController = "../controller/".$_REQUEST['page']."a.php";
			
			$codeAdm = $this->siteCodeAdmin();
			$codePublic = "<?php ".PHP_EOL."";
			$codePublic .= 'require_once "controller/".$_REQUEST["controller"].".php";'.PHP_EOL.'';
			$codePublic .= '$o=new $_REQUEST["controller"]();'.PHP_EOL.'';
			$codePublic .= '$arr=$o->getValues();$array = $o->getPictures();echo "<div class=\"container mb-4 mt-4\"><h2>".$arr[0]["ueberschrift"]."</h2><hr>";';
			$codePublic .= 'if(count($array)>0){$o->mainCaroussel($_REQUEST["controller"],$array);  }
echo "<p>".$arr[0]["textinhalt"]."</p>";
echo "</div>";
 $i=1;
do{
echo "<div class=\"container mb-4 mt-4\">
<h2>".$arr[$i]["ueberschrift"]."</h2>";
echo "<p>".$arr[$i]["textinhalt"]."</p>";
echo "</div>";
$i++;
}while($i<count($arr)); ';
			
			$classnamePub=$_REQUEST['page'];
			$classnameAdm=$_REQUEST['page']."a";
			
			$codePublicController = "<?php ".PHP_EOL."";
			$codePublicController .= 'require_once "model/class_public.php";'.PHP_EOL.'';
			$codePublicController .= 'class classname extends publicController{'.PHP_EOL.'public function getClass(){'.PHP_EOL.'echo $_REQUEST["controller"];}'.PHP_EOL.'public function getValues(){
	$q="SELECT * FROM zb_".$_REQUEST["controller"]." WHERE active=1 ORDER BY sort ASC";
	return self::select($q);
}'.PHP_EOL.'
public function getPictures(){'.PHP_EOL.'
	return self::select("SELECT * FROM zb_".$_REQUEST["controller"]."galerie WHERE active=1 ORDER BY sort");'.PHP_EOL.'
}'.PHP_EOL.'}'; 
			
			$codeAdmController = $this->controlCodeAdmin();
			
			file_put_contents($pathAdm,$codeAdm);
			file_put_contents($pathPublic,$codePublic);
			file_put_contents($pathPublicController,str_replace("classname","$classnamePub",$codePublicController));
			file_put_contents($pathAdmController,str_replace("classname","$classnameAdm",$codeAdmController));
			
			$this->createNewSiteTable($_REQUEST['page']);
			echo "<div class='action-success'>$done</div>";	 
		}
	}
}
public function getTableData($tb){
		$q = "SELECT * FROM zb_pages";
		$arr = $this->select($q);
		
		foreach($arr as $page){
				if(substr($tb,0,-1) == "zb_".$page['page']){
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
public function updateData($tb, $post,$identParam,$fixheigth=""){
	if(isset($_REQUEST['update'])){
	 
		unset($post['update']);
		$done = $this->update($tb,$post,$identParam);
		
		$this->uploadFiles($tb, $_FILES, $identParam, "pic/",$fixheigth);
		
					  
		if(!empty($done)){
		echo "<div class='action-success'>$done</div>";	
		}
	}
}
public function insertData($tb, $post, $fixheigth=""){
	 if(isset($_REQUEST['insert'])){
		unset($post['insert']);
		$done = $this->insert($tb,$post);
					  $this->uploadFiles($tb, $_FILES, "", "pic/",$fixheigth);
		if(!empty($done)){
		echo "<div class='action-success'>$done</div>";	
		}
	}
}
public function getValues($tb){
	return $arr = $this->select("SELECT * FROM ".substr($tb,0,-1)." ORDER BY sort DESC"); 
}
public function inMenu($id){
	$arr = $this->select("SELECT * FROM zb_pages WHERE id=$id");
	switch($arr[0]['menu']){
		case 1:
			$checked = "checked";
			$prop = 1;
		break;
		case 0:
			$checked = "";
			$prop = 0;
		break;
	}
	return "<span class='col-1 edit-navicons' alt='$id-$prop-menu'>
<input type='checkbox' aria-label='' $checked> Hauptmenü </span>";	
}
public function inTopMenu($id){
	$arr = $this->select("SELECT * FROM zb_pages WHERE id=$id");
	switch($arr[0]['topmenu']){
		case 1:
		case 2:
			$checked = "checked";
			$prop = 1;
		break;
		case 0:
			$checked = "";
			$prop = 0;
		break;
	}
	return "<span class='col-1 edit-navicons' alt='$id-$prop-topmenu'> 
<input type='checkbox' aria-label='' $checked> Topmenü</span>";	
}
public function inFootMenu($id){
	
	$arr = $this->select("SELECT * FROM zb_pages WHERE id=$id");
	
	switch($arr[0]['footmenu']){
		case 1:
		case 3:
			$checked = "checked";
			$prop = 1;
		break;
		case 0:
			$checked = "";
			$prop = 0;
		break;
	}
	return "<span class='col-1 edit-navicons' alt='$id-$prop-footmenu'> 
<input type='checkbox' aria-label='' $checked> Footermenü</span>";	
}
public function inAdminMenu($id){
	$arr = $this->select("SELECT * FROM zb_pages WHERE id=$id");
	switch($arr[0]['admmenu']){
		case 1:
			$checked = "checked";
			$prop = 1;
		break;
		case 0:
			$checked = "";
			$prop = 0;
		break;
	}
	
	return "<span class='col-1 edit-navicons' alt='$id-$prop-admmenu'>
<input type='checkbox' aria-label='' $checked> Adminmenü</span>";	
}
public function inKategorie($id){
	$arr = $this->select("SELECT * FROM zb_kategorie ORDER BY sort ASC");
	
	$return = "";
	$return .= "<select name='menu' class='custom-select col-2 choosekat' alt='$id'>";
	$return .= "<option value=''>Kategorie</option>";
	foreach($arr as $kat){
	$return .= "<option value='".$kat['kat_id']."'>".$kat['kat_name']."</option>";
	}
	$return .= "</select>";
	$return .= "";
	return $return;
	
}
private function itemImage($array){
	
	foreach($array as $k=>$val){
		
		$types = array(".jpg",".jpeg",".JPG",".JPEG",".png");
		$image = array();
		foreach($types as $type){
			$pos = strpos($val, $type);
			if(!empty($pos)){
				return $image=array($k);
			}
		}
	}
	
}
public function showEntries($entryArray){
	$tb = "zb_".substr($_REQUEST['p'],0,-1);
	
	$arr = $this->select("SELECT behavior FROM zb_pages WHERE page='".substr($_REQUEST['p'],0,-1)."'");
	
	if($arr[0]['behavior']=="blog"){
		
		echo "<div class='card'>
  <h5 class='card-header'>Alle Einträge</h5>
  <div class='card-body pt-1'>";
		
	echo "<div class='row'>
				<div class='col-8'>
				<span class='btn-overview' alt='liste' title='Datensätze als Listenübersicht'><i class='fa fa-list fa-fw'></i></span>
				<span class='btn-overview' alt='karte' title='Datensätze als Kartenübersicht'><i class='fa fa-th-large fa-fw'></i></span>
				<span>".ucfirst($_SESSION['entryview'])." Übersicht aktiviert</span>
				</div>
				<div class='col-4 text-right p-0'>
				<button class='btn-info mb-2 p-0 p-lg-1 saveitemorder'><i class='fa fa-floppy-o fa-fw'></i> Reihenfolge speichern</button>
			</div>
			
		</div>";
		if($_REQUEST['p']=="mitgliedera"){
		echo "<div class='row bar'>
				<div class='col-4 p-2 m-2'>
				<form action='' method='post'>
				<input type='search' class='form-control col-10 inline' id='searchinput' autocomplete='off' placeholder='suchen'>
				<div id='hits' class='col-10 rounded border bg-white'></div>
				<input type='hidden' name='contentid' id='contentid'>
				<input type='hidden' name='p' value='".$_REQUEST['p']."'>
				<button class='btn-info inline mt-2 pl-4 pr-4'> suchen </button> 
				</form>
				</div>
			</div>
			<div class='row bar'>
			<div class='col'>
			<a href='' class='btn-info mb-2 p-2 rounded' id='btn-alle' alt='mitgliedera'>alle anzeigen</a>
			<button class='btn-info float-right mb-2' id='listendruck' alt='mitglieder'><i class='fa fa-print fa-fw'></i> Druckansicht</button>
			</div>
			</div>";
		}
		echo "<div class='row container-entries  p-0 pl-lg-3'>";
		$i=0;
		foreach($entryArray as $array){
			$imgcolumn ="";
			$entrystatus = "";
			$img = $this->itemImage($array);
			$imgcolumn =  $img[0];
			switch($array['active']){
				case 1:
				$entrystatus="fa-toggle-on activeentry";
				$title = "title='Datensatz ist aktiviert'";
				break;
				case 2:
				default:
				$entrystatus="fa-toggle-off notactiveentry";
				$title = "title='Datensatz ist deaktiviert'";
				break;
				
			}
			unset($array[0]);
			unset($array[1]);
			unset($array[2]);
			unset($array[3]);
			unset($array[4]);
			unset($array[5]);
			unset($array[6]);
			unset($array[7]);
			unset($array[8]);
			unset($array[9]);
			unset($array['timestamp']);
			unset($array['sort']);
			unset($array['active']);
			
			switch($_SESSION['entryview']){
				case "liste":
				$this->entryLists($array, $tb,$imgcolumn,$entrystatus,$title);
				break;
				case "karte":
				$this->entryCards($array, $tb,$imgcolumn,$entrystatus,$title);
				break;
				default:
				$this->entryCards($array, $tb,$imgcolumn,$entrystatus,$title);
			
			}
			
			
	}
	echo "</div>";
	echo "</div>";
	echo "</div>";
	}
	
}
private function getVideoId($videouri){
	$expl = explode("=",$videouri);
	return $expl[1];

}
private function entryCards($array, $tb,$imgcolumn,$entrystatus, $title){
	
	echo "<div class='card col-12 col-md-6 col-lg-4 col-xl-3 shadow adm-entries m-0' alt='".$array['id']."-$tb'>";
		echo "<div class='edit-bar row'>
		<div class='col-10'>
		<span class='edit-item-bar-trash' alt='".$array['id']."-$tb' title='Datensatz löschen'><i class='fa fa-trash fa-fw'></i></span>
		<span class='edit-item-bar-edit' alt='".$array['id']."-$tb-".$_REQUEST['p']."' title='Datensatz bearbeiten'><i class='fa fa-pencil fa-fw'></i></span>
		</div>
		<div class='col-2'>
		<span class='edit-item-bar-active' alt='".$array['id']."-$tb-".$_REQUEST['p']."' $title><i class='fa $entrystatus fa-fw '></i></span>
		</div>
		</div>"; 
		echo "<div class='card-body p-1'>";
		//if(!empty($array[$imgcolumn])){
			$opengalery="";
			$beschreibung = "";
			if(empty($array[$imgcolumn])){
			$picture = $this->base."img/picturedummy.jpg";
			$opengalery = "img-thumbnail-dummy";
			}else{
			$picture = $this->base.'adm/pic/TN'.$array[$imgcolumn];
			$opengalery = "image-gallery";
			list($width, $height) = getimagesize($this->base.'adm/pic/'.$array[$imgcolumn]);
			$picdata = '<span>'.$width.'x'.$height.'px</span>';
			}
			if(!empty($array['beschreibung'])){
				$beschreibung = $array['beschreibung']." | ";
			}
		 echo '<div class="col-6 col-md-6 col-lg-4 thumb p-0 mb-0 mt-0 text-center">
                <a class="gallery-item" href="#" data-image-id="" data-toggle="modal" data-title="'.$beschreibung.''.$array[$imgcolumn].'"
                   data-image="pic/'.$array[$imgcolumn].'"
                   data-target="#'.$opengalery.'">
                    <img class="img-thumbnail"src="'.$picture.'" alt="">
                </a>'.$picdata.'
            </div>';
		unset($array[$imgcolumn]);
		//}
		unset($array['id']);
  				foreach($array as $key => $column){
					if(!empty($key)){
						 if($this->uConvert($key)=="videocode"){
							echo "<iframe width='100%' height='150' src='https://www.youtube.com/embed/".$this->getVideoId($column)."' frameborder='0' allowfullscreen></iframe>"; 
						} 
					echo "<p><span class='small font-italic'>".$this->uConvert($key).":</span><br>".$this->shortText($column, 20)."</p><hr class='m-1'>";
					}
				}
			$i++;	
  	echo "</div></div>";
}
private function entryLists($array, $tb,$imgcolumn,$entrystatus,$title){
	 
	echo "
	<div class='col-12 adm-entries shadow' alt='".$array['id']."-$tb' style='min-height:unset; margin-bottom:1em;'>";
		echo "<div class='edit-bar row '>
		<div class='col-10 col-lg-11'>
		<span class='edit-item-bar-trash' alt='".$array['id']."-$tb'><i class='fa fa-trash fa-fw'></i></span>
		<span class='edit-item-bar-edit' alt='".$array['id']."-$tb-".$_REQUEST['p']."'><i class='fa fa-pencil fa-fw'></i></span>
		</div>
		
		<div class='col-1 text-right'>
		<span class='edit-item-bar-active' alt='".$array['id']."-$tb-".$_REQUEST['p']."' $title><i class='fa $entrystatus fa-fw '></i></span>
		
		</div>
		</div>"; 
		
		echo "<div class='row card-body p-1'>";
		$opengalery="";
		$beschreibung = "";
		if(empty($array[$imgcolumn])){
			$picture = $this->base."img/picturedummy.jpg";
			$opengalery = "img-thumbnail-dummy";
		}else{
			$picture = $this->base.'adm/pic/TN'.$array[$imgcolumn];
			$opengalery = "image-gallery";
			list($width, $height) = getimagesize($this->base.'adm/pic/'.$array[$imgcolumn]);
			$picdata = '<span>'.$width.'x'.$height.'px</span>';
		}
		if(!empty($array['beschreibung'])){
				$beschreibung = $array['beschreibung']." | "; 
			}
		 echo '<div class="col-2 col-md-1 col-lg-1 thumb p-0 mb-0 mt-0 text-center">
                <a class="gallery-item" href="#" data-image-id="" data-toggle="modal" data-title="'.$beschreibung.''.$array[$imgcolumn].'"
                   data-image="pic/'.$array[$imgcolumn].'"
                   data-target="#'.$opengalery.'">
                    <img class="img-thumbnail" src="'.$picture.'" alt="">
                </a>'.$picdata.'
            </div>'; /**/
		unset($array[$imgcolumn]);
		
		unset($array['id']);
		$cols = ceil(12/count($array));
  				foreach($array as $key => $column){
					if(!empty($column)){
					echo "<div class='col-5  col-md-$cols  col-lg-$cols p-1 '><span class='small font-italic'>".$this->uConvert($key).":</span><br>".$this->shortText($column, 20);
					if($this->uConvert($key)=="videocode"){
							echo "<iframe width='280' height='150' src='https://www.youtube.com/embed/".$this->getVideoId($column)."' frameborder='0' allowfullscreen></iframe>"; 
						} 
					echo "</div>";
					}
				}
			$i++;	
  	echo "</div></div>";
}
private function successAction($var,$varval,$alert){
	if($var==$varval){
		return "<div class='col'><div class='alert alert-success text-center' role='alert'>$alert</div></div>";
	}
}
public function formSwitcher($id,$form,$page){
	$tbmeta = $this->select("select column_name from information_schema.columns where table_name = 'zb_$page'");
	unset($tbmeta[0]['id']);
	foreach($tbmeta as $cols){
		if($cols[0]!="id" && $cols[0]!="active" && $cols[0]!="sort")
		$columns[] = $cols[0];
	}
	$usform = unserialize($form);
	
echo "<a href='#' alt='zb_$page' class='modify-column'>Rehenfolge speichern</a>";
echo "<div class='row tb-columns'>";

		
		foreach($usform as $key =>$elem){ 
			foreach($columns as $column){
				if($key==$column){
				echo "<div class='col m-1 p-1 text-center bg-light border-1 column' alt='$column?".$usform[$column]."'>";
				echo "<label for='$column' class='small'>$column <span class='badge badge-info'>
				<a href='../model/actions.php?deletecolumn=$column&table=zb_$page'><i class='fa fa-trash fa-fw'></i></a></span></label>";
				echo "<select name='$column' class='custom-select col-12'>";
				echo "<option value='".$usform[$column]."'>".$usform[$column]."</option>";
				echo "<option value='input'>input</option>";
				echo "<option value='file'>file</option>";
				echo "<option value='textarea'>textarea</option>";
				echo "<option value='select'>select</option>";
				echo "<option value='multiselect'>multiselect</option>";
				echo "<option value='unvisible'>unvisible</option>";
				echo "</select>";
				echo "<span class='small'>".$usform[$column]."</span>";
				echo "</div>";
				}
		}

}
echo "<div class='col  mb-1 text-center'>";
echo "<a href='$column-zb_$page' class='addcolumn'>hinzufügen</a>";
echo "</div>";
echo "<input type='hidden' name='update' value='$id'>";
echo "<button class='adm-button btn-info ml-2'>ok</button>";
echo "</div>";

}
public function formElement($prop,$colname,$elem, $value,$selectArray){
	
	$image="";
	$types = array("image/jpeg","image/png","image/gif");
	 
	 switch($elem){
		case "input":
		return "<div class='form-group'>
		<label for='$colname'>".ucfirst($this->uConvert($colname))."</label><input type='text' name='$colname' class='form-control col col-md-4 $colname' id='$colname' value='$value' >
		</div>";
		break;
		case "file":
		$type = mime_content_type("pic/".$value);
		if(in_array($type,$types) && $prop == "statisch"){
			$image = "<div class='row'>
			<div class='col-2 mt-2 mb-2'><img src='pic/TN$value' width='100%'></div>
			<div class='col-1 mt-2 mb-2 pl-0'><span class='remove-file' alt='zb_".substr($_REQUEST['p'],0,-1)."-$colname-$value'><i class='fa fa-trash fa-fw'></i></span></div>
			</div>";
		}
		return "<div class='form-group col col-md-5 pl-0'>
		
		<label for='$colname'>".ucfirst($colname)."</label><br>
		$image
		<div class='input-group'>
  <div class='input-group-prepend'>
    <span class='input-group-text' id='inputGroupFileAddon01$colname'>Datei</span>
  </div>
  <div class='custom-file'>
    <input type='file' name='$colname' class='custom-file-input' id='inputGroupFile01$colname' aria-describedby='inputGroupFileAddon01$colname'>
    <label class='custom-file-label' for='inputGroupFile01$colname'>durchsuchen</label>
  </div>
</div>
		</div>";
  		break;
		case "textarea":
		return "<div class='form-group'><label for='$colname'>".ucfirst($colname)."</label><textarea class='editor form-control col-10' name='$colname' id='$colname' rows='3'>".$value."</textarea></div>";
		break;
		
		case "select":
		$select =  "<div class='form-group'><label for='$colname'>".ucfirst($colname)."</label><select class='form-control col-3' name='$colname'>
		<option value=''>wählen</option>";
		foreach($selectArray as $item){
		 $select .= "<option value='".$item[2]."'>".$item[2]."</option>";
		}
		$select .="</select></div>";
		return $select;
		break;
		
		case "multiselect":
		$select =  "<div class='form-group'><label for='$colname'>".ucfirst($colname)."</label><select class='form-control col-3' name='".$colname."[]' multiple>";
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
public function createnewform(){
	if(isset($_REQUEST['createnewform'])){
		require_once 'class_edititem.php';
		$o = new editing();
		$formname = strtolower($_REQUEST['formname']);
		$feldname = $_REQUEST['feldname'];
		$formelement = array_filter($_REQUEST['formelement']);
		$i = 0;
		$hidden="";
		switch($_REQUEST['behavior']){
			case "insertdata":
			$action = "action=\"model/actions.php\"";
			$hidden .= "<input type=\"hidden\" name=\"action\" value=\"insertdata\">";
			$hidden .= "<input type=\"hidden\" name=\"actiontable\" value=\"zb_$formname\">";
			break;
			case "selectdata":
			$action = "action=\"model/actions.php\"";
			$hidden .= "<input type=\"hidden\" name=\"action\" value=\"selectdata\">";
			$hidden .= "<input type=\"hidden\" name=\"actiontable\" value=\"zb_$formname\">";
			break;
			default:
			$action = "";
			$hidden = "";
			break;
		
		}
		$html ="<form method=\"post\" $action>";
		foreach($formelement as $element){
			$arr[$formname][$feldname[$i]]= $element;
			$html .=$o->formElement("statisch",$feldname[$i],$element,"","");
			$i++;
		}
		$html .=$hidden;
		$html .="</form>";
		$formSchablone = serialize($arr);  
		$done =$this->insert("zb_forms",array("formname"=>$formname,"elemente"=>$formSchablone,"html"=>$html));
		if(!empty($done)){
		echo "<div class='action-success'>$done</div>";	
		}
		
	}
}
public function setFormToPage(){
	if(isset($_REQUEST['setformtopage'])){
		$pagedata = explode(":",$_REQUEST['page']);
		$id= $pagedata[0];
		$page = $pagedata[1];
		$pageid = $pagedata[2];
		
		$done = $this->update("zb_forms",array("pageid"=>$pageid,"page"=>$page),"id=$id");
		$arr = $this->select("SELECT html FROM zb_forms WHERE page='$page'");
		if(!empty($done) && $page!="index"){
			$path = "../view/$page.php";
			$before = '<?php'.PHP_EOL.' 
require_once "controller/".$_REQUEST["controller"].".php";
$o=new $_REQUEST["controller"]();
echo "<div class=\"container mb-4 mt-4\">
<h1>".ucfirst($_REQUEST["controller"])."</h1>";
echo "</div>";'.PHP_EOL.''; 
			$html = 'echo "'.str_replace("\"","\\\"",$arr[0]['html']).' ";';
			$insert = $before."".PHP_EOL."".$html;
			file_put_contents($path,$insert);
		echo "<div class='action-success'>$done</div>";	
		}
		
	}
}
public function getFormsNavi(){
	$arr = $this->select("SELECT * FROM zb_forms ORDER BY id ASC");
	if(!empty($arr[0]['id'])){
		return "<li class='list-group-item p-1'><a href='?p=forms'> <i class='fa fa-th-list fa-fw'></i> Formulare</a></li>";
	}
	
}
public function getForms(){
	return $this->select("SELECT * FROM zb_forms ORDER BY id ASC");
	
	
}
public function addNewColumn(){
	if(isset($_REQUEST['addlastcolname'])){
		$tb=$_REQUEST['totable'];
		$page = str_replace("zb_","",$tb);
		$after = $_REQUEST['addlastcolname'];
		$newcolname=$_REQUEST['newcolname'];
		$q = "ALTER TABLE $tb add $newcolname TEXT NULL";
		$done = $this->query($q);
	
		$form = $this->select("SELECT form FROM zb_pages WHERE page = '$page'");
		$unform = unserialize($form[0]['form']);
 		foreach($unform as $key => $val){
			$arr[$key]=$val; 
		}
			$arr[$newcolname] ="";
			$form = serialize($arr);
			
		$done = $this->update("zb_pages",array("form"=>$form),"page='$page'");
		echo "<div class='action-success'>$done</div>";	
		}
	
}
public function checkPlugins(){
	$plugins = array("zb_kategorie");
	foreach($plugins as $tb){
		$tbname = $this->query("select table_name from information_schema.tables where table_name = '$tb'");
		$tbmeta[] = substr($tbname[0]['table_name'],3); 
	}
	return $tbmeta;
}
public function createSQLTable($tablename, $formid){
	if(isset($_REQUEST['createtable'])){
	$formname = $this->select("SELECT * FROM zb_forms WHERE id=$formid");
	
	$unserial = unserialize($formname[0]['elemente']);
	foreach($unserial as $elemente){
		$felder="";
		foreach($elemente as $key=>$item){
			if($item != "button"){
				$felder .="`$key` TEXT  NULL ,";
			}
			
		}
		
	}
	
$arr = $this->select("SELECT table_name FROM information_schema.tables WHERE table_name = 'zb_".$formname[0]['formname']."'");
if(empty($arr[0]['table_name'])){
	
	$sql = "CREATE TABLE `zb_".$formname[0]['formname']."`(`id` INT  (11) NOT NULL AUTO_INCREMENT  ,
	$felder
	`sort` INT(3) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB";
	$done = $this->query($sql);
	 if(!empty($done)){
			echo "<div class='action-success'>$done</div>";	 
		}
	}
	}

}
public function modalWindowGallery(){
	echo '<div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header"><span class="modal-title" id="image-gallery-title"></span>
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" src="">
                    </div>
                    <div class="modal-footer">
                     
                    </div>
                </div>
            </div>
        </div>';
}
public function searchMethod(){
	if(isset($_REQUEST['searchstring'])){
	 $string  = $_REQUEST['searchstring'];
	 $qName = "SELECT id, Name, Vorname FROM zb_mitglieder WHERE Name LIKE '$string%'";
	 $arrN = $this->select($qName);
	
	 $qVorname = "SELECT id, Name, Vorname FROM zb_mitglieder WHERE Vorname LIKE '$string%'";
	$arrVorname = $this->select($qVorname);
	 
	 	 if(!empty($arrN[0]['Vorname'])){
			foreach($arrN as $rowN){
				echo "<option value='".$rowN['id']."'>";
				echo $rowN['Name']. ", ". $rowN['Vorname'];
				echo "</option>";
			}
		}
	 
 	 if(!empty($arrVorname[0]['Vorname'])){
			foreach($arrVorname as $row){
				echo "<option value='".$row['id']."'>";
				echo $row['Name']. ", ". $row['Vorname'];
				echo "</option>";
			}
		} 
	 
	}
}
}