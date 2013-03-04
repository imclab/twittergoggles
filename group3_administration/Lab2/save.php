<?php



$job_id = $_POST['job_id'];
$state = $_POST['newstate'];
$zombie_head = $_POST['newzombie_head'];
$since_id_str = $_POST['newsince_id_str'];
$query = $_POST['newquery'];
$description = $_POST['newdescription'];
echo "Job has been succesfully updated:".'<br>';
?>


Job ID: <input type="text" name="job_id" value="<?php echo $job_id; ?>" readonly></br>
New Job State: <input type="text" name="oldstate" value="<?php echo $state; ?>" readonly></br>
New Job Zombie Head: <input type="text" name="oldzombie_head" value="<?php echo $zombie_head; ?>" readonly></br>
New Job Since ID Str: <input type="text" name="oldsince_id_str" value="<?php echo $since_id_str; ?>" readonly></br>
New Job Query: <input type="text" name="oldquery" value="<?php echo $query; ?>" readonly></br>
New Job Description: <input type="text" name="olddescription" value="<?php echo $description; ?>" readonly></br>

<?php
echo '<br/>'.'<a href="index.php">Back To Main Page</a>';

$connect = mysql_connect("localhost", "root", "root");
        if (!$connect)
  {
  die('Could not connect: ' . mysql_error());
  }
        
        mysql_select_db("INFO154_lab2", $connect);
        
        $update = "UPDATE job SET job_id ='$job_id', state='$state', zombie_head='$zombie_head', since_id_str='$since_id_str', query='$query', description='$description' WHERE job_id = '$job_id'"; 
        $result = mysql_query($update);
        
        mysql_close();

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
