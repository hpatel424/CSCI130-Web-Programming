<?php
    $servername = "localhost"; // default server name
    $username = "harry"; // user name that you created
    $password = "jGgRn1O4qiZ41etl"; // password that you created
    $dbname = "mydbcars";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    $sql = "SELECT * FROM `car` WHERE 1;";
    $output = mysqli_query($conn,$sql);

    $array =[];
     if(mysqli_num_rows($output)>0){
        while($row = mysqli_fetch_assoc($output)){
            array_push($array,$row);
        }

     }
     echo json_encode($array);
