<!DOCTYPE html>
<?php

$job_id = $_GET['job_id'];

$connect = mysql_connect("localhost", "root", "root");
        if (!$connect)
  {
  die('Could not connect: ' . mysql_error());
  }
        
        mysql_select_db("INFO154_lab2", $connect);
        
        $sql = "SELECT * FROM job WHERE job_id = $job_id LIMIT 1"; 
        $result = mysql_query($sql);
        
        $row = mysql_fetch_array($result);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        
        <form name="update" action="remove.php" method="post">
            Job ID: <input type="text" name="job_id" value="<?php echo $row['job_id']; ?>" readonly></br>
            Current Job Query: <input type="text" name="oldquery" value="<?php echo $row['query']; ?>" readonly></br>
            What would you like to delete the Job?</br> 
            <input type="submit" value="delete">
            
        </form>
        
    </body>
</html>

<?php
echo '<br/>'.'<a href="index.php">Back To Main Page</a>';
mysql_close();

?>