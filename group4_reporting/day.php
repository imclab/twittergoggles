<?php

//Total Number of Tweets Per Day for a Specific Job

echo "<h1>Total Number of Tweets Per Day for a Specific Job</h1>";


$link= mysql_connect('sociotechnical.ischool.drexel.edu', 'info154', 'info154');

//Added to allow all browsers time to load query results
ini_set('max_execution_time', 300);

//Change job_id to select new job, created_at values for new day
$query= "SELECT COUNT(created_at >= '2012-03-28' AND created_at < '2012-03-29'), job_id FROM `twitterinblack46`.`tweet`
    WHERE job_id = 1149 AND created_at >= '2012-03-28' AND created_at < '2012-03-29';";

$result= mysql_query($query);

//Sets up table
echo "<table border='1'
<tr>
<th>Job ID</th>
<th>Total in Day</th>
</tr>";

//Populates table
while($row = mysql_fetch_array($result)){
    echo"<tr>";
    echo "<td>" . $row["job_id"] . "</td>";
    echo "<td>" . $row["COUNT(created_at >= '2012-03-28' AND created_at < '2012-03-29')"] . "</td>";
    echo "<tr>";
}

echo "</table>";

mysql_close($link);

?>
