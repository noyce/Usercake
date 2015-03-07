<?php
// logging out user (google sign in)

require_once 'app/init.php';

$db=new DB;
$googleClient = new Google_Client;
$auth = new GoogleAuth($db, $googleClient);

$auth->logout();

header('Location: index.php');

?>

