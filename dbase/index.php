<?php 
require_once ("class/class-db-generator.php");
 
 class output extends dbGenerator {

public function __construct(){
	parent::__construct();
	
}

	 
public function checkSession(){
		if(isset($_SESSION['webmaster'])){ 
			 $this->htmlOutput();
		 }else{
			die("bitte einloggen");
		}
}
public  function htmlOutput(){
		 
		 echo "<!doctype html>
		<html>
		<head>
		<meta charset=\"utf-8\">
		<title>DBASE-GENERATOR</title>
		
		<script type=\"text/javascript\" src=\"js/jquery-3.2.1.min.js\"></script>
		<script type=\"text/javascript\" src=\"js/db-generator-scrpits.js\"></script>
		<script type='text/javascript' src='../bootstrap/js/bootstrap.min.js'></script>
		<link rel=\"stylesheet\" href='../bootstrap/css/bootstrap.min.css'>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"../icon-font/font-awesome.min.css\">
		<link rel=\"stylesheet\"  href=\"css/db-generator-style.css\" media=\"all\">
		</head>
		<body>
		<div id=wrapper>
		<div id=\"leftbar\">";
		echo "<span class='list-group-item p-1 mb-1'>";
		echo "<span class='small font-italic'>DB-Host:</span> ".$this->db_host."<br>";
		echo "<span class='small font-italic'>DB-Name:</span> ".$this->db_name."<br>";
		echo "<span class='small font-italic'>DB-User:</span> ".$this->db_username."<br>";
		echo "</span>";
		echo "<span class='list-group-item p-1 mb-1'><i class='fa fa-plus fa-fw'></i> <a href= \"?add=table\"> Tabelle hinzufügen </a></span>
		<span id=\"overView\" class='list-group-item p-1 mb-1'><i class='fa fa-list fa-fw'></i> <a href= \"?overview=1\">Options</a></span>
		<span class='list-group-item p-1 mb-1'><i class='fa fa-list fa-fw'></i> <a href= \"?sqlaction=1\">SQL</a></span>
		";
		
		$this->showAllTables();
		echo "</div>
		<div id=\"right-content\">";
		$this->sqlForm();
		$this->showTableColumns();
		$this->showCreateMask();
		$this->configFields();
		$this->createCustomTable();
		$this->deleteTable();
		$this->showOverview();
		$this->editStructureTable();
		$this->saveStructureChanges(); 
		$this->deleteColumn();
		$this->addColumn();
		$this->addValues();
		$this->insertValues(); 
		$this->updateValues();
		$this->deleteRow();
		$this->clearTable();
		
		echo"</div></div>
		</body>
</html>";
		 }
	
	
	 
	 }
	$o = new output();
	$o->checkSession();
	
?>