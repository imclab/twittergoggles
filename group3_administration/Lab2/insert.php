
<!DOCTYPE html>



<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        echo "New Job Added:".'<br>';
        echo "Query:".'';
        $item = $_POST['query'].'<br>';
        echo $item."<br/>";
        
      
         $connect = mysql_connect("localhost", "root", "root");
        if (!$connect)
  {
  die('Could not connect: ' . mysql_error());
  }
        
        mysql_select_db("INFO154_lab2", $connect);
        
           $insert="INSERT INTO job (query) VALUES ('$_POST[query]')";
        
      if (!mysql_query($insert,$connect))
  {
  die('Error: ' . mysql_error());
  }
echo "1 Job Added";

mysql_close($connect);

echo '<br/>'.'<a href="index.php">Back To Main Page</a>';
       

        
        //(isset($_GET['submit'])){
          // echo "form passed";
        //}
        //else{
        //    echo "form not passed";
        //}
        //$job = $_GET['job'];
        //echo $job;

        //$connect = mysql_connect("localhost", "root", "root");
        //mysql_select_db("INFO154_lab2", $connect);

        //if (isset($job)) {
          //  $query = mysql_query("INSERT INTO query VALUE ('$job')");
          //  if (mysql_query($query, $connect)) {
          //      echo "<center>Record Inserted!</center><br>";
          //  } else {
          //      echo "<center> No entry </center>";
          //  }
       // }
       // mysql_close($connect);
        ?>
    </body>
</html>
