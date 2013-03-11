<?php
$job_id = $_GET['job_id'];

$connect = mysql_connect("localhost", "root", "root");
if (!$connect) {
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
        <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.css" type="text/css" />

        <title></title>
    </head>
    <body>
    <center>
        <form name="update" action="save.php" method="post">
            <table align='center'>
                <tr>
                    <td>Job ID:</td>
                    <td><input type="text" name="job_id" value="<?php echo $row['job_id']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>Current Job Query:</td>
                    <td><input type="text" name="oldquery" value="<?php echo $row['query']; ?>" readonly></td>
                </tr>
                <tr>
                    <td>What would you like to change the Job Query too?</td>
                </tr>
                <tr>
                    <td>New Query:</td>
                    <td><input type="text" name="newquery"></td>
                </tr>
                <tr>
                    <td><input type="submit" value="submit">
                    </td>
                </tr>
            </table
        </form>
    </center>

</body>
</html>

<?php
mysql_close();
?>