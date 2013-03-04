
<!DOCTYPE html>



<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $item = $_POST['query'] . '<br>';
        echo "<center> Query: " . $item . "</center><br/>";

        $connect = mysql_connect("localhost", "root", "root");
        if (!$connect) {
            die('Could not connect: ' . mysql_error());
        }

        mysql_select_db("INFO154_lab2", $connect);
        
        //avoids duplication
        
        $duplication = mysql_query("SELECT query FROM job WHERE query='" . $_POST['query'] . "'");
        if (mysql_num_rows($duplication) > 0) {
            echo '<center><b>Job Already Exists.</b></center>';
        } else {
            // inserts new job
            echo "New Job Added:" . '<br>';
            $insert = "INSERT INTO job (query) VALUES ('$_POST[query]')";

            if (!mysql_query($insert, $connect)) {
                die('Error: ' . mysql_error());
            }
            echo "1 Job Added";

            mysql_close($connect);
        }
        echo '<br/>' . '<center><a href="index.php">Back To Main Page</a></center>';



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
