<html>
<head><title>Chat Room</title>

<style>

h1{
	text-align:center;
	color:#ffffff;
}
.pa{
	margin-left:400px;
	float:left;
}
.pa2{
	margin-left:400px;
	
}
.inp_size{
	width:200px;
}
.row1{
	text-align:center;
}

</style>
</head>
<body>
<?php

$host = "host=127.0.0.1";
$port = "port=5432";
$dbname = "dbname=chatapp";
$credential = "user=postgres password=###alpha@@@123";


$session = pg_connect("$host $port $dbname $credential");

$query = "select message,from_message from messages";


$result = pg_query($session,$query);
?>
<div class="pa2">
<table width="500px" border="0px" bgcolor="#ede7f6" >
<tr bgcolor="#b39ddb">
	<th colspan="2"><h1>Chat</h1></th>
</tr>
<tr>
	<td class="row1" >User Name</td>
	<td class="row1" >Message</td>
</tr>
<?php
if($result){
while($result_data = pg_fetch_row($result))
{
echo "<tr>";
echo "<td class='row1' >".$result_data[1]."</td>";
echo "<td class='row1' >".$result_data[0]."</td>";
echo "</tr>";
}
}
pg_close($session);
?>
</table>
</div>


<br>
<br>

<div class="pa">
<form id="form1" name="form1" method="post" action="on_message.php">

<table width="500px"  height="100px"  bgcolor="#b0bec5"  >
<tr>
	<td class="row1" >Enter Message</td>
	<td class="row1" ><textarea type="text" name="message" class="inp_size" ></textarea></td>
</tr>
<tr>
	<td class="row1" >Enter UserName</td>
	<td class="row1" ><input type="text" name="u_name" class="inp_size" /></td>
</tr>
<tr>
	<td colspan="2" align="center"><input type="Submit" name="Submit" value="Message"/></td>
</tr>

</table>
</form>
</div>


</body>
</html>