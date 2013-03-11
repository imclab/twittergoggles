<?php

echo "<head><link href='./css/bootstrap.css' rel='stylesheet'>";
echo "<link href='.css/bootstrap-responsive.css' rel='stylesheet'>";
echo "</head>";

$connect = mysql_connect("sociotechnical.ischool.drexel.edu", "info154", "info154");
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("goggles_test", $connect);

$insert = "INSERT INTO job (query,job_id) '
    SELECT query,job_id
    FROM `job_stage`
    WHERE (query,job_id) NOT IN
    (SELECT query,job_id FROM job)";

mysql_query($insert);
mysql_close($connect);

echo "<meta http-equiv='refresh' content='1,view.php'/>";
?>
