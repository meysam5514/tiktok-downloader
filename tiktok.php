<?php
error_reporting(false);
header('Content-type: application/json;'); 

$urlside=$_GET['url'];
//$langside=$_GET['lang'];

//$data['language'] = "";
$data['url'] = $urlside;


$ch = curl_init();
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
curl_setopt($ch, CURLOPT_URL,"https://api.videodownloaderpro.net/api/convert");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_COOKIEJAR,"cookie.txt");
//curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/79.0.3945.130 Safari/537.36");
//curl_setopt($ch, CURLOPT_HEADER, true);

$meysam1= curl_exec($ch);
curl_close($ch);    


$list = json_decode($meysam1,true);

for($i=0;$i<=count($list['url'])-1;$i++){

$urltype=$list['url'][$i]['type'];
$urldown=$list['url'][$i]['url'];

$da =['url'=>$urldown , 'type' => $urltype];
$pptpr[]=$da;

}
echo json_encode(['ok' => true, 'channel' => '@SIDEPATH','writer' => '@Meysam_S71','Results' =>$pptpr], 448);










