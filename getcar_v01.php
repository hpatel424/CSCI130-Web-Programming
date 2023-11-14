<?php

include "car.php";

$index=1;


if ($index!=-1) {
	// open and load the content of the database
    $servername = "localhost"; // default server name
    $username = "harry"; // user name that you created
    $password = "jGgRn1O4qiZ41etl"; // password that you created
    $dbname = "myDBcars";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
    $sql = "SELECT COUNT(*) as total FROM Car";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo $row["total"];
	// Selection of data 
	$sql = "SELECT * FROM Car WHERE pkey=". $index;
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		$row = $result->fetch_assoc(); // Fetch a result row as an associative array
		
		$car=new Car();
        $car->id=$row["id"];
        $car->brand=$row["brand"];
        $car->model=$row["model"];
        $car->year=$row["year"];
        $car->color=$row["color"];
        $car->bodystyle=$row["bodystyle"];
        $car->transmission=$row["transmission"];
        $car->drivetype=$row["drivetype"];

		
		echo json_encode($car);
	} else {
		$bad1=[ 'bad' => 1];
		echo json_encode($bad1);	
	}
}

?>