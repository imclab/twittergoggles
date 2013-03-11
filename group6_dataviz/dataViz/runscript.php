<?php

//Total Number of Tweets for All Specific Jobs

echo "<h1>Total Number of Tweets for All Specific Jobs</h1>";

//Establishes connection to database
$link= mysql_connect('sociotechnical.ischool.drexel.edu', 'info154', 'info154');

//Added to allow all browsers time to load query results
ini_set('max_execution_time', 1000);

$job_id_all= $_POST['job_id'];

$query = 'select last_count, query, job_id from twitterinblack46.job where job_id in ('.$job_id_all.') order by last_count desc;';

$result= mysql_query($query);

function outputCSV($data) {
    $file = fopen("data.csv", "w+");
    function __outputCSV($vals, $key, $filehandler) {
        fputcsv($filehandler, $vals); // add parameters if you want
    }
    array_walk($data, "__outputCSV", $file);
    echo "CSV file successfully created";
    fclose($file);
}

$num_results = mysql_num_rows($result); 
if ($num_results > 0){ 

while($row = mysql_fetch_array($result))
{
  $CSVarray[] = array ( 'job_id' => $row['job_id'], 'last_count' => $row['last_count'], 'query' => $row['query'] );
}

//Sets up table
echo "<table border='1'
<tr>
<th>Job ID</th>
<th>Last Count</th>
<th>Result</th>
</tr>";
mysql_data_seek($result,0);
//Populates table
while($row = mysql_fetch_array($result)){
    echo"<tr>";
    echo "<td>" . $row["job_id"] . "</td>";
    echo "<td>" . ltrim($row["last_count"],'0') . "</td>";
    echo "<td>" . str_replace(array('%23', '%40', '%20', 'q='), array('#','@',' ',''), $row['query']) . "</td>";
    echo "<tr>";
}
echo "</table>";



outputCSV($CSVarray);



}

else{
    echo "No results match that search criteria";
}

mysql_close($link);



?>
<html>
</br>
<a href="attempt2.php">View Graph</a>
</html>