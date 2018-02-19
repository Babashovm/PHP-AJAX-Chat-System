<?php 

$host = "localhost";//Usually it will be localhost,sometimes is server ip address
$user = "root";//SQL loqin user name.If you are not admin in your server it willbe another username
$pass = ""; //In local there is not password.
$db_name = "chat"; //database name

$con = new mysqli($host,$user,$pass,$db_name);

?>