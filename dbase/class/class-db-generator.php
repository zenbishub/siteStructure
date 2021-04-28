<?php
require_once '../model/connect.php';

class dbGenerator extends connect{
	
	public $db_host;
	public $db_name;
	public $db_username;
	public $db_password;
	public $daten;

	
	public function __construct(){
		
		parent::__construct();
		$this->db_name = $this->dbase;
		$this->db_host = $this->host;
		$this->db_username = $this->user;
		$this->db_password = $this->pass;
		mysqli_report(MYSQLI_REPORT_STRICT);
		//error_reporting(-1);
		} 
	


public function query($q){
		
			try {
		  		$connection=mysqli_connect($this->db_host, $this->db_username, $this->db_password)
				OR die("There was a problem connecting to the database.");
				mysqli_select_db($connection, $this->db_name);
					if (!mysqli_query($connection,$q)) { 
						
					printf("Error message: %s\n", mysqli_error($connection));
					}else{
					$exe=mysqli_query($connection,$q);
					printf("Error: %s<br>", mysqli_errno($connection));
			}
	return $exe;
} catch (Exception $e) {
  					echo $e->errorMessage();
				}
			
    }
	
public function select($arr){
		try {
			$done=$this->query($arr);
			$all = mysqli_fetch_assoc($done); 
			 do{$array[]=$all;}while($all = mysqli_fetch_assoc($done));
				return $array;
			} catch (Exception $e) {
  					echo $e->errorMessage();
				}
				
    }

	
public function showAllTables(){
	try {
		$q = "SHOW TABLES";
		$arr= $this->query($q);
		$exe = mysqli_fetch_assoc($arr);
		 do{$t[]=$exe; }while($exe = mysqli_fetch_assoc($arr));
		echo "<ul id=\"allTables\" class=\"list-group\">"; 
		foreach($t as $k){
			
			 foreach((array)$k as $tb){
				 echo "<li class=\"list-group-item mainnavi\"><i class='fa fa-table fa-fw small'></i> <a href=\"?tb=".$tb."\">".$tb."</a></li>";
				 }
			}
		echo "</ul>";
		
		} catch (Exception $e) {
				echo $e->errorMessage();
			}

}

public  function showTableColumns(){
	
	if(isset($_REQUEST['tb'])){
		
	$q   	= "SHOW COLUMNS FROM ".$_REQUEST['tb']."";
	$arr	= $this->query($q);
	$exe = mysqli_fetch_assoc($arr);
	
	
	do{$t[]=$exe; }while($exe = mysqli_fetch_assoc($arr));
	
	echo "<h5>".$q."</h5>";
	echo "<hr>";
	foreach($t as $k){
	echo "<div class=\"row\">";
	 foreach((array)$k as $clmn){
		 if(!empty($clmn))
		 echo "<div class=\"zelle\">".$clmn."</div>";
		 }
		echo "</div>";
		
		}
		
		echo "<div id=\"editStructureTable\">
		<a href=\"?structure=".$_REQUEST['tb']."\" class='btn btn-info text-white'>bearbeiten</a>
		</div>";
		$num = count($this->select("SELECT * FROM ".$_REQUEST['tb']));
		$maxrow = 10;
		$pagins = ceil($num/$maxrow);
		
	$_REQUEST['next']?$curr=$_REQUEST['next']*$maxrow:$curr=0;
	$_REQUEST['order']?$orderby=$_REQUEST['order']:$orderby="ASC";
	$_REQUEST['by']?$by=$_REQUEST['by']:$by="id";
	
		echo $s = "SELECT * FROM ".$_REQUEST['tb']."  ORDER by $by $orderby LIMIT $curr,$maxrow";
		echo "<br>";
		$select = $this->select($s);
		if($pagins>1){
					echo '<nav aria-label="Page navigation example">
				<ul class="pagination">
					<li class="page-item">
						<a href="index.php?tb='.$_REQUEST['tb'].'&next='.($_REQUEST['next']-1).'"" aria-label="Previous" class="page-link">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>';
					$i=1;do{
					echo '<li class="page-item"><a href="index.php?tb='.$_REQUEST['tb'].'&next='.$i.'" class="page-link">'.$i.'</a></li>';
					
					$i++;
					}while($i<$pagins);
					echo '<li class="page-item">
						<a href="index.php?tb='.$_REQUEST['tb'].'&next='.($_REQUEST['next']+1).'"" aria-label="Next" class="page-link">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>
				</ul>
			</nav>';
		}
		
		if(!empty($select[0]['id'])){
		echo "<div class=\"row mb-5\">";
		echo "<div class='font-weight-bold'>ORDER</div>";	
			foreach($t as $k){
			 echo "<div class='col small text-center'><a href='".$_REQUEST['tb']."' data='".$_REQUEST['order']."' class='link orderrows' alt='".$k['Field']."'>".$k['Field']."</a></div>";
		}
		echo "</div>";
			
		foreach($select as $dsatz){
			
			$keys = array_keys($dsatz);
			echo "<div class='row'>";
			echo "<div class='col-11'>";
			echo "<form method=\"post\">";
			echo "<table>";
			echo "<tr>";
			
			foreach($keys as $ht){
				
			echo  "<td class='small'>".$ht."</td>";
			}
			echo "</tr>";
			
			echo "<tr>";
			
			foreach($dsatz as $key=>$value){
			echo  "<td><textarea class='form-control' name=\"".$key."\">".$value."</textarea></td>";
			
			}
			echo "<td><input type=\"hidden\" name=\"update_values\" value=\"".$_REQUEST['tb']."\">
			<input type=\"hidden\" value=\"".$dsatz['id']."\" name=\"id\"><button class='btn btn-info'>ändern</button>
			</td>";
			
			
			
			echo "</tr>";
			echo "</table>";
			echo "</form>";
			echo "</div>";
			echo "<div class='col-1'>";
			echo "<table>";
			echo "<tr><th>Action</th></tr>";
			echo "<form method=\"post\"><tr><td><input type=\"hidden\" name=\"tbl\" value=\"".$_REQUEST['tb']."\">
			<input type=\"hidden\" name=\"deleterow\" value=\"".$dsatz['id']."\"><button class='btn btn-info mt-2'><i class='fa fa-trash fa-fw'></i></button></td></tr></form>";
			echo "</table>";
			echo "</div>";
			echo "</div>";
			}
		
		}

	}
}

