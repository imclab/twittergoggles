<?php

$connect = mysql_connect("localhost", "root", "root");
mysql_select_db("INFO154_lab2", $connect);
$query = "select * from job";
$result = mysql_query($query);

echo "<head><link rel='stylesheet' href='bootstrap/bootstrap/css/bootstrap.css' type='text/css' /></head>";
echo "<center>";
echo "<h1>Current Jobs</h1>";
echo '<br/>'.'<a href="loadjobs.php">Load Stored Jobs</a>';
echo '<br/>'.'<a href="index.php">Back To Main Page</a>';
echo "</center>";
echo "<table align='center' border='1' width='100'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Query</th>";
echo "<th>Edit</th>";
echo "</tr>";
while ($row = mysql_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['job_id'] . "</td>";
    echo "<td>" . $row['query'] . "</td>";
    echo "<td><a href=\"update.php?job_id=" . $row['job_id'] . "\"> Edit </a></td>";
    echo "</tr>";
}
echo "</table>";
?>