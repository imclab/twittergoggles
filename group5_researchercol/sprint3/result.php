<?php
include 'dbconnection.php';
include 'existingResearcherSearch.html';

$emailAddress = mysql_real_escape_string($_POST['emailAddress']);
$query1 = "SELECT * FROM researcher_info
INNER JOIN researcher_job ON researcher_info.researcher_id = researcher_job.researcher_id
WHERE researcher_info.email = '" . $emailAddress . "'";

try {
    //Created new Database object
    $result = new QueryDatabase('_zgroup');
    // Executed query using class method
    $prepare1 = $result->prepare_query($query1);
    echo '<div class="container">';
    echo '<table class="table table-striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Job</th>';
    echo '</tr>';
    echo '</thead>';
    while ($row = $prepare1->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr><td>'.$row['jobs'] . '</td></tr>';
    }
    echo '</table>';
    echo '</div>';
} catch (PDOException $e) {
    echo "Error running query: " . $e->getMessage();
    die();
}

?>
