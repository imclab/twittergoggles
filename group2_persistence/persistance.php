<?php

$connect= mysql_connect("localhost","root","root");
//connects to the database 

mysql_select_db('testdatabase',$connect);
//selects database

$name= "ravens";
// hard coded to collect tweets about the ravens    
// this can later be swapped out for a "POST" or "GET" with an HTML form for user-specified tweets

$queryName= "q=%23".$name;

//adds the q=%23, to make it a query hashtag

    $state = 1; //define state
    
    $zh = 1; //define zombie_head

//adds specified query name to jobs table
    $query1 = "INSERT INTO job (query,zombie_head,state) VALUES ('".$queryName."','".$zh."','".$state."');";

//runs the query
    mysql_query($query,$connect)or die('Tried to run the insert, here was the error I received on Admin Add: '.mysql_error().'    '.$query);    
  
//GETS for job, tweet, hashtag, mention, url    
    $query2 = "SELECT xxxxxx FROM job WHERE xxxxxx";
    $query3 = "SELECT xxxxxx FROM hashtag WHERE xxxxxx";
    $query4 = "SELECT xxxxxx FROM mention WHERE xxxxxx";
    $query5 = "SELECT xxxxxx FROM url WHERE xxxxxx";
    $query6 = "SELECT xxxxxx FROM tweet WHERE xxxxxx";
    
//closes mysql connection
mysql_close($connect);
    
?>
