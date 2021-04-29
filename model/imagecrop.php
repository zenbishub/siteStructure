<?php 
echo $path = "../pic/Gruppenbild.JPG";
function cropImage(){
echo $path = "../pic/Gruppenbild.JPG";
//content/imagecrop.php?x=0&y=78&w=1400&h=709&img=../pic/Gruppenbild.JPG
/* $altesBild=imagecreatefromjpeg($path);
$neuesBild=imagecreatetruecolor($_GET['w'],$_GET['h']); 
imageCopyResized($neuesBild,$altesBild,0,0,$_GET['x'], $_GET['y'], $_GET['w'], $_GET['h'], $_GET['w'],$_GET['h']);
imagejpeg($neuesBild,"../pic/test.jpg");  */

 $img_r = imagecreatefromjpeg("../pic/Gruppenbild.JPG");
 $dst_r = ImageCreateTrueColor( 1400, 750 );
 
 imagecopyresampled($dst_r, $img_r, 0, 0, 0, 0, 1400, 750, 1400,750);
 imagejpeg($dst_r);
}
//cropImage();