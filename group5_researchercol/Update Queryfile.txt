<?php
include 'dbconnection.php';
include "searchPageForm.html";

// Get data from the form and stored into the variables
$first = $_POST["firstName"];
$last = $_POST["lastName"]; 
$email = $_POST["email"];
$search_phrase = $_POST["search_request"];


//Prepared select query
$query1 = 'select jobs from researcher_job where jobs is'.$search_phrase.'group by jobs';
$query2 = 'select firstName, lastName, email from researcher_info where firstName is'.$first.'and lastName is'.$last.'and email is'.$email.'group by lastName';

//Created new Database object
$result = new QueryDatabase('_zgroup');

// Executed query using class method
$prepare1 = $result->prepare_query($query1);
$prepare2 = $result->prepare_query($query2);

// If user entered his or her profile information and search pharse that have already exsited in Database, than show message 
if ($prepare1->rowCount() >=1 and  $prepare2->rowCount() >=1)
{
    echo 'Your profile information and search key are already exist in the database.';

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
            echo 'But your new search keywords is not, so it is being added now';
            $query5 = "INSERT INTO researcher_job (`jobs`) values ('".$search_phrase."')";
            $prepare5 = $result->prepare_query($query5);
        
        }
   
?>