	public function updateValues(){
	
	if(isset($_REQUEST['update_values'])){
			$tbl = $_REQUEST['update_values'];
			unset($_POST['update_values']);
			$upd="";
			
			foreach($_POST as $post=>$val){
				$upd.="`$post`='$val',";
			}
			$upd = substr($upd,0,-1);
			
			$q="UPDATE  `".$tbl."` SET $upd  WHERE id=".$_POST['id']."";
			$this->query($q);
			echo "<div class=\"output-message\">gespeichert | <a href=\"?tb=".$tbl."\" class='btn btn-info'>Aktualisieren</a></div>";
			}
	
	}

	public function deleteRow(){
	if(isset($_REQUEST['deleterow'])){
		$q = "DELETE FROM `".$_REQUEST['tbl']."` WHERE id =".$_REQUEST['deleterow']."";
		$this->query($q);
		echo "<div class=\"output-message\">gespeichert | <a href=\"?tb=".$_REQUEST['tbl']."\">Aktualisieren</a></div>";
		}
	}

	public  function showOverview(){
	
	if(isset($_REQUEST['overview'])){
		$q = "SHOW TABLES";
$arr= $this->query($q);
$exe = mysqli_fetch_assoc($arr);

 do{$t[]=$exe; }while($exe = mysqli_fetch_assoc($arr));
 echo "<h5>Tabellen Aktionen</h5>"; 
 echo "<hr>";
echo "<ul id=\"overview-options\">"; 
foreach($t as $k){
	
	 foreach((array)$k as $tb){
		 echo "<li>".$tb."  <span class=\"options\"><a href=\"?deleteTable=$tb\">löschen</a> | <a href=\"?clearTable=$tb\">leeren</a></span></li>";
		 }
	}
echo "</ul>";
		
		}
	}

