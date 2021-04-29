<?php 

function cropImage(){
	$path = "../".$_GET['img'];
	if(isset($_GET['preview'])){
		 $img_r = imagecreatefromjpeg($path);
		 $dst_r = ImageCreateTrueColor( $_GET['w'], $_GET['h'] );
		 imagecopyresampled($dst_r, $img_r, 0, 0, $_GET['x'], $_GET['y'], $_GET['w'], $_GET['h'], $_GET['w'],$_GET['h']);
		 imagejpeg($dst_r);
	}
	if(isset($_GET['savecrop'])){
		
		$img_r = imagecreatefromjpeg($path);
		 $dst_r = ImageCreateTrueColor( $_GET['w'], $_GET['h'] );
		 imagecopyresampled($dst_r, $img_r, 0, 0, $_GET['x'], $_GET['y'], $_GET['w'], $_GET['h'], $_GET['w'],$_GET['h']);
		 imagejpeg($dst_r);
		 
		$altesBild=imagecreatefromjpeg($path);
		$neuesBild=imagecreatetruecolor($_GET['w'],$_GET['h']); 
		imageCopyResized($neuesBild,$altesBild,0,0,$_GET['x'], $_GET['y'], $_GET['w'], $_GET['h'], $_GET['w'],$_GET['h']);
		imagejpeg($neuesBild,$path); 
	}

}
cropImage();