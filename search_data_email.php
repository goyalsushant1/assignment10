<?php

$servername = "localhost";
$username = "root";
$password = "password@123";
$dbname = "pdo_assignment";

$email_id = $_POST['email_id'];
try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connection Established<br><br>';
    $query = $conn->prepare("SELECT * FROM user_details WHERE email_id LIKE '%{$email_id}%'");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $result = $query->fetchAll();
    //print_r($result);
    foreach($result as $key=>$row) {
        echo $key+1 . '&nbsp;';
        foreach($row as $key2=>$row2){
            echo $row2.'&nbsp;';
        }
        echo '<br>';
    }
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
?>