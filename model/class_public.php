<?php
require_once 'connect.php';

class publicController extends connect {
	
public function __construct(){
	parent::__construct();
	//session_destroy();	
	
}
public function checkSwitcher(){
	$q="SELECT onoff FROM zb_switcher";
	$arr = $this->select($q);
	
	if(!isset($_SESSION['admin']) && !isset($_SESSION['webmaster'])){
	switch($arr[0]['onoff']){
		case 0:
		die("<h1>Sorry, This Website is currently offline. Please try to visit later</h1>");
		break;
	}
	}
	if(isset($_SESSION['admin']) || isset($_SESSION['webmaster'])){
	switch($arr[0]['onoff']){
		case 0:
		echo "<div class='pagestatus container-fluid btn-info'>Webseite ist offline</div>";
		break;
		
	
	}
	}
}
public function getTitelPicture(){
	return self::select("SELECT * FROM zb_hauptbild WHERE active=1 ORDER BY sort ASC");
}
public function loginToSite(){
	
	if(isset($_REQUEST['logintosite'])){
		
	
		$u = $_REQUEST['username'];
		$p = $_REQUEST['userpass'];
		$q="SELECT * FROM zb_admin WHERE user='$u' AND pass='$p'";
		$arr = $this->select($q);
		if($arr[0]['id']>0){
			$_SESSION['admin']=$arr[0]['user'];
			header("location:".$this->base."adm/index.php");
		}elseif($u=="zenbis" &&  $p=="nurich"){
			$_SESSION['webmaster']=$u;
			header("location:".$this->base."adm/index.php");
		}else{
			header("location:".$this->base."lg/index.php");
		}
	}
	
}
public function logoutFromSite(){
	if(isset($_REQUEST['logout'])){
		unset($_SESSION['admin']);
		unset($_SESSION['webmaster']);
		header("location: ".$this->base);
	}
}
public function getPages(){
	return $this->select("SELECT * FROM zb_pages WHERE menu=1 ORDER BY sort ASC");
}
public function getTopPages(){
	return $this->select("SELECT * FROM zb_pages WHERE topmenu=1 ORDER BY sort ASC");
}
public function getFootPages(){
	$block1= $this->select("SELECT * FROM zb_pages WHERE footmenu=1  ORDER BY sort ASC LIMIT 0,5");
	$block2= $this->select("SELECT * FROM zb_pages WHERE footmenu=1  ORDER BY sort ASC LIMIT 6,5");
	$block3= $this->select("SELECT * FROM zb_pages WHERE footmenu=1  ORDER BY sort ASC LIMIT 11,5");
	return array($block1,$block2,$block3);
}
public function loadPage(){

	if(isset($_REQUEST['controller'])){
		
		if(file_exists("view/".$_REQUEST['controller'].".php")){
			
		include("view/".$_REQUEST['controller'].".php");	
		}else{
			include("view/404.php");	
		}
	}
	if(!isset($_REQUEST['controller'])){
		include("view/startseite.php");	
		//header("location:".$this->base."../$default");
		
		}
	if($_REQUEST['controller'] =="lg" || $_REQUEST['controller'] =="adm"){
		header("location:".$this->base."../index.php");	
		}
	if($_REQUEST['controller'] =="logout"){
		header("location:".$this->base."../model/actions.php?logout=1");	
		}
	} 
private function websiteTitle(){
	$arr = $this->select("SELECT title FROM zb_websitetitle");
	return $arr[0]['title'];
}
public function siteHead(){
	echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>
	<!--Chrome, Firefox OS and Opera -->
	<meta name='theme-color' content='#000'>
	<!-- Windows Phone -->
	<meta name='msapplication-navbutton-color' content='#000'>
	<!-- iOS Safari -->
<meta name='apple-mobile-web-app-status-bar-style' content='#000'>
	<title>".$this->websiteTitle()."</title>
	<script src='".$this->base."jquery/jquery.js'></script>
	<script src='".$this->base."jquery/jquery-ui.js'></script>
	<script src='".$this->base."bootstrap/js/bootstrap.js'></script>
	<script src='".$this->base."script/custom.js'></script>
	
	<link rel='stylesheet' type='text/css' href='".$this->base."jquery/jquery-ui.css'>
	<link rel='stylesheet' type='text/css' href='".$this->base."icon-font/font-awesome.min.css'>
	<link rel='stylesheet' type='text/css' href='".$this->base."bootstrap/css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='".$this->base."css/custom.css'>
	<link rel='shortcut icon' href='".$this->base."favicon.ico' type='image/x-icon' />
	<link rel='icon' href='".$this->base."favicon.ico' type='image/x-icon' />
	
	<script src=\"https://www.google.com/recaptcha/api.js?render=6Led4rAZAAAAAEBoHYklTtqBhLeE2_qUfw0egZZ8\"></script>
	</head>
	<body>";
	$this->getIndexFormular();
}
private function getIndexFormular(){
	$arr = $this->select("SELECT * FROM zb_forms WHERE page='index'");
	foreach($arr as $form){
		echo $form['html'];
	}
}
public function mainCaroussel($class, $array){
	$lf = 0;
	echo '
	<div id="carouselExampleIndicators" class="carousel slide carousel-'.$class.' mt-4 mb-4" data-ride="carousel">';
	 echo'<div class="carousel-inner">';
   foreach($array as $slide){
	   $active = "";
 		if($lf==0){
			$active = "active";
		}
	 echo '<div class="carousel-item '.$active.'">
		  <img class="d-block w-100" src="adm/pic/'.$slide['bilddatei'].'" alt="'.$slide['beschreibung'].'">';
		 if(!empty($slide['beschreibung'])){
			echo '<div class="carousel-caption text-white w-100">
		  '.$slide['beschreibung'].'
		  </div>';
		}
		  
	echo '</div>';
		$lf++;
 }
  echo '</div>';
  echo '<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>';

}
public function navigation(){
	include 'view/navi.php';
}
public function topNavigation(){
	include 'view/topnavi.php';
}
public function footerNavigation(){
	include 'view/footnavi.php';
}
public function siteFoot(){
	if(!isset($_SESSION['dgsvoconfirm'])){
		 $dsgvo = self::select("SELECT * FROM zb_dsgvo"); 
		echo "<div class='row pt-4 pl-0 pr-0 m-0 fixed-top bg-white border-bottom border-secondary dgsvo-container'>";
		echo "<div class='container pl-3 pr-3'>";
				echo $dsgvo[0]['textinhalt'];
				echo "<div class='row mb-2 pl-4 pr-4'>";
				echo "<div class='col-12 col-md-3 text-right p-2'>";
				echo "<button class='btn btn-info  btn-lg btn-block' id='dsgvo-yes'>ja</button>";
				echo "</div>";
				echo "<div class='col-12 col-md-3 p-2'>";
				echo "<button class='btn btn-secondary  btn-lg btn-block' id='dsgvo-no'>nein</button>";
				echo "</div>";
				echo "</div>";
		echo "</div>";
		echo "</div>";
	}
 	echo '<script src="'.$this->base.'script/bootstrap-lightbox.js"></script>';
	echo "</body>
	</html>";
}
public function loginForm(){
echo "<!doctype html>
	<html>
	<head>
	<meta charset='utf-8'>
	<title>PUBLIC Seiten Titel</title>
	<script src='".$this->base."jquery/jquery.js'></script>
	<script src='".$this->base."jquery/jquery-ui.js'></script>
	<script src='".$this->base."bootstrap/js/bootstrap.js'></script>
	<script src='".$this->base."script/lg.js'></script>
	<link rel='stylesheet' type='text/css' href='".$this->base."jquery/jquery-ui.css'>
	<link rel='stylesheet' type='text/css' href='".$this->base."bootstrap/css/bootstrap.css'>
	<link rel='stylesheet' type='text/css' href='".$this->base."css/lg.css'>
	</head>
	<body>";
	echo "<div class='row form-frame'>";
			if(isset($_REQUEST['passforgoten'])){
				$this->loginFormForgottenHtml();
			}else{
				$this->loginFormHtml();
			}
	echo "</div>";
	echo "</body>
	</html>";
}
public function loginFormHtml(){
	echo "<div class='col text-center'>";
	echo "<form action='".$this->base."model/actions.php'>";
	echo "<div class='form-group mt-2'>";
	echo "<h2>Login to Website</h2>";
	echo "<input type='search' name='username' id='username' class='form-control' placeholder='Benutzer'>";
	echo "</div>";
	echo "<div class='form-group' mt-2>";
	echo "<input type='password' name='userpass' id='userpass' class='form-control' placeholder='Passwort'>";
	echo "<input type='hidden' name='logintosite' value='1'>";
	echo "<button class='btn btn-primary mt-3 btn-login'>login</button>";
	echo "<div class='col mt-4'><a href='?passforgoten=1'>Passwort vergessen?</a></div>";
	echo "</div>";
	echo "</form>";
	echo "</div>";
}
public function dgsvoConfirm(){
		if(isset($_REQUEST['dgsvocheck'])){
			if(isset($_COOKIE['cookieallow'])){
			 echo $_SESSION['dgsvoconfirm']=$_COOKIE['cookieallow'];
		}else{
		echo $_SESSION['dgsvoconfirm'];
		}
		}
		
	if(isset($_REQUEST['dgsvoconfirm'])){
		
		if(isset($_COOKIE['cookieallow'])){
			 echo $_SESSION['dgsvoconfirm']=$_COOKIE['cookieallow'];
		}else{
		$_SESSION['dgsvoconfirm']=$_REQUEST['dgsvoconfirm'];
		switch($_SESSION['dgsvoconfirm']){
			case 1:
			setcookie("cookieallow",$_SESSION['dgsvoconfirm'],time()+864000,"/");
			echo $_SESSION['dgsvoconfirm'];
			break;
			case 2:
			echo $_SESSION['dgsvoconfirm'];
			break;
		}
	}
	}
	
	
	
}
public function loginFormForgottenHtml(){
	echo "<div class='col text-center'>";
	echo $this->wrongAction($_REQUEST['validmail'],"failed","E-mail Adresse ist falsch!");
	echo $this->successAction($_REQUEST['validmail'],"success","Aktuelles Passwort wurde versenden!");
	echo "<form action='../model/actions.php'>";
	echo "<div class='form-group mt-2'>";
	echo "<h2>Passwort vergessen</h2>";
	echo "<input type='email' name='admin_email' id='admin_email' class='form-control' placeholder='E-mail'>";
	echo "</div>";
	echo "<div class='form-group' mt-2>";
	echo "<input type='hidden' name='passforgot' value='1'>";
	echo "<button class='btn btn-primary mt-2 btn-login'>absenden</button>";
	echo "<div class='col mt-4'><a href='index.php'>zum Login</a></div>";
	echo "</div>";
	echo "</form>";
	echo "</div>";
}
private function wrongAction($var,$varval,$alert){
	if($var==$varval){
		return "<div class='col'><div class='alert alert-danger' role='alert'>$alert</div></div>";
	}
}
private function successAction($var,$varval,$alert){
	if($var==$varval){
		return "<div class='col'><div class='alert alert-success' role='alert'>$alert</div></div>";
	}
}
public function adminLeiste(){
	if(isset($_SESSION['admin']) || isset($_SESSION['webmaster'])){
		echo "<nav class='adminleiste nav nav-bar'>"; 
		echo "<li class='nav-item'><a href='".$this->base."adm/index.php' class='nav-link'>Administration</a></li>";
		echo "<li class='nav-item'><a href='".$this->base."model/actions.php?logout=1' class='nav-link'>logout</a></li>"; 
		echo "</nav>";	
	}
}
public function getAdminMail(){
	if(isset($_REQUEST['passforgot'])){
		
	$arr = $this->select("SELECT * FROM zb_admin WHERE admin_email = '".$_REQUEST['admin_email']."'");
	if(!empty($arr[0]['admin_email'])){
		$to = $arr[0]['admin_email'];
		$from = "admin@".$_SERVER['SERVER_NAME'];
		$subject="Passwort vergessen";
		$message = "Das vergessene Passwort lautet: ".$arr[0]['pass']."<p>Automatische E-mail</p>";
		$done = $this->sendMail($to,$from,$subject,$message);
			if(!empty($done)){
				header("location: ../lg/index.php?passforgoten=1&validmail=success");
			}
	}else{
		header("location: ../lg/index.php?passforgoten=1&validmail=failed");
	}
	
	
	}

}
public function setToNavi(){
	if(isset($_REQUEST['setToNavi'])){
		$id = $_REQUEST['setToNavi'];
		$prop = $_REQUEST['prop'];
		$column = $_REQUEST['column'];
		switch($prop){
			case 1:
			$prop = 0;
			break;
			case 2:
			$prop = 2;
			break;
			case 0:
			$prop = 1;
			break;
		}
		//print_r(array("menu"=>$prop));
		$done=$this->update("zb_pages",array($column=>$prop),"id=$id");
		if(!empty($done)){
			$success = "&addtonavi=success";
		} 
		header("location: ../adm/index.php?p=createa$success");	
	}
}
public function inputForm($post){
	if(isset($post['update'])){
	$id = $post['update'];
	unset($post['update']);
	$arr=serialize($post);
	$done = $this->update("zb_pages",array("form"=>$arr),"id=$id");
	if(!empty($done)){
			$success = "&addtonavi=success";
		}
	header("location: ../adm/index.php?p=createa$success");	
	}
}
public function deleteEntry(){
	if($_REQUEST['deleteEntry']){
		$tb = $_REQUEST['tb'];
		$id = $_REQUEST['id'];
		$this->delete($tb,"id",$id);
		header("location:".$this->base."adm/index.php?p=createa");
	}
}
public function activeEntry(){
	if($_REQUEST['activeEntry']){
		$tb = $_REQUEST['tb'];
		$id = $_REQUEST['id'];
		$action = $_REQUEST['activeEntry'];
		$this->update($tb,array("active"=>$action),"id=$id");
		if($tb=="zb_hauptbild" && $action==1){
		$this->update($tb,array("aktiv"=>"aktiv"),"id=$id");
		}
		if($tb=="zb_hauptbild" && $action==2){
		$this->update($tb,array("aktiv"=>"nicht aktiv"),"id=$id");
		}
	}
}
public function pageOrder(){
	if(isset($_REQUEST['savepageorder'])){
	$tb = $_REQUEST['tb'];
	$id=$_REQUEST['id'];
	$sortid=$_REQUEST['sortid'];
	if(!empty($tb)){
		$tb = $tb;
		}else{
			$tb="zb_pages";
			}
			echo $tb;
	echo $this->update($tb,array("sort"=>$sortid),"id=$id");
	}
}
public function itemOrder(){
	if(isset($_REQUEST['saveitemorder'])){
	$tb=$_REQUEST['tb'];
	$id=$_REQUEST['id'];
	$sortid=$_REQUEST['sortid'];
	$this->update($tb,array("sort"=>$sortid),"id=$id");
	}
}
public function deleteColumn(){
	if(isset($_REQUEST['deletecolumn'])){
		$tb = $_REQUEST['table'];
		$column = $_REQUEST['deletecolumn'];
		$q = "ALTER TABLE $tb DROP $column";
		$this->query($q);
		$success = "&addtonavi=success";
		header("location: ../adm/index.php?p=createa$success");	
	}
}
public function modifyColumns(){
	if(isset($_REQUEST['modifyColumns'])){
	$tb = str_replace("zb_","",$_REQUEST['tb']);
	$neworder = $_REQUEST['neworder'];
	
	 foreach($neworder as $colstring){
		$expl = explode("?",$colstring);
		$arr[$expl[0]]=$expl[1];
	} 
	
	$newarr=serialize($arr);
	$done = $this->update("zb_pages",array("form"=>$newarr),"page='$tb'"); 
	}
}
public function checkPlugin($ident){
	$tbname = $this->query("select table_name from information_schema.tables where table_name = '$ident'");
	if($tbname[0]['table_name']==$ident){
		return true;	
	}
}
public function removeType(){
	if(isset($_REQUEST['removeTypeFile'])){
		print_r($_REQUEST);
		$tb = $_REQUEST['tb'];
		$params = $_REQUEST['column'];
		$value = $_REQUEST['value'];
		self::update($tb,array($params=>NULL),"$params='$value'");
		//update("TABLE_NAME",array("liefernr"=>"wert liefernr"), "IDENT=VAL");
		
	}
}
public function insertFormData(){
	if(isset($_REQUEST['action'])){
		switch($_REQUEST['action']){
			case "insertdata":
			$tb = $_POST['actiontable'];
			unset($_POST['action']);
			unset($_POST['actiontable']);
				$this->insert($tb,$_POST);
				//header("location: ../");
			break;
			case "selectdata":
			$tb = $_REQUEST['actiontable'];
			$arr = $this->select("SELECT * FROM $tb");
			break;
		
		}
	}

}
public function memberLogin(){
	
	if($_REQUEST['action']=="memberlogin"){
		$benutzername = $_REQUEST['Benutzername'];
		$passwort = $_REQUEST['Passwort'];
		$login = $_REQUEST['multilogin'];
		
		switch($login){
			case "ibr":
			$arr = self::select("SELECT membernik FROM zb_admin WHERE membernik ='$benutzername' AND memberpass='$passwort'");
			
			if(!empty($arr[0]['membernik'])){
			$_SESSION['member']=$arr[0]['membernik'];
			$uri = "".$this->base."nonpublic";
			}else{
			$uri = $this->base;
			}
			header("location: $uri");
			break;
			
			case "adm":
			$arr = self::select("SELECT * FROM zb_admin WHERE user='$benutzername' AND pass='$passwort'");
			if($arr[0]['id']>0){
				$_SESSION['admin']=$arr[0]['user'];
				header("location:".$this->base."adm/index.php");
			}elseif($benutzername=="zenbis" &&  $passwort=="nurich"){
				$_SESSION['webmaster']=$benutzername;
				header("location:".$this->base."adm/index.php");
			}else{
				header("location:".$this->base."lg/index.php");
			}
			
			break;
			default:
			header("location:".$this->base);
			break;
			}
	}
}
public function memberLogout(){
	if(isset($_REQUEST['mlogout'])){
	$uri = "../";
	unset($_SESSION['member']);
	header("location: $uri"); 
	}
}
private function sendKontaktMessage(){
	
	$email = self::select("SELECT admin_email FROM zb_admin");
	$to = $email[0]['admin_email'];
	$from = $_REQUEST['email'];
	$anrede = $_REQUEST['anrede'];
	$firstname = $_REQUEST['Vorname'];
	$lastname = $_REQUEST['Name'];
	$subject = "Nachricht von Kontaktformular - ".$anrede." ".$firstname." ".$lastname;
	$message = strip_tags($_REQUEST['Nachricht']); 
	return $this->sendMail($to,$from,$subject,$message);
}
public function checkCaptsha(){
	
	if(isset($_REQUEST['cptoken'])){
		$tocken = $_REQUEST['cptoken'];
		$url = "https://www.google.com/recaptcha/api/siteverify";
		$data = [
			'secret' => "6Led4rAZAAAAAHkXP59xTSYAjNlwdrVX4KkBCtm8",
			'response' => $tocken,
		];

		$options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		
		  switch($res['success']) 
		 {
			case 1:
			if($res['score']>0.5 ){
				$callback= $this->sendKontaktMessage();
					if($callback==1){
						header("location:".$this->base."kontakt/send/success");
					}
				}else{
				 header("location:".$this->base."kontakt/send/failed");
				}
			break;
		 	default:
			 header("location:".$this->base."kontakt/send/failed");
			break;
		} 
	}
	
}
public function chooseKategorie(){
    $kategorie = $_REQUEST['kategorie'];
	$tb = $_REQUEST['tb'];
    $id = $_REQUEST['id'];
	$res = $this->update($tb,array("kategorie"=>$kategorie), "id=$id");
	echo $res;
}
public function modalLichtbox(){
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
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>	
			</div>';
			
echo '<div class="modal fade" id="videomodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          
          <div class="modal-body mb-0 p-0">
            <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
              <iframe src="" id="targetframe" ></iframe>
            </div>
          </div>
		  
        </div>
      </div>
    </div>';
}
public function lichtboxImage($array){
	return '<div class="col-6 col-md-6 col-lg-4 thumb p-0 mb-0 mt-0">
       <a class="gallery-item" href="#" data-image-id="" data-toggle="modal" data-title="'.$array["beschreibung"].'"
data-image="adm/pic/'.$array["bilddatei"].'" data-target="#image-gallery"><img class="img-thumbnail shadow"src="adm/pic/TN'.$array["bilddatei"].'" alt=""></a>
            </div>';
}
public function entryView(){
	if(isset($_REQUEST['entryview'])){
	echo $_SESSION['entryview'] = $_REQUEST['entryview'];
	}
}
public function downloadFile($filename,$type){
		switch($type){
			case "video":
			case "audio":
			$filepath = "../adm/media/" . $filename;
			break;
			case "doc":
			$filepath = "../adm/docs/" . $filename;
			break;
		}
        // Process download
        if(file_exists($filepath)) {
			header("Content-Type: application/octet-stream");
			header("Content-Transfer-Encoding: Binary");
			header("Content-disposition: attachment; filename=\"".$filename."\""); 
			echo readfile($filepath); 
			} else {
            http_response_code(404);
	        die();
        }

}
}