<?php
include "car.php";
//creation of my database of cars
$servername = "localhost"; // default server name
$username = "harry"; // user name that you created
$password = "jGgRn1O4qiZ41etl"; // password that you created
$dbname = "mydbcars";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error ."<br>");
} 
echo "Connected successfully <br>";

$createDB = false;
if ($createDB) {
    // Creation of the database
    $sql = "CREATE DATABASE ". $dbname;
    if ($conn->query($sql) === TRUE) {
        echo "Database ". $dbname ." created successfully<br>";
    } else {
        echo "Error creating database: " . $conn->error ."<br>";
    }
}
// close the connection
$conn->close();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// $lvar=get_object_vars($a0[0]);
// print_r ($lvar);
$createTable = false;
if ($createTable) {
    $sql = "CREATE TABLE Car (
    pkey INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    id INT(6),
    brand  VARCHAR(30) NOT NULL,
    model   VARCHAR(30) NOT NULL,
    year1 INT(4) NOT NULL,
    color   VARCHAR(30) NOT NULL,
    bodystyle   VARCHAR(30) NOT NULL,
    transmission   VARCHAR(30) NOT NULL,
    drivetype   VARCHAR(30) NOT NULL
    )";


    if ($conn->query($sql) === TRUE) {
        echo "Table Car created successfully<br>";
    } else {
        echo "Error creating table: " . $conn->error ."<br>";
    }

}

//insert cars
$stmt = $conn->prepare("INSERT INTO car (id, make, model, year1, color, bodystyle, transmission, drivetype) VALUES (?,?,?,?,?,?,?,?)");
if ($stmt==FALSE) {
	echo "There is a problem with prepare <br>";
	echo $conn->error; // Need to connect/reconnect before the prepare call otherwise it doesnt work
}
$stmt->bind_param("ississss", $id, $brand, $model, $year, $color, $bodystyle, $transmission, $drivetype);

$n = 10;
for ($i=0;$i<$n;$i++) {
    $car = new Car();
    $car->Display();
// set parameters and execute
$id = $car->id; 
$brand = $car->brand;
$model = $car->model;
$year = $car->year;
$color = $car->color;
$bodystyle = $car->bodystyle;
$transmission = $car->transmission;
$drivetype = $car->drivetype;
$stmt->execute();
echo "New record ". $i ." created successfully<br>";
}

$stmt->close();

// close the connection
$conn->close();


?>