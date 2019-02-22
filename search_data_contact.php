<?php

$servername = "localhost";
$username = "root";
$password = "password@123";
$dbname = "pdo_assignment";

$contact_no = $_POST['contact_no'];
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connection Established<br>';
    $query = $conn->prepare("SELECT * FROM user_details WHERE contact_no LIKE '%{$contact_no}%'");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    print_r($result);
    foreach($result as $key=>$row) {
        foreach($row as $key2=>$row2){
            echo $row2;
        }
    }
}
catch(PDOException $e)
{
    echo "Connection Failed " . $e->getMessage();
}
?>