<?php

// this form take user_name and name as input
$name = $_REQUEST['name'];
$user_name = $_REQUEST['u_name'];
if($user_name == "")
{
	echo "<b> Enter a user Name</b>";
	header("Location:signup.php");
	exit();
}
	


// credential for db login
$host = "host=127.0.0.1";
$port = "port=5432";
$dbname = "dbname=chatapp";
$credential = "user=postgres password=###alpha@@@123";


$session = pg_connect("$host $port $dbname $credential");


$query = "Insert into user_login(user_name,name) values ('$user_name','$name')";

$ret = pg_query($session,$query);
if($ret)
{
	header("Location:chatroom.php");
	exit();
}
else
{
	echo "<b> Try Another User Name Later!";
	header("Location:signup.php");
	exit();
	
}
pg_close($session);

?>