	public   function showCreateMask(){
	if(isset($_REQUEST['add']) && isset($_REQUEST['add'])=="table"){
		echo "<div id=\"addMask\">";
		echo "<h5>Tabelle hinzufügen</h5>";
		echo "<hr>";
		echo "<form method=\"post\">";
		echo "<h5>Tabellenname</h5>";
		echo "<p><input type=\"text\" name=\"table_name\" class='form-control col-8' size=\"30\" id=\"table_name\" placeholder=\"Tabellenname\"></p>";
		echo "<h5>Anzahl Felder</h5>";
		echo "<input  type=\"text\" name=\"qaunti_rows\" class='form-control col-1' id=\"qaunti_rows\"size=\"3\">";
		echo "<button id=\"toConfig\" class='btn btn-info mt-2'>hinzufügen + konfigurieren</button>";
		echo "</form>";
		echo "</div>";
		
		}
	}
	
	public  function configFields(){
	
	if(!empty($_REQUEST['table_name'])){
		
		$tablename =$_REQUEST['table_name'];
		$quanti =$_REQUEST['qaunti_rows'];
		
		echo "<div id=\"configMask\">";
		echo "<h3><i class='fa fa-table fa-fw small'></i> $tablename</h3><span>Felder konfigurieren</span>";
		echo "<form method=\"post\">";
		$i=0;do{
			echo "<div class=\"mask_items\">
			<p>
			<span>Spaltenname</span>
			<input type=\"text\" name=\"colname$i\" class='form-control col-4 mt-2'  placeholder=\"Name\" class=\"input-mittel\">
			<span>Typ</span>
			<br>
			<select class=\"custom-select  col-3\" name=\"coltyp$i\"> 
			<option value=\"INT\">INT</option>
			<option value=\"VARCHAR\">VARCHAR</option>
			<option value=\"TEXT\">TEXT</option>
			<option value=\"TIMESTAMP\">TIMESTAMP</option> 
			</select>
			<input type=\"text\" name=\"laenge$i\"  placeholder=\"Länge\" size=\"3\" value=\"11\" class=\"input-klein form-control\">
			</p>
			
			<p><span>Standart</span>
			<br>
			<select class=\"custom-select col-3\" name=\"standart$i\">
			<option value=\"off\">Keine</option>
			<option value=\"CURRENT_TIMESTAMP\">CURRENT_TIMESTAMP</option>
			</select>
			</p>
			
			<p>
			<span>Attribut</span>
			<br>
			<select class=\"custom-select col-3\" name=\"attribut$i\">
			<option value=\"off\">Keine</option>
			<option value=\"on update CURRENT_TIMESTAMP\">on update CURRENT_TIMESTAMP</option>
			</select>
			
			
			<span>NULL</span>
			<input type=\"checkbox\" name=\"null$i\">
			</p>
			<p>
			<span>Index</span>
			<br>
			<select class=\"custom-select col-3\" name=\"index$i\">
			<option value=\"off\">Keine</option>
			<option value=\"primary\">PRIMARY</option>
			<option value=\"unique\">UNIQUE</option>
			</select>
			<span>A-I</span>
			<input type=\"checkbox\" name=\"ai$i\">
			</p>
			</div>
			";
		$i++;}while($i<$quanti);
		echo "<input type=\"hidden\" name=\"save_config\" value=\"1\">";
		echo "<input type=\"hidden\" name=\"tb_name\" value=\"$tablename\">";
		echo "<input type=\"hidden\" name=\"quanti\" value=\"$i\">";
		echo "<button id=\"saveCreate\" class='btn btn-info'>Speichern</button>";
		echo "<form>";
		echo "</div>";
		
		}
	
	}

