<?php
$arr = [
    'host' => 'localhost',
    'port' => '5432',
	'dbname' => 'Mai_Shop',
    'user' => 'admin',
    'password' => '131179'
];
$host = $arr['host'];
$port = $arr['port'];
$dbname = $arr['dbname'];
$user = $arr['user'];
$password = $arr['password'];

try {
    $conn = pg_connect("host='".$host."' port='".$port."' dbname='".$dbname."' user='".$user."' password='".$password."'");
    return $conn;
} catch (Exception $e) {
	return null;
}
?>