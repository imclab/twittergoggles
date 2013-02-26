<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style2.css" />
        <script type ="text/javascript" src="D3/d3.v3.js"></script>
    </head>
    <body>
        
              <?php
         
        ?>
  <center>
        <script type ="text/javascript">
        

                
                
            var test = 
            <?php
                
                $file = fopen('test.csv', 'r'); //opens csv file for reading
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
                        print($line[$count]); 
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
                 .style("width", function(d) { return d * 10 + "px"; }) //D3 function returns array element * 10 in pixels
                 .text(function(d) { var labels = //begin parsing JS array for bar labels that corresponds to values of bar
                                    <?php
                                    
                                    $file = fopen('test.csv', 'r'); //opens csv file for reading
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
                                        print("\""); //quotes for strings
                                        print($line[$count]); //value of string
                                        print("\""); //quotes for strings
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
                                    var place = test.indexOf(d); //values place in array of data                                   
                                    return labels[place];}); // matched to the appropriate label
                
        </script>
  </center>
        
  
    </body>
</html>
