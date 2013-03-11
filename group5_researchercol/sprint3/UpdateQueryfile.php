<?php
include 'dbconnection.php';
include "searchPageForm.html";

// Get data from the form and stored into the variables
$first = $_POST["firstName"];
$last = $_POST["lastName"]; 
$email = $_POST["email"];
$search_phrase = $_POST["search_request"];


//Prepared select query
$query1 = 'select `jobs` from `researcher_job` where `jobs` = "'.$search_phrase.'"';
$query2 = 'select `firstName`, `lastName`, `email` from `researcher_info` where `firstName` = "'.$first.'" and `lastName` = "'.$last.'" and `email` = "'.$email.'"';
//Created new Database object
$result = new QueryDatabase('_zgroup');

// Executed query using class method
$prepare1 = $result->prepare_query($query1);
$prepare2 = $result->prepare_query($query2);

// if user already exists
if ($prepare2->rowCount() >=1)
{
    // Find researcher ID based on email address
    $queryID = "SELECT researcher_id FROM researcher_info WHERE email = '" . $email . "'";
    $res = $result->prepare_query($queryID);
    
    // Fetching IDs into arrays
    $row = $res->fetch(PDO::FETCH_ASSOC);
        
    $id = $row['researcher_id'];
    
    // find researcher ID from the researcher_job table and match with the job
    $query4 = "SELECT researcher_id FROM researcher_job
    WHERE researcher_job.researcher_id = '" . $id . "' AND jobs = '" . $search_phrase . "'";
    
    $prepare4 = $result->prepare_query($query4);
    
    // if researcher has already resquested same job, show en error
    if ($prepare4->rowCount() >= 1) {
        echo '<div class="container">';    
        echo '<div class="alert alert-error"> You\'ve already searched for this term </div>';
        echo '</div>';
    }
    
    // Otherwise select ID from the Info table based on email
    else {
        $queryID = "SELECT researcher_id FROM researcher_info WHERE email = '" . $email . "'";
        $res = $result->prepare_query($queryID);
        
        $row = $res->fetch(PDO::FETCH_ASSOC);
        
        $id = $row['researcher_id'];
        
        // Then insert ID to job table coresponse to the user's search
        $query4 = "INSERT INTO researcher_job (`jobs`, `researcher_id`) values ('".$search_phrase."', '" . $id ."')";
        $prepare4 = $result->prepare_query($query4);  
        echo '<div class="container">'; 
        echo '<div class="alert alert-success"> Your search term is being added. </div>';
        echo '</div>';
    }
}

// If user is completly new to our system, add profile info and search phrase
else
{
    echo '<div class="container">';
     echo '<div class="alert alert-success"> Your profile information is being added into the database </div>'.'<br>';
     echo '</div>';
    $query3 = "INSERT INTO researcher_info (`firstName`, `lastName`, `email`) values ('".$first."','".$last."','".$email."')";
    $prepare3 = $result->prepare_query($query3);
    $id = $result->db->lastInsertId();
    $query4 = "INSERT INTO researcher_job (`jobs`,`researcher_id`) values ('".$search_phrase."', '" . $id . "')";
    $prepare4 = $result->prepare_query($query4);  
}

/*if ($prepare1->rowCount() >=1)
        {    
      echo 'Your keyword search already exists in the database'."<br>";
        
        }
        
 else {
        echo 'But your new search keywords is not, so it is being added now';*/  





/*

// If user entered his or her profile information and search pharse that have already exsited in Database, than show message 
if (($prepare1->rowCount() >=1) &&  ($prepare2->rowCount() >=1))
{
    echo '';

}

// Else insert data into the table
else  
        {   
    echo 'Your search query is being added into the database.'.'<br>';
    $query3 = "INSERT INTO researcher_job (`jobs`) values ('".$search_phrase."')";
    $prepare3 = $result->prepare_query($query3);
    echo 'Your profile information is being added into the database'.'<br>';
    $query4 = "INSERT INTO researcher_info (`firstName`, `lastName`, `email`) values ('".$first."','".$last."','".$email."')";
    $prepare4 = $result->prepare_query($query4);
        }
// if user's profile exsits in database but not new search key, than show message        
if ($prepare2->rowCount() >=1)
{
    echo 'Your profile information is already exist in the database';

}

// When new search key did not exsit entered by exsiting user, insert new search keyword into the database
if ($prepare1->rowCount() >=1)
        {    
      echo 'Your keyword search already exists in the database';
        
        }
        
 else {
        echo 'But your new search keywords is not, so it is being added now';
            $query5 = "INSERT INTO researcher_job (`jobs`) values ('".$search_phrase."')";
            $prepare5 = $result->prepare_query($query5);    
}
*/   
?>