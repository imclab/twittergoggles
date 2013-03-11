<?php

echo "<center>";
echo "<head><link href='./css/bootstrap.css' rel='stylesheet'>";
echo "<link href='.css/bootstrap-responsive.css' rel='stylesheet'>";
echo "</head>";

$query = $_POST['newquery'];
$job_id = $_POST['job_id'];
echo "Job Query has been succesfully updated to:" . '<br>';
echo $query . '</br>';

echo '<br/>' . '<a href="index.php">Back To Main Page</a>';

$connect = mysql_connect("sociotechnical.ischool.drexel.edu", "info154", "info154");
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("goggles_test", $connect);

$update = "UPDATE job SET query = '$query' WHERE job_id = '$job_id'";
$result = mysql_query($update);

mysql_close();

echo "</center>";
?>
