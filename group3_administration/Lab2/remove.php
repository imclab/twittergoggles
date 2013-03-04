<?php

$job_id = $_POST['job_id'];

echo "Job has been deleted.".'<br>';


echo '<br/>'.'<a href="index.php">Back To Main Page</a>';

$connect = mysql_connect("localhost", "root", "root");
        if (!$connect)
  {
  die('Could not connect: ' . mysql_error());
  }
        
        mysql_select_db("INFO154_lab2", $connect);
        
        $delete = "DELETE FROM job WHERE job_id = '$job_id'";
        $result = mysql_query($delete);
        
        mysql_close();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
