<! DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Owen_Sheehan_renters_list</title>
<style>
td {
	border: 1px solid #1C6EA4;
}
</style>
<body>
	<h1>Connecting to the metro_vision database.</h1>
<?php
$databaseconnect = mysqli_connect('localhost', 'root', '6877769o', 'metro_vision') or die("Connection to the database failed. There error message was :" . mysqli_connect_error());
if (mysqli_ping($databaseconnect)) {
    echo 'MySqlServer' . mysqli_get_server_info($databaseconnect) . ' on ' . mysqli_get_host_info($databaseconnect) . "<br/>";
}
$query = 'SELECT fname, sname, tel FROM customers WHERE id = ANY(SELECT cust FROM rentals WHERE return_date IS NULL);';
$result = mysqli_query($databaseconnect, $query);
echo ("--------<br/>");
if (! ($result)) {
    echo "Nothing came back from that query<br/> Something went wrong:" . mysqli_error($databaseconnect) . "<br/>";
} else {
    echo "<table><caption>Currently out on rent</caption>";

    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
        echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>".$row[2]."</td></tr>";
    }
}
echo "</table>";
mysqli_free_result($result);
mysqli_close($databaseconnect);
?>
</body>
</html>