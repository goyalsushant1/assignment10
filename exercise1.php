<?php

if(!isset($_POST['submit']))
{
    echo "The requested URL is not meant for you ...";
    die();
}
if(!isset($_POST['first_name']) || !isset($_POST['last_name']) || !isset($_POST['email_id']) || !isset($_POST['contact_no']))
{
    echo "Pleas enter the required details.";
    die();
}

$servername = "localhost";
$username = "root";
$password = "password@123";
$dbname = "pdo_assignment";

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_id = $_POST['email_id'];
$contact_no = $_POST['contact_no'];

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connection estabished<br>';

    $query = "INSERT INTO user_details (first_name, last_name, email_id, contact_no) VALUES ('$first_name','$last_name','$email_id','$contact_no')";
    $conn->exec($query);

    echo '<br>Records added Successfully';
}
catch(PDOException $e)
{
    echo $sql . "<br>" . $e->getMessage();
}
?>