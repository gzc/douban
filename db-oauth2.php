<?php
	// 你的 API Key
	$api_key = '0b412ba5398070c021c382efac815240';
	// 你的私钥
	$api_key_secret = '6a4821627ccc007e';
  
$ch = curl_init();
$url = 'https://www.douban.com/service/auth2/auth?client_id='.$api_key.'&'
		.'redirect_uri=http://localhost/douban-oauth/gettoken.php&'
		.'response_type=code&
  		  scope=shuo_basic_r,shuo_basic_w,douban_basic_common';

$doubanLogin = '<a href="'.$url.'">login</a>';

?>  

<html>
<head></head>
<body>
<?php echo $doubanLogin ?>
</body>
</html>