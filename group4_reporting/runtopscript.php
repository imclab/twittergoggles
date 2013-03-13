<?php

//Total Number of Tweets for All Specific Jobs

echo "<h1>Total Number of Tweets for All Specific Jobs</h1>";

include('db_connect_info.txt');

//Establishes connection to database
//$link= mysql_connect('sociotechnical.ischool.drexel.edu', 'info154', 'info154');

$link= mysql_connect($dbhost, $dbuser, $dbpass);

$db_select_result = mysql_select_db($dbname);
if (!$db_select_result) {
    die('*** Error: could not select database: ' . mysql_error() . "\n");
}

//Added to allow all browsers time to load query results
ini_set('max_execution_time', 1000);


// $top1query='select last_count, query, job_id from job where query is not null and last_count is not null order by last_count desc limit 1;';
// $top5query='select last_count, query, job_id from job where query is not null and last_count is not null order by last_count desc limit 5;';
// $top10query='select last_count, query, job_id from job where query is not null and last_count is not null order by last_count desc limit 10;';
// $allquery='select last_count, query, job_id from job where query is not null and last_count is not null order by last_count desc;';

$top1query='select * from tweet_count order by last_count desc limit 1;';
$top5query='select * from tweet_count order by last_count desc limit 5;';
$top10query='select * from tweet_count order by last_count desc limit 10;';
$allquery='select * from tweet_count order by last_count desc;';


$top1result=mysql_query($top1query);
$top5result=mysql_query($top5query);
$top10result=mysql_query($top10query);
$allresult=  mysql_query($allquery);
$top=$_POST['toptweets'];

$CSVarray = array();






//Sets up table
echo "<table border='1'
<tr>
<th>Job ID</th>
<th>Last Count</th>
<th>Result</th>
</tr>";
if($top=='top1'){
    while($row = mysql_fetch_array($top1result))
{
  $CSVarray[] = array ( 'job_id' => $row['job_id'], 'last_count' => $row['last_count'], 'query' => $row['query'] );
}
    mysql_data_seek($top1result,0);
//Populates table
while($row = mysql_fetch_array($top1result)){
    echo"<tr>";
    echo "<td>" . $row["job_id"] . "</td>";
    echo "<td>" . ltrim($row["last_count"],'0') . "</td>";
    echo "<td>" . str_replace(array('%23', '%40', '%20', 'q='), array('#','@',' ',''), $row['query']) . "</td>";
    echo "<tr>";
}
echo "</table>";
}
elseif($top=='top5'){
    
while($row = mysql_fetch_array($top5result))
{
  $CSVarray[] = array ( 'job_id' => $row['job_id'], 'last_count' => $row['last_count'], 'query' => $row['query'] );
}
    mysql_data_seek($top5result,0);
    //Populates table
while($row = mysql_fetch_array($top5result)){
    echo"<tr>";
    echo "<td>" . $row["job_id"] . "</td>";
    echo "<td>" . ltrim($row["last_count"],'0') . "</td>";
    echo "<td>" . str_replace(array('%23', '%40', '%20', 'q='), array('#','@',' ',''), $row['query']) . "</td>";
    echo "<tr>";
}
echo "</table>";
}

elseif($top=='top10'){
    while($row = mysql_fetch_array($top10result))
{
  $CSVarray[] = array ( 'job_id' => $row['job_id'], 'last_count' => $row['last_count'], 'query' => $row['query'] );
}
    mysql_data_seek($top10result,0);
    //Populates table
while($row = mysql_fetch_array($top10result)){
    echo"<tr>";
    echo "<td>" . $row["job_id"] . "</td>";
    echo "<td>" . ltrim($row["last_count"],'0') . "</td>";
    echo "<td>" . str_replace(array('%23', '%40', '%20', 'q='), array('#','@',' ',''), $row['query']) . "</td>";
    echo "<tr>";
}
echo "</table>";
}

elseif($top=='all'){
    while($row = mysql_fetch_array($allresult))
{
  $CSVarray[] = array ( 'job_id' => $row['job_id'], 'last_count' => $row['last_count'], 'query' => $row['query'] );
}
    mysql_data_seek($allresult,0);
    //Populates table
while($row = mysql_fetch_array($allresult)){
    echo"<tr>";
    echo "<td>" . $row["job_id"] . "</td>";
    echo "<td>" . ltrim($row["last_count"],'0') . "</td>";
    echo "<td>" . str_replace(array('%23', '%40', '%20', 'q='), array('#','@',' ',''), $row['query']) . "</td>";
    echo "<tr>";
}
echo "</table>";
}


outputCSV($CSVarray);

function outputCSV($data) {
    $file = fopen("data.csv", "w+");
    function __outputCSV($vals, $key, $filehandler) {
        fputcsv($filehandler, $vals); // add parameters if you want
    }
    array_walk($data, "__outputCSV", $file);
    echo "CSV file successfully created";
    fclose($file);
}



mysql_close($link);


?>