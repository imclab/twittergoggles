<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="style2.css" />
        <script type ="text/javascript" src="D3/d3.v3.js"></script>
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
                <a href="/twitterGogglesTest/index.html">Home</a>
              </li>
<li class="active">
                <a href="">Current Visualization</a>
              </li>
              <li class="">
                <a href="/twitterGogglesTest/group6_dataviz/dataViz/Reporting.html">Visualization/Reporting</a>
              </li>
              <li class="">
                <a href="/twitterGogglesTest/group3_administration/Sprint_3/index.php">Administration</a>
              </li>
              <li class="">
                <a href="/twitterGogglesTest/group5_researchercol/sprint3/researcher.php">Research</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div> <!-- This ends the navbar. Please don't erase anything inside of this div -->
        
        <!-- Data Viz
    ================================================== -->
        
        
        <br><br><br>
        <h1><center>Visualization of Data Output</center></h1>
        
              <?php
         
        ?>
  <center>
        <script type ="text/javascript">
        

                
                
            var test = 
            <?php
                
                $file = fopen('data.csv', 'r'); //opens csv file for reading
                $line = array();
                $temp = array();
                
                while(! feof($file)) //loops until end of file
                    {
                    $temp = fgetcsv($file); //sets loop array = file line array
                    if($temp[0]!= NULL) //if file line array is not null
                        {
                        $line = array_merge($line, $temp); //add file line array to complete file array
                        }                          
                    }
                    
                $count = 1;
                $commacount = 0;
                
                print("["); //begins parsing of JS array
                
                while($count <= count($line)) //loops one time for every vaule of file array
                    {
                    if(($count-1) % 3 == 0) //adds value to array only if value is in second column of CSV
                        {
                        if(strcmp($line[$count], "0000000000") != 0 and strcmp($line[$count], " ") != 0)
                            {
                            print($line[$count]);
                            }
                        if($commacount < (count($line)/3) - 1) //makes sure commas are added after every element except the last
                            {
                            print (", ");
                            $commacount++;
                            }     
                        }
                    $count++;
                    }
                    
                print("]"); //ends parsing of JS array
                
                fclose($file); //close file 
            ?>;
                
            var chart = d3.select("body").append("div") //start of d3 
                          .attr("class", "chart"); //allows linking to style sheet
                          
            chart.selectAll("div")
                 .data(test) //binds array to chart
                 .enter().append("div") //if there isnt enough divs for each element in data array, create empty ones 
                 .style("width", function(d) { return d + "px"; }) //D3 function returns array element * 10 in pixels
                 .style("color", "black")
                 .text(function(d) { var labels = //begin parsing JS array for bar labels that corresponds to values of bar
                                    <?php
                                    
                                    $file = fopen('data.csv', 'r'); //opens csv file for reading
                                    $line = array();
                                    $temp = array();
                                    
                                    while(! feof($file)) //runs until end of file
                                        {
                                        $temp = fgetcsv($file); //sets loop array = file line array
                                        if($temp[0]!= NULL) //if file line array is not null
                                            {
                                            $line = array_merge($line, $temp); //add file line array to complete file array
                                            }
                                        }
                                        
                                    $count = 2;
                                    $commacount = 0;
                                    
                                    print("[");
                                    
                                    while($count <= count($line)) //loops one time for every vaule of file array
                                        {
                                        if(strcmp($line[($count-1)], "0000000000") != 0 and strcmp($line[($count - 1)], " ") != 0)
                                            {
                                            print("\""); //quotes for strings
                                            print($line[$count]); //value of string
                                            print("\""); //quotes for strings
                                            }
                                        if($commacount < (count($line)/3) - 1)//makes sure commas are added after every element except the last
                                            {
                                            print (", "); //print comma
                                            $commacount++;
                                            }
                                        $count = $count + 3; //loops for every value in third column of data
                                        }
                                        
                                    print("]"); //ends parsing of JS array
                                    
                                    fclose($file); //closes file
                                    ?>;
                                    var place = test.indexOf(d);//values place in array of data 
                                    var total = test[place];
                                    test[place] = -1;
                                    var query = labels[place].split("=")[1];
                                    return query + " " + total ;}); // matched to the appropriate label
                
        </script>
  </center>
        
  
    </body>
</html>
