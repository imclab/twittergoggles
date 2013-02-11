<?php

//Total Number of Tweets for All Specific Jobs

echo "<h1>Total Number of Tweets for All Specific Jobs</h1>";

//Establishes connection to database
$link= mysql_connect('sociotechnical.ischool.drexel.edu', 'info154', 'info154');

//Queries database for all jobs and total tweets
$query= "SELECT COUNT(tweet_id_str), job_id FROM `twitterinblack46`.`tweet` 
    GROUP BY job_id;";


$result= mysql_query($query);

//Sets up table
echo "<table border='1'
<tr>
<th>Job ID</th>
<th>Tweet Count</th>
</tr>";

//Populates table
while($row = mysql_fetch_array($result)){
    echo"<tr>";
    echo "<td>" . $row["job_id"] . "</td>";
    echo "<td>" . $row["COUNT(tweet_id_str)"] . "</td>";
    echo "<tr>";
}

echo "</table>";

mysql_close($link);

?>