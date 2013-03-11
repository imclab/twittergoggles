<?php
echo "<head><link rel='stylesheet' href='bootstrap/bootstrap/css/bootstrap.css' type='text/css' /></head>";

$connect = mysql_connect("localhost", "root", "root");
mysql_select_db("INFO154_lab2", $connect);

$insert = "INSERT INTO job (query,job_id) '
    SELECT query,job_id
    FROM `job_stage`
    WHERE (query,job_id) NOT IN
    (SELECT query,job_id FROM job)";

mysql_query ($insert);
mysql_close($connect);

echo "<meta http-equiv='refresh' content='1,view.php'/>";
?>
