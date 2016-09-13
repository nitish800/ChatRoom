<?php

// this form take user_name and name as input
$message = $_REQUEST['message'];
$user_name = $_REQUEST['u_name'];


// credential for db login
$host = "host=127.0.0.1";
$port = "port=5432";
$dbname = "dbname=chatapp";
$credential = "user=postgres password=###alpha@@@123";


$session = pg_connect("$host $port $dbname $credential");


$query = "Insert into messages(message,from_message) values ('$message','$user_name')";

$ret = pg_query($session,$query);
if($ret)
{
	header("Location:/chat/chatroom.php");
	exit();
}
pg_close($session);

?>