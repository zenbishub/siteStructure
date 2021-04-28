<?php
// select("SELECT * FROM TABLE");
// insert("TABLE_NAME",array("liefernr"=>"wert liefernr"));
// update("TABLE_NAME",array("liefernr"=>"wert liefernr"), "IDENT=VAL");
// delete("TABLE_NAME","IDENT","IDENT_VALUE");

class connect{
	public $host;
	public $dbase;
	public $hoststring;
	public $user;
	public $pass ;
	private $pdo;
	public $base;
	public $sended;
	public function __construct(){
		session_start();
			$this->dbase = "DB4185644";
			$this->host = "localhost";
			$this->user = "root";
			$this->pass = "";
			$this->hoststring = "mysql:host=".$this->host.";dbname=".$this->dbase.";";
			$this->pdo = $this->doConnect();
			//$this->base = "CRUD/";
			$this->base = "https://".$_SERVER['HTTP_HOST']."/entwicklung/";
			//Achtung! bitte in .htaccess den Basepath auch ändern
			
			error_reporting(0);
	}
	private function doConnect(){
		try
		{
		return  $dbh = new PDO($this->hoststring,$this->user,$this->pass);
		}
		catch (Exception $e){echo "Unable to connect: " . $e->getMessage() ."<p>";
		}
	}
	public function select($q){
		$rows = array();
			foreach ($this->pdo->query($q) as $row) {
			$rows[] = $row;
			}
		return $rows;
	}
	public function columnMeta($tb){
		$tbmeta = $this->pdo->query("select column_name from information_schema.columns where table_name = '$tb'");
		$cols = $tbmeta->fetchAll(PDO::FETCH_ASSOC);
		$i = 0;
		foreach ($cols as $key => $value) {
		$columnMeta = $tbmeta->getColumnMeta($i);	
			switch ($columnMeta['native_type']) {
				case 'DATETIME':
				case 'VAR_STRING':
				case 'BLOB':
				$colmeta[$key] = "string:".$columnMeta['flags'][0];
				break;
				default:
				$colmeta[$key] = "notstring:null";
				break;
				}
				$i++;
			}
		return $colmeta;
	}
	public function insert($tb,$params){
		
		$colmeta= $this->columnMeta($tb);
		$keys = "";
		$values = array();
		$holder = "";
		
		foreach($params as $paramCN => $paramVal){
			foreach($colmeta as $key=>$data){
				$explData = explode(":",$data);
				if($paramCN==$key){
					$keys .= "$paramCN,";
					if(is_array($paramVal)){
					$values[]= implode(", ",$paramVal);
					}else{
					$values[]= $paramVal;
					}
					
					$holder .= "?,";
				}
			}
		}
		
		$qString = "INSERT INTO $tb(".substr($keys,0,-1).")VALUES(".substr($holder,0,-1).")";
		$stmt= $this->pdo->prepare($qString);
		
		if($stmt->execute($values)){
			return "Insert Data was sucessfull";
		}
	}
	public function update($tb,$params,$identParam){
		
		$colmeta= $this->columnMeta($tb);
		$keys = "";
		$values = array();
		$holder = "";
		
		foreach($params as $paramCN => $paramVal){

			foreach($colmeta as $key=>$data){
				//$explData = explode(":",$data);
				
				if($paramCN==$key){
					$keys .= "$paramCN=?,";
					
					if(is_array($paramVal)){
					$values[]= implode(", ",$paramVal);
					}else{
					$values[]= $paramVal;
					}
					
				}
			}
		}
		
		$qString = "UPDATE $tb SET ".substr($keys,0,-1)." WHERE $identParam";
		$stmt= $this->pdo->prepare($qString);
		
		if($stmt->execute($values)){
			return "Update Data was sucessfull";
		}
	}
	public function uploadFiles($tb, $files, $ident, $path, $fixheight=""){
		
		if(!empty($files)){
			$keys ="";
			foreach($files as $key => $vals){
				$column = $key;
				$type = explode("/",$files[$column]['type']);
		 		if($files[$column]['name']){
						switch($type[0]){
						case "image":
						$path = "pic/";
						$thumb=1;
						break;
						case "audio":
						case "video":
						$path = "media/";
						break;
						default:
						$path = "docs/";
					}
					move_uploaded_file($files[$column]['tmp_name'],$path."".str_replace("-","",$files[$column]['name']));
					$fileArray=array($key=>str_replace("-","",$files[$column]['name'])); 
					if(empty($ident)){
					$lastEntry = $this->select("SELECT * FROM $tb ORDER by id DESC");
					$ident = "id=".$lastEntry[0]['id'];
					}
					$this->update($tb,$fileArray,$ident); 
					if(!empty($thumb)){
						$this->resizeBild($path,$path,str_replace("-","",$files[$column]['name']),1400,$fixheight);
						$this->machAvatar($path, $path, str_replace("-","",$files[$column]['name']));
					}
				} 
			}
		}
	}
	public function delete($tb, $ident, $identval){
		$qString = "DELETE FROM $tb WHERE $ident=$identval";
		$stmt= $this->pdo->prepare($qString);
		if($stmt->execute(array($identval))){
			return "Delete Data was sucessfull";
		}
	}
	public function numRows($qString){
		$num = $this->pdo->query($qString);
		return $rowCount =  $num->rowCount();
		}
	public function query($q){
		foreach ($this->pdo->query($q) as $row) {
			$rows[] = $row;
			}
		return $rows;
	}
	public function sendMail($to,$from,$subject,$message){
		
		$empfaenger = $to;//'info@duoclaste.de';
		$absender = $from;
		$subject = $subject;//'Anfrage über Kontaktformular - '.$firstname." ".$lastname;
		$message = $message;
		
		$header = ("From: " . $absender . "\n");
		$header .= ("Reply-To: " . $absender . "\n");
		$header .= ("Return-Path: " . $absender . "\n");
		$header .= ("X-Mailer: PHP/" . phpversion() . "\n");
		$header .= ("X-Sender-IP: " . $REMOTE_ADDR . "\n");
		$header .= ("Content-type: text/html; charset=utf-8\n");
		$done = mail($empfaenger, $subject, $message, $header);
		return $done;
	}
	public function shortText($text, $range){
		
		 $explode = explode(" ",$text);
		 
		$countOrigin = count($explode);
		$i=0;
		do{$shortText[] = $explode[$i]; $i++;}while ($i<$range);
		if($countOrigin>$i){
			$punkte="...";
			}
		
		return implode(" ",$shortText)."".$punkte;
	}
	public function resizeBild($pfadIn, $PfadOut, $pic, $resizeTo, $fixhight=""){
				
				$PicPathIn=$pfadIn; 
				$PicPathOut=$PfadOut;
				$resizeTo = $resizeTo;
				
				// Orginalbild 
				$bildtotmb=$pic; 
				
				// Bilddaten ermitteln 
				list($width, $height) = getimagesize("$PicPathIn"."$bildtotmb");
				$size = getimagesize("$PicPathIn"."$bildtotmb");
				if($width<350){
					return false;
				}
				
					$ratio = $width/$height; 
					$neueBreite=$resizeTo; 
					$neueHoehe=$neueBreite/$ratio;
				//wird auf Fixe Höhe geschnitten wenn  $fixhight ist nict leer
				 if(!empty($fixhight)){
					$neueHoehe = $fixhight;
				} 
				if($size[2]==1) { 
				// GIF 
				$altesBild=imagecreatefromgif("$PicPathIn"."$bildtotmb"); 
				$neuesBild=imagecreatetruecolor($neueBreite,$neueHoehe); 
				imageCopyResized($neuesBild,$altesBild,0,0,0,0,$neueBreite,$neueHoehe,$width,$height);
				imagegif($neuesBild,"$PicPathOut".""."$bildtotmb"); 
				} 
				
				if($size[2]==2) { 
				// JPG 
				
				$altesBild=imagecreatefromjpeg("$PicPathIn"."$bildtotmb");
				$neuesBild=imagecreatetruecolor($neueBreite,$neueHoehe); 
				imageCopyResized($neuesBild,$altesBild,0,0,0,0,$neueBreite,$neueHoehe,$width,$height);
				imagejpeg($neuesBild,"$PicPathOut".""."$bildtotmb",70); 
				} 
				
				if($size[2]==3) { 
				// PNG 
				$altesBild=imagecreatefrompng("$PicPathIn"."$bildtotmb"); 
				$neuesBild=imagecreatetruecolor($neueBreite,$neueHoehe); 
				imageCopyResized($neuesBild,$altesBild,0,0,0,0,$neueBreite,$neueHoehe,$width,$height);
				imagepng($neuesBild,"$PicPathOut".""."$bildtotmb",70); 
				} 
				
				return $PicPathOut."".$bildtotmb;
	
	}
	public function machAvatar($pfadIn, $PfadOut, $pic){ 
	//////macht miniaturen////////////////////////////////////////////////////////////////////////////////////////////////////////////////
				
				$PicPathIn=$pfadIn; 
				$PicPathOut=$PfadOut; 
				
				// Orginalbild 
				$bildtotmb=$pic; 
				
				// Bilddaten ermitteln 
				$size=getimagesize("$PicPathIn"."$bildtotmb"); 
				$breite=$size[0]; 
				$hoehe=$size[1]; 
				$neueBreite=400; 
				 if ($breite > $hoehe) {
				  $y = 0;
				  $x = ($breite - $hoehe) / 2;
				  $nBreite = $hoehe;
				} else {
				  $x = 0;
				  $y = ($hoehe - $breite) / 2;
				  $nBreite = $breite;
				} 
				
				if($size[2]==1) { 
				// GIF 
				$altesBild=imagecreatefromgif("$PicPathIn"."$bildtotmb"); 
				$neuesBild=imagecreatetruecolor($neueBreite,$neueBreite); 
				imageCopyResized($neuesBild,$altesBild,0,0,$x, $y,$neueBreite,$neueBreite,$nBreite,$nBreite);
				imageGIF($neuesBild,"$PicPathOut"."TN"."$bildtotmb"); 
				} 
				
				if($size[2]==2) { 
				// JPG 
				$altesBild=imagecreatefromjpeg("$PicPathIn"."$bildtotmb");
				$neuesBild=imagecreatetruecolor($neueBreite,$neueBreite); 
				imageCopyResized($neuesBild,$altesBild,0,0,$x, $y,$neueBreite,$neueBreite,$nBreite,$nBreite);
				ImageJPEG($neuesBild,"$PicPathOut"."TN"."$bildtotmb"); 
				} 
				
				if($size[2]==3) { 
				// PNG 
				$altesBild=imagecreatefrompng("$PicPathIn"."$bildtotmb"); 
				$neuesBild=imagecreatetruecolor($neueBreite,$neueBreite); 
				// set background to white
				$white = imagecolorallocate($neuesBild, 255, 255, 255);
				imagefill($neuesBild, 0, 0, $white);
				imageCopyResized($neuesBild,$altesBild,0,0,$x, $y,$neueBreite,$neueBreite,$nBreite,$nBreite);
				ImagePNG($neuesBild,"$PicPathOut"."TN"."$bildtotmb"); 
				} 
				
				return $PicPathOut."".$bildtotmb;
	
	}	
	public function formElemente(){
		return $arr = array(
		"text"=>"Textfeld",
		"file"=>"Datei",
		"select"=>"Select",
		"multiselect"=>"Multiselect",
		"textarea"=>"Texarea",
		"password"=>"Passwort",
		 "email"=>"E-Mail",
		 "checkbox"=>"Checkbox",
		 "radio"=>"Radio",
		 "button"=>"Button",
		 "submit"=>"Submit");
	}
}

 //$o = new connect();
/*$o->update("wedb",array(
"liefernr"=>"wert liefernr",
"pos"=>"position",
"bestellnr"=>"wert bestnr",
"artikelnr"=>"wert artiknr",
"seriennr"=>"wert seriennr",
"menge"=>10,
"einheit"=>"wert einheit",
"komplett"=>"wert komplett",
"lagerort"=>"wert lagerort",
"auslagerort"=>"wert auslagerort",
"bewegungs"=>"wert bewegungs",
"bewegungs2"=>"wert bewegungs2",
"fifodat"=>"wert fifodat",
"stellplatz"=>"wert stellplatz",
"tbnr"=>"wert tbnr",
"benutzer"=>"wert benutzer",
"datum"=>"wert datum",
"funktion"=>"wert funktion",
"erledigt"=>"1",
"meldung"=>"wert meldung",
),"count=1");
*/



