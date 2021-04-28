<?php
//phpinfo();


$curl = curl_init();
// Optional Authentication:
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

curl_setopt($curl, CURLOPT_URL, 'http://localhost/testserver/view/home.php');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
file_put_contents("test.txt",$result); 