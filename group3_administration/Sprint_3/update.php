<?php
$job_id = $_GET['job_id'];

$connect = mysql_connect("sociotechnical.ischool.drexel.edu", "info154", "info154");
if (!$connect) {
    die('Could not connect: ' . mysql_error());
}

mysql_select_db("goggles_test", $connect);

$sql = "SELECT * FROM job WHERE job_id = $job_id LIMIT 1";
$result = mysql_query($sql);

$row = mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Test Page</title>
        <link href="./css/bootstrap.css" rel="stylesheet">
        <link href=".css/bootstrap-responsive.css" rel="stylesheet">

        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="../assets/js/html5shiv.js"></script>
        <![endif]-->

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
    </head>
    <body>    

        <!-- Navbar
    ================================================== -->
        <div class="navbar navbar-inverse navbar-fixed-top"> <!-- This starts the navbar. Please don't erase anything inside of this div -->
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="">
                                <a href="./twitterGogglesTest/index.html">Home</a>
                            </li>
                            <li class="active">
                                <a href="">THIS IS THE ACTIVE PAGE</a>
                            </li>
                            <li class="">
                                <a href="group4_reporting/reporting.html">Visualization/Reporting</a>
                            </li>
                            <li class="">
                                <a href="group5/researchercol/index.php">Administration</a>
                            </li>
                            <li class="">
                                <a href="/group5/researchercol/searchPageForm.html">Research</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- This ends the navbar. Please don't erase anything inside of this div -->
        </br>
        </br>
        </br>
        </br>
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