	public  function createCustomTable(){

if(isset($_REQUEST['save_config'])){
	
	$quanti = $_POST['quanti'];
	$table = $_POST['tb_name'];
	$string ="";
	$primary ="";
	
	$q ="CREATE TABLE `".$table."`(";
	
	unset($_POST['save_config']);
	unset($_POST['tb_name']);
	unset($_POST['quanti']);
	$_POST= array_filter($_POST);
	
	/*  echo "<pre>";
	print_r($_POST);
	echo "</pre>"; */ 
	
	function checkTyp($typ,$leng){
		
		if($typ!="TEXT"){$r= "($leng)";}
		return $r;
		}
		
	$i =0; do{
		
	
		if(isset($_POST['standart'.$i])=="off"){$_POST['standart'.$i] ="";}
		if(isset($_POST['attribut'.$i])=="off"){$_POST['attribut'.$i] ="";}
		if(isset($_POST['null'.$i])=="on"){$_POST['null'.$i] ="NULL";}else{$_POST['null'.$i] ="NOT NULL";}
		if(isset($_POST['ai'.$i])=="on"){$_POST['ai'.$i] ="AUTO_INCREMENT";}else{$_POST['ai'.$i] ="";}
		
		if(!empty($_POST['colname'.$i])){
		$komma = ",";
		
		$string .= "`".$_POST['colname'.$i]."` ".$_POST['coltyp'.$i]."  ".checkTyp($_POST['coltyp'.$i],$_POST['laenge'.$i])."  ".$_POST['standart'.$i]."  ".$_POST['attribut'.$i]."  ".$_POST['null'.$i]."   ".$_POST['ai'.$i]." ".$komma;
		
		}
		$i++;
	}while($i<$quanti);
		$q .=$string." PRIMARY KEY (`id`)"; 
		 $q.=") ENGINE = InnoDB";	
		 
		 echo "<textarea cols=\"30\"  rows=\"5\" class='form-control'>".$q."</textarea>";
	 
	 $this->query($q);
	echo "<div class=\"output-message\">Tabelle wurde erstellt | <a href=\"?tb=".$table."\">Aktualisieren</a></div>";
	
	}

}

	public  function deleteTable(){

if(isset($_REQUEST['deleteTable'])){
	$q="DROP TABLE `".$_REQUEST['deleteTable']."`";
	$this->query($q);
	echo "<div class=\"output-message\">Tabelle wurde gelöscht | <a href=\"?overview=1\">Aktualisieren</a></div>";
	}
	
	}
	
	public  function clearTable(){

if(isset($_REQUEST['clearTable'])){
	$q="TRUNCATE `".$_REQUEST['clearTable']."`";
	$this->query($q);
	echo "<div class=\"output-message\">Tabelle wurde geleert | <a href=\"?overview=1\">Aktualisieren</a></div>";
	}
	
	}
	
