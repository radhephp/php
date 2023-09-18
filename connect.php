<?php
function connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database="employee";

// Create connection
    $conn = new mysqli($servername, $username, $password,$database);
    
return $conn;
}
?>