<?php
         // Created class
        class QueryDatabase {
            private $db;
            public function __construct($sampleDatabase){
                $dsn = "mysql:host=sociotechnical.ischool.drexel.edu;dbname=".$sampleDatabase;
                $userName = "student";
                $password = "dragon900";
                
            try{
                    // use PDO method for connection
                   $this->db = new PDO($dsn,$userName,$password); // Used PDO method for connection
                }
                // Incase connection failed to MySql server throw the error message
                catch (PDOException $e){
                echo $e->getMessage();
                exit();
                } 
               }
             // Getter  
             public function getdb(){
                 return $this->db;
             }
             // Setter
             public function setdb($value){
                 $this->db = $value;
             } 
             
             // Method for exacuting query
             public function prepare_query($query){
                  $x = $this->db->prepare($query);
                  $x->execute();
                  return $x;
             }
       }
            
        ?>