<! DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Owen_Sheehan_add_customer</title>
<style>
td {
	border: 1px solid #1C6EA4;
}
</style>
<body>
	<h1>Connecting to the metro_vision database.</h1>
<?php
$fname = htmlentities(ucfirst($_POST['fname']));
$sname = htmlentities(ucfirst($_POST['sname']));
$tel = htmlentities($_POST['tel']);
$dob = htmlentities($_POST['dob']);
$databaseconnect = mysqli_connect('localhost', 'root', '6877769o', 'metro_vision') or die("Connection to the database failed. There error message was :" . mysqli_connect_error());
if (mysqli_ping($databaseconnect)) {
    echo 'MySqlServer' . mysqli_get_server_info($databaseconnect) . ' on ' . mysqli_get_host_info($databaseconnect) . "<br/>";
}
$query = "INSERT into customers(fname,sname,tel,dob) VALUES('$fname','$sname','$tel','$dob');";
echo ("--------<br/>");
if(mysqli_query($databaseconnect, $query)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($databaseconnect);
}

mysqli_close($databaseconnect);
?>
</body>
</html>