	public  function editStructureTable(){
	
	if(isset($_REQUEST['structure'])){
		
		$q   	= "SHOW COLUMNS FROM ".$_REQUEST['structure']."";
		$arr	= $this->query($q);
	$exe = mysqli_fetch_assoc($arr);
	do{$t[]=$exe; }while($exe = mysqli_fetch_assoc($arr));
	
	
	echo "<h5>Struktur ".$_REQUEST['structure']." bearbeiten</h5>";
	
	echo "<table>";
	echo "<tr>";
	echo "<th>Feld</th><th>Typ</th><th>Null</th><th>Key</th><th>Default</th><th>Extra</th>";
	echo "</tr>";
	foreach($t as $v=>$k){
		
		
		
		echo "<form method=\"post\">";
		echo "<tr>";
		foreach((array)$k as $f=>$val){
		
		echo "<td align=\"center\"><input type=\"text\" name=\"".$f."\"  value=\"".$val."\" class=\"input-mittel form-control\"> </td>";
		}
		
		echo "<td><input type=\"hidden\" name=\"save_changes\" value=\"".$_REQUEST['structure']."\">
		<input type=\"hidden\" name=\"fieldname\" value=\"".$k['Field']."\"></td>";
		echo "<td><button title=\"".$k['Field']."\" onclick=\"saveRow()\" class='btn btn-info'>Speichern</button></td>";
		echo "<td><input type=\"button\" value=\"löschen\" onclick=\"deleteRow('".$_REQUEST['structure']."','".$k['Field']."')\" class='btn btn-info'></td>";
		
		echo "</tr>";
		echo "</form>";
		
		
		
		
		}
		echo "</table>";
		
		
		
		echo "<hr><div>
		<h5>Spalte hinzufügen</h5>
		<form method=\"post\">
		Spaltenname<br>
		<input type=\"text\" name=\"column\" placeholder=\"name\" class=\"form-control col-2\"> 
		einfügen nach<br>
		<select class=\"custom-select col-2\" name=\"after_column\">";
		foreach($t as $v=>$k){
		echo "<option value=\"".$k['Field']."\">".$k['Field']."</option>";
		}
		
		echo "</select>";
		echo "<select class=\"custom-select col-2\" name=\"typ\">
		<option value=\"INT(11)\">INT</option>
		<option value=\"VARCHAR(200)\">VARCHAR</option>
		<option value=\"TEXT\">TEXT</option>
		</select>";
		echo "<input type=\"hidden\" value=\"".$_REQUEST['structure']."".$_REQUEST['structure']."\" name=\"add_column-tbl\">";
		echo "<button class='btn btn-info'>Hinzufügen</button>";
		echo "</form>";
		echo "</div>";
		}

	}
	
	public function saveStructureChanges(){
	
	if(isset($_REQUEST['save_changes'])){
		
		$q   	= "SHOW COLUMNS FROM ".$_REQUEST['structure']."";
		$arr	= $this->query($q);
		$exe = mysqli_fetch_assoc($arr);
	do{$t[]=$exe; }while($exe = mysqli_fetch_assoc($arr));
	
	
	
		
		if($_REQUEST['Null']=="NO"){$_REQUEST['Null']="NOT NULL";}
		if($_REQUEST['Null']=="YES"){$_REQUEST['Null']="NULL";}
		if($_REQUEST['Extra']=="auto_increment"){$_REQUEST['Extra']="AUTO_INCREMENT";}
		
		
		$q="ALTER TABLE `".$_REQUEST['save_changes']."` CHANGE `".$_REQUEST['fieldname']."` `".$_REQUEST['Field']."` ".$_REQUEST['Type']." ".$_REQUEST['Null']."  ".$_REQUEST['Default']." ".$_REQUEST['Extra'];
		
		$this->query($q);
		
		echo "<div class=\"output-message\">gespeichert | <a href=\"?structure=".$_REQUEST['save_changes']."\">Aktualisieren</a></div>";
		
		}
	 
	}
	
	public function addColumn(){
	
	if(isset($_REQUEST['add_column-tbl'])){
		
	$q= "ALTER TABLE `".$_REQUEST['structure']."` ADD `".$_REQUEST['column']."`  ".$_REQUEST['typ']." AFTER `".$_REQUEST['after_column']."`";
		
		$this->query($q);
		
		echo "<div class=\"output-message\">gespeichert | <a href=\"?structure=".$_REQUEST['structure']."\">Aktualisieren</a></div>";
		
		}
	 
	}
	
	public function deleteColumn(){
	
	if(isset($_REQUEST['drop_column'])){
		
	$q="ALTER TABLE `".$_REQUEST['drop_column']."` DROP `".$_REQUEST['column']."`";
	$this->query($q);
	echo "<div class=\"output-message\">gespeichert | <a href=\"?structure=".$_REQUEST['drop_column']."\">Aktualisieren</a></div>";
	}
	
	}
	
