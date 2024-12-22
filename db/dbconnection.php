<?php
$severname = "localhost";
$dbname = "blogs_project";
$username = "root";
$password = "";

try {
    $pdo = new PDO ("mysql:host=$severname;dbname=$dbname", $username, $password);
    // echo  "Connection successful";

}catch (PDOException $error){
    echo "Connection Error ==>" . $error;
}