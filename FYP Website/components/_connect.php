<?php

$server = "localhost";
$username = "root";
$password = "";
$database = "final_year_project";

$conn = mysqli_connect($server, $username, $password, $database);

if(!$conn){
    die("The Connection is not established due to ". mysqli_connect_error());
}


?>