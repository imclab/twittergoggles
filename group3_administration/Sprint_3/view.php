<?php

$connect = mysql_connect("sociotechnical.ischool.drexel.edu", "info154", "info154");
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("goggles_test", $connect);

$query = "select * from job";
$result = mysql_query($query);


echo "<head><link href='./css/bootstrap.css' rel='stylesheet'>";
echo "<link href='.css/bootstrap-responsive.css' rel='stylesheet'>";
echo "</head>";

echo "<center>";
echo "<h1>Current Jobs</h1>";
echo '<br/>' . '<a href="loadjobs.php">Load Stored Jobs</a>';
echo '<br/>' . '<a href="index.php">Back To Main Page</a>';
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