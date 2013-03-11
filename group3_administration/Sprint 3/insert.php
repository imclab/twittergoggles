
<!DOCTYPE html>



<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css" type="text/css" />
    </head>
    <center>
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
            echo "Job Added";

            mysql_close($connect);
        }
        echo '<br/>' . '<center><a href="index.php">Back To Main Page</a></center>';

        ?>
        </body>
    </center>
</html>
