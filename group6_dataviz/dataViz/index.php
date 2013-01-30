<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script type ="text/javascript" src="D3/d3.v3.js"></script>
    </head>
    <body>
        
        <script type ="text/javascript">
            var response = [5,10,15,20,25];
            d3.select("body").selectAll("div")
                .data(response)
                .enter()
                .append("div")
                .attr("class","bar")
                .style("height", function(d){
                                            var barHeight = d * 5;
                                            return barHeight + "px";});
                
                
        </script>
        
        
        <?php
        // put your code here
        ?>
    </body>
</html>
