<?php

	// 你的 API Key
	$api_key = '0b412ba5398070c021c382efac815240';
	// 你的私钥
	$api_key_secret = '6a4821627ccc007e';
	
$code = $_GET['code'];

$key0 = 'useless';
$val0 = '0';
$key1 = 'client_id';
$val1 = $api_key;
$key2 = 'client_secret';
$val2 = $api_key_secret;
$key3 = 'redirect_uri';
$val3 = 'http://localhost/douban-oauth/gettoken.php';
$key4 = 'grant_type';
$val4 = 'authorization_code';
$key5 = 'code';
$val5 = $code;
$data = $key1."=".$val1."&".$key2."=".$val2."&".$key3."=".$val3."&".$key4."=".$val4."&".$key5."=".$val5;

function request_by_curl($remote_server,$post_string){
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$remote_server);
curl_setopt($ch,CURLOPT_POSTFIELDS,'mypost='.$post_string);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$data = curl_exec($ch);
curl_close($ch);
return $data;
}

$post_string = $key0."=".$val0."&".$key5."=".$val5."&".$key1."=".$val1."&".$key3."=".$val3."&".$key4."=".$val4."&".$key2."=".$val2;
$content = request_by_curl('https://www.douban.com/service/auth2/token?',$post_string);
$response = json_decode($content, true);
$accesstoken = $response['access_token'];

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,'https://api.douban.com/v2/user/~me');
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: ' . 'Bearer ' . $accesstoken)); 
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($ch);
curl_close($ch);

print_r(json_decode($response,true));
?>