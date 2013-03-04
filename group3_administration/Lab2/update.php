<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
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
        
        <form name="update" action="save.php" method="post">
            Job ID: <input type="text" name="job_id" value="<?php echo $row['job_id']; ?>" readonly></br>
            Current Job State: <input type="text" name="oldstate" value="<?php echo $row['state']; ?>" readonly></br>
            Current Job Zombie Head: <input type="text" name="oldzombie_head" value="<?php echo $row['zombie_head']; ?>" readonly></br>
            Current Job Since ID Str: <input type="text" name="oldsince_id_str" value="<?php echo $row['since_id_str']; ?>" readonly></br>
            Current Job Query: <input type="text" name="oldquery" value="<?php echo $row['query']; ?>" readonly></br>
            Current Job Description: <input type="text" name="olddescription" value="<?php echo $row['description']; ?>" readonly></br>
            What would you like to change?</br>
            New Job State:<input type="text" name="newstate"></br>
            New Job Zombie Head:<input type="text" name="newzombie_head"></br>
            New Job Since ID Str:<input type="text" name="newsince_id_str"></br>
            New Job Query:<input type="text" name="newquery"></br>
            New Job Description:<input type="text" name="newdescription"></br>
            <input type="submit" value="submit">
            
        </form>
        
    </body>
</html>

<?php

mysql_close();

?>