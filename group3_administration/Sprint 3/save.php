<?php
echo "<center>";
echo "<head><link rel='stylesheet' href='bootstrap/bootstrap/css/bootstrap.css' type='text/css' /></head>";


$query = $_POST['newquery'];
$job_id = $_POST['job_id'];
echo "Job Query has been succesfully updated to:".'<br>';
echo $query.'</br>';

echo '<br/>'.'<a href="index.php">Back To Main Page</a>';

$connect = mysql_connect("localhost", "root", "root");
        if (!$connect)
  {
  die('Could not connect: ' . mysql_error());
  }
        
        mysql_select_db("INFO154_lab2", $connect);
        
        $update = "UPDATE job SET query = '$query' WHERE job_id = '$job_id'";
        $result = mysql_query($update);
        
        mysql_close();

echo "</center>";
?>
