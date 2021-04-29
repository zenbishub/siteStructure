<?php
require_once 'connect.php';

class install extends connect{
	private $folders;
	private $iconFont;
	
public function __construct(){
	parent::__construct();
	$this->folders = array("../img","../icon-font/","../bootstrap/","../bootstrap/css/","../slider/","../bootstrap/js/","../adm/pic");
	$this->iconFont=array(
	"font-awesome.min.css"=>"font-awesome.min.css",
	"fontawesome-webfont.eot"=>"fontawesome-webfont.eot",
	"fontawesome-webfont.svg"=>"fontawesome-webfont.svg",
	"fontawesome-webfont.ttf"=>"fontawesome-webfont.ttf",
	"fontawesome-webfont.woff"=>"fontawesome-webfont.woff",
	"fontawesome-webfont.woff2"=>"fontawesome-webfont.woff2",
	"FontAwesome.otf"=>"FontAwesome.otf",
	"icons-ansicht.php"=>"icons-ansicht.php");
	
}
public function exeuteCall(){
	
	// Verzeichnisse ertellen
	 foreach($this->folders as $tmp){
		if(!is_dir($tmp))
		mkdir($tmp,0777);
		
	} 
	//icon-fonts Dateien lesen und setzen
	foreach($this->iconFont as $k=>$v){
		 $file = file_get_contents("https://zenbis.de/cloud/icon-font/".$v, true);
		 file_put_contents("../icon-font/".$k,$file);
		
	 } 
}
public function createTables(){
	$queries =array(
"CREATE TABLE `zb_admin`(`id` INT  (11) NOT NULL ,`user` VARCHAR  (50)  NULL,`pass` VARCHAR  (50) NULL, `admin_email` VARCHAR(100) NULL    , PRIMARY KEY (`id`)) ENGINE = InnoDB",

"CREATE TABLE `zb_webmaster`(`id` INT  (11) NOT NULL ,`u` VARCHAR  (50)  NULL,`p` VARCHAR  (50) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB",

"CREATE TABLE `zb_switcher`(`id` INT  (11) NOT NULL ,`onoff` INT(11)  NULL  , PRIMARY KEY (`id`)) ENGINE = InnoDB",

"CREATE TABLE `zb_pages`(`id` INT  (11) NOT NULL  AUTO_INCREMENT ,`page` VARCHAR(100)  NULL , `route` VARCHAR(100) NULL, `menu` INT NULL ,  `behavior` VARCHAR(100) NULL , `form` TEXT NULL ,`sort` INT(11) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB",

"CREATE TABLE `zb_forms`(`id` INT  (11) NOT NULL  AUTO_INCREMENT ,`pageid` INT  (11),`page` VARCHAR(100)  NULL , `formname` VARCHAR(100) NULL, `elemente` TEXT NULL, `html` TEXT NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB",

"CREATE TABLE `zb_websitetitle`(`id` INT  (11) NOT NULL  ,`title` VARCHAR(100)  NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB",
"CREATE TABLE `zb_parallax`(`id` INT  (11) NOT NULL  AUTO_INCREMENT ,`kat_id` INT(11)  NULL , `bild` VARCHAR(100) NULL, `sort` INT(11) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB",

"CREATE TABLE `zb_htmlcode`(`id` INT  (11) NOT NULL  AUTO_INCREMENT ,`input_int_sort` INT(11)  NULL ,`input_txt_codename` VARCHAR(200) NULL, `textarea_text_code` TEXT NULL, `input_txt_page` VARCHAR(50) NULL, `input_int_show` INT(11) NULL, PRIMARY KEY (`id`)) ENGINE = InnoDB",
"INSERT INTO `zb_admin`(id,user,pass)VALUES(1,'zenbis','nurich')",
"INSERT INTO `zb_switcher`(id,onoff)VALUES(1,0)",
"INSERT INTO `zb_websitetitle`(id,title)VALUES(1,'ZB_SHABLONE')",
"INSERT INTO `zb_htmlcode`(id,input_txt_codename,textarea_text_code)VALUES(1,'codename','<html>')"

);
foreach($queries as $q){
	$this->query($q);	
}

}

public function getBootstrap(){
		$css=array(
		"bootstrap-grid.css",
		"bootstrap-grid.css.map",
		"bootstrap-grid.min.css",
		"bootstrap-grid.min.css.map",
		"bootstrap-reboot.css",
		"bootstrap-reboot.css.map",
		"bootstrap-reboot.min.css",
		"bootstrap-reboot.min.css.map",
		"bootstrap.css",
		"bootstrap.css.map",
		"bootstrap.min.css",
		"bootstrap.min.css.map");
		foreach($css as $item){
		$bcss = file_get_contents("https://zenbis.de/cloud/bootstrap/css/$item", true);
		file_put_contents("../bootstrap/css/$item", $bcss);
		}
		
		$js = array(
		"bootstrap.bundle.js",
		"bootstrap.bundle.js.map",
		"bootstrap.bundle.min.js",
		"bootstrap.bundle.min.js.map",
		"bootstrap.js",
		"bootstrap.js.map",
		"bootstrap.min.js",
		"bootstrap.min.js.map");
			foreach($js as $item){
			$bjs = file_get_contents("https://zenbis.de/cloud/bootstrap/js/$item", true);
			file_put_contents("../bootstrap/js/$item", $bjs);
			}
}
public function shoppingtables(){
	$queries =array(
"CREATE TABLE `zb_bestellungen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bestellung_data` text,
  `bestellung_time` int(11) DEFAULT NULL,
  `bestellung_nummer` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `bemerkung` text, PRIMARY KEY (`id`)
) ENGINE=InnoDB",

"CREATE TABLE `zb_kategorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_id` int(11) NULL,
  `kat_name` VARCHAR(200) NULL,
  	PRIMARY KEY (`id`)
) ENGINE=InnoDB",

"CREATE TABLE `zb_produkte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kat_id` int(11) DEFAULT NULL,
  `vorhanden` int(11) DEFAULT '0',
  `verkauft` int(11) DEFAULT NULL,
  `artnummer` varchar(11) DEFAULT NULL,
  `text` text,
  `titel` text,
  `preis` decimal(10,2) DEFAULT NULL,
  `abpreis` decimal(10,2) DEFAULT NULL,
  `versand` decimal(10,2) NOT NULL DEFAULT '0',
  `filename` varchar(100) DEFAULT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  `videoname` varchar(250) DEFAULT NULL,
  `datum` int(11) DEFAULT NULL,
  `sortieren` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB"

);
	foreach($queries as $q){
		$this->query($q);	
	}
}

public function codeShoppingCard(){
			$string = "<?php ".PHP_EOL."";
			$string .= "require_once 'connect.php';".PHP_EOL."";
			$string .= 'class  shoppingCard extends connect{'.PHP_EOL.'public function __construct(){'.PHP_EOL.'parent::__construct();'.PHP_EOL.'}
public function addToShoppingCard(){
}
public function removeFromShoppingCard(){
}
public function renderShoppingCard(){
}
public function sendConfirmMails(){
}
}';
			return $string;	
}
public function controllerShoppingCard(){
			$string = "<?php ".PHP_EOL."";
			$string .= "require_once 'model/class_shoppingcard.php';".PHP_EOL."";
			$string .= 'class  controllerShoppingCard extends shoppingCard{'.PHP_EOL.'public function __construct(){'.PHP_EOL.'parent::__construct();'.PHP_EOL.'}
'.PHP_EOL.'}';
			return $string;	
}
public function viewShoppingCard(){

return '<?php
require_once "controller/shoppingcard.php";
$o=new controllerShoppingCard();
echo "<div class=\"container mb-4 mt-4\">
<h1>Warenkorb</h1>";
echo "</div>";	';

}
public function codeAdmProdukte(){
	return '<?php
	require_once "../controller/".$_REQUEST["p"].".php";
$o=new produkte();
$o->updateData(substr("zb_".$_REQUEST["p"],0,-1), $_POST,"id=1");
$o->insertData(substr("zb_".$_REQUEST["p"],0,-1),$_POST);
echo $o->getClass();
echo "<div class=\"card m-2\"><h5 class=\"card-header\">Datensatz erstellen / bearbeiten</h5><div class=\"card-body\">";
	echo "<div class=\"container p-4 ml-0 mb-4 mt-4\">";
	$o->getClassForm();
	echo "</div></div>";
	$arr=$o->getTable(substr("zb_".$_REQUEST["p"],0,-1));
$o->showEntries($arr);
echo "</div>";';
}
public function controllerProdukte(){
	$string = "<?php ".PHP_EOL."";
			$string .= 'require_once "../model/class_admin.php";'.PHP_EOL.'';
			$string .= 'class produkte extends admController{'.PHP_EOL.'public function __construct(){'.PHP_EOL.'parent::__construct();'.PHP_EOL.'}'.PHP_EOL.'public function getClass(){'.PHP_EOL.'$arr=$this->getTableData("zb_".$_REQUEST["p"]);'.PHP_EOL.'return "<h1>".ucfirst(substr($_REQUEST["p"],0,-1))." / <span class=\"smaller\">".$arr[1]."</span></h1>";'.PHP_EOL.'}'.PHP_EOL.'public function getTable($page){'.PHP_EOL.'$tb=substr($page,0,-1);'.PHP_EOL.'$q="SELECT * FROM zb_$tb ORDER BY sort ASC";'.PHP_EOL.'return $arr=$this->select($q);'.PHP_EOL.'}'.PHP_EOL.'public function getClassForm(){'.PHP_EOL.'$arr=$this->getTableData("zb_".$_REQUEST["p"]);'.PHP_EOL.'
$form=$this->select("SELECT form FROM  zb_pages WHERE page=\'".substr($_REQUEST["p"],0,-1)."\'");'.PHP_EOL.'
$usform=unserialize($form[0]["form"]);'.PHP_EOL.'			
switch($arr[1]){'.PHP_EOL.'case "blog":'.PHP_EOL.'$this->form("blog","insert","",$usform);'.PHP_EOL.'break;'.PHP_EOL.'case "statisch":'.PHP_EOL.'$vars=$this->getValues("zb_".$_REQUEST["p"]); '.PHP_EOL.'$this->form("statisch","update",$vars,$usform);'.PHP_EOL.'break;'.PHP_EOL.'}'.PHP_EOL.'}'.PHP_EOL.'
public function form($prop,$action,$vars,$usform){
	'.PHP_EOL.'echo "<form method=\"post\" enctype=\"multipart/form-data\">";'.PHP_EOL.'
	foreach($usform as $colname=>$elem){'.PHP_EOL.'
		echo $this->formElement($colname,$elem, $vars[0][$colname]);'.PHP_EOL.'	
	}'.PHP_EOL.'
	echo "<input type=\"hidden\" name=\"$action\" value=\"1\">
    <button type=\"submit\" class=\"btn btn-info ml-0 mt-4\">speichern</button>
	</div>
</form>";'.PHP_EOL.'

}'.PHP_EOL.'}';
			return $string;	
}

}
$install = new install();
if(isset($_REQUEST['install'])){
	switch($_REQUEST['install']){
		case "basetables":
		$install->createTables();
		$install->exeuteCall();
		$install->getBootstrap();
		echo "basetables fertig";
		break;	
		case "shoppingtables":
		file_put_contents("../adm/content/produktea.php",$install->codeAdmProdukte());
		file_put_contents("class_shoppingcard.php",$install->codeShoppingCard());
		file_put_contents("../controller/produktea.php",$install->controllerProdukte());
		file_put_contents("../controller/shoppingcard.php",$install->controllerShoppingCard());
		file_put_contents("../view/shoppingcard.php",$install->viewShoppingCard());
		$install->insert("zb_pages",array("page"=>"produkte","route"=>"produkte","menu"=>0,"behavior"=>"blog"));
		$install->shoppingtables();
		echo "shoppingtables fertig";
		break;
	}
}
echo "<ol>";
echo "<h2>Installieren Tabellen und Plugins</h2>";
echo "<li><a href='?install=basetables'>Tabellen für Dynamische Webseite erstellen</a></li>";
echo "<li><a href='?install=shoppingtables'>Tabellen für Warenkorb erstellen</a></li>";
echo "</ol>";