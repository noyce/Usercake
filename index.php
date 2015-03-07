<?php
/*
UserCake Version: 2.0.2
http://usercake.com
*/
//add button to sign in with google

require_once 'app/init.php';

$db = new DB;
$googleClient = new Google_Client;

$auth = new GoogleAuth($db,$googleClient);

$authUrl=$auth->checkToken();

if($auth->login())
{
	$redirect = 'http://'. $_SERVER['HTTP_HOST']. $_SERVER['PHP_SELF'];
	header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SNU lost and found </title>
	</head>
	<body>
		<?php if($authUrl): ?>
			<a href="<?=$authUrl?>">Sign in with google id</a>
	<?php else: ?>
			you are logged in <a href="logout.php">Log Out</a>
	<?php endif; ?>
	</body>
<html>