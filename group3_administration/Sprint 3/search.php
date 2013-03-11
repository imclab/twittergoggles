<?php
echo "<head><link rel='stylesheet' href='bootstrap/bootstrap/css/bootstrap.css' type='text/css' /></head>";
echo '<center><h1>Search Results</h1></cetner>';

$item = $_POST['query'] . '<br>';
echo "<center> Query: " . $item . "</center><br/>";

$connect = mysql_connect("localhost", "root", "root");
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("INFO154_lab2", $connect);

//identifies if exists

$duplication = mysql_query("SELECT query FROM job WHERE query='" . $_POST['query'] . "'");
if (mysql_num_rows($duplication) > 0) {
    echo '<center><b>Job Already Exists.</b></center>';
    mysql_close($connect);
} else {
    echo "<center>";
    echo "Job does not exist would you like to add?";
    echo '<br/>' . '<a href="insertform.php">Add New Job</a>';
    echo "</center>";
}
echo '<br/>' . '<center><a href="index.php">Back To Main Page</a></center>';
?>