	public function addValues(){
	
	if(isset($_REQUEST['structure'])){
	echo "<hr>";
	echo "<a href=\"?structure=".$_REQUEST['structure']."&addvalues=".$_REQUEST['structure']."\" class='btn btn-info text-white'>Werte einfügen</a>";
	if(isset($_REQUEST['addvalues'])){
		
		$q   	= "SHOW COLUMNS FROM ".$_REQUEST['structure']."";
		$arr	= $this->query($q);
		$exe = mysqli_fetch_assoc($arr);
	do{$t[]=$exe; }while($exe = mysqli_fetch_assoc($arr));
	
	echo "<table>";
	
	echo "<form method=\"post\">";
		echo "<tr>";
		foreach((array)$t as $f=>$val){
		
		echo "<td align=\"center\">".$val['Field']."<textarea name=\"".$val['Field']."\" class='form-control'></textarea> </td>";
		}
		
		echo "<td><input type=\"hidden\" name=\"insert_values\" value=\"".$_REQUEST['structure']."\"></td>";
		echo "<td><button onclick=\"saveRow()\" class='btn btn-info'>Speichern</button></td>";
		
		echo "</tr>";
		echo "</form>";
	
	echo "</table>";
		
		}
	}
	
	}
	
	public function insertValues(){
		
		if(isset($_REQUEST['insert_values'])){
			$tbl = $_REQUEST['insert_values'];
			unset($_POST['insert_values']);
			$clm="";
			$vlm ="";
			foreach($_POST as $post=>$val){
				$clm.=$post.",";
				$vlm.="'".$val."',";
			}
			$clm = substr($clm,0,-1);
			$vlm = substr($vlm,0,-1);
			
			
			echo $q="INSERT INTO `".$tbl."`($clm)VALUES($vlm)";
			$this->query($q);
			echo "<div class=\"output-message\">gespeichert | <a href=\"?structure=".$tbl."\">Aktualisieren</a></div>";
			}
		
		}

public function generatorAufruf(){
	$this->showAllTables();
} 
public function sqlForm(){
		if(isset($_REQUEST['sqlaction'])){
			
			echo "<div class='sql-result mr-5'>";
			echo "<h5>SQL-Code ausführen</h5>";
			echo "<hr>";
		echo "<form method='post'>";
		echo "<textarea name='sqlcode' class='form-control sql-textarea col-8' placeholder='hier SQL-Code'></textarea>";
		echo "<input type='hidden' name='dosqlcode' value='1'>";
		echo "<button class='btn btn-info mt-2'>ok</button>";
		echo "</form>";
		
		echo "</div>";
		$this->doSqlCode();
		}
		
}
public function doSqlCode(){
	if(isset($_REQUEST['dosqlcode'])){
		$sql = strtolower($_REQUEST['sqlcode']);
		echo "<div class='col-10 mr-5'><hr>".$sql."</div>";
		if (preg_match("/select/i", $sql)) {
			echo "<div class='col mr-5'>";
   			$arr = $this->select($sql);
			print_r($arr);
			echo "<hr>";
			echo "<div class='mt-3'>";
			echo "<table class='sql-output'>";
			echo "<tr>";
				foreach($arr[0] as $k=>$v){
					echo "<th>";
						echo $k;
					echo "</th>";
				}
			echo "</tr>";
			echo "<tr>";
			foreach($arr as $k=>$a){
				echo "<tr>";
				foreach($a as $s){
				echo "<td>".$s."</td>";
				}
				echo "</tr>";
				}
			echo "</tr>";
			echo   "</table>";
			echo "</div>";
			echo "</div>";
			} else {
			   $this->query($sql);
			}
		
		
	}
}
}


 ?>