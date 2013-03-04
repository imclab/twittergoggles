 <?php
    $connect = mysql_connect("localhost", "root", "root");
    mysql_select_db("INFO154_lab2", $connect);
    $query = "select * from job";
    $result = mysql_query($query);
    ?>
    
    <?php
    
    while ($row = mysql_fetch_array($result)){
        echo "<table align='center' border='1' width='100'>";
        echo "<tr>";
        echo "<td>Id</td>";
        echo "<td>State</td>";
        echo "<td>Zombie Head</td>";
        echo "<td>Since Id</td>";
        echo "<td>Query</td>";
        echo "<td>Description</td>";
        echo "<td>Edit</td>";
        echo "<td>Delete</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td>".$row['job_id']."</td>";
        echo "<td>".$row['state']."</td>";
        echo "<td>".$row['zombie_head']."</td>";
        echo "<td>".$row['since_id_str']."</td>";
        echo "<td>".$row['query']."</td>";
        echo "<td>".$row['description']."</td>";
        echo "<td><a href=\"update.php?job_id=".$row['job_id']."\"> EDIT </a></td>";
        echo "<td><a href=\"delete.php?job_id=".$row['job_id']."\"> DELETE </a></td>";
        echo "</tr>";
        echo "</table>";
    }
    
    //if (mysql_num_rows($result) > 0) {
    //    echo "<table align='center' border='1'>";
    //    echo "<tr>";
    //    echo "<th>Id</th>";
    //    echo "<th>Query</th>";
    //    echo "<th>Edit</th>";
    //    echo "</tr>";
    //    while ($row = mysql_fetch_array($result)) {
    //        echo "<tr>";
    //        echo "<td>" . $row['job_id'] . "</td>";
    //        echo "<td>" . $row['query'] . "</td>";
    //        echo "<td><a href='update.php?operation=edit&id=" . $row['job_id'] . "&query=" . $row['query'] . "'>Edit</a></td>";
    //        echo "</tr>";
    //    }
    //    echo "</table>";
  //  } else {
  //      echo "<center>No Records Found!</center>";
  //  }
    